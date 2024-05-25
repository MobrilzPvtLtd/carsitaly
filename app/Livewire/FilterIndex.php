<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class FilterIndex extends Component
{
    use WithPagination;

    public $minPrice = 0;
    public $maxPrice = 500;
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
    public $orderBy = '';
    public $serviceType;
    public $sortByPrice;
    public $price;

    protected $paginationTheme = 'bootstrap';


    public function mount()
    {
        $currentUrl = Request::url();

        $segments = explode('/', $currentUrl);
        $this->serviceType = end($segments);
    }

    public function render()
    {
        // dd($this->filterLocation);
        $title = '%'.$this->searchTerm.'%';
        $serviceType = $this->serviceType;
        $location = $this->filterLocation;

        $services = Service::where('service_type', $serviceType)->where('status', 1);
            // ->whereBetween('price', [$this->minPrice, $this->maxPrice])

        // if ($this->orderBy === 'price_asc') {
        //     $services->orderBy('price', 'ASC');
        // } elseif ($this->orderBy === 'price_desc') {
        //     $services->orderBy('price', 'DESC');
        // }

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

        $services = $services->orderBy('id', 'desc')->paginate(6);

        $uniqueLocation = Service::distinct()->pluck('city');

        return view('livewire.filter-index', compact('services','uniqueLocation','serviceType'));

    }
}
