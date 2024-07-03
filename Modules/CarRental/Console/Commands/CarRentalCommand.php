<?php

namespace Modules\CarRental\Console\Commands;

use Illuminate\Console\Command;

class CarRentalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CarRentalCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CarRental Command description';

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
