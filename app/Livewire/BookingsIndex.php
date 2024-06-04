<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingsIndex extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $bookings = Booking::join('users','users.id', '=', 'bookings.user_id')
                    ->join('services','services.id', '=', 'bookings.service_id')
                    ->select('bookings.*','users.name','services.title')
                    ->orderBy('id', 'desc')->paginate(12);

        return view('livewire.bookings-index', compact('bookings'));
    }
}
