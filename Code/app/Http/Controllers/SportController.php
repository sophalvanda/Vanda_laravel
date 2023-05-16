<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
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
    // public function rule()
    // {
    //     return [
    //         'name' => 'required|name|unique:name'
    //     ];
    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:20',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $sport = Sport::create($validator->validated());
        return response()->json(['message'=>'Sport create successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        //
    }
}
