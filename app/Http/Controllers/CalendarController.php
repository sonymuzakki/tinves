<?php

namespace App\Http\Controllers;

use App\Models\network;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        $network = network::all();
        foreach($network as $network){
            $events[] = [
                'title' => $network->title,
                'start' => $network->start_date,
                'end' => $network->end_date,
            ];
        }

        return view('Backend.Calender.net', ['events' => $events]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string'
        ]);
        $network = network::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

        ]);
        return response()->json($network);
    }
}