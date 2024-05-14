<?php

namespace App\Livewire;

use App\Models\Cruise;
use Livewire\Component;
use Livewire\WithPagination;

class CruiseIndex extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $cruise = Cruise::where('title', 'like', $searchTerm)->orderBy('id', 'desc')->paginate();

        return view('livewire.cruise-index', compact('cruise'));
    }
}
