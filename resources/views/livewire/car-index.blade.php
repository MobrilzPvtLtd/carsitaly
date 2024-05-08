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
                                        {{ $c->image }}
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
                                {!! $c->status_label !!}
                            </td>

                            <td class="text-end">
                                <a href="{{route('backend.users.show', $c)}}" class="btn btn-success btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.show')}}"><i class="fas fa-desktop fa-fw"></i></a>
                                @can('edit_users')
                                <a href="{{route('backend.users.edit', $c)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"><i class="fas fa-wrench fa-fw"></i></a>
                                <a href="{{route('backend.users.changePassword', $c)}}" class="btn btn-info btn-sm mt-1" data-toggle="tooltip" title="{{__('labels.backend.changePassword')}}"><i class="fas fa-key fa-fw"></i></a>
                                @if ($c->status != 2)
                                <a href="{{route('backend.users.block', $c)}}" class="btn btn-danger btn-sm mt-1" data-method="PATCH" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.block')}}" data-confirm="Are you sure?"><i class="fas fa-ban fa-fw"></i></a>
                                @endif
                                @if ($c->status == 2)
                                <a href="{{route('backend.users.unblock', $c)}}" class="btn btn-info btn-sm mt-1" data-method="PATCH" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.unblock')}}" data-confirm="Are you sure?"><i class="fas fa-check fa-fw"></i></a>
                                @endif
                                <a href="{{route('backend.users.destroy', $c)}}" class="btn btn-danger btn-sm mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt fa-fw"></i></a>
                                @if ($c->email_verified_at == null)
                                <a href="{{route('backend.users.emailConfirmationResend', $c->id)}}" class="btn btn-primary btn-sm mt-1" data-toggle="tooltip" title="Send Confirmation Email"><i class="fas fa-envelope fa-fw"></i></a>
                                @endif
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
