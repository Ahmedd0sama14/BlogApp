<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('type', 'user')
            ->withcount('blogs')
            ->paginate(10);
        return view('admin.users.users', compact('users'));
    }



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $blogs = $user->blogs()->latest()->paginate(3);
        return view('admin.users.postes', compact('user', 'blogs'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
