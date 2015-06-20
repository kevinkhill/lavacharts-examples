<?php namespace App\Http\Controllers;

use Lava;
use App\Models\TestModel;

class DataTablePlusController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function csv()
	{
	    $datatable = Lava::DataTable();
	    $datatable->parseCsvFile(__DIR__.'/donuts.csv', ['string', 'number']);

		//$datatable->toCsv('out.csv');die;

	    Lava::PieChart('Donuts', $datatable)
	                ->setOptions([
	                    'width' => 300,
	                    'height' => 300,
	                    'chartArea' => Lava::ChartArea([
	                        'left' => 15,
	                        'top' => 15
	                    ]),
	                    'pieSliceText' => 'value'
	                ]);

		return view('datatableplus/csv');
	}

	public function download()
	{
	    $datatable = Lava::DataTable();
	    $datatable->parseCsvFile(__DIR__.'/donuts.csv', ['string', 'number']);
		$datatable->toCsv('out.csv');
	}

	public function eloquent()
	{
		$temps = TestModel::get();

		$datatable = Lava::DataTable();
		$datatable->addColumns([
			['date', 'Dates','date'],
			['number', 'Temperature', 'temp']
		]);
		$datatable->addRowsFromCollection($temps);
		
		Lava::LineChart('Temps', $datatable);

		return view('datatableplus/eloquent');
	}

}
