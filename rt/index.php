<html>
<head>
<title>Revision tag dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>Revision tag dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<!-- Daily revisions -->
<h3>Tagged revisions</h3>
<p class="small" style="width:900px">Tagged revisions in the last 30 days</p>
<div id="rt_daily" style="width:900px; height:300px;"></div>
<p class="small">Tagged revision data: <a href="rt_daily.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./rt_daily.csv')); ?></p>

<script type="text/javascript">
var labels = [
        {
          series: "getting started",
          x: "2013-01-24",
          shortText: "A",
          text: "Split test start"
        },
         {
          series: "getting started",
          x: "2013-01-31",
          shortText: "B",
          text: "Split test end"
        }
];

rt_daily = new Dygraph(
    document.getElementById('rt_daily'),
    "./rt_daily.csv",
    {
      ylabel:'Number of revisions',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 150,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
       colors: [
	"#6666CC",
        "#CC6666",
	"#66CC66"
      ],
      logscale: true,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels);
          }
    }
  );
</script>
</div>
</body>
</html>
