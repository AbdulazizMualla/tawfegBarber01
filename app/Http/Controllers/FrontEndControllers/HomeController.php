<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
       $counts = collect(DB::select("select(select count(id) from users) as count_users,
                                                  (select count(id) from contacts) as count_contact,
                                                  (select count(id) from user_infos) as count_user_info"))->first();
        return view('front.index' ,  compact('counts'));
    }

    public function contact(ContactRequest $request)
    {
        if (auth()->user() !== null)  $request['user_id'] =  auth()->id();
        try {
            Contact::create($request->input());
            return 'OK';
        }catch (\Exception $ex){
            return 'pleas try again';
        }
    }
}
