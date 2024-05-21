<?php

namespace Modules\Hotel\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Hotel\Models\Hotel;

class HotelDatabaseSeeder extends Seeder
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
         * Hotels Seed
         * ------------------
         */

        // DB::table('hotels')->truncate();
        // echo "Truncate: hotels \n";

        Hotel::factory()->count(20)->create();
        $rows = Hotel::all();
        echo " Insert: hotels \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
