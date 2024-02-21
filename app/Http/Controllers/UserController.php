<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//    VIEW USER
    public function index(){
        $this->data['title'] = "User Management";
        $this->data['active'] = "user";
        $getrole = (new User())->getRole();
        $this->data['user'] = $getrole;
        return view('user.view',$this->data);
    }

//    ADD USER
    public function ShowViewUserAdd(){
        $this->data['title'] = "User Management";
        $this->data['active'] = "user";
        $role = Role::all();
        $this->data['role'] = $role;

        return view('user.add',$this->data);
    }
    public function Adduser(Request $request){

//        VALIDATION
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'gender' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'role_id' =>'required|string|max:255'
        ]);

//        ADD NEW USER
        $user = new User();
        $user->user_id = $request->input('user_id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->gender = $request->input('gender');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->role_id = $request->input('role_id');


        $user->save();

        return redirect('user/view')->with('success', 'User have been successfully added');
    }
//    END OF ADD USER

//EDIT USER
    function ShowViewEdituser($id){
        $this->data['title'] = 'User Management';
        $this->data['active'] = "user";
        $this->data['users'] = User::findOrFail($id);

        $getrole = (new User())->getRole();
        $this->data['user'] = $getrole;

        $role = role::all();
        $this->data['role'] = $role;

        return view('user.edit',$this->data);
    }

    public function updateuser(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
//            'user_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:user,email,' . $user->id,
            'gender' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'role_id' =>'required|string|max:255'
        ]);

        $user->update($request->all());

        return redirect()->route('viewuser')->with('success', 'User updated successfully.');
    }
//    END OF EDIT USER

//    DELETE USER
    public function deleteuser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Hapus role dari database
        $user->delete();

        return redirect()->route('viewuser')->with('success', 'User deleted successfully');
    }
}
