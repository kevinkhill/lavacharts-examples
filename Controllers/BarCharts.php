<?php

namespace App\Controllers;

class BarChartController extends Controller
{
    public function index()
    {
        $votes  = Lava::DataTable();

        $votes->addStringColumn('Food')
              ->addNumberColumn('Votes')
              ->addRow(array('Tacos', rand(1000,5000)))
              ->addRow(array('Salad', rand(1000,5000)))
              ->addRow(array('Pizza', rand(1000,5000)))
              ->addRow(array('Apples', rand(1000,5000)))
              ->addRow(array('Fish', rand(1000,5000)));

        Lava::BarChart('Votes')
            ->setOptions(array(
                'datatable' => $votes
            ));

        return View::make('bar');
    }
}
