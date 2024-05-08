<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class CarIndex extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $car = Car::where('title', 'like', $searchTerm)->orderBy('id', 'desc')->paginate();

        return view('livewire.car-index', compact('car'));
    }
}
