<?php

namespace Modules\Car\Console\Commands;

use Illuminate\Console\Command;

class CarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CarCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Car Command description';

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
