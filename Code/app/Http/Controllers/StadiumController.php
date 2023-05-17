<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stadium = Stadium::all();
        return response()->json(['request'=>'success','data'=>$stadium],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all([
            'name'=> 'required|string|max:100',
            'ZoneA' => 'required|integer',
            'ZoneB' => 'required|integer',
        ]));
        if ($validated->failed()) {
            return response()->json([$validated->errors()],401);
        }
        $stadium = Stadium::create($validated->validated());
        return response()->json(['massage'=>'Stadium created successfully','data'=>$stadium],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stadium = Stadium::find($id);
        if ($stadium === null) {
            return response()->json(['request'=>false],401);
        }
        return response()->json(['request'=>'successfully','data'=>$stadium],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $requet, $id)
    {
        $stadium = Stadium::find($id);
        if ($stadium === null) {
            return response()->json(['request'=>'id not found'],401);
        }
        $stadium->update();
        return response()->json(['request'=>'updated successfully','data'=>$stadium],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stadium = Stadium::find($id);
        if ($stadium === null) {
            return response()->json(['request'=>'id not found'],401);
        }
        $stadium->delete();
        return response()->json(['request'=>'Stadium deleted successfully'],200);
    }
}
