<div>
    <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control my-2" placeholder=" Search" wire:model.live="searchTerm" />

            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm" wire:loading.class="table-secondary">
                    <thead>
                        <tr>
                            <th>{{ __('labels.backend.hotel.fields.image') }}</th>
                            <th>{{ __('labels.backend.hotel.fields.title') }}</th>
                            <th>{{ __('labels.backend.hotel.fields.traveller') }}</th>
                            <th>{{ __('labels.backend.hotel.fields.theme') }}</th>
                            <th>{{ __('labels.backend.hotel.fields.price') }}</th>
                            <th>{{ __('labels.backend.hotel.fields.start_date') }}</th>
                            <th>{{ __('labels.backend.hotel.fields.end_date') }}</th>
                            <th>{{ __('labels.backend.hotel.fields.status') }}</th>

                            <th class="text-end">{{ __('labels.backend.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotel as $hot)
                        <tr>
                            <td>
                                <strong>
                                    <a href="{{route('backend.hotel.show', $hot->id)}}">
                                        <img src="{{ asset('public/storage/uploads/hotel/') . '/' . $hot->image}}" alt="" width="100px">
                                    </a>
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    <a href="{{route('backend.hotel.show', $hot->id)}}">
                                        {{ $hot->title }}
                                    </a>
                                </strong>
                            </td>
                            <td>{{ $hot->traveller }}</td>
                            <td>{{ $hot->theme }}</td>
                            <td>{{ $hot->price }}</td>
                            <td>{{ $hot->start_date }}</td>
                            <td>{{ $hot->end_date }}</td>
                            <td>
                                @if ($hot->status == 1)
                                    <span class="badge text-bg-success">Active</span>
                                @else
                                    <span class="badge text-bg-warning">Inactive</span>
                                @endif
                            </td>

                            <td class="text-end">
                                <a href="{{route('backend.hotel.show', $hot)}}" class="btn btn-success btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.show')}}"><i class="fas fa-desktop fa-fw"></i></a>
                                @can('edit_users')
                                <a href="{{route('backend.hotel.edit', $hot)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"><i class="fas fa-edit"></i></a>
                                <a href="{{route('backend.hotel.destroy', $hot)}}" class="btn btn-danger btn-sm mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt fa-fw"></i></a>
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
                {!! $hotel->total() !!} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {!! $hotel->links() !!}
            </div>
        </div>
    </div>
</div>
