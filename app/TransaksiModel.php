<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    public function Mobil()
    {
    	return $this->belongsTo('App\CarModel');
    }

    public function Client()
    {
    	return $this->belongsTo('App\ClientModel');
    }
}
