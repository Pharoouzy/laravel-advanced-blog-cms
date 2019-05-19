<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $permissions = Permission::orderBy('id', 'asc')->paginate(10);
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->permission_type == 'basic') {
            $this->validate($request, [
                'display_name' => 'required|max:191',
                'name' => 'required|max:191|alphadash|unique:permissions,name'.$id,
                'description' => 'sometimes|max:191'
            ]);

            $permission = new Permission();
            $permission->display_name = $request->display_name;
            $permission->name = $request->name;
            $permission->description = $request->description;

            if ($permission->save()) {
                Session::flash('success', 'Permission saved successfully!');
                return redirect()->route('permissions.index');
            }
            else{
                Session::flash('danger', 'Unable to save Permission. Try again!');
                return redirect()->route('permissions.index')->withInput();
            }
        }
        else if ($request->permission_type == 'crud') {
            $this->validate($request, [
                'resource' => 'required|min:3|max:100|alpha'
            ]);

            $crud = explode(',', $request->crud_selected);
            if (count($crud > 0)) {
                foreach ($crud as $value) {
                    $slug = strtolower($value). '-' .$request->resource;
                    $display_name = ucwords($value. " " .$request->resource);
                    $description = "Allow a user to ". strtoupper($value) . ucwords($request->resource);

                    $permission = new Permission();
                    $permission->name = $slug;
                    $permission->display_name = $display_name;
                    $permission->description = $description;
                    $permission->save();
                }
                Session::flash('success', 'Permission were all successfully added!');
                return redirect()->route('permissions.index');
            }
        }
        else{
            return redirect()->route('permissions.create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.edit')->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'display_name' => 'required|max:191',
            'description' => 'sometimes|max:191'
        ]);

        $permission = new Permission();
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;

        $permission->save();

        Session::flash('success', 'Updated the '. $permission->display_name .' permission successfully!');
        return redirect()->route('permissions.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
