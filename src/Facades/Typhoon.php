<?php

namespace HappyToDev\Typhoon\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \happytodev\Typhoon\Typhoon
 */
class Typhoon extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'typhoon';
    }
}
