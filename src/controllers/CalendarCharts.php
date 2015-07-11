<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class CalendarCharts extends Controller
{
    public function index()
    {
        $sales  = Lava::DataTable();

        $sales->addDateColumn('Date')
              ->addNumberColumn('Orders');

        foreach (range(2, 5) as $month) {
            for ($a=0; $a < 20; $a++) {
                $day = rand(1, 30);
                $sales->addRow(array("2014-${month}-${day}", rand(0,100)));
            }
        }

        Lava::CalendarChart('Sales')
            ->setOptions(array(
                'datatable' => $sales,
                'title' => 'Cars Sold',
                'unusedMonthOutlineColor' => Lava::Stroke(array(
                    'stroke'        => '#ECECEC',
                    'strokeOpacity' => 0.75,
                    'strokeWidth'   => 1
                )),
                'dayOfWeekLabel' => Lava::TextStyle(array(
                    'color' => '#4f5b0d',
                    'fontSize' => 16,
                    'italic' => true
                )),
                'noDataPattern' => Lava::Color(array(
                    'color' => '#DDD',
                    'backgroundColor' => '#11FFFF'
                )),
                'colorAxis' => Lava::ColorAxis(array(
                    'values' => array(0, 100),
                    'colors' => array('black', 'green')
                ))
            ));

        return View::make('examples::calendar');
    }
}
