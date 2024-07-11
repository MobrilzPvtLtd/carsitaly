<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Amenity\Models\Amenity;

class FilterCruisesIndex extends Component
{
    use WithPagination;

    public $minPrice = '';
    public $maxPrice = '';

    public $searchTerm;
    public $filterDuration = [];
    public $filterCabinType = [];
    public $filterDeparture = [];
    public $filterDestination = [];
    public $filterReturn = [];
    public $filterAmenities = [];

    public $cruise = '';
    public $transportation = '';
    public $sighseeing = '';
    public $meals = '';
    public $drinks = '';

    public $serviceType;
    public $sortBy;
    public $sort_rating;
    public $selectedSort;

    public $destination_city;
    public $departure_city;
    public $startDate;
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
        $this->departure_city = $this->departure_city;
        $this->destination_city = $this->destination_city;
        $this->startDate = $this->startDate;
        $this->budgetPrice = $this->budgetPrice;
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
        $duration = $this->filterDuration;
        $cabinType = $this->filterCabinType;
        $departure = $this->filterDeparture;
        $destination = $this->filterDestination;
        $return = $this->filterReturn;
        $amenitiesArr = $this->filterAmenities;

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

        $cruises->when($this->departure_city, function ($query) {
            $query->where('departure', 'like', "%$this->departure_city%");

            if ($this->destination_city) {
                $query->where('destination', 'like', "%$this->destination_city%");
            }
            if ($this->startDate) {
                $query->where('start_date', $this->startDate);
            }
            if ($this->budgetPrice) {
                $query->where('price', $this->budgetPrice);
            }
        });

        // duration filter
        $selectedDuration = array_keys(array_filter($duration));

        if (!empty($selectedDuration)) {
            $cruises->whereIn('duration', $selectedDuration);
        }

        // cabinType filter
        $selectedCabinType = array_keys(array_filter($cabinType));

        if (!empty($selectedCabinType)) {
            $cruises->whereIn('cabin_type', $selectedCabinType);
        }

        // departure filter
        $selectedDeparture = array_keys(array_filter($departure));

        if (!empty($selectedDeparture)) {
            $cruises->whereIn('departure', $selectedDeparture);
        }

        // destination filter
        $selectedDestination = array_keys(array_filter($destination));

        if (!empty($selectedDestination)) {
            $cruises->whereIn('destination', $selectedDestination);
        }

        // return filter
        $selectedReturn = array_keys(array_filter($return));

        if (!empty($selectedReturn)) {
            $cruises->whereIn('return', $selectedReturn);
        }

        // amenities filter
        $selectedAmenities = array_keys(array_filter($amenitiesArr));

        if (!empty($selectedAmenities)) {
            $cruises->where(function ($query) use ($selectedAmenities) {
                foreach ($selectedAmenities as $amenity) {
                    $query->orWhereJsonContains('amenities', $amenity);
                }
            });
        }

        $cruises = $cruises->orderBy('id', 'desc')->paginate(6);

        $uniqueDeparture = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('departure');

        $uniqueDuration = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('duration');

        $uniqueCabinType = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('cabin_type');

        $uniqueDestination = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('destination');

        $uniqueReturn = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('return');

        $uniquePrice = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('price');

        $uniqueStartDate = Service::where('service_type', $serviceType)->where('status', 1)->distinct()->pluck('start_date');

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

        return view('livewire.filter-cruises-index', compact('cruises','uniqueDeparture','serviceType',
        'uniqueDuration','uniqueCabinType','uniqueDestination','uniqueReturn','uniqueAmenities','uniquePrice','uniqueStartDate'
        ));
    }
}
