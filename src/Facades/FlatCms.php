<?php

namespace happytodev\FlatCms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \happytodev\FlatCms\FlatCms
 */
class FlatCms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flat-cms';
    }
}
