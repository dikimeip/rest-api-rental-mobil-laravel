<?php

use Illuminate\Database\Seeder;
use App\AdminModel;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminModel::create([
        	'nama' => 'umam imanudin',
        	'username' => 'umam12',
        	'password' => 'umam',
        	'alamat' => 'jombang',
        	'hp' => '085432123',
        	'foto' => '-'
        ]);
    }
}
