<?php

namespace App\Http\Controllers;

use App\Models\Matching;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matching = Matching::all();
        return response()->json(['massage'=>'successfully!!','data'=>$matching],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'team1' => 'required|string|max:50',
            'team2' => 'required|string|max:50',
            'time' => 'required|date_format:H:i:s',
            'event_id' => 'required|integer'
        ]); 

        if ($validated -> failed()) {
            return response()->json([$validated->errors()],400);
        }
        $matching = Matching::create($validated->validated());
        return response()->json(['massage'=>'matching create succussfully!!','data'=>$matching],200);
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
