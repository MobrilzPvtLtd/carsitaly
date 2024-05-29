<?php

namespace Modules\Package\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Package\Models\Package;

class PackageDatabaseSeeder extends Seeder
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
         * Packages Seed
         * ------------------
         */

        // DB::table('packages')->truncate();
        // echo "Truncate: packages \n";

        Package::factory()->count(20)->create();
        $rows = Package::all();
        echo " Insert: packages \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
