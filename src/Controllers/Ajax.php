<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class Ajax extends Controller
{
    public function index()
    {
        $temperatures1 = Lava::DataTable();
        $temperatures2 = Lava::DataTable();

        $temperatures1->addDateColumn('Date')
                    ->addNumberColumn('Max Temp')
                    ->addNumberColumn('Mean Temp')
                    ->addNumberColumn('Min Temp');

        $temperatures2->addDateColumn('Date')
                    ->addNumberColumn('Max Temp')
                    ->addNumberColumn('Mean Temp')
                    ->addNumberColumn('Min Temp');

        Lava::LineChart('Chart1')
          ->dataTable($temperatures1)
          ->title('Weather in October');

        Lava::LineChart('Chart2')
          ->dataTable($temperatures2)
          ->title('Weather in November');

        return View::make('examples::ajaxTest');
    }

    public function getDataTableJson()
    {
        $tz = 'America/Los_Angeles';

        $temperatures1 = Lava::DataTable($tz);
        $temperatures2 = Lava::DataTable($tz);

        $temperatures1->addDateColumn('Date')
                    ->addNumberColumn('Max Temp')
                    ->addNumberColumn('Mean Temp')
                    ->addNumberColumn('Min Temp');

        foreach(range(1, 30) as $day) {
          $temperatures1->addRow(array('2014-10-'.$day, rand(50,90), rand(50,90), rand(50,90)));
        }

        $temperatures2->addDateColumn('Date')
                    ->addNumberColumn('Max Temp')
                    ->addNumberColumn('Mean Temp')
                    ->addNumberColumn('Min Temp');

        foreach(range(1, 30) as $day) {
          $temperatures2->addRow(array('2014-11-'.$day, rand(50,90), rand(50,90), rand(50,90)));
        }

        return array(
          'data1' => $temperatures1->toJson(),
          'data2' => $temperatures2->toJson()
        );
    }


    public function multi()
    {
        $reasons = Lava::DataTable();
        $population = Lava::DataTable();
        $temperatures = Lava::DataTable();

        $temperatures->addDateColumn('Date')
                   ->addNumberColumn('Max Temp')
                   ->addNumberColumn('Mean Temp')
                   ->addNumberColumn('Min Temp');

               $population->addColumn('date', 'Year', 'date')
                   ->addColumn('number', 'Number of People', 'pop');
          $reasons->addColumn('string', 'Reasons')
                  ->addColumn('number', 'Percent');

        Lava::LineChart('Temps')
            ->dataTable($temperatures)
            ->title('Weather in October');


        Lava::AreaChart('Population')
           ->setOptions(array(
                 'datatable' => $population,
                 'title' => 'Population Growth',
                 'legend' => Lava::Legend(array(
                       'position' => 'in'
                 ))
               ));


         Lava::PieChart('IMDB')
              ->setOptions(array(
                'datatable' => $reasons,
                'title' => 'Reasons I visit IMDB',
                'is3D' => true,
                'slices' => array(
                  Lava::Slice(array(
                    'offset' => 0.2
                  )),
                  Lava::Slice(array(
                    'offset' => 0.25
                  )),
                  Lava::Slice(array(
                    'offset' => 0.3
                  ))
                )
              ));

          Lava::PieChart('IMDB2')
              ->setOptions(array(
                'datatable' => $reasons,
                'title' => 'Reasons I visit IMDB',
                'is3D' => true,
                'slices' => array(
                  Lava::Slice(array(
                    'offset' => 0.2
                  )),
                  Lava::Slice(array(
                    'offset' => 0.25
                  )),
                  Lava::Slice(array(
                    'offset' => 0.3
                  ))
                )
              ));

        return View::make('examples::multiAjax');
    }

    function getMultiData()
    {
        $temperatures = Lava::DataTable();

        $temperatures->addDateColumn('Date')
                   ->addNumberColumn('Max Temp')
                   ->addNumberColumn('Mean Temp')
                   ->addNumberColumn('Min Temp')
                   ->addRow(array('2014-10-1', 67, 65, 62))
                   ->addRow(array('2014-10-2', 68, 65, 61))
                   ->addRow(array('2014-10-3', 68, 62, 55))
                   ->addRow(array('2014-10-4', 72, 62, 52))
                   ->addRow(array('2014-10-5', 61, 54, 47))
                   ->addRow(array('2014-10-6', 70, 58, 45))
                   ->addRow(array('2014-10-7', 74, 70, 65))
                   ->addRow(array('2014-10-8', 75, 69, 62))
                   ->addRow(array('2014-10-9', 69, 63, 56))
                   ->addRow(array('2014-10-10', 64, 58, 52))
                   ->addRow(array('2014-10-11', 59, 55, 50))
                   ->addRow(array('2014-10-12', 65, 56, 46))
                   ->addRow(array('2014-10-13', 66, 56, 46))
                   ->addRow(array('2014-10-14', 75, 70, 64))
                   ->addRow(array('2014-10-15', 76, 72, 68))
                   ->addRow(array('2014-10-16', 71, 66, 60))
                   ->addRow(array('2014-10-17', 72, 66, 60))
                   ->addRow(array('2014-10-18', 63, 62, 62));

        $population = Lava::DataTable();

               $population->addColumn('date', 'Year', 'date')
                   ->addColumn('number', 'Number of People', 'pop')
                   ->addRow(array('2006', 623452))
                   ->addRow(array('2007', 685034))
                   ->addRow(array('2008', 716845))
                   ->addRow(array('2009', 757254))
                   ->addRow(array('2010', 778034))
                   ->addRow(array('2011', 792353))
                   ->addRow(array('2012', 839657))
                   ->addRow(array('2013', 842367))
                   ->addRow(array('2014', 873490));

        $reasons = Lava::DataTable();

          $reasons->addColumn('string', 'Reasons')
                  ->addColumn('number', 'Percent')
                  ->addRow(array('Check Reviews', 5))
                  ->addRow(array('Watch Trailers', 2))
                  ->addRow(array('See Actors Other Work', 4))
                  ->addRow(array('Settle Argument', 89));

        return [
            'temps' => $temperatures->toJson(),
            'population' => $population->toJson(),
            'imdb' => $reasons->toJson(),
            'imdb2' => $reasons->toJson()
        ];
    }
}
