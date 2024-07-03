<?php

namespace Modules\CarRental\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\CarRental\Models\CarRental;

class CarRentalDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * CarRentals Seed
         * ------------------
         */

        // DB::table('carrentals')->truncate();
        // echo "Truncate: carrentals \n";

        CarRental::factory()->count(20)->create();
        $rows = CarRental::all();
        echo " Insert: carrentals \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
