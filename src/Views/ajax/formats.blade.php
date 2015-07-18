<html>
<head>

<script type="text/javascript">
    function drawSales()
    {
        document.getElementById('focus').innerHTML = 'Store Sales';
        var jsonData = $.ajax({
            url: "getAllStoresWeekSales",
            type: 'POST',
            dataType: 'json',
            async: false
        }).responseText;
        //console.log(jsonData);
        jsonData = JSON.parse(jsonData);
        console.log(jsonData);
        
        //var tableData = JSON.parse(jsonData['table']);
        //var arrayLength = tableData.data.length;
 
        lava.loadData('weekSales', jsonData['graph'], function (chart) {
            console.log(chart);
        });
 
        //redraw the data table
        //table.fnClearTable();
        //for (i = 0; i < arrayLength; i++)
        //{
        //    $('#example').dataTable().fnAddData(tableData.data[i]);
        //}
    }
 
</script>
</head>
<body>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Store Numbers (The dates are the first day of the week)
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Focus
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#" onClick="drawSales()">Sales</a>
                            </li>
                            <li><a href="#" onclick="drawLabor()">Efficiency</a>
                            </li>
                            <li><a href="#" onclick="drawCOGS()">COGS</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#" onclick="comingSoon()">More Options</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="chart_div"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                        <tr>
                            <th>Store</th>
                            <th>Week Start</th>
                            <th id="focus">Sales</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    @columnchart('weekSales', 'chart_div')

<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
</body>
</html>