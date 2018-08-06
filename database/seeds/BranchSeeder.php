<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::truncate();

        $branches = [
            [ 'name' => 'Mampu Cyberjaya'],
            [ 'name' => 'Mampu Putrajaya'],
        ];

        Branch::insert($branches);
    }
}
