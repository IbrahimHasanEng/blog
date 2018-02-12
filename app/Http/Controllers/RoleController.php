<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ArabicString;
use App\Permission;
use Session;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('manage.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('manage.roles.create')->withPermissions($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        

        $this->validate($request, [
            'name' => 'required|min:3|max:355',
            'display_name' => ['required', 'min:3', 'max:255', new ArabicString],
            'description' => 'required|min:3|max:255'
        ]);
        $role = new Role;

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        
        $role->save();

        $role->permissions()->sync($request->permissions);
        
        Session::flash('success', 'تم حفظ التعديلات بنجاح');

        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = Role::findOrFail($id);
        return view('manage.roles.show')->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('manage.roles.edit')->withRole($role)->withPermissions($permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role = Role::findOrFail($id);

        $this->validate($request, [
            'display_name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255'
        ]);

        $role->display_name = $request->display_name;
        $role->description = $request->description;

        $role->permissions()->sync($request->permissions);
        
        $role->save();

        Session::flash('success', 'تم حفظ التعديلات بنجاح');

        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
