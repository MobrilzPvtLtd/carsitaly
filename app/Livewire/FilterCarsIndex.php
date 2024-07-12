<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Amenity\Models\Amenity;
use Modules\Car\Models\Car;

class FilterCarsIndex extends Component
{
    use WithPagination;

    public $minPrice = '';
    public $maxPrice = '';

    public $searchTerm;
    public $filterAmenities = [];
    public $filterLuggageCapacity = [];
    public $filterVehicleType = [];

    public $powerLock = '';
    public $sateliteNavigation = '';
    public $FMRadio = '';
    public $musicSystem = '';
    public $carAC = '';

    public $serviceType = '';
    public $sortBy = '';
    public $sort_rating = '';
    public $selectedSort = '';

    public $formCarType = '';
    public $carType = '';
    public $budgetPrice;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $currentUrl = Request::url();

        $segments = explode('/', $currentUrl);
        $this->serviceType = end($segments);
    }

    public function applyFilter()
    {
        $this->budgetPrice = $this->budgetPrice;
        $this->formCarType = $this->carType;
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
        $title = '%'.$this->searchTerm.'%';
        $serviceType = $this->serviceType;
        $amenitiesArr = $this->filterAmenities;
        $filterLuggageCapacity = $this->filterLuggageCapacity;
        $filterVehicleType = $this->filterVehicleType;

        $cars = Service::where('status', 1);

        $cars->when($this->minPrice || $this->maxPrice, function ($query) {
            $query->where(function ($subQuery) {
                if ($this->minPrice || $this->maxPrice) {
                    $subQuery->whereBetween('price', [$this->minPrice, $this->maxPrice]);
                }
            });
        });

        if ($this->selectedSort == 'lowest_price') {
            $cars->orderBy('price', 'ASC');
        } elseif ($this->selectedSort == 'highest_price') {
            $cars->orderBy('price', 'DESC');
        }

        if ($this->sort_rating == 'lowest_rating') {
            $cars->orderBy('rating', 'ASC');
        } elseif ($this->sort_rating == 'highest_rating') {
            $cars->orderBy('rating', 'DESC');
        }

        if ($this->sortBy == 'ascending') {
            $cars->orderBy('id', 'ASC');
        } elseif ($this->sortBy == 'descending') {
            $cars->orderBy('id', 'DESC');
        }

        // Title filter
        if($title) {
            $cars->where('title', 'like', "%$title%");
        }

        if ($this->formCarType) {
            $cars->where('vehicle_type', $this->formCarType);
        }

        if ($this->budgetPrice) {
            $cars->where('price', $this->budgetPrice);
        }

        // Vehicle Type filter
        $selectedFilterVehicleType = array_keys(array_filter($filterVehicleType));

        if (!empty($selectedFilterVehicleType)) {
            $cars->whereIn('vehicle_type', $selectedFilterVehicleType);
        }

        // Luggage Capacity filter
        $selectedFilterLuggageCapacity = array_keys(array_filter($filterLuggageCapacity));

        if (!empty($selectedFilterLuggageCapacity)) {
            $cars->whereIn('luggage_capacity', $selectedFilterLuggageCapacity);
        }

        // vehicle features filter
        $selectedAmenities = array_keys(array_filter($amenitiesArr));

        if (!empty($selectedAmenities)) {
            $cars->where(function ($query) use ($selectedAmenities) {
                foreach ($selectedAmenities as $amenity) {
                    $query->orWhereJsonContains('vehicle_features', $amenity);
                }
            });
        }

        $cars = $cars->where('service_type', $serviceType)->orderBy('id', 'desc')->paginate(6);

        $uniqueVehicleType = Service::where('service_type', $serviceType)->where('vehicle_type', '!=', null)->distinct()->pluck('vehicle_type');

        $uniqueLuggageCapacity = Service::where('service_type', $serviceType)->where('vehicle_type', '!=', null)->distinct()->pluck('luggage_capacity');

        $amenities = Service::where('service_type', $serviceType)->where('status', 1)->distinct()
                    ->pluck('vehicle_features')->toArray();

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

        $uniquePrice = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('price');


        return view('livewire.filter-cars-index', compact('cars','uniqueAmenities','serviceType','uniqueVehicleType','uniqueLuggageCapacity','uniquePrice'
        ));
    }
}
