<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Models\Stadium;
use Dotenv\Validator;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'Zone' => 'required|string|',
            'event_id' => 'required|integer|'
        ];
        $validate = Validator($request->all(), $rule);
        $request['Zone'] = strtoupper($request['Zone']);
        if ($validate->fails()) {
            return response()->json([$validate->errors()]);
        }
        else {
            $stadium = $this->getStadium(intval($request['event_id']));
            $numOfBooking = $this->getNumberOfBooking($request['Zone'],intval($request['event_id']));
            if ($request['Zone'] === 'A' and $numOfBooking >= $stadium['ZoneA']){
                return response()->json(['request' => true, 'message' => 'Full'],201);
            }
            elseif ($request['Zone'] === 'B' and $numOfBooking >= $stadium['ZoneB']){
                return response()->json(['request' => true, 'message' => 'Full'],201);
            }
            else {
                $booking = new Booking;
                $booking->price = 'Free';
                $booking->Zone = $request['Zone'];
                $booking->event_id = $request['event_id'];
                $booking->save();
                return response()->json(['message' => 'Booking successfully!!!','data'=>$booking],200);
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
    // get number of seat in zone
    public function getNumberOfBooking($zone, $event_id) {
        $numberOfSeat = Booking::select('bookings.*')
        ->join('events','events.id', '=', 'bookings.event_id')
        ->where('bookings.Zone', '=',$zone )
        ->where('bookings.event_id', '=', $event_id)
        ->count();
        return $numberOfSeat;
    }
    // get stadium
    public function getStadium($event_id){
        $stadium = Stadium::select('stadia.*')
        ->join('events','events.stadium_id', '=', 'stadia.id')
        ->where('events.id', '=', $event_id)
        ->get()
        ->first();
        return $stadium;
    }
}
