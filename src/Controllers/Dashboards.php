<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class Dashboards extends Controller
{
	public function oneToOne()
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

	    $pieChart = Lava::PieChart('Stuff', $datatable, [
            'width' => 300,
            'height' => 300,
            'chartArea' => Lava::ChartArea([
                'left' => 15,
                'top' => 15
            ]),
            'pieSliceText' => 'value'
        ]);

	    $filter  = Lava::NumberRangeFilter($datatable->getColumnLabel(1));
	    $control = Lava::ControlWrapper($filter, 'control');
	    $chart   = Lava::ChartWrapper($pieChart, 'chart');

	    $dash = Lava::Dashboard('Donuts')
	                 ->bind($control, $chart);

		return View::make('examples::dashboards/one-to-one');
	}

	public function manyToOne()
	{
	    $datatable = Lava::DataTable();
	    $datatable->addNumberColumn('Age');
	    $datatable->addNumberColumn('Salary');

	    for ($i=0; $i < 50; $i++) {
	        $datatable->addRow([
	            rand(35,50),
	            rand(40,100)*1000
	        ]);
	    }

	    $scatterChart = Lava::ScatterChart('AgeSalary', $datatable);

	    $ageFilter    = Lava::NumberRangeFilter($datatable->getColumnLabel(0));
	    $salaryFilter = Lava::NumberRangeFilter($datatable->getColumnLabel(1));

	    $ageSlider    = Lava::ControlWrapper($ageFilter, 'age-control');
	    $salarySlider = Lava::ControlWrapper($salaryFilter, 'salary-control');

	    $scatterChart  = Lava::ChartWrapper($scatterChart, 'chart');

	    $dash = Lava::Dashboard('SalaryAge');
	    $dash->bind([$ageSlider, $salarySlider], $scatterChart);

	    return View::make('examples::dashboards/many-to-one');
	}

}
