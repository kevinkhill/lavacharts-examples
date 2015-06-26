<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class GaugeCharts extends Controller
{
    public function index()
    {
        $temps  = Lava::DataTable();

        $temps->addStringColumn('Type')
              ->addNumberColumn('Value')
              ->addRow(array('CPU', rand(0,100)))
              ->addRow(array('Case', rand(0,100)))
              ->addRow(array('Graphics', rand(0,100)));

        Lava::GaugeChart('Temps')
            ->setOptions(array(
                'datatable' => $temps,
                'width' => 400,
                'greenFrom' => 0,
                'greenTo' => 69,
                'yellowFrom' => 70,
                'yellowTo' => 89,
                'redFrom' => 90,
                'redTo' => 100,
                'majorTicks' => array(
                    'Safe',
                    'Critical'
                )
            ));

        return View::make('examples::gauge');
    }
}