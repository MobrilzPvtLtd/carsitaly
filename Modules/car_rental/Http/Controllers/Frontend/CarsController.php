<?php

namespace Modules\Car\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CarsController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Transfers';

        // module name
        $this->module_name = 'transfers';

        // directory path of the module
        $this->module_path = 'car::frontend';

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
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $city = request()->city;
        $brand = request()->input('brand');

        $module_instance = $module_model::where('status', 1);

        if ($city || $brand) {
            $module_instance->where(function ($query) use ($city,$brand) {
                $query->where('city', 'like', "%$city%");
                $query->where('brand', 'like', "%$brand%");
            });
        }

        $$module_name = $module_instance->latest()->paginate();
        // dd($$module_name);
        return view(
            "$module_path.$module_name.index",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
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
        // $id = decode_id($id);

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        // $$module_name_singular = $module_model::findOrFail($slug);
        $$module_name_singular = $module_model::where('slug',$slug)->first();

        $similar_cars = $module_model::where('service_type', 'transfers')->latest()->limit(6)->get();

        $vehicle_features = $module_model::where('service_type', 'transfers')->distinct()->pluck('vehicle_features');
        $vehicle_features_array = json_decode($vehicle_features, true);
        foreach ($vehicle_features_array as $feature) {
            $carFeature = $feature;
        }

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular",'carFeature','similar_cars')
        );
    }
}
