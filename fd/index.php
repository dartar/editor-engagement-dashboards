<html>
<head>
<title>FeedbackDashboard data dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>FeedbackDashboard data dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<!-- Daily responses -->
<h3>Daily volume of responses (aggregate)</h3>
<div id="graphfd" style="width:900px; height:300px;"></div>
<p class="small">Daily number of FeedbackDashboard responses: <a href="fd.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd.csv')); ?></p>

<!--% of daily posts responded -->
<h3>Daily % of mood posts responded</h3>
<div id="graphfd_r_perc" style="width:900px; height:300px;"></div>
<p class="small"> Percentage of mood posts responded: <a href="fd_r_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_r_perc.csv')); ?><br />
Total number of daily mood posts and daily responses: <a href="fd_r.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_r.csv')); ?></p>

<!-- Avg minutes to response -->
<h3>Average response time (minutes)</h3>
<div id="graphfd_rt" style="width:900px; height:300px;"></div>
<p class="small">Daily average response time of FeedbackDashboard responses: <a href="fd_rt.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_rt.csv')); ?></p>

<!-- Daily responses by type -->
<h3>Daily volume of responses (by mood type)</h3>
<div id="graphfd_type_count" style="width:900px; height:300px;"></div>
<p class="small">Daily number of FeedbackDashboard responses by type: <a href="fd_type_count.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_type_count.csv')); ?></p>

<!-- Cumulative responses -->
<h3>Cumulative number of responses (aggregate)</h3>
<div id="graphfd_cum" style="width:900px; height:300px;"></div>
<p class="small">Cumulative number of FeedbackDashboard responses: <a href="fd_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_cum.csv')); ?></p>

<!--Cumulative % of posts responded -->
<h3>Cumulative % of mood posts responded</h3>
<div id="graphfd_r_cum_perc" style="width:900px; height:300px;"></div>
<p class="small"> Cumulative percentage of mood posts responded: <a href="fd_r_cum_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_r_cum_perc.csv')); ?><br />
Cumulative number of mood posts and responses: <a href="fd_r_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_r_cum.csv')); ?></p>

<!-- Cumulative responses by type -->
<h3>Cumulative number of responses (by mood type)</h3>
<div id="graphfd_type_cum" style="width:900px; height:300px;"></div>
<p class="small">Cumulative number of FeedbackDashboard responses by type: <a href="fd_type_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_type_cum.csv')); ?></p>

<!--% of daily responses by type -->
<h3>Daily % of responses by mood type</h3>
<div id="graphfd_type" class="smallgraphdiv"></div>
<p class="small"> Responses by mood type (daily %) : <a href="fd_type.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fd_type.csv')); ?></p>

<script type="text/javascript">
  gfd = new Dygraph(
    document.getElementById('graphfd'),
    "./fd.csv",
    {
      ylabel: 'Daily responses',
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
      colors: ["rgb(50,50,100)"],
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)'
    }
  );

 gfd_type_count = new Dygraph(
    document.getElementById('graphfd_type_count'),
    "./fd_type_count.csv",
    {
      ylabel: 'Daily responses',
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
      colors: ["rgb(50,200,50)", "rgb(200,50,50)", "rgb(200,180,50)"],
      showRangeSelector: false
    }
  ); 

  gfd_rt = new Dygraph(
    document.getElementById('graphfd_rt'),
    "./fd_rt.csv",
    {
      ylabel: 'Average response time (minutes)',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 300,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'  
      },
      labelsSeparateLines: true,
      colors: ["rgb(50,50,100)"],
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)'
    }
  );

  gfd_cum = new Dygraph(
    document.getElementById('graphfd_cum'),
    "./fd_cum.csv",
    { 
      ylabel: 'Cumulative number of responses',
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
      colors: ["rgb(50,50,100)"],
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)'
    }
  );

 gfd_type_cum = new Dygraph(
    document.getElementById('graphfd_type_cum'),
    "./fd_type_cum.csv",
    {
      ylabel: 'Cumulative number of responses',
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
      colors: ["rgb(50,200,50)", "rgb(200,50,50)", "rgb(200,180,50)"],
      showRangeSelector: false 
    }
  );
  

 gfd_type = new Dygraph(
    document.getElementById('graphfd_type'),
    "./fd_type.csv",
    {
      ylabel: '% of daily responses',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 7,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 200,
      labelsDivStyles: {                                               
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      colors: ["rgb(50,200,50)", "rgb(200,50,50)", "rgb(200,180,50)"],
      showRangeSelector: false
    }
  );

 gfd_r_perc = new Dygraph(
    document.getElementById('graphfd_r_perc'),
    "./fd_r_perc.csv",
    {
      ylabel: '% of daily posts responded',
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
      showRangeSelector: false
    }
  );

 gfd_r_cum_perc = new Dygraph(
    document.getElementById('graphfd_r_cum_perc'),
    "./fd_r_cum_perc.csv",
    {
      ylabel: '% of posts responded',
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
      showRangeSelector: false
    }
  );

</script>
</body>
</html>
