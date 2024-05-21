<?php

namespace Modules\Tour\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tour\Models\Tour;

class TourDatabaseSeeder extends Seeder
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
         * Tours Seed
         * ------------------
         */

        // DB::table('tours')->truncate();
        // echo "Truncate: tours \n";

        Tour::factory()->count(20)->create();
        $rows = Tour::all();
        echo " Insert: tours \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
