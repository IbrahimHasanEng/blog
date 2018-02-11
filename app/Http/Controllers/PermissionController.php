<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Rules\ArabicString;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
        //
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
        if($request->has('display_name')) {

            $this->validate($request, [
                'name' => 'required|min:3|max:255',
                'display_name' => ['required', 'min:3', 'max:255', new ArabicString],
                'description' => ['nullable', 'min:3', 'max:255', new ArabicString]
            ]);

            $permission = new Permission;

            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            if($request->has('description')) {
                $permission->description = $request->description;
            }

            $permission->save();

        } else {

            $this->validate($request, [
                'resource' => 'required|min:3|max:255',
                'resourceInArabic' => ['required', 'min:3', 'max:255', new ArabicString]
            ]);

            $crud = $request->input('crud_type');

            if(count($crud) > 0) {

                $crud_arabic = [
                    'create' => 'إنشاء',
                    'read' => 'قراءة',
                    'update' => 'تعديل',
                    'delete' => 'تحديث'
                ];

                foreach($crud as $x) {

                    $permission = new Permission;

                    $permission->name = $x . '-' . $request->resource;

                    $permission->display_name = $crud_arabic[$x] . ' ' . $request->resourceInArabic;

                    $permission->description = 'تعطي هذه الصلاحية المستخدمين القدرة على ' . $crud_arabic[$x] . ' ' . $request->resourceInArabic;

                    $permission->save();
                }

            }

        }

        Session::flash('success', 'تم إنشاء الصلاحيات المطلوبة بنجاح!');

        return redirect()->route('permissions.index');
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
