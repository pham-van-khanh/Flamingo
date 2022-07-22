<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['timeline']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Team');
            data.addColumn('date', 'Season Start Date');
            data.addColumn('date', 'Season End Date');

            data.addRows([
                ['Baltimore Ravens', new Date(2000, 8, 5), new Date(2001, 1, 5)],
                ['New England Patriots', new Date(2001, 8, 5), new Date(2002, 1, 5)],
                ['Tampa Bay Buccaneers', new Date(2002, 8, 5), new Date(2003, 1, 5)],
                ['New England Patriots', new Date(2003, 8, 5), new Date(2004, 1, 5)],
                ['New England Patriots', new Date(2004, 8, 5), new Date(2005, 1, 5)],
                ['Pittsburgh Steelers', new Date(2005, 8, 5), new Date(2006, 1, 5)],
                ['Indianapolis Colts', new Date(2006, 8, 5), new Date(2007, 1, 5)],
                ['New York Giants', new Date(2007, 8, 5), new Date(2008, 1, 5)],
                ['Pittsburgh Steelers', new Date(2008, 8, 5), new Date(2009, 1, 5)],
                ['New Orleans Saints', new Date(2009, 8, 5), new Date(2010, 1, 5)],
                ['Green Bay Packers', new Date(2010, 8, 5), new Date(2011, 1, 5)],
                ['New York Giants', new Date(2011, 8, 5), new Date(2012, 1, 5)],
                ['Baltimore Ravens', new Date(2012, 8, 5), new Date(2013, 1, 5)],
                ['Seattle Seahawks', new Date(2013, 8, 5), new Date(2014, 1, 5)],
            ]);

            var options = {
                height: 450,
                timeline: {
                    groupByRowLabel: true
                }
            };

            var chart = new google.visualization.Timeline(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="chart_div" style="height: 180px;"></div>
</body>

</html>