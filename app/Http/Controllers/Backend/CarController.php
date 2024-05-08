<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Events\Backend\UserCreated;
use App\Events\Backend\UserUpdated;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Car;
use App\Models\UserProvider;
use App\Notifications\UserAccountCreated;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

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
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Store';

        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
            'top_speed' => 'required|numeric',
            'mileage' => 'required|numeric',
            'capacity' => 'required|numeric',
        ]);

        try{
            $car = new Car();
            $car->title = $request->title;

            // dd($request->hasFile('image'));
            if($request->hasFile('image'))
            {
                $file = $request->file('image');

                // Check if file is valid
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move(public_path('uploads/car/'), $filename);
                    $car->image = $filename;
                } else {
                    Flash::error(Str::singular("Error"))->important();
                    return redirect()->back();
                }
            }

            $car->duration = $request->duration;
            $car->price = $request->price;
            $car->vehicle = $request->vehicle;
            $car->top_speed = $request->top_speed;
            $car->transmission = $request->transmission;
            $car->mileage = $request->mileage;
            $car->fuel = $request->fuel;
            $car->capacity = $request->capacity;
            $car->status = $request->status;
            dd($car);
            $car->save();
            Flash::success(Str::singular($module_title)."' Created Successfully")->important();
            return redirect("admin/{$module_name}");
        }catch(\Exception $e){
            Flash::error(Str::singular($e->getMessage()))->important();
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

        Log::info(label_case($module_title.' '.$module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view(
            "backend.{$module_name}.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "{$module_name_singular}")
        );
    }

    /**
     * Updates the password for a user.
     *
     * @param  int  $id  The ID of the user whose password will be changed.
     * @return \Illuminate\Contracts\View\View The view for the "Change Password" page.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user cannot be found.
     */
    public function changePassword($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Change Password';

        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);

        if (! auth()->user()->can('edit_users')) {
            $id = auth()->user()->id;
        }

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "backend.{$module_name}.changePassword",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "{$module_name_singular}")
        );
    }

    /**
     * Updates the password for a user.
     *
     * @param  Request  $request  The request object containing the new password.
     * @param  int  $id  The ID of the user whose password is being updated.
     * @return \Illuminate\Http\RedirectResponse The response object redirecting to the admin module.
     *
     * @throws \Illuminate\Validation\ValidationException If the validation fails.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user with the given ID is not found.
     */
    public function changePasswordUpdate(Request $request, $id)
    {
        $request->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        if (! auth()->user()->can('edit_users')) {
            $id = auth()->user()->id;
        }

        $$module_name_singular = User::findOrFail($id);

        $request_data = $request->only('password');
        $request_data['password'] = Hash::make($request_data['password']);

        $$module_name_singular->update($request_data);

        Flash::success(Str::singular($module_title)."' Updated Successfully")->important();

        return redirect("admin/{$module_name}");
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

        $userRoles = $$module_name_singular->roles->pluck('name')->all();
        $userPermissions = $$module_name_singular->permissions->pluck('name')->all();

        $roles = Role::get();
        $permissions = Permission::select('name', 'id')->get();

        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view(
            "backend.{$module_name}.edit",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "{$module_name_singular}", 'roles', 'permissions', 'userRoles', 'userPermissions')
        );
    }

    /**
     * Updates a user with the given ID.
     *
     * @param  Request  $request  The HTTP request object.
     * @param  int  $id  The ID of the user to update.
     * @return RedirectResponse The redirect response to the admin module.
     *
     * @throws NotFoundHttpException If the authenticated user does not have the 'edit_users' permission.
     */
    public function update(Request $request, $id)
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

        $module_action = 'Update';

        $$module_name_singular = User::findOrFail($id);

        $$module_name_singular->update($request->except(['roles', 'permissions']));

        if ($id === 1) {
            $user->syncRoles(['super admin']);

            return redirect("admin/{$module_name}")->with('flash_success', 'Update successful!');
        }

        $roles = $request['roles'];
        $permissions = $request['permissions'];

        // Sync Roles
        if (isset($roles)) {
            $$module_name_singular->syncRoles($roles);
        } else {
            $roles = [];
            $$module_name_singular->syncRoles($roles);
        }

        // Sync Permissions
        if (isset($permissions)) {
            $$module_name_singular->syncPermissions($permissions);
        } else {
            $permissions = [];
            $$module_name_singular->syncPermissions($permissions);
        }

        event(new UserUpdated($$module_name_singular));

        Flash::success(Str::singular($module_title)."' Updated Successfully")->important();

        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return redirect("admin/{$module_name}");
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

        if (auth()->user()->id === $id || $id === 1) {
            Flash::warning('You can not delete this user!')->important();

            Log::notice(label_case($module_title.' '.$module_action).' Failed | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

            return redirect()->back();
        }

        if (! auth()->user()->can('edit_users')) {
            $id = auth()->user()->id;
        }

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        event(new UserUpdated($$module_name_singular));

        flash($$module_name_singular->name.' User Successfully Deleted!')->success();

        Log::info(label_case($module_action)." '{$module_name}': '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".auth()->user()->name);

        return redirect("admin/{$module_name}");
    }

    /**
     * Retrieves and displays a list of deleted records for the specified module.
     *
     * @return \Illuminate\View\View the view for the list of deleted records
     */
    public function trashed()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Deleted List';
        $page_heading = $module_title;

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        Log::info(label_case($module_action).' '.label_case($module_name).' by User:'.auth()->user()->name);

        return view(
            "backend.{$module_name}.trash",
            compact('module_name', 'module_title', "{$module_name}", 'module_icon', 'page_heading', 'module_action')
        );
    }

    /**
     * Restores a record in the database.
     *
     * @param  int  $id  The ID of the record to be restored.
     * @return Illuminate\Http\RedirectResponse The redirect response to the admin module page.
     */
    public function restore($id)
    {
        if (! auth()->user()->can('restore_users')) {
            $id = auth()->user()->id;
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Restore';

        $$module_name_singular = $module_model::withTrashed()->find($id);

        $$module_name_singular->restore();

        $$module_name_singular->userprofile()->withTrashed()->restore();

        event(new UserUpdated($$module_name_singular));

        flash($$module_name_singular->name.' Successfully Restoreded!')->success();

        Log::info(label_case($module_action)." '{$module_name}': '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".auth()->user()->name);

        return redirect("admin/{$module_name}");
    }

    /**
     * Block a user.
     *
     * @param  int  $id  The ID of the user to block.
     * @return Illuminate\Http\RedirectResponse
     *
     * @throws Exception There was a problem updating this user. Please try again.
     */
    public function block($id)
    {
        if (! auth()->user()->can('delete_users')) {
            $id = auth()->user()->id;
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Block';

        if (auth()->user()->id == $id || $id == 1) {
            Flash::warning("You can not 'Block' this user!")->important();

            Log::notice(label_case($module_title.' '.$module_action).' Failed | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

            return redirect()->back();
        }

        $$module_name_singular = User::withTrashed()->find($id);

        try {
            $$module_name_singular->status = 2;
            $$module_name_singular->save();

            event(new UserUpdated($$module_name_singular));

            flash($$module_name_singular->name.' - User Successfully Blocked!')->success();

            return redirect()->back();
        } catch (Exception $e) {
            throw new Exception('There was a problem updating this user. Please try again.');
        }
    }

    /**
     * Unblock a user.
     *
     * @param  int  $id  The ID of the user to unblock.
     * @return RedirectResponse The redirect back to the previous page.
     *
     * @throws Exception If there is a problem updating the user.
     */
    public function unblock($id)
    {
        if (! auth()->user()->can('delete_users')) {
            $id = auth()->user()->id;
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Unblock';

        if (auth()->user()->id == $id || $id == 1) {
            Flash::warning("You can not 'Unblock' this user!")->important();

            Log::notice(label_case($module_title.' '.$module_action).' Failed | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

            return redirect()->back();
        }

        $$module_name_singular = User::withTrashed()->find($id);

        try {
            $$module_name_singular->status = 1;
            $$module_name_singular->save();

            event(new UserUpdated($$module_name_singular));

            flash($$module_name_singular->name.' - User Successfully Unblocked!')->success();

            Log::notice(label_case($module_title.' '.$module_action).' Success | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

            return redirect()->back();
        } catch (Exception $e) {
            flash('There was a problem updating this user. Please try again.!')->error();

            Log::error(label_case($module_title.' '.$module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');
            Log::error($e);
        }
    }

    /**
     * Destroy a user provider.
     *
     * @param  Request  $request  The request object.
     * @return void
     *
     * @throws Exception There was a problem updating this user. Please try again.
     */
    public function userProviderDestroy(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $user_provider_id = $request->user_provider_id;
        $user_id = $request->user_id;

        if (! $user_provider_id > 0 || ! $user_id > 0) {
            flash('Invalid Request. Please try again.')->error();

            return redirect()->back();
        }
        $user_provider = UserProvider::findOrFail($user_provider_id);

        if ($user_id === $user_provider->user->id) {
            $user_provider->delete();

            flash('Unlinked from User, "'.$user_provider->user->name.'"!')->success();

            return redirect()->back();
        }
        flash('Request rejected. Please contact the Administrator!')->warning();

        event(new UserUpdated($$module_name_singular));

        throw new Exception('There was a problem updating this user. Please try again.');
    }

    /**
     * Resends the email confirmation for a user.
     *
     * @param  int  $id  The ID of the user.
     * @return \Illuminate\Http\RedirectResponse Returns a redirect response.
     *
     * @throws \Illuminate\Http\Client\RequestException If the user is not authorized to resend the email confirmation.
     */
    public function emailConfirmationResend($id)
    {
        if ($id !== auth()->user()->id) {
            if (auth()->user()->hasAnyRole(['administrator', 'super admin'])) {
                Log::info(auth()->user()->name.' ('.auth()->user()->id.') - User Requested for Email Verification.');
            } else {
                Log::warning(auth()->user()->name.' ('.auth()->user()->id.') - User trying to confirm another users email.');

                abort('404');
            }
        }

        $user = User::where('id', '=', $id)->first();

        if ($user) {
            if ($user->email_verified_at === null) {
                Log::info($user->name.' ('.$user->id.') - User Requested for Email Verification.');

                // Send Email To Registered User
                $user->sendEmailVerificationNotification();

                flash('Email Sent! Please Check Your Inbox.')->success()->important();

                return redirect()->back();
            }
            Log::info($user->name.' ('.$user->id.') - User Requested but Email already verified at.'.$user->email_verified_at);

            flash($user->name.', You already confirmed your email address at '.$user->email_verified_at->isoFormat('LL'))->success()->important();

            return redirect()->back();
        }
    }
}