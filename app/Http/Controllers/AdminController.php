<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AdminModel::all();
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data
            ],201);
        } else {
             return response()->json([
                'status' => 0,
                'data' => 'Data Not found'
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
        if ($foto == '') {
            return response()->json([
                'status' => 0,
                'data' => 'Image Null'
            ],404);
        } else {
            $foto = $request->file('foto');
            $org = $foto->getClientOriginalName();
            $path = 'image';
            $foto->move($path,$org);

            $AdminModel = new AdminModel;
            $AdminModel->nama = $request->get('nama');
            $AdminModel->username = $request->get('username');
            $AdminModel->password = $request->get('password');
            $AdminModel->alamat = $request->get('alamat');
            $AdminModel->hp = $request->get('hp');
            $AdminModel->foto = $org;
            $AdminModel->save();

            if ($AdminModel) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Success Upload Data'
                ],201);
            } else {
                 return response()->json([
                    'status' => 0,
                    'data' => 'Failed Upload Data'
                ],201);
            }
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
