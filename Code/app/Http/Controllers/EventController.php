<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Models\Stadium;
use App\Models\Matching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Event = Event::all();
        return $Event;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validate = [
        //     'name' => 'required|string|min:5',
        //     'description' => 'required|string|min:10',
        //     'date' => [
        //         'required',
        //         'date_format:Y-m-d',
        //         'after_or_equal:today',
        //         'before_or_equal:next year',
        //     ],
        //     'stadium_id' => 'required|integer',
        //     'sport_id' => 'required|integer',
        // ];
        $Event = $request['events'];
        $validated = Validator::Make($request->all(),[
            'name' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'date' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:today',
                'before_or_equal:next year',
            ],
            'stadium_id' => 'required|integer',
            'sport_id' => 'required|integer',
        ]); 
        if ($validated -> failed()){
            return response()->json([$validated->errors()],400);
        }
        else{
            $stadium = Stadium::find($Event['stadium_id']);
            if ($stadium === null){
                return response()->json(['massage'=>'Stadium Not Found'],400);
            }
            else {
                $numberOfBooking = intval($stadium['ZoneA'] + $stadium['ZoneB']);
                $Event['numberOfSeats'] = $numberOfBooking;
                $createEvent = Event::create($Event);
                return response()->json(['massage' => 'Create event successfully!!','data'=> $createEvent],200);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Event = Event::find($id);
        if ($Event === null) {
            return response()->json(['massage' => 'Undefine'], 200);
        }
        $Event->Matching;
        return response()->json(['Get detail' => 'successfully', 'data' => $Event], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = [
            'name' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'numberOfSeats' => 'required|integer',
            'date' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:today',
                'before_or_equal:next year',
            ],
            'stadium_id' => 'required|integer',
            'sport_id' => 'required|integer',
        ];
        $validated = Validator::make($request->all(),$validate);
        if ($validated->failed()) {
            return response()->json([$validated->errors()],401);
        }
        else {
            $stadium = Stadium::find($request['stadium_id']);
            if ($stadium === null) {
                return response()->json(['message'=>'Stadium not found'],401);
            }
            else {
                $eventUpdate = Event::find($id);
                if ($eventUpdate === null) {
                    return response()->json(['message'=>'Event not found'],401);
                }
                else {
                    $eventUpdate->update($request->all());
                    return response()->json(['massage'=>'Event updated successfully','data'=>$eventUpdate],200);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event === null) {
            return response()->json(['message'=>'Event not found'],401);
        }
        else {
            $event->delete();
            return response()->json(['massage'=>'Event deleted successfully'],200);
        }
    }
    public function search(string $keyword)
    {
        $Event = Event::where('name', 'like', '%' . $keyword . '%')->get();
        return response()->json(['Search' => true, 'data' => $Event], 200);
    }
}
