<?php

namespace Modules\Villa\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Villa\Models\Villa;

class VillaDatabaseSeeder extends Seeder
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
         * Villas Seed
         * ------------------
         */

        // DB::table('villas')->truncate();
        // echo "Truncate: villas \n";

        Villa::factory()->count(20)->create();
        $rows = Villa::all();
        echo " Insert: villas \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
