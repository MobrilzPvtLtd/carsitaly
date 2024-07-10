<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Amenity\Models\Amenity;

class FilterIndex extends Component
{
    use WithPagination;

    public $minPrice = '';
    public $maxPrice = '';

    public $searchTerm;
    public $filterLocation = [];
    public $filterAmenities = [];

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

    public $single = '';
    public $double = '';
    public $suite = '';

    public $flight = '';
    public $car = '';
    public $sightseeing = '';
    public $meals = '';
    public $drinks = '';

    public $serviceType;
    public $sortBy;
    public $sort_rating;
    public $selectedSort;

    public $formLocation;
    public $city;
    public $check_in;
    public $check_out;

    public $room_types;
    // public $filterAmenities;

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
        $this->filterAmenities = $this->filterAmenities;
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
        $title = '%'.$this->searchTerm.'%';
        $serviceType = $this->serviceType;
        $location = $this->filterLocation;
        $amenitiesArr = $this->filterAmenities;
        // $room_types = $this->room_types;

        $services = Service::where('service_type', $serviceType)->where('status', 1);

        // location searchBar filter
        $services->when($this->formLocation, function ($query) {
            $query->where('city', 'like', "%$this->formLocation%");
            if ($this->room_types) {
                $query->where('room_types', $this->room_types);
            }
        });

        // price range filter
        $services->when($this->minPrice || $this->maxPrice, function ($query) {
            $query->where(function ($subQuery) {
                if ($this->minPrice || $this->maxPrice) {
                    $subQuery->whereBetween('price', [$this->minPrice, $this->maxPrice]);
                }
            });
        });

        // ASC DESC filter
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

        // Title filter
        if($title) {
            $services->where('title', 'like', "%$title%");
        }

        // location filter
        $selectedLocations = array_keys(array_filter($location));
        if (!empty($selectedLocations)) {
            $services->whereIn('city', $selectedLocations);
        }

        // amenities filter
        $selectedAmenities = array_keys(array_filter($amenitiesArr));

        if (!empty($selectedAmenities)) {
            $services->where(function ($query) use ($selectedAmenities) {
                foreach ($selectedAmenities as $amenity) {
                    $query->orWhereJsonContains('amenities', $amenity);
                }
            });
        }

        // Room Types filter
        $services->when($this->suite || $this->double || $this->single,function ($query) {
            $query->where(function ($subQuery) {
                if ($this->suite) {
                    $subQuery->orWhere('room_types', 'like', '%suite%');
                }
                if ($this->double) {
                    $subQuery->orWhere('room_types', 'like', '%double%');
                }
                if ($this->single) {
                    $subQuery->orWhere('room_types', 'like', '%single%');
                }
            });
        });

        $services = $services->orderBy('id', 'desc')->paginate(6);
        // dd($services);

        $uniqueLocation = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('city');

        // Amenities show //
        $amenities = Service::where('service_type', $serviceType)->where('status', 1)->distinct()
                    ->pluck('amenities')->toArray();

        $uniqueAmenities = [];

        foreach ($amenities as $amenityList) {
            $amenityArray = json_decode($amenityList);

            if ($amenityArray) {
                foreach ($amenityArray as $amenityName) {
                    if (!isset($uniqueAmenities[$amenityName])) {
                        $amenityDetails = Amenity::where('name', $amenityName)->where('status', 1)->first();

                        if ($amenityDetails) {
                            $uniqueAmenities[$amenityName] = $amenityDetails;
                        }
                    }
                }
            }
        }

        return view('livewire.filter-index', compact('services','uniqueLocation','serviceType',
        'uniqueAmenities'
        ));
    }
}
