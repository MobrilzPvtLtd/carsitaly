<div>
    <div class="row mt-4">
        <div class="col">
            <input type="text" class="form-control my-2" placeholder=" Search" wire:model.live="searchTerm" />

            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm" wire:loading.class="table-secondary">
                    <thead>
                        <tr>
                            <th>users</th>
                            <th>service Title</th>
                            <th>Booking Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Adult</th>
                            <th>Child</th>
                            <th>Room Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $book)
                        <tr>
                            <td>
                               <a href="{{ route('backend.users.show',$book->user_id) }}">{{ $book->name }}</a>
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->booking_type }}</td>
                            <td>{{ $book->start_date }}</td>
                            <td>{{ $book->end_date }}</td>
                            <td>{{ $book->adult }}</td>
                            <td>{{ $book->child }}</td>
                            <td>{{ $book->room_type }}</td>
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
                {!! $bookings->total() !!} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {!! $bookings->links() !!}
            </div>
        </div>
    </div>
</div>
