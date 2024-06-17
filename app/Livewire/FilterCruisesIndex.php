<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class FilterCruisesIndex extends Component
{
    use WithPagination;

    public $minPrice = '';
    public $maxPrice = '';

    public $searchTerm;
    public $filterLocation = [];

    public $cruise = '';
    public $transportation = '';
    public $sighseeing = '';
    public $meals = '';
    public $drinks = '';

    public $serviceType;
    public $sortBy;
    public $sort_rating;
    public $selectedSort;

    public $formLocation;
    public $fRoom_no;
    public $city;
    public $check_in;
    public $check_out;
    public $room_no;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $currentUrl = Request::url();

        $segments = explode('/', $currentUrl);
        $this->serviceType = end($segments);
    }

    public function applyFilter()
    {
        $this->formLocation = $this->city;
        $this->fRoom_no = $this->room_no;
    }

    public function updateSearchPrice($val)
    {
        $parts = explode("-", $val);
        $this->minPrice = $parts[0] ?? '';
        $this->maxPrice = $parts[1] ?? '';
    }

    public function updateSortPrice($val)
    {
        $this->selectedSort = $val;
        $this->sort_rating = $val;
        $this->sortBy = $val;
    }

    public function render()
    {
        // dd($this->fRoom_no);
        $serviceType = $this->serviceType;
        $location = $this->filterLocation;

        $cruises = Service::where('service_type', $serviceType)->where('status', 1);

        $cruises->when($this->minPrice || $this->maxPrice, function ($query) {
            $query->where(function ($subQuery) {
                if ($this->minPrice || $this->maxPrice) {
                    $subQuery->whereBetween('price', [$this->minPrice, $this->maxPrice]);
                }
            });
        });

        if ($this->selectedSort == 'lowest_price') {
            $cruises->orderBy('price', 'ASC');
        } elseif ($this->selectedSort == 'highest_price') {
            $cruises->orderBy('price', 'DESC');
        }

        if ($this->sort_rating == 'lowest_rating') {
            $cruises->orderBy('rating', 'ASC');
        } elseif ($this->sort_rating == 'highest_rating') {
            $cruises->orderBy('rating', 'DESC');
        }

        if ($this->sortBy == 'ascending') {
            $cruises->orderBy('id', 'ASC');
        } elseif ($this->sortBy == 'descending') {
            $cruises->orderBy('id', 'DESC');
        }

        $cruises->when($this->formLocation, function ($query) {
            $query->where('city', 'like', "%$this->formLocation%");

            if ($this->fRoom_no) {
                $query->where('room_no', $this->fRoom_no);
            }
        });

        $selectedLocations = array_keys(array_filter($location));

        if (!empty($selectedLocations)) {
            $cruises->whereIn('city', $selectedLocations);
        }

        $cruises->when($this->cruise || $this->transportation || $this->sighseeing || $this->meals || $this->drinks
        , function ($query) {
            return $query->where(function ($subQuery) {
                if ($this->cruise) {
                    $subQuery->orWhere('inclusion', 'like', '%cruise%');
                }
                if ($this->transportation) {
                    $subQuery->orWhere('inclusion', 'like', '%transportation%');
                }
                if ($this->sighseeing) {
                    $subQuery->orWhere('inclusion', 'like', '%sighseeing%');
                }
                if ($this->meals) {
                    $subQuery->orWhere('inclusion', 'like', '%meals%');
                }
                if ($this->drinks) {
                    $subQuery->orWhere('inclusion', 'like', '%drinks%');
                }
            });
        });

        $cruises = $cruises->orderBy('id', 'desc')->paginate(6);

        $uniqueLocation = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('city');

        $uniqueRoomNumbers = Service::where('service_type', $serviceType)
                ->where('status', 1)->where('room_no', '!=', null)->distinct()->pluck('room_no');

        return view('livewire.filter-cruises-index', compact('cruises','uniqueLocation','serviceType','uniqueRoomNumbers'));
    }
}
