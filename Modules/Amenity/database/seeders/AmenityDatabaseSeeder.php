<?php

namespace Modules\Amenity\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Amenity\Models\Amenity;

class AmenityDatabaseSeeder extends Seeder
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
         * Amenities Seed
         * ------------------
         */

        // DB::table('amenities')->truncate();
        // echo "Truncate: amenities \n";

        Amenity::factory()->count(20)->create();
        $rows = Amenity::all();
        echo " Insert: amenities \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
