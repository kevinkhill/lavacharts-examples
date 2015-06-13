<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>

    <script type="text/javascript">
        function test (event, chart) {
            alert('Test');

            // Useful for using chart methods such as chart.getSelection();
            console.log(chart);
        }
    </script>

</head>

<body>
    <div id="chart"></div>

    @if(Lava::exists('LineChart', 'Space Title'))
        @linechart('Space Title', 'chart')
    @else
        <p>Chart not found!</p>
    @endif
</body>
</html>
