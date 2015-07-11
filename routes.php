<?php

use Carbon\Carbon;

Route::group(['namespace' => '\Khill\Lavacharts\Examples\Controllers'], function()
{
    Route::get('area',     'AreaCharts@index');
    Route::get('calendar', 'CalendarCharts@index');
    Route::get('column',   'ColumnCharts@index');
    Route::get('combo',    'ComboCharts@index');
    Route::get('events',   'Events@index');
    Route::get('gauge',    'GaugeCharts@index');
    Route::get('geo',      'GeoCharts@index');
    Route::get('line',     'LineCharts@index');
    Route::get('pie',      'PieCharts@index');
    Route::get('donut',    'PieCharts@donut');
    Route::get('scatter',  'ScatterCharts@index');

    Route::group(['prefix' => 'ajax'], function()
    {
        Route::get('/',              'AjaxCharts@index');
        Route::get('getData',        'AjaxCharts@getData');
        Route::get('multi',          'AjaxCharts@multi');
        Route::get('getMultiData',   'AjaxCharts@getMultiData');
        Route::get('formats',        'AjaxCharts@formats');
        Route::get('getFormatsData', 'AjaxCharts@getFormatsData');
    });

    Route::group(['prefix' => 'datatables'], function()
    {
        Route::group(['prefix' => 'csv'], function()
        {
            Route::get('line',  'Datatables@csvLine');
            Route::get('pie',   'Datatables@csvPie');
            Route::get('download',  'Datatables@download');
        });
        
        Route::get('eloquent',  'Datatables@eloquent');
        Route::get('timeofday', 'Datatables@timeofday');
    });

    Route::group(['prefix' => 'dashboards'], function()
    {
        Route::get('pie', 'Dashboards@pie');
    });
});
