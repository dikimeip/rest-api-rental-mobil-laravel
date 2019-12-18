<?php

use Illuminate\Database\Seeder;
use App\CarModel;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarModel::create([
        	'nama_car' => 'Ayla',
        	'nopol_car' => 'S 321 DE',
        	'jenis_car' => 'LCGC',
        	'desk_car' => '-',
        	'tahun_car' => '2016',
        	'tahun_masuk_car' => '2019-12-01',
        	'status_car' => 'tersedia',
        	'harga_sewa_car' => 150000,
        	'foto_car' =>''
        ]);
    }
}
