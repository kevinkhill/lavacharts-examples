<!DOCTYPE html>
<html lang="en">
<head>
    <meta charschartset="UTF-8">
    <title>Lavabench</title>
    <script type="text/javascript">
      function readyCallback (event, chart) {
        console.log(event, chart);
      }

      function mouseOverCallback (event, chart) {
        console.log(event, chart);
      }

      function mouseOutCallback (event, chart) {
        console.log(event, chart);
      }

      function selectCallback (event, chart) {
        console.log(event, chart);
      }
    </script>
</head>
<body>
    <div id="chart" style="width:60%"></div>
    @linechart('Weather', 'chart')
</body>
</html>
