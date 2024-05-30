{{-- @extends ('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs>
    <x-backend.breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend.breadcrumb-item>
</x-backend.breadcrumbs>
@endsection --}}

@php
    $tours = App\Models\Package::orderBy('deleted_at', 'desc')->paginate();
    // dd($tour);
@endphp
{{-- @section('content') --}}
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <x-slot name="toolbar">
                @can('add_'.$module_name)
                    <a href="" class='btn btn-success' title="Add Package">Add</a>
                @endcan
            </x-slot>
        </x-backend.section-header>

        <div class="row mt-4">
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
                        @foreach($tours as $tour)
                        <tr>
                            <td>
                                {{ $tour->id }}
                            </td>
                            <td>
                                <img src="{{ asset('public/storage/') . '/' . $tour->image }}" alt="" width="100px">
                            </td>
                            <td>
                                {{ $tour->service_id }}
                            </td>
                            <td>
                                {{ $tour->validity }}
                            </td>
                            <td>
                                {{ $tour->city }}
                            </td>
                            <td>
                                @if ($tour->status == 1)
                                    <span class="badge text-bg-success">Active</span>
                                @else
                                    <span class="badge text-bg-warning">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="" class='btn btn-sm btn-primary mt-1' data-toggle="tooltip" title="Edit"><i class="fas fa-wrench"></i></a>
                                <a href="" class='btn btn-sm btn-success mt-1' data-toggle="tooltip" title="Show"><i class="fas fa-tv"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    Total {{ $$module_name->total() }} {{ ucwords($module_name) }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-end">
                    {!! $$module_name->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}

@section ('after-scripts-end')

@endsection
