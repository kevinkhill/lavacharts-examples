<!DOCTYPE html>
<html lang="en">
<head>
    <meta charschartset="UTF-8">
    <title>Lavabench</title>
</head>

  <body>
    <div id="chart1"></div>
    <div id="chart2"></div>
    <div id="chart3"></div>
    <div id="chart4"></div>

    {{ Lava::jsapi() }}

    @linechart('Temps', 'chart1')

    @areachart('Population', 'chart2')

    @piechart('IMDB', 'chart3')

    @piechart('IMDB2', 'chart4')
</body>
</html>
