<?php

use Illuminate\Database\Seeder;
use App\Branch;

class KegunaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kegunaan::truncate();

        $kegunaan = [
            [ 'name' => 'Discussion'],
            [ 'name' => 'Training'],
        ];

        Kegunaan::insert($kegunaan);
    }
}
