<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientModel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ClientModel::all();
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data
            ],201);
        } else {
             return response()->json([
                'status' => 0,
                'data' => 'not found'
            ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

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
                'data' => 'image found'
            ],404);
        } else {
            $foto = $request->file('foto');
            $org = $foto->getClientOriginalName();
            $path = 'image';
            $foto->move($path,$org);

            $ClientModel = new ClientModel;
            $ClientModel->nama = $request->get('nama');
            $ClientModel->alamat = $request->get('alamat');
            $ClientModel->hp = $request->get('hp');
            $ClientModel->foto = $org;
            $ClientModel->save();

            if ($ClientModel) {
                 return response()->json([
                    'status' => 1,
                    'data' => 'Success Upload'
                ],404);
            } else {
                 return response()->json([
                    'status' => 0,
                    'data' => 'Failed Upload'
                ],404);
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $foto = $request->file('foto');
        $id = $request->get('id');
        $ClientModel = ClientModel::find($id);
        if ($id == "" || $ClientModel == "") {
             return response()->json([
                'status' => 404,
                'data' => 'Id NotFound'
            ],404);
        } else {
             if ($foto == "") {
                $ClientModel = ClientModel::find($id);
                $ClientModel->nama = $request->get('nama');
                $ClientModel->alamat = $request->get('alamat');
                $ClientModel->hp = $request->get('hp');
                $ClientModel->save();

                if ($ClientModel) {
                     return response()->json([
                        'status' => 1,
                        'data' => 'Success Update'
                    ],404);
                } else {
                     return response()->json([
                        'status' => 0,
                        'data' => 'Failed Update'
                    ],404);
                }
            } else {
                $foto = $request->file('foto');
                $org = $foto->getClientOriginalName();
                $path = 'image';
                $foto->move($path,$org);

                $ClientModel = ClientModel::find($id);
                $ClientModel->nama = $request->get('nama');
                $ClientModel->alamat = $request->get('alamat');
                $ClientModel->hp = $request->get('hp');
                $ClientModel->foto = $org;
                $ClientModel->save();

                if ($ClientModel) {
                     return response()->json([
                        'status' => 1,
                        'data' => 'Success Update'
                    ],404);
                } else {
                     return response()->json([
                        'status' => 0,
                        'data' => 'Failed Update'
                    ],404);
                }
            }
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $ClientModel = ClientModel::find($id);
        if ($id == "" || $ClientModel == "" ) {
            return response()->json([
                'status' => 0,
                'data' => 'Id No Found'
            ],404);
        } else {
            $ClientModel = ClientModel::find($id);
            $ClientModel->delete();
            if ($ClientModel) {
                 return response()->json([
                    'status' => 1,
                    'data' => 'Data Delete'
                ],404);
            } else {
                 return response()->json([
                    'status' => 0,
                    'data' => 'Data Failed Delete'
                ],404);
            }
        }
    }
}
