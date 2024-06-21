<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Car\Models\Car;

class FilterCarsIndex extends Component
{
    use WithPagination;

    public $minPrice = '';
    public $maxPrice = '';

    public $filterBrands = [];
    public $filterCarFeatures = [];

    public $automatic = '';
    public $mannual = '';
    public $any = '';

    public $powerLock = '';
    public $sateliteNavigation = '';
    public $FMRadio = '';
    public $musicSystem = '';
    public $carAC = '';

    public $serviceType = '';
    public $sortBy = '';
    public $sort_rating = '';
    public $selectedSort = '';

    public $formLocation = '';
    public $from_brand = '';
    public $formCarType = '';
    public $formReturn = '';
    public $formPickUp = '';
    public $brand = '';
    public $city = '';
    public $carType = '';
    public $check_in = '';
    public $check_out = '';

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $currentUrl = Request::url();

        $segments = explode('/', $currentUrl);
        $this->serviceType = end($segments);
    }

    public function applyFilter()
    {
        // dd($this->check_in);
        $this->formLocation = $this->city;
        $this->from_brand = $this->brand;
        $this->formCarType = $this->carType;
        $this->formReturn = $this->check_in;
        $this->formPickUp = $this->check_out;
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
        $brands = $this->filterBrands;
        $carFeatures = $this->filterCarFeatures;

        $cars = Car::where('status', 1);

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

        $cars->when($this->formLocation, function ($query) {
            $query->where('city', 'like', "%$this->formLocation%");

            if ($this->from_brand) {
                $query->where('brand', $this->from_brand);
            }
            if ($this->formCarType) {
                $query->where('car_type', $this->formCarType);
            }
        });

        $selectedBrands = array_keys(array_filter($brands));
        if (!empty($selectedBrands)) {
            $cars->whereIn('brand', $selectedBrands);
        }

        $cars->when($this->powerLock || $this->sateliteNavigation || $this->FMRadio || $this->musicSystem || $this->carAC, function ($query) {
            return $query->where(function ($subQuery) {
                if ($this->powerLock) {
                    $subQuery->orWhere('car_features', 'like', '%powerLock%');
                }
                if ($this->sateliteNavigation) {
                    $subQuery->orWhere('car_features', 'like', '%sateliteNavigation%');
                }
                if ($this->FMRadio) {
                    $subQuery->orWhere('car_features', 'like', '%FMRadio%');
                }
                if ($this->musicSystem) {
                    $subQuery->orWhere('car_features', 'like', '%musicSystem%');
                }
                if ($this->carAC) {
                    $subQuery->orWhere('car_features', 'like', '%carAC%');
                }
            });
        });

        $cars->when($this->automatic || $this->mannual || $this->any, function ($query) {
            return $query->where(function ($subQuery) {
                if ($this->automatic) {
                    $subQuery->orWhere('transmission', 'like', '%automatic%');
                }
                if ($this->mannual) {
                    $subQuery->orWhere('transmission', 'like', '%mannual%');
                }
                if ($this->any) {
                    $subQuery->orWhere('transmission', 'like', '%any%');
                }
            });
        });

        $cars = $cars->orderBy('id', 'desc')->paginate(6);

        $brands = Car::where('status', 1)->distinct()->pluck('brand');
        $car_type = Car::where('status', 1)->distinct()->pluck('car_type');
        // $car_features = Car::where('status', 1)->distinct()->pluck('car_features');
        // $car_features_array = json_decode($car_features, true);
        // foreach ($car_features_array as $feature) {
        //     $carFeature = $feature;
        // }

        return view('livewire.filter-cars-index', compact('cars','brands','serviceType','car_type'));
    }
}
