@props(["data"=>"", "module_name", "module_path", "module_title"=>"", "module_icon"=>"", "module_action"=>""])
@php
    $packages = App\Models\Package::where('service_id', $data->id)
            ->join('services','services.id', '=', 'packages.service_id')->select('packages.*','services.title')->orderBy('deleted_at', 'desc')->get();
@endphp
<div class="card">
    @if ($slot != "")
    <div class="card-body">
        {{ $slot }}
    </div>
    @else
    <div class="card-body">

        <x-backend.section-header :data="$data" :module_name="$module_name" :module_title="$module_title" :module_icon="$module_icon" :module_action="$module_action" />

        <div class="row mt-4">
            <div class="col">
                {{ html()->modelForm($data, 'PATCH', route("backend.$module_name.update", $data))->class('form')->acceptsFiles()->open() }}

                @include ("$module_path.$module_name.form")

                <div class="card">
                    <div class="card-body">
                        <x-backend.section-header>
                            <x-slot name="subtitle">
                                <h4>Package Itinerary</h4>
                            </x-slot>
                            <x-slot name="toolbar">
                                @can('add_'.$module_name)
                                    <button type="button" id="addPackage" class='btn btn-success' title="Add Package">Add</button>
                                @endcan
                            </x-slot>
                        </x-backend.section-header>

                        <div class="row mt-4" id="packageList">
                            <div class="col">
                                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                @lang("package::text.image")
                                            </th>
                                            <th>
                                                @lang("package::text.tour_name")
                                            </th>
                                            <th>
                                                @lang("package::text.validity")
                                            </th>
                                            <th>
                                                @lang("package::text.city")
                                            </th>
                                            <th>
                                                @lang("package::text.status")
                                            </th>
                                            <th class="text-end">
                                                @lang("package::text.action")
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($packages as $package)
                                        <tr>
                                            <td>
                                                {{ $package->id }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('public/storage/') . '/' . $package->image }}" alt="" width="100px">
                                            </td>
                                            <td>
                                                {{ $package->title }}
                                            </td>
                                            <td>
                                                {{ $package->validity }}
                                            </td>
                                            <td>
                                                {{ $package->city }}
                                            </td>
                                            <td>
                                                @if ($package->status == 1)
                                                    <span class="badge text-bg-success">Active</span>
                                                @else
                                                    <span class="badge text-bg-warning">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class='btn btn-sm btn-primary mt-1 editButton' title="Edit" data-id="{{ $package->id }}">
                                                    <i class="fas fa-wrench"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="display: none;" id="packageForm">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="service_id" value="{{ $data->id }}">
                                        <div class="col-12 col-sm-4 mb-3">
                                            <div class="form-group">
                                                <label for="package_city" class="form-label">City</label>
                                                <input type="text" id="package_city" name="package_city" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3 mb-3">
                                            <div class="form-group">
                                                <label for="validity" class="form-label">Validity</label>
                                                <input type="number" id="validity" name="validity" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-5 mb-3">
                                            <div class="form-group">
                                                <label for="package_image" class="form-label">Image</label>
                                                <input type="file" id="package_image" name="package_image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-8 mb-3">
                                            <div class="form-group">
                                                <label for="inclusion" class="form-label">Inclusion</label>
                                                <select id="inclusion" name="inclusion[]" class="form-control select3" multiple required>
                                                    <option value="">-- Select an option --</option>
                                                    <option value="Return Economy class airfare">Return Economy class airfare</option>
                                                    <option value="Welcome drinks at hotel">Welcome drinks at hotel</option>
                                                    <option value="Stay in 3 star hotel">Stay in 3 star hotel</option>
                                                    <option value="Guided tour">Guided tour</option>
                                                    <option value="Sighseeing">Sighseeing</option>
                                                    <option value="Airport transport">Airport transport</option>
                                                    <option value="Buffet breakfast">Buffet breakfast</option>
                                                    <!-- Add options dynamically using JavaScript if needed -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 mb-3">
                                            <div class="form-group">
                                                <label for="package_status" class="form-label">Status</label>
                                                <select id="package_status" name="package_status" class="form-control select2" required>
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 mb-3">
                                            <div class="form-group">
                                                <label for="package_description" class="form-label">Description</label>
                                                <textarea id="package_description" name="package_description" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 mt-4">
                        <x-backend.buttons.save />
                    </div>

                    <div class="col-8 mt-4">
                        <div class="float-end">
                            @can('delete_'.$module_name)
                            <a href='{{route("backend.$module_name.destroy", $data)}}' class="btn btn-danger" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('Delete')}}"><i class="fas fa-trash-alt"></i></a>
                            @endcan
                            <x-backend.buttons.cancel />
                        </div>
                    </div>
                </div>

                {{ html()->closeModelForm() }}
            </div>
        </div>
    </div>
    @endif

    <div class="card-footer">
        <div class="row">
            <div class="col">
                @if ($data != "")
                <small class="float-end text-muted">
                    @lang('Updated at'): {{$data->updated_at->diffForHumans()}},
                    @lang('Created at'): {{$data->created_at->isoFormat('LLLL')}}
                </small>
                @endif
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        // $("#editPackage").click(function(){
        //     alert(123);
        // });

        $(document).ready(function(){
            // $("#toggleForm").click(function(){
            //     $("#packageList").show();
            //     $("#packageForm").hide();
            // });

            $("#addPackage").click(function(){
                $("#packageList").hide();
                $("#packageForm").show();
            });

            $(".editButton").click(function() {
                var packageId = $(this).data("id");
                // console.log(packageId);
                populateForm(packageId);
                displayForm();
            });

            function populateForm(packageId) {
                $.ajax({
                    url: '/admin/tours/packages/' + packageId,
                    method: 'GET',
                    success: function(response) {
                        console.log(response.status);
                        $("#packageForm input[name='package_city']").val(response.city);
                        $("#packageForm input[name='validity']").val(response.validity);
                        // $("#packageForm #inclusion").val(response.inclusion).trigger('change');
                        $("#packageForm select[name='inclusion']").val(response.inclusion);
                        if(response.status == 0){
                            $("#packageForm select[name='package_status']").val('Inactive');
                        }else{
                            $("#packageForm select[name='package_status']").val('Active');
                        }
                        $("#packageForm textarea[name='package_description']").val(response.description);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function displayForm() {
                $("#packageList").hide();
                $("#packageForm").show();
            }
        });
    </script>
@endsection
