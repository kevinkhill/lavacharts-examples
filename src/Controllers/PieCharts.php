<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class PieCharts extends Controller
{
    public function index()
    {
        $reasons = Lava::DataTable();

        $reasons->addColumn('string', 'Reasons')
                ->addColumn('number', 'Percent')
                ->addRow(array('Check Reviews', 5))
                ->addRow(array('Watch Trailers', 2))
                ->addRow(array('See Actors Other Work', 4))
                ->addRow(array('Settle Argument', 89));

        Lava::PieChart('IMDB', $reasons)
            ->setOptions(array(
              'title' => 'Reasons I visit IMDB',
              'is3D' => true,
              'slices' => array(
                Lava::Slice(array(
                  'offset' => 0.2
                )),
                Lava::Slice(array(
                  'offset' => 0.25
                )),
                Lava::Slice(array(
                  'offset' => 0.3
                ))
              )
            ));

        return View::make('examples::pie');
    }

    public function donut()
    {
        $reasons = Lava::DataTable();

        $reasons->addColumn('string', 'Reasons')
                ->addColumn('number', 'Percent')
                ->addRow(array('Check Reviews', 5))
                ->addRow(array('Watch Trailers', 2))
                ->addRow(array('See Actors Other Work', 4))
                ->addRow(array('Settle Argument', 89));

        Lava::DonutChart('IMDB', $reasons)->title('Reasons I visit IMDB');

        return View::make('examples::donut');
    }
}