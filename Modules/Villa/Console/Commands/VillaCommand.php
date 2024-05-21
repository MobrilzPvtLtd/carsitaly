<?php

namespace Modules\Villa\Console\Commands;

use Illuminate\Console\Command;

class VillaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:VillaCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Villa Command description';

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
