<?php

namespace HappyToDev\FlatCms\Commands;

use Illuminate\Console\Command;

class FlatCmsCommand extends Command
{
    public $signature = 'flat-cms';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
