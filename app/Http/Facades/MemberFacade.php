<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class MemberFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'member';
    }
}
