<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class DataTables extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->weatherData = realpath(__DIR__ . '/../../csv/weather.csv');
        $this->donutsData = realpath(__DIR__ . '/../../csv/donuts.csv');
    }

    public function timeofday()
    {
        $emails  = Lava::DataTable();

        $emails->addColumn('timeofday', 'When')
              ->addNumberColumn('Emails')
              ->addRow([[3,21,0], rand(1,50)])
              ->addRow([[3,45,0], rand(1,50)])
              ->addRow([[4,12,0], rand(1,50)])
              ->addRow([[4,50,0], rand(1,50)])
              ->addRow([[5,30,0], rand(1,50)]);

        Lava::BarChart('Emails')
            ->setOptions(array(
                'datatable'   => $emails,
                'orientation' => 'vertical'
            ));

        return View::make('examples::timeofday');
    }

    public function csvLine()
    {
        $temperatures = Lava::DataTable();

        $temperatures->setDateTimeFormat('d/m/Y')
                     ->parseCsv($this->weatherData, ['date', 'number']);

        Lava::LineChart('Weather')
            ->dataTable($temperatures)
            ->title('Weather in January');

        return View::make('examples::datatables/csvLine');
    }

    public function csvPie()
    {
        $donutsData = realpath(__DIR__ . '/../../csv/donuts.csv');

        $datatable = Lava::DataTable();
        $datatable->parseCsvFile($this->donutsData, ['string', 'number']);

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

      return View::make('examples::datatables/csvPie');
    }

    public function download()
    {
        $datatable = Lava::DataTable();
        $datatable->parseCsvFile($this->donutsData, ['string', 'number']);
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

        return View::make('examples::datatables/eloquent');
    }
}