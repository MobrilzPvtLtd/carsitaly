<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class CarController extends Controller
{
    use Authorizable;

    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Car';

        // module name
        $this->module_name = 'car';

        // directory path of the module
        $this->module_path = 'car';

        // module icon
        $this->module_icon = 'fa-solid fa-car';

        // module model name, path
        $this->module_model = "App\Models\Car";
    }

    /**
     * Retrieves the index page for the module.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

        $page_heading = ucfirst($module_title);
        $title = $page_heading.' '.ucfirst($module_action);

        $$module_name = $module_model::paginate();

        Log::info("'{$title}' viewed by User:".auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view(
            "backend.{$module_path}.index",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'page_heading', 'title')
        );
    }

    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';

        $roles = Role::get();
        $permissions = Permission::select('name', 'id')->get();

        return view(
            "backend.{$module_name}.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'roles', 'permissions')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $module_name = $this->module_name;

        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
            'top_speed' => 'required|numeric',
            'mileage' => 'required|numeric',
            'capacity' => 'required|numeric',
        ]);

        try {
            if($request->id){
                $car = Car::findOrFail($request->id);
            }else{
                $car = new Car();
            }
            $car->title = $request->title;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move(public_path('uploads/car/'), $filename);
                $car->image = $filename;
            } else {
                Flash::error('Invalid file uploaded.')->important();
                return redirect()->back();
            }

            $car->fill($request->except('image'));

            $car->duration = $request->duration;
            $car->price = $request->price;
            $car->vehicle = $request->vehicle;
            $car->top_speed = $request->top_speed;
            $car->transmission = $request->transmission;
            $car->mileage = $request->mileage;
            $car->fuel = $request->fuel;
            $car->capacity = $request->capacity;
            $car->status = $request->status;
            $car->save();

            Flash::success('Car created successfully.')->important();
            return redirect("admin/{$module_name}");
        } catch (\Exception $e) {
            Flash::error($e->getMessage())->important();
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "backend.{$module_name}.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "{$module_name_singular}")
        );
    }

    /**
     * Edit a record in the database.
     *
     * @param  int  $id  The ID of the record to be edited.
     * @return \Illuminate\View\View The view for editing the record.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException If the user does not have the permission to edit users.
     */
    public function edit($id)
    {
        if (! auth()->user()->can('edit_users')) {
            $id = auth()->user()->id;
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit';

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "backend.{$module_name}.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "{$module_name_singular}")
        );
    }

    /**
     * Deletes a user by their ID.
     *
     * @param  int  $id  The ID of the user to be deleted.
     * @return Illuminate\Http\RedirectResponse
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException If the user with the given ID is not found.
     */
    public function destroy($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'destroy';

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        flash($$module_name_singular->name.' Data Successfully Deleted!')->success();

        return redirect("admin/{$module_name}");
    }
}
