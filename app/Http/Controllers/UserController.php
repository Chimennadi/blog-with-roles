<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view("admin.users.index", [
            "users" => $users
        ]);
    }

    public function show(User $user)
    {
        return view("admin.users.profile", [
            "user" => $user,
            "roles" => Role::all()
        ]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            "username" => ["required", "string", "max:255", "alpha_dash"],
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "max:255"],
        ]);

        $user->username = $inputs["username"];
        $user->name = $inputs["name"];
        $user->email = $inputs["email"];

        $user->update();

        return redirect()->route("users.index");
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash("user-deleted", "User has been deleted");

        return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(request("role"));

        return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(request("role"));

        return back();
    }
}
