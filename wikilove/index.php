<html>
<head>
<title>WikiLove data dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>WikiLove data dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>
<h3>Unique daily messages</h3>
<div id="graphdiv"></div>
<p class="small">WikiLove data: <a href="d.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", 
filemtime('./d.csv')); ?></p>
</div>
<script type="text/javascript">
  g3 = new Dygraph(
    document.getElementById('graphdiv'),
    "./d.csv",
    {
      ylabel: 'WikiLove posts',
      legend: 'always',
      axisLabelFontSize: 12,
      rollPeriod: 7,
      showRoller: true,
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
	 'font-weight': 300,
         'text-align': 'left'
      },
      colors: ["rgba(50,50,200,0.6)", "rgba(200,50,50,0.6)"],
      labelsSeparateLines: true,
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)'     
    }
  );
</script>
</body>
</html>
