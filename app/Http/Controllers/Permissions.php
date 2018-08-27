<?php

namespace App\Http\Controllers;

use App\Model_permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Permissions extends Controller
{
    public function addPermissions()
    {
        $menues = Model_permissions::$menues;
        return view('hrms.settings.permissions.permissions', compact('menues'));
    }

    public function postPermissions(Request $request, Model_permissions $permissions)
    {
        $this->validate($request, [
            'name' => 'required',
            'menu' => 'required'
        ]);
        $permissions->name = $request->name;
        $permissions->menu = $request->menu;
        $result = $permissions->save();
        if ($result) {
            \Session::flash('flash_message', 'Employee Added successfully!');
        } else {
            \Session::flash('flash_message', 'Employee Adding Failed!');
        }
        return redirect()->route('get-permissions');
    }

    public function getPermissions()
    {
        $permissions = Model_permissions::paginate(20);
        return view('hrms.settings.permissions.list', compact('permissions'));
    }

    public function editPermissions(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $update = Model_permissions::find($id);
            $menues = Model_permissions::$menues;
            return view('hrms.settings.permissions.permissions', compact('update','menues'));
        } else {

        }
    }

    public function updatePermissions(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'menu' => 'required'
        ]);

        $permission = Model_permissions::find($request->id);
        $permission->name = $request->name;
        $permission->menu = $request->menu;
        $result = $permission->save();
        if ($result) {
            \Session::flash('flash_message', 'Employee Updated Successfully!');
        } else {
            \Session::flash('flash_message', 'Employee Updated Failed!');
        }
        return redirect()->back();
    }

    public function deletePermissions(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $permission = Model_permissions::find($id);
            $result = $permission->delete();
            if ($result) {
                \Session::flash('flash_message', 'Employee Deleted Successfully!');
            } else {
                \Session::flash('flash_message', 'Employee Deletion Failed!');
            }
        } else {
            \Session::flash('flash_message', 'Something Went Wrong!');
        }
        return redirect()->back();
    }
}
