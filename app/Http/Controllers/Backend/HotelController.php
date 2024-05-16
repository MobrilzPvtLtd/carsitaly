<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class HotelController extends Controller
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
        $this->module_title = 'Hotel';

        // module name
        $this->module_name = 'hotel';

        // directory path of the module
        $this->module_path = 'hotel';

        // module icon
        $this->module_icon = 'fa-solid fa-hotel';

        // module model name, path
        $this->module_model = "App\Models\Hotel";
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

        $$module_name = $module_model::paginate();

        return view(
            "backend.services.{$module_path}.index",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular')
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

        return view(
            "backend.services.{$module_name}.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular')
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
            'price' => 'required|numeric',
        ]);

        try {
            if($request->id){
                $hotel = Hotel::findOrFail($request->id);
            }else{
                $hotel = new Hotel();
            }
            $hotel->title = $request->title;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;

                $file->storeAs('public/uploads/hotel', $filename);

                if ($hotel->image) {
                    $oldImagePath = storage_path('app/public/uploads/hotel/') . $hotel->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $hotel->image = $filename;
            }

            $hotel->traveller = $request->traveller;
            $hotel->theme = $request->theme;
            $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
            $endDate = Carbon::parse($request->end_date)->format('Y-m-d');

            $hotel->start_date = $startDate;
            $hotel->end_date = $endDate;
            $hotel->base_ammount = $request->base_ammount;
            $hotel->service_tax = $request->service_tax;
            $hotel->other_taxes = $request->other_taxes;
            $hotel->price = $request->price;
            $hotel->status = $request->status;
            $hotel->save();

            Flash::success($request->id ? 'Hotel updated successfully.' : 'Hotel created successfully.')->important();
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
            "backend.services.{$module_name}.show",
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
            "backend.services.{$module_name}.edit",
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
