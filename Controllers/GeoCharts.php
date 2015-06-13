<?php

namespace App\Controllers;

class GeoChartController extends Controller
{
    public function index()
    {
        $popularity = Lava::DataTable();

        $popularity->addStringColumn('Country')
                   ->addNumberColumn('Popularity')
                   ->addRow(array('Germany', 200))
                   ->addRow(array('United States', 300))
                   ->addRow(array('Brazil', 400))
                   ->addRow(array('Canada', 500))
                   ->addRow(array('France', 600))
                   ->addRow(array('RU', 700));

        Lava::GeoChart('Popularity')
            ->setOptions(array(
              'datatable' => $popularity
            ));

        return View::make('geo');
    }
}