<div>
    <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control my-2" placeholder=" Search" wire:model.live="searchTerm" />

            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm" wire:loading.class="table-secondary">
                    <thead>
                        <tr>
                            <th>{{ __('labels.backend.tour.fields.image') }}</th>
                            <th>{{ __('labels.backend.tour.fields.title') }}</th>
                            <th>{{ __('labels.backend.tour.fields.duration') }}</th>
                            <th>{{ __('labels.backend.tour.fields.price') }}</th>
                            <th>{{ __('labels.backend.tour.fields.city') }}</th>
                            <th>{{ __('labels.backend.tour.fields.country') }}</th>
                            <th>{{ __('labels.backend.tour.fields.status') }}</th>

                            <th class="text-end">{{ __('labels.backend.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tour as $t)
                        <tr>
                            <td>
                                <strong>
                                    <a href="{{route('backend.tour.show', $t->id)}}">
                                        <img src="{{ asset('public/storage/uploads/tour/') . '/' . $t->image}}" alt="" width="100px">
                                    </a>
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    <a href="{{route('backend.tour.show', $t->id)}}">
                                        {{ $t->title }}
                                    </a>
                                </strong>
                            </td>
                            <td>{{ $t->duration }}</td>
                            <td>{{ $t->price }}</td>
                            <td>{{ $t->city }}</td>
                            <td>{{ $t->country }}</td>
                            <td>
                                @if ($t->status == 1)
                                    <span class="badge text-bg-success">Active</span>
                                @else
                                    <span class="badge text-bg-warning">Inactive</span>
                                @endif
                            </td>

                            <td class="text-end">
                                <a href="{{route('backend.tour.show', $t)}}" class="btn btn-success btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.show')}}"><i class="fas fa-desktop fa-fw"></i></a>
                                @can('edit_users')
                                <a href="{{route('backend.tour.edit', $t)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"><i class="fas fa-edit"></i></a>
                                <a href="{{route('backend.tour.destroy', $t)}}" class="btn btn-danger btn-sm mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt fa-fw"></i></a>
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
                {!! $tour->total() !!} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {!! $tour->links() !!}
            </div>
        </div>
    </div>
</div>
