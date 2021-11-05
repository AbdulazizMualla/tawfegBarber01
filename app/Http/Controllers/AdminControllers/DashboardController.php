<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = collect(DB::select("select (select count(id) from users) as count_users,
                               (select count(id) from contacts) as count_contact,
                               (select count(id) from reservations) as count_rev"))->first();
        return view('admin.dashboard' , compact('counts'));
    }
}
