<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $contacts = Contact::where('name', 'like', $searchTerm)->orderBy('id', 'desc')->paginate(12);

        return view('livewire.contact-index', compact('contacts'));
    }
}
