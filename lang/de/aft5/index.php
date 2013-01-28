<html>
<head>
<title>Article Feedback v5 dashboard (DE)</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="header_fixed">
<h1>Article Feedback v5 dashboard (DE)</h1>
<h2 class="toggle"><strong>articles:</strong> [all articles] <a href="./articles/?p=Eichhörnchen">[single article]</a></h2>
</div>
<div id="wrapper_scrollable">
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<!-- Daily posts -->
<h3>Daily feedback volume (aggregate)</h3>
<div id="graphdiv_daily" style="width:900px; height:300px;"></div>
<p class="small">Daily feedback volume data: <a href="aft5_daily.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5_daily.csv')); ?></p>

<!-- Cumulative posts (aggregate) -->
<h3>Cumulative feedback volume (aggregate)</h3>
<div id="graphdiv_cum" style="width:900px; height:300px;"></div>
<p class="small">Cumulative feedback volume data: <a href="aft5_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5_cum.csv')); ?></p>

<!-- Unique articles commented -->
<h3>Daily number of unique articles commented</h3>
<div id="graphdiv_daily_unique_articles" style="width:900px; height:300px;"></div>
<p class="small">Unique articles commented data: <a href="aft5_daily_unique_articles.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5_daily_unique_articles.csv')); ?></p>

<!-- Feedback by user category -->
<h3>Daily posts by user category</h3>
<div id="graphdiv_daily_by_usertype" style="width:900px; height:300px;"></div>
<p class="small">Posts by user category data: <a href="aft5_daily_by_usertype.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5_daily_by_usertype.csv')); ?></p>

<!-- Feedback by user category (%) -->
<h3>Daily posts by user category (%)</h3>
<div id="graphdiv_daily_by_usertype_perc" style="width:900px; height:300px;"></div>
<p class="small">Posts by user category (%) data: <a href="aft5_daily_by_usertype_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5_daily_by_usertype_perc.csv')); ?></p>

<script type="text/javascript">
  g_cum = new Dygraph(
    document.getElementById('graphdiv_cum'),
    "./aft5_cum.csv",
    {
      ylabel: 'Unique AFT posts',
      axisLabelFontSize: 12,
      legend: 'always',
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
      colors: ["rgb(50,50,100)", "rgba(50,50,100,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g1);
          }
    }
  );

  g_daily = new Dygraph(
    document.getElementById('graphdiv_daily'),
    "./aft5_daily.csv",
    {
      ylabel: 'Unique AFT posts',
      axisLabelFontSize: 12,
      legend: 'always',
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
      colors: ["rgb(50,50,100)", "rgba(50,50,100,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g1);
          }
    }
  );

  g__daily_unique_articles = new Dygraph(
    document.getElementById('graphdiv_daily_unique_articles'),
    "./aft5_daily_unique_articles.csv",
    {
      ylabel: 'Unique articles commented',
      axisLabelFontSize: 12,
      legend: 'always',
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
      colors: ["rgba(200,50,50,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false
    }
  );

  g_daily_by_usertype = new Dygraph(
    document.getElementById('graphdiv_daily_by_usertype'),
    "./aft5_daily_by_usertype.csv",
    {
      ylabel: 'Unique daily posts',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 250,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      showRangeSelector: false
    }
  );


 g_daily_by_usertype_perc = new Dygraph(
    document.getElementById('graphdiv_daily_by_usertype_perc'),
    "./aft5_daily_by_usertype_perc.csv",
    {
      ylabel:'% of daily posts',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 250,
      labelsDivStyles: {
         'padding':'5px',
	 'opacity':'0.7',
  	 'filter':'alpha(opacity=70)',
         'backgroundColor': 'white',
         'font-weight': 300,
         'text-align': 'left'
      },
      stackedGraph: true,
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false
    }
  );
</script>
</div>
</body>
</html>
