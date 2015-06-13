<?php

namespace App\Controllers;

class DataTablePlusController extends Controller
{
    public function csv()
    {
        $temperatures = Lava::DataTable();

        $temperatures->setDateTimeFormat('d/m/Y')
                     ->parseCsv(__DIR__ . '/weather.csv', ['date', 'number']);

        Lava::LineChart('Weather')
            ->dataTable($temperatures)
            ->title('Weather in January');

        return View::make('csv');
    }

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

    return View::make('timeofday');
}