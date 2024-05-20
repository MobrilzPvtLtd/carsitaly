<?php

namespace Modules\Car\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Car\Models\Car;

class CarDatabaseSeeder extends Seeder
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
         * Cars Seed
         * ------------------
         */

        // DB::table('cars')->truncate();
        // echo "Truncate: cars \n";

        Car::factory()->count(20)->create();
        $rows = Car::all();
        echo " Insert: cars \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
