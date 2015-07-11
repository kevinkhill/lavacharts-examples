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
    <br />
    <div id="chart2"></div>

    @linechart('Chart1', 'chart1')
    @linechart('Chart2', 'chart2')

    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $('#ajax').click(function() {
          $.getJSON('http://localhost:8000/getDataTableJson', function (dataTableJson) {
            console.log(dataTableJson);

            lava.loadData('Chart1', dataTableJson.data1, function (chart) {
              console.log('chart 1 loadData callback');
              console.log(chart);
            });

            lava.loadData('Chart2', dataTableJson.data2, function (chart) {
              console.log('chart 2 loadData callback');
              console.log(chart);
            });
          });
        });
      });
    </script>
  </body>
</html>
