<?php namespace App\Http\Controllers;

use Lava;

class DashboardController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
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

		return view('dashboard/pie-dash');
	}

}
