<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Inventory;
use App\Models\notes;
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
        $start_date = Carbon::now()->startOfMonth();
        $end_date = Carbon::now()->endOfMonth();

        // Count
        $totalinven =Inventory::count();
        $totaluser  = user::count();
        $totalreq   = history::count();
        $totalreqpen   = history::where('status','0')->count();


        $allData = history::whereBetween('created_at',[$start_date, $end_date])->paginate(10);
        $notes = notes::whereBetween('created_at',[$start_date, $end_date])->paginate(10);

        return view('admin.index',compact('inventory','history','totalinven','totaluser','totalreq','totalreqpen','reqproses','allData','notes'));

    }

}