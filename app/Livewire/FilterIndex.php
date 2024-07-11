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
    public $filterBedrooms = [];
    public $filterOccupancy = [];
    public $filterDuration = [];
    public $filterStartTime = [];
    public $filterStartingPoint = [];

    public $single = '';
    public $double = '';
    public $suite = '';

    public $serviceType;
    public $sortBy;
    public $sort_rating;
    public $selectedSort;

    public $formLocation;
    public $fromPoint;
    public $toPoint;
    public $city;
    // public $check_in;
    // public $check_out;
    public $room_types;
    public $occupancy_no;
    public $starting_point;
    public $ending_point;


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
        $this->fromPoint = $this->starting_point;
        $this->toPoint = $this->ending_point;
        // dd($this->toPoint);
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
        $bedrooms = $this->filterBedrooms;
        $occupancy = $this->filterOccupancy;
        $duration = $this->filterDuration;
        $start_time = $this->filterStartTime;
        $startingPoint = $this->filterStartingPoint;
        // dd($startingPoint);

        $services = Service::where('service_type', $serviceType)->where('status', 1);

        // location searchBar filter
        $services->when($this->formLocation || $this->fromPoint, function ($query) {
            if($this->formLocation){
                $query->where('city', 'like', "%$this->formLocation%");
            }
            if ($this->room_types) {
                $query->where('room_types', $this->room_types);
            }
            if ($this->occupancy_no) {
                $query->where('maximum_occupancy', $this->occupancy_no);
            }
            if ($this->occupancy_no) {
                $query->where('maximum_occupancy', $this->occupancy_no);
            }
            if ($this->fromPoint) {
                $query->where('starting_point', 'like', "%$this->fromPoint%");
            }
            if ($this->toPoint) {
                $query->where('ending_point', 'like', "%$this->toPoint%");
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

        // Bedroom filter
        $selectedBedrooms = array_keys(array_filter($bedrooms));
        if (!empty($selectedBedrooms)) {
            $services->whereIn('number_of_bedrooms', $selectedBedrooms);
        }

        // Occupancy filter
        $selectedOccupancy = array_keys(array_filter($occupancy));
        if (!empty($selectedOccupancy)) {
            $services->whereIn('maximum_occupancy', $selectedOccupancy);
        }

        // Duration filter
        $selectedDuration = array_keys(array_filter($duration));
        if (!empty($selectedDuration)) {
            $services->whereIn('duration', $selectedDuration);
        }

        // Starting Time filter
        $selectedStartTime = array_keys(array_filter($start_time));
        if (!empty($selectedStartTime)) {
            $services->whereIn('start_date', $selectedStartTime);
        }

        // Pickup Point filter
        $selectedstartingPoint = array_keys(array_filter($startingPoint));
        if (!empty($selectedstartingPoint)) {
            $services->whereIn('starting_point', $selectedstartingPoint);
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

        $uniqueOccupancy = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('maximum_occupancy');

        $uniqueBedrooms = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('number_of_bedrooms');

        $uniqueDuration = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('duration');

        $uniqueStartTime = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('start_date');

        $uniqueStartingPoint = Service::where('service_type', $serviceType)->where('status', 1)
        ->distinct()->pluck('starting_point');

        return view('livewire.filter-index', compact('services','uniqueLocation','serviceType',
        'uniqueAmenities','uniqueOccupancy','uniqueBedrooms','uniqueDuration','uniqueStartTime','uniqueStartingPoint'
        ));
    }
}
