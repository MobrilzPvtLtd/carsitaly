<?php

namespace Modules\Cruise\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Cruise\Models\Cruise;

class CruiseDatabaseSeeder extends Seeder
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
         * Cruises Seed
         * ------------------
         */

        // DB::table('cruises')->truncate();
        // echo "Truncate: cruises \n";

        Cruise::factory()->count(20)->create();
        $rows = Cruise::all();
        echo " Insert: cruises \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
