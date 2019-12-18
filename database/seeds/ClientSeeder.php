<?php

use Illuminate\Database\Seeder;
use App\ClientModel;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientModel::create([
        	'nama' => 'Tony sugiarto',
        	'alamat' => 'jakarta',
        	'hp' => '01388448',
        	'foto' => '-'
        ]);
    }
}
