<?php

namespace Modules\Cruise\Console\Commands;

use Illuminate\Console\Command;

class CruiseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CruiseCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cruise Command description';

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
