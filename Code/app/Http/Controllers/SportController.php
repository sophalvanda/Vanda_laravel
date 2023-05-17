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
        $sport = Sport::all();
        return response()->json(['massage'=>true,'data'=>$sport],200);
    }

    /**
     * Store a newly created resource in storage.
     */
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
    public function show($id)
    {
        $sport =Sport::find($id);
        return response()->json(['message'=>'Sport show successfully','data'=>$sport],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sport =Sport::find($id);
        if ($sport === null) {
            return response()->json(['request' =>false],401);
        }
        $sport->update();
        return response()->json(['message'=>'Sport update successfully','data'=>$sport],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sport = Sport::find($id);
        if ($sport === null){
            return response()->json(['message'=>'Sport not found'],401);
        }
        $sport->delete();
        return response()->json(['message'=>'Sport deleted successfully'],200);
    }
}
