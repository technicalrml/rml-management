<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
//    VIEW role
    public function index(){
        $this->data['title'] = "Role Management";
        $this->data['active'] = "role";
        $role = role::all();
        $this->data['role'] = $role;
        return view('role.view',$this->data);
    }

//    ADD role
    public function ShowViewroleAdd(){
        $this->data['title'] = "Role Management";
        $this->data['active'] = "role";

        return view('role.add',$this->data);
    }

    public function AddRole(Request $request){

//        VALIDATION
        $this->validate($request, [
//            'role_id' => 'required|string|max:255',
            'role' => 'required|string|max:255|unique:role',
        ]);

//        ADD NEW ROLE
        $role = new role();
        $role->role_id = $request->input('role_id');
        $role->role = $request->input('role');

        $role->save();

        return redirect()->route('viewrole')->with('success', 'The role have been successfully added');
    }
//    END OF ADD role

//    EDIT role
    function ShowViewEditrole($id){
        $this->data['title'] = 'Role Management';
        $this->data['active'] = "role";
        $this->data['role'] = role::findOrFail($id);

        return view('role.edit',$this->data);
    }

    public function updaterole(Request $request, $id){
        $role = role::findOrFail($id);
        $request->validate([
//            'role_id' => 'required|string|max:255',
            'role' => 'required|string|max:255|unique:role,role,' . $role->id,
        ]);

        $role->update($request->all());

        return redirect()->route('viewrole')->with('success', 'Role updated successfully.');
    }
//    END OF EDIT role

//    DELETE role
    public function deleterole($id)
    {
        $role = role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        // Hapus role dari database
        $role->delete();

        return redirect()->route('viewrole')->with('success', 'Role deleted successfully');
    }
}
