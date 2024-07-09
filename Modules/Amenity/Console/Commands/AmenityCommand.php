<?php

namespace Modules\Amenity\Console\Commands;

use Illuminate\Console\Command;

class AmenityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:AmenityCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Amenity Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
