<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class FilterIndex extends Component
{
    use WithPagination;

    public $minPrice;
    public $maxPrice;

    public $searchTerm;
    public $filterLocation = [];

    public $star5 = '';
    public $star4 = '';
    public $star3 = '';
    public $star2 = '';
    public $star1 = '';

    public $wifi = '';
    public $bed = '';
    public $taxi = '';
    public $beer = '';
    public $cutlery = '';

    public $flight = '';
    public $car = '';
    public $sightseeing = '';
    public $meals = '';
    public $drinks = '';

    public $serviceType;
    public $sortBy;
    public $sort_rating;
    public $selectedSort;

    protected $paginationTheme = 'bootstrap';
    // protected $listeners = ['filterApplied'];

    // public function filterApplied($location){
    //     dd(123);
    //     $services = Service::where('service_type', $this->serviceType)->where('status', 1)->query();

    //     if($location) {
    //         $services->where('city', 'like', "%$location%");
    //     }

    //     $services = $services->orderBy('id', 'desc')->paginate(6);
    // }

    public function mount()
    {
        $currentUrl = Request::url();

        $segments = explode('/', $currentUrl);
        $this->serviceType = end($segments);
    }

    public function updateSearchPrice($val)
    {
        $parts = explode("-", $val);
        $this->minPrice = $parts[0];
        $this->maxPrice = $parts[1];
    }

    public function updateSortPrice($val)
    {
        $this->selectedSort = $val;
        $this->sort_rating = $val;
        $this->sortBy = $val;
    }

    public function render()
    {
        $title = '%'.$this->searchTerm.'%';
        $serviceType = $this->serviceType;
        $location = $this->filterLocation;

        $services = Service::where('service_type', $serviceType)->where('status', 1);

        $services->when($this->minPrice || $this->maxPrice, function ($query) {
            $query->where(function ($subQuery) {
                if ($this->minPrice || $this->maxPrice) {
                    $subQuery->whereBetween('price', [$this->minPrice, $this->maxPrice]);
                }
            });
        });

        if ($this->selectedSort == 'lowest_price') {
            $services->orderBy('price', 'ASC');
        } elseif ($this->selectedSort == 'highest_price') {
            $services->orderBy('price', 'DESC');
        }

        if ($this->sort_rating == 'lowest_rating') {
            $services->orderBy('rating', 'ASC');
        } elseif ($this->sort_rating == 'highest_rating') {
            $services->orderBy('rating', 'DESC');
        }

        if ($this->sortBy == 'ascending') {
            $services->orderBy('id', 'ASC');
        } elseif ($this->sortBy == 'descending') {
            $services->orderBy('id', 'DESC');
        }

        if($title) {
            $services->where('title', 'like', "%$title%");
        }

        $selectedLocations = array_keys(array_filter($location));

        if (!empty($selectedLocations)) {
            $services->whereIn('city', $selectedLocations);
        }

        $services->when($this->star5 || $this->star4 || $this->star3 || $this->star2 || $this->star1,function ($query) {
            $query->where(function ($subQuery) {
                if ($this->star5) {
                    $subQuery->orWhere('rating', 5);
                }
                if ($this->star4) {
                    $subQuery->orWhere('rating', 4);
                }
                if ($this->star3) {
                    $subQuery->orWhere('rating', 3);
                }
                if ($this->star2) {
                    $subQuery->orWhere('rating', 2);
                }
                if ($this->star1) {
                    $subQuery->orWhere('rating', 1);
                }
            });
        });

        $services->when($this->wifi || $this->bed || $this->taxi || $this->beer || $this->cutlery, function ($query) {
            return $query->where(function ($subQuery) {
                if ($this->wifi) {
                    $subQuery->orWhere('facilities', 'like', '%wifi%');
                }
                if ($this->bed) {
                    $subQuery->orWhere('facilities', 'like', '%bed%');
                }
                if ($this->taxi) {
                    $subQuery->orWhere('facilities', 'like', '%taxi%');
                }
                if ($this->beer) {
                    $subQuery->orWhere('facilities', 'like', '%beer%');
                }
                if ($this->cutlery) {
                    $subQuery->orWhere('facilities', 'like', '%cutlery%');
                }
            });
        });

        $services->when($this->flight || $this->car || $this->sightseeing || $this->meals || $this->drinks, function ($query) {
            return $query->where(function ($subQuery) {
                if ($this->flight) {
                    $subQuery->orWhere('facilities', 'like', '%flight%');
                }
                if ($this->car) {
                    $subQuery->orWhere('facilities', 'like', '%car%');
                }
                if ($this->sightseeing) {
                    $subQuery->orWhere('facilities', 'like', '%sightseeing%');
                }
                if ($this->meals) {
                    $subQuery->orWhere('facilities', 'like', '%meals%');
                }
                if ($this->drinks) {
                    $subQuery->orWhere('facilities', 'like', '%drinks%');
                }
            });
        });

        $services = $services->orderBy('id', 'desc')->paginate(6);

        $uniqueLocation = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('city');

        return view('livewire.filter-index', compact('services','uniqueLocation','serviceType'));
    }
}
