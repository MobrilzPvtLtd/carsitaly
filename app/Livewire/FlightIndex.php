<?php

namespace App\Livewire;

use App\Models\Flight;
use Livewire\Component;
use Livewire\WithPagination;

class FlightIndex extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $flights = Flight::join('users','users.id', '=', 'flights.user_id')
                    ->select('flights.*','users.name')
                    ->orderBy('id', 'desc')->paginate(12);

        return view('livewire.flight-index', compact('flights'));
    }
}
