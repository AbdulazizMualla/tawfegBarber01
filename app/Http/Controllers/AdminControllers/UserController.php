<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('block')->get();
        return view('admin.users.index' , compact('users'));
    }

    public function destroyBlock(User $user)
    {
        $user->block()->delete();
        return redirect()->route('admin.users.index');
    }

    public function storeBlock(Request $request)
    {
        Block::create(['user_id' => $request->user_id]);
        return redirect()->route('admin.users.index');
    }
    public function getUsersBlock()
    {
        $userBlock = User::has('block')->get();
        return view('admin.users.blocked' , compact('userBlock'));
    }

    public function getUsersNotActive()
    {
        $userNoActive = User::where('email_verified_at' , null)->get();
        return view('admin.users.activate' , compact('userNoActive'));
    }

    public function activeUser(User $user)
    {
        $user->email_verified_at =  now()->format('Y-m-d H:i:s');
        $user->save();
        return redirect()->back();
    }
}
