<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\network;
use Illuminate\Http\Request;

class CalendarController extends Controller
{



    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index(Request $request){
        if($request->ajax()) {

            $data = network::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end','color','backgroundColor']);

            return response()->json($data);
        }

        return view('Backend.Calender.net');
    }

    public function ajax(Request $request){
        switch ($request->type) {
           case 'add':
                $event = network::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end'   => $request->end,
                    'color' => $request->color,
                    'backgroundColor' => $request->backgroundColor,
                ]);

                return response()->json($event);
            break;

            case 'update':
                $event = network::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'color' => $request->color,
                    'backgroundColor' => $request->backgroundColor,
                ]);

                return response()->json($event);
            break;

            case 'delete':
                $event = network::find($request->id)->delete();

                return response()->json($event);
            break;

            default:
            # code...
            break;
        }
    }

    public function index_new(){

        $events = array();
        $calendar = Calendar::all();
        foreach($calendar as $cal){
            $events[]= [
                'id'    => $cal->id,
                'title' => $cal->title,
                'area' => $cal->area,
                'item' => $cal->item,
                'start' => $cal->start_date,
                'end'   => $cal->end_date,
            ];
        }
        return view ('Backend.Calendar.calendar',['events'=> $events]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'area' => 'required|string',
            'item' => 'required|string'
        ]);

        $calendar = Calendar::create([
            'title' => $request->title,
            'area' => $request->area,
            'item' => $request->item,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json($calendar);
    }

    public function update(Request $request,$id){

        $calendar  = Calendar::find($id);
        if(! $calendar) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404 );
        }
        $calendar->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return $calendar;
    }

    public function destroy($id){
        $calendar = Calendar::find($id);
            if(! $calendar) {
                return response()->json([
                    'error' => 'Unable to locate the event'
                ],'404');
            }
            $calendar->delete();
            return $id;
    }
}