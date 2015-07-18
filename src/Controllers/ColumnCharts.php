<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class ColumnCharts extends Controller
{
    public function index()
    {
        $finances = Lava::DataTable();

        $finances->addColumn('date', 'Year')
                 ->addColumn('number', 'Sales')
                 ->addColumn('number', 'Expenses')
                 ->setDateTimeFormat('Y')
                 ->addRow(array('2004', 1000, 400))
                 ->addRow(array('2005', 1170, 460))
                 ->addRow(array('2006', 660, 1120))
                 ->addRow(array('2007', 1030, 54));

        Lava::ColumnChart('Finances')
            ->setOptions(array(
              'datatable' => $finances,
              'title' => 'Company Performance',
              'titleTextStyle' => Lava::TextStyle(array(
                'color' => '#eb6b2c',
                'fontSize' => 14
              ))
            ));

        return View::make('examples::column');
    }
}