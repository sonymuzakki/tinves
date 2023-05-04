<?php

namespace App\Http\Controllers;

use App\Models\network;
use Illuminate\Http\Request;

class monitoringController extends Controller
{
    public function index(){

        $events = array();
        $network = network::all();
        foreach($network as $network){
            $events [] = [
              'title' => $network->title,
              'start' => $network->start_date,
              'end' => $network->end_date,
            ];
        }

        return view('Backend.Calender.net',['events' => $events]);
    }

    public function getEvents()
    {
        $events = network::all();
        return response()->json($events);
    }

    public function saveEvent(Request $request)
    {
        $event = new network();
        $event->title = $request->input('title');
        $event->category = $request->input('category');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->save();
        return response()->json(['success' => true]);
    }

    public function updateEvent(Request $request, $id)
    {
        $event = network::find($id);
        $event->title = $request->input('title');
        $event->category = $request->input('category');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->save();
        return response()->json(['success' => true]);
    }

    public function deleteEvent($id)
    {
        $event = network::find($id);
        $event->delete();
        return response()->json(['success' => true]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string'
        ]);
        $network = network::create([
            'title' => $request->title,
            'star_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($network);
    }
}