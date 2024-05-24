<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class FilterIndex extends Component
{
    use WithPagination;

    public $searchTerm;
    public $filterLocation = '';
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

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $title = '%'.$this->searchTerm.'%';

        // dd($this->filterLocation);
        $service = Service::where('service_type', 'hotel')->get();
        $minPrice = PHP_INT_MAX;
        $maxPrice = 0;
        foreach ($service as $key => $value) {
            if ($value->price < $minPrice) {
                $minPrice = $value->price;
            }
            if ($value->price > $maxPrice) {
                $maxPrice = $value->price;
            }
        }

        $hotels = Service::whereBetween('price', [$minPrice, $maxPrice])
            ->where('service_type', 'hotel')
            ->where('status', 1);

        // if ($this->orderBy === 'price_asc') {
        //     $hotels->orderBy('price', 'ASC');
        // } elseif ($this->orderBy === 'price_desc') {
        //     $hotels->orderBy('price', 'DESC');
        // }

        if($title) {
            $hotels->where('title', 'like', "%$title%");
        }

        $hotels->when($this->star5 || $this->star4 || $this->star3 || $this->star2 || $this->star1 || $this->filterLocation, function ($query) {
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
                if ($this->filterLocation) {
                    $subQuery->orWhere('city', $this->filterLocation);
                }
            });
        });

        // $hotels->when($this->wifi || $this->bed || $this->taxi || $this->beer || $this->cutlery, function ($query) {
        //     $query->where(function ($subQuery) {
        //         $selectedFacilities = [];

        //         if ($this->wifi) {
        //             $selectedFacilities[] = "wifi";
        //         }
        //         if ($this->bed) {
        //             $selectedFacilities[] = "bed";
        //         }
        //         if ($this->taxi) {
        //             $selectedFacilities[] = "taxi";
        //         }
        //         if ($this->beer) {
        //             $selectedFacilities[] = "beer";
        //         }
        //         if ($this->cutlery) {
        //             $selectedFacilities[] = "cutlery";
        //         }

        //         // Ensure that hotels have at least one of the selected facilities
        //         foreach ($selectedFacilities as $facility) {
        //             $subQuery->orWhere('facilities', $facility);
        //         }
        //     });
        // });

        $hotels = $hotels->latest()->paginate();

        $uniqueLocation = Service::distinct()->pluck('city');

        return view('livewire.filter-index', compact('hotels','uniqueLocation'));

    }
}
