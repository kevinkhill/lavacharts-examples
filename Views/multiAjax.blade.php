<!DOCTYPE html>
<html lang="en">
<head>
    <meta charschartset="UTF-8">
    <title>Lavabench</title>
</head>

  <body>
    <button id="ajax">AJAX!</button>
    <br />
    <div id="chart1"></div>
    <div id="chart2"></div>
    <div id="chart3"></div>
    <div id="chart4"></div>

    {{ Lava::jsapi() }}

    @linechart('Temps', 'chart1')

    @areachart('Population', 'chart2')

    @piechart('IMDB', 'chart3')

    @piechart('IMDB2', 'chart4')


    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $('#ajax').click(function() {
          $.getJSON('http://localhost:8000/multiData', function (dataTableJson) {
            console.log(dataTableJson);

            lava.loadData('Temps', dataTableJson.temps, function (chart) {
              console.log('Temps loadData callback');
              console.log(chart);
            });

            lava.loadData('Population', dataTableJson.population, function (chart) {
              console.log('Population loadData callback');
              console.log(chart);
            });

            lava.loadData('IMDB', dataTableJson.imdb, function (chart) {
              console.log('IMDB loadData callback');
              console.log(chart);
            });

            lava.loadData('IMDB2', dataTableJson.imdb2, function (chart) {
              console.log('IMDB loadData callback');
              console.log(chart);
            });
          });
        });
      });
    </script>
</body>
</html>
