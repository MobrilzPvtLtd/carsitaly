<?php

namespace App\Livewire;

use App\Models\Tour;
use Livewire\Component;
use Livewire\WithPagination;

class TourIndex extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $tour = Tour::where('title', 'like', $searchTerm)->orderBy('id', 'desc')->paginate();

        return view('livewire.tour-index', compact('tour'));
    }
}
