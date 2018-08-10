<?php

use Illuminate\Database\Seeder;
use App\Kegunaan;

class KegunaanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //koleksi data yang akan disimpan
        $data_kegunaan = [
        	[ 'name' => 'Training' ],
        	[ 'name' => 'Meeting Room' ],
        	[ 'name' => 'Mess Hall' ],
        ];

        //$guarded dan $fillable diabaikan dalam seeder
        Kegunaan::insert($data_kegunaan);

    }
}
