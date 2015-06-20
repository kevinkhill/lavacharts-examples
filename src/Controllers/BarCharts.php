<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class BarCharts extends Controller
{
    public function index()
    {
        $votes = Lava::DataTable();

        $votes->addStringColumn('Food')
              ->addNumberColumn('Votes')
              ->addRow(array('Tacos', rand(1000,5000)))
              ->addRow(array('Salad', rand(1000,5000)))
              ->addRow(array('Pizza', rand(1000,5000)))
              ->addRow(array('Apples', rand(1000,5000)))
              ->addRow(array('Fish', rand(1000,5000)));

        Lava::BarChart('Votes', $votes);

        return View::make('examples::bar');
    }
}
