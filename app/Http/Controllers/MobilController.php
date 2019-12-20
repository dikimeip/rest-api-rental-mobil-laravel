<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarModel;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CarModel::all();
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data
            ],201);
        } else {
             return response()->json([
                'status' => 0,
                'data' => 'data not found'
            ],201);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        if ($foto == "") {
            return response()->json([
                'status' => 0,
                'data' => 'Image failed'
            ],404);
        } else {
            $foto = $request->file('foto');
            $org = $foto->getClientOriginalName();
            $path = 'image';
            $foto->move($path,$org);

             return response()->json([
                'status' => 1,
                'data' => 'Image ok'
            ],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
