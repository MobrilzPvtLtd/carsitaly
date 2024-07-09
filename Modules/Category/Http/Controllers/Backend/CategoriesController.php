<?php

namespace Modules\Category\Http\Controllers\Backend;

use App\Authorizable;
// use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
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
        $this->module_title = 'Categories';

        // module name
        $this->module_name = 'categories';

        // directory path of the module
        $this->module_path = 'category::backend';

        // module icon
        $this->module_icon = 'fa-solid fa-diagram-project';

        // module model name, path
        $this->module_model = "Modules\Category\Models\Category";
    }

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

        logUserAccess($module_title.' '.$module_action);

        return view(
            "{$module_path}.{$module_name}.index_datatable",
            compact('module_title', 'module_name', "{$module_name}", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Retrieves a list of items based on the search term.
     *
     * @param  Request  $request  The HTTP request object.
     * @return JsonResponse The JSON response containing the list of items.
     */
    public function index_list(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = $module_model::where('name', 'LIKE', "%{$term}%")->orWhere('slug', 'LIKE', "%{$term}%")->limit(7)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->tile.' (Slug: '.$row->slug.')',
            ];
        }

        return response()->json($$module_name);
    }

    /**
     * Retrieves the data for the index page of the module.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $page_heading = label_case($module_title);

        $$module_name = $module_model::select('id', 'name', 'status');

        $data = $$module_name;
        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            // ->editColumn('images', function ($data) {
            //     if ($data->images) {
            //         $images = json_decode($data->images);
            //         $html = '<a href="' . route('backend.carrentals.show', $data->id) . '">';

            //         if ($images && count($images) > 0) {
            //             // foreach ($images as $image) {
            //                 $html .= '<img src="' . asset('public/storage/' . $images[0]) . '" alt="cruise" width="100px">';
            //             // }
            //         }

            //         $html .= '</a>';

            //         return $html;
            //     }
            // })
            ->editColumn('status', function ($data) {
                if ($data->status){
                    return '<span class="badge text-bg-success">Active</span>';
                }else{
                    return '<span class="badge text-bg-warning">Inactive</span>';
                }
            })
            ->rawColumns(['status', 'action'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
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

        logUserAccess($module_title.' '.$module_action);

        return view(
            "{$module_path}.{$module_name}.create",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action')
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Store';

        $modelData = $request->all();

        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('category', 'public');
        //     $modelData = $request->except('image');
        //     $modelData['image'] = $imagePath;
        // }

        $$module_name_singular = $module_model::create($modelData);

        flash("New '".Str::singular($module_title)."' Added")->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/{$module_name}");
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

        // $posts = $$module_name_singular->posts()->latest()->paginate();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "{$module_path}.{$module_name}.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_name_singular', 'module_action', "{$module_name_singular}")
        );
    }


    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit';

        $$module_name_singular = $module_model::findOrFail($id);

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return view(
            "{$module_path}.{$module_name}.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "{$module_name_singular}")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        // $validated_request = $request->validate([
        //     'name' => 'required|max:191|unique:'.$module_model.',name,'.$id,
        //     'slug' => 'nullable|max:191|unique:'.$module_model.',slug,'.$id,
        //     'group_name' => 'nullable|max:191',
        //     'description' => 'nullable|max:191',
        //     'meta_title' => 'nullable|max:191',
        //     'meta_description' => 'nullable',
        //     'meta_keyword' => 'nullable',
        //     'order' => 'nullable|integer',
        //     'status' => 'required|max:191',
        // ]);

        $$module_name_singular = $module_model::findOrFail($id);

        // $$module_name_singular->update($request->except('image', 'image_remove'));

        // Image
        // if ($request->hasFile('image')) {
        //     if ($$module_name_singular->getMedia($module_name)->first()) {
        //         $$module_name_singular->getMedia($module_name)->first()->delete();
        //     }
        //     $media = $$module_name_singular->addMedia($request->file('image'))->toMediaCollection($module_name);

        //     $$module_name_singular->image = $media->getUrl();

        //     $$module_name_singular->save();
        // }
        // if ($request->image_remove === 'image_remove') {
        //     if ($$module_name_singular->getMedia($module_name)->first()) {
        //         $$module_name_singular->getMedia($module_name)->first()->delete();

        //         $$module_name_singular->image = '';

        //         $$module_name_singular->save();
        //     }
        // }
        $modelData = $request->all();

        $$module_name_singular->update($modelData);

        flash(Str::singular($module_title)."' Updated Successfully")->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect()->route("backend.{$module_name}.show", $$module_name_singular->id);
    }
}
