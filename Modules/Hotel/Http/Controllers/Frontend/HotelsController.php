<?php

namespace Modules\Hotel\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HotelsController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Hotels';

        // module name
        $this->module_name = 'hotels';

        // directory path of the module
        $this->module_path = 'hotel::frontend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "App\Models\Service";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $city = $request->input('city');
        $room_no = $request->input('room_no');

        $$module_name = $module_model::where('service_type', 'hotels')
            ->where('status', 1);
            if (!empty($city)) {
                $$module_name->where(function ($query) use ($city) {
                    $query->where('city', 'like', "%$city%");
                });
            }
            if (!empty($room_no)) {
                $$module_name->where(function ($query) use ($room_no) {
                    $query->where('room_no', 'like', "%$room_no%");
                });
            }
        $$module_name = $$module_name->paginate();

        $uniqueRoomNumbers = $module_model::distinct()->pluck('room_no');
        $uniqueLocation = $module_model::distinct()->pluck('city');

        return view(
            "$module_path.$module_name.index",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular','uniqueRoomNumbers','uniqueLocation')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        // $slug = decode_id($slug);
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::where('slug',$slug)->first();

        $latest_hotel = $module_model::where('service_type', 'hotels')
        ->where('status', 1)->latest()->get();

        $similar_hotel = $module_model::where('service_type', 'hotels')
        ->where('status', 1)->where('similar', 1)->get();

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular",'latest_hotel','similar_hotel')
        );
    }

    public function fetchData(Request $request){
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;
        $module_model = $this->module_model;

        $query = $module_model::where('service_type', 'hotels')
                ->where('status', 1);

        if ($request->sortBy == 'highest_price') {
            $query = $query->orderBy('id', 'desc');
        } elseif ($request->sortBy == 'lowest_price') {
            $query = $query->orderBy('id', 'asc');
        }

        // $query = $query->whereBetween('price', [$minPrice, $maxPrice]);

        $query = $query->get();
        return response()->json($query);
    }
}
