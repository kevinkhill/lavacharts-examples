<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class ComboCharts extends Controller
{
    public function index()
    {
        $finances = Lava::DataTable();

        $finances->addDateColumn('Year')
                 ->addNumberColumn('Sales')
                 ->addNumberColumn('Expenses')
                 ->addNumberColumn('Net Worth')
                 ->addRow(array('2009-1-1', 1100, 490, 1324))
                 ->addRow(array('2010-1-1', 1000, 400, 1524))
                 ->addRow(array('2011-1-1', 1400, 450, 1351))
                 ->addRow(array('2012-1-1', 1250, 600, 1243))
                 ->addRow(array('2013-1-1', 1100, 550, 1462));

        Lava::ComboChart('Finances')
            ->setOptions(array(
              'datatable' => $finances,
              'title' => 'Company Performance',
              'titleTextStyle' => Lava::TextStyle(array(
                'color' => 'rgb(123, 65, 89)',
                'fontSize' => 16
              )),
              'legend' => Lava::Legend(array(
                'position' => 'in'
              )),
              'seriesType' => 'bars',
              'series' => array(
                2 => Lava::Series(array(
                  'type' => 'line'
                ))
              )
            ));

        return View::make('examples::combo');
    }
}