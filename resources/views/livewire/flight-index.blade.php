<div>
    <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control my-2" placeholder=" Search" wire:model.live="searchTerm" />

            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm" wire:loading.class="table-secondary">
                    <thead>
                        <tr>
                            <th>Users</th>
                            <th>Trip Type</th>
                            <th>Leaving From</th>
                            <th>Leaving To</th>
                            <th>Departure Date</th>
                            <th>Return Date</th>
                            <th>Adult</th>
                            <th>Child</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flights as $flight)
                        <tr>
                            <td>
                                <a href="{{ route('backend.users.show',$flight->user_id) }}">{{ $flight->name }}</a>
                             </td>
                            <td>{{ $flight->trip_type }}</td>
                            <td>{{ $flight->leaving_from }}</td>
                            <td>{{ $flight->leaving_to }}</td>
                            <td>{{ $flight->departure_date }}</td>
                            <td>{{ $flight->return_date }}</td>
                            <td>{{ $flight->adult_count }}</td>
                            <td>{{ $flight->child_count }}</td>
                            <td>{{ $flight->class }}</td>
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
                {!! $flights->total() !!} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {!! $flights->links() !!}
            </div>
        </div>
    </div>
</div>
