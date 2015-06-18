<?php

namespace App\Controllers;

class PieChartsController extends Controller
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

        Lava::PieChart('IMDB')
            ->setOptions(array(
              'datatable' => $reasons,
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

        return View::make('pie');
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

        Lava::DonutChart('IMDB')
            ->setOptions(array(
              'datatable' => $reasons,
              'title' => 'Reasons I visit IMDB'
            ));

        return View::make('donut');
    }
}