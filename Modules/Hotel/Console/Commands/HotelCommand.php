<?php

namespace Modules\Hotel\Console\Commands;

use Illuminate\Console\Command;

class HotelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:HotelCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hotel Command description';

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
