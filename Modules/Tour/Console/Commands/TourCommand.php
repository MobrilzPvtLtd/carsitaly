<?php

namespace Modules\Tour\Console\Commands;

use Illuminate\Console\Command;

class TourCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TourCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tour Command description';

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
