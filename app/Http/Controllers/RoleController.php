<?php

namespace App\Http\Controllers;

use App\Model_permissions;
use App\Models\Employee;
use App\Models\Role;
use App\models\RolePermissions;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    public function addRole()
    {
        $permissions = $this->getPermissions();
        return view('hrms.role.add_role', compact('permissions'));
    }

    Public function processRole(Request $request)
    {
//        dd($request->all());
        //Role::create(['name' => $request->name, 'description' => $request->description]);
        $permissions = $request->permissions;
        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        if($role && !empty($permissions)){
            foreach ($permissions as $value){
                $rolePermissions = new RolePermissions();
                $rolePermissions->permission_id = $value;
                $role->getPermissions()->save($rolePermissions);
            }
        }

        \Session::flash('flash_message', 'Role successfully added!');
        return redirect()->back();

    }

    public function showRole()
    {
        $roles = Role::paginate(10);
        return view('hrms.role.show_role', compact('roles'));
    }

    public function showEdit($id)
    {
        $result = Role::with('getPermissions')->whereid($id)->first();
        $permissions = $this->getPermissions();
        return view('hrms.role.add_role', compact('result','permissions'));
    }

    public function doEdit(Request $request, $id)
    {
        $name = $request->name;
        $description = $request->description;
        $permission = $request->permissions;
        $edit = Role::findOrFail($id);
        if (!empty($name)) {
            $edit->name = $name;
        }
        if (!empty($description)) {
            $edit->description = $description;
        }
        $edit->save();
        if($edit && !empty($permission)){
            $edit->getPermissions()->delete();
            foreach ($permission as $value){
                $rolePermissions = new RolePermissions();
                $rolePermissions->permission_id = $value;
                $edit->getPermissions()->save($rolePermissions);
            }

        }else{
            $edit->getPermissions()->delete();
        }
        \Session::flash('flash_message', 'Role successfully updated!');
        return redirect('role-list');
    }

    public function doDelete($id)
    {
        $role = Role::find($id);
        $role->delete();
        \Session::flash('flash_message', 'Role successfully Deleted!');
        return redirect('role-list');
    }

    public function getPermissions(){
        $menues = Model_permissions::$menues;
        $data = [];
        foreach ($menues as $key=>$value){
            $permissions = Model_permissions::where('menu','=',$key)->get()->toArray();
            if(!empty($permissions)){
                $data[$value] = $permissions;
            }
        }
        return $data;
    }
}
