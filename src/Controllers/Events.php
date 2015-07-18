<?php

namespace Khill\Lavacharts\Examples\Controllers;

use Lava;
use View;

class Events extends Controller
{
    public function index()
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

        $linechart = Lava::LineChart('Space Title')
                          ->dataTable($temperatures)
                          ->title('Weather in October')
                          ->backgroundColor(Lava::BackgroundColor([
                                'fill' => '#CFCFCF',
                                'stroke' => '#0000CC',
                                'strokeWidth' => 4
                            ]))
                          ->events(array(
                            Lava::Ready('readyCallback'),
                            Lava::MouseOver('mouseOverCallback'),
                            Lava::MouseOut('mouseOutCallback'),
                            Lava::Select('selectCallback')
                          ));

        return View::make('examples::events');
    }
}