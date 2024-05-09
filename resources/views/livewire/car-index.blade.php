<div>
    <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control my-2" placeholder=" Search" wire:model.live="searchTerm" />

            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm" wire:loading.class="table-secondary">
                    <thead>
                        <tr>
                            <th>{{ __('labels.backend.car.fields.image') }}</th>
                            <th>{{ __('labels.backend.car.fields.title') }}</th>
                            <th>{{ __('labels.backend.car.fields.duration') }}</th>
                            <th>{{ __('labels.backend.car.fields.price') }}</th>
                            <th>{{ __('labels.backend.car.fields.status') }}</th>

                            <th class="text-end">{{ __('labels.backend.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($car as $c)
                        <tr>
                            <td>
                                <strong>
                                    <a href="{{route('backend.car.show', $c->id)}}">
                                        <img src="{{ asset('public/uploads/car/') . '/' . $c->image}}" alt="" width="100px">
                                    </a>
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    <a href="{{route('backend.car.show', $c->id)}}">
                                        {{ $c->title }}
                                    </a>
                                </strong>
                            </td>
                            <td>{{ $c->duration }}</td>
                            <td>{{ $c->price }}</td>
                            <td>
                                @if ($c->status == 1)
                                    <span class="badge text-bg-success">Active</span>
                                @else
                                    <span class="badge text-bg-warning">Inactive</span>
                                @endif
                            </td>

                            <td class="text-end">
                                <a href="{{route('backend.car.show', $c)}}" class="btn btn-success btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.show')}}"><i class="fas fa-desktop fa-fw"></i></a>
                                @can('edit_users')
                                <a href="{{route('backend.car.edit', $c)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"><i class="fas fa-edit"></i></a>
                                <a href="{{route('backend.car.destroy', $c)}}" class="btn btn-danger btn-sm mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt fa-fw"></i></a>
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
                {!! $car->total() !!} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {!! $car->links() !!}
            </div>
        </div>
    </div>
</div>
