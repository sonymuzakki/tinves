<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Inventory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }

    public function index(){
        $inventory = Inventory::all();
        $history = history::all();
        $reqproses = history::all();

        // Count
        $totalinven =Inventory::count();
        $totaluser  = user::count();
        $totalreq   = history::count();
        $totalreqpen   = history::where('status','0')->count();

        $allData = history::whereDate('created_at',Carbon::today())->paginate(10);

        return view('admin.index',compact('inventory','history','totalinven','totaluser','totalreq','totalreqpen','reqproses','allData'));

    }

}