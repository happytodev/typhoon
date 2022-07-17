<?php

namespace HappyToDev\Typhoon\Commands;

use Illuminate\Console\Command;

class TyphoonCommand extends Command
{
    public $signature = 'typhoon';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
