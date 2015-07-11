<?php

namespace Khill\Lavacharts\Examples\Controllers;

use \Illuminate\Routing\Controller as BaseController;
use View;
/*
if ( version_compare(\Illuminate\Foundation\Application::VERSION, '5.0.0', 'lt') {
    class_alias('Illuminate\Routing\Controller', 'Khill\Lavacharts\Examples\Controllers\Controller');
} else {
    class_alias('Illuminate\Routing\Controller', 'Khill\Lavacharts\Examples\Controllers\Controller');
}
*/

abstract class Controller extends BaseController
{
    public function __construct()
    {
        View::addNamespace('examples', __DIR__.'/../Views');
    }
}