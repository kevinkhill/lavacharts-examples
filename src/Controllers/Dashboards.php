<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class Dashboards extends Controller
{
	public function pie()
	{
	    $datatable = Lava::DataTable();
	    $datatable->addStringColumn('Name');
	    $datatable->addNumberColumn('Donuts Eaten');
	    $datatable->addRows([
	      ['Michael', 5],
	      ['Elisa', 7],
	      ['Robert', 3],
	      ['John', 2],
	      ['Jessica', 6],
	      ['Aaron', 1],
	      ['Margareth', 8]
	    ]);

	    $pieChart = Lava::PieChart('Stuff', $datatable)
	                ->setOptions([
	                    'width' => 300,
	                    'height' => 300,
	                    'chartArea' => Lava::ChartArea([
	                        'left' => 15,
	                        'top' => 15
	                    ]),
	                    'pieSliceText' => 'value'
	                ]);

	    $filter  = Lava::NumberRangeFilter($datatable->getColumnLabel(1));
	    $control = Lava::ControlWrapper($filter, 'programmatic_control_div');
	    $chart   = Lava::ChartWrapper($pieChart, 'programmatic_chart_div');

	    $dash = Lava::Dashboard('MyDash')
	                 ->bind('MyPie', $control, $chart);

		return view('examples::dashboard/pie-dash');
	}

}
