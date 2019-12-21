<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiModel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TransaksiModel::all();
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data
            ],201);
        } else {
             return response()->json([
                'status' => 0,
                'data' => 'Null'
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
        $TransaksiModel = new TransaksiModel;
        $TransaksiModel->car_id = $request->get('mobil');
        $TransaksiModel->client_id = $request->get('user');
        $TransaksiModel->tanggal_masuk_trans = $request->get('masuk');
        $TransaksiModel->tanggal_keluar_trans = $request->get('keluar');
        $TransaksiModel->ket_trans = $request->get('ket');
        $TransaksiModel->total_trans = $request->get('total');
        $TransaksiModel->jaminan_trans = $request->get('jaminan');
        $TransaksiModel->save();

        if ($TransaksiModel) {
            return response()->json([
                'status' => 1,
                'data' => 'Success Input Data'
            ],201);
        } else {
            return response()->json([
                'status' => 0,
                'data' => 'Failed Upload Data'
            ],404);
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
    public function update(Request $request)
    {
        $id = $request->get('id');
        $TransaksiModel = TransaksiModel::find($id);
        if ($id == "" || $TransaksiModel == "") {
            return response()->json([
                'status' => 0,
                'data' => 'Id not found'
            ],404);
        } else {
            $TransaksiModel = TransaksiModel::find($id);
            $TransaksiModel->car_id = $request->get('mobil');
            $TransaksiModel->client_id = $request->get('user');
            $TransaksiModel->tanggal_masuk_trans = $request->get('masuk');
            $TransaksiModel->tanggal_keluar_trans = $request->get('keluar');
            $TransaksiModel->ket_trans = $request->get('ket');
            $TransaksiModel->total_trans = $request->get('total');
            $TransaksiModel->jaminan_trans = $request->get('jaminan');
            $TransaksiModel->save();
            if ($TransaksiModel) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Success Update data'
                ],201);
            } else {
                 return response()->json([
                    'status' => 0,
                    'data' => 'Failed Update'
                ],201);
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
        $cari = TransaksiModel::find($id);
        if ($id == "" || $cari == "") {
            return response()->json([
                'status' => 0,
                'data' => 'Id Not Found'
            ],404);
        } else {
            $TransaksiModel = TransaksiModel::find($id);
            $TransaksiModel->delete();
            if ($TransaksiModel) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Delete Ok'
                ],201);
            } else {
                 return response()->json([
                    'status' => 0,
                    'data' => 'Delete Failed'
                ],201);
            }
        }
    }
}
