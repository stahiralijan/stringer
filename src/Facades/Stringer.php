<?php

namespace Stahiralijan\Stringer\Facades;

use Illuminate\Support\Facades\Facade;

class Stringer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'stringer';
    }
}
