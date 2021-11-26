<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendMails;
use App\Mail\SendEmailMail;
use App\Models\Block;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function showViewSendEmail()
    {
        return view('admin.users.send-email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|string|max:200',
            'subject' => 'required|string|max:200',
            'message' => 'required|string'
        ]);

        if ($request->to === 'الكل'){
            User::chunk(50 , function ($emails) use ($request){
                dispatch(new SendMails($emails , $request->input()));
            });
        }else{
            $request->validate([
                'to' => 'email|exists:users,email',
            ]);
            Mail::to($request->to)->send(new SendEmailMail($request->input()));
        }
        return redirect()->back();
    }
}
