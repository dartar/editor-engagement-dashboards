<html>
<head>
<title>Article Feedback data dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>Article Feedback data dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>
<h3>Unique daily ratings</h3>
<div id="graphdiv"></div>
<p class="small">LEGEND</p>
<p class="small">
<strong class="boxed">A</strong>: 3k articles sample<br />
<strong class="boxed">B</strong>: 100k articles ramp-up<br />
<strong class="boxed">C</strong>: global deployment to enwiki</p>
<p class="small">Daily article ratings data: <a href="d.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d.csv')); ?></p>
<script type="text/javascript">
   var labels = [
        {
          series: "all users",
          x: "2011-07-22",
          shortText: "C",
          text: "Global deployment"
        },
        {
          series: "all users",
          x: "2011-05-10",
          shortText: "B",
          text: "100K articles ramp-up"
        },
        {
          series: "all users",
          x: "2011-03-25",
          shortText: "A",
          text: "3K articles ramp-up"
        }
      ];

  g3 = new Dygraph(
    document.getElementById('graphdiv'),
    "./d.csv",
    {
      ylabel: 'Unique ratings',
      legend: 'always',
      axisLabelFontSize: 12,
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels);
          }
    }
  );

</script>
</body>
</html>
