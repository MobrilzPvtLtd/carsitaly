<?php

namespace App\Livewire;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\WithPagination;

class HotelIndex extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $hotel = Hotel::where('title', 'like', $searchTerm)->orderBy('id', 'desc')->paginate();

        return view('livewire.hotel-index', compact('hotel'));
    }
}
