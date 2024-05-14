<div>
    <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control my-2" placeholder=" Search" wire:model.live="searchTerm" />

            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm" wire:loading.class="table-secondary">
                    <thead>
                        <tr>
                            <th>{{ __('labels.backend.cruise.fields.image') }}</th>
                            <th>{{ __('labels.backend.cruise.fields.title') }}</th>
                            <th>{{ __('labels.backend.cruise.fields.location') }}</th>
                            <th>{{ __('labels.backend.cruise.fields.price') }}</th>
                            <th>{{ __('labels.backend.cruise.fields.rating') }}</th>
                            <th>{{ __('labels.backend.cruise.fields.date') }}</th>
                            <th>{{ __('labels.backend.cruise.fields.status') }}</th>

                            <th class="text-end">{{ __('labels.backend.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cruise as $cru)
                        <tr>
                            <td>
                                <strong>
                                    <a href="{{route('backend.cruise.show', $cru->id)}}">
                                        <img src="{{ asset('public/uploads/cruise/') . '/' . $cru->image}}" alt="" width="100px">
                                    </a>
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    <a href="{{route('backend.cruise.show', $cru->id)}}">
                                        {{ $cru->title }}
                                    </a>
                                </strong>
                            </td>
                            <td>{{ $cru->location }}</td>
                            <td>{{ $cru->price }}</td>
                            <td>5/{{ $cru->rating }}</td>
                            <td>
                                @if ($cru->status == 1)
                                    <span class="badge text-bg-success">Active</span>
                                @else
                                    <span class="badge text-bg-warning">Inactive</span>
                                @endif
                            </td>

                            <td class="text-end">
                                <a href="{{route('backend.cruise.show', $cru)}}" class="btn btn-success btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.show')}}"><i class="fas fa-desktop fa-fw"></i></a>
                                @can('edit_users')
                                <a href="{{route('backend.cruise.edit', $cru)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"><i class="fas fa-edit"></i></a>
                                <a href="{{route('backend.cruise.destroy', $cru)}}" class="btn btn-danger btn-sm mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt fa-fw"></i></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <div class="float-left">
                {!! $cruise->total() !!} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {!! $cruise->links() !!}
            </div>
        </div>
    </div>
</div>
