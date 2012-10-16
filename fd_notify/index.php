<html>
<head>
<title>Feedback response notification dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>Feedback response notification dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<!-- Daily posts by email status -->
<h3>Daily number of moodbar posts by email registration status</h3>
<div id="graphdiv_mbf_daily_email_status" style="width:900px; height:300px;"></div>
<p class="small">Moodbar posts by email registration status data: <a href="mbf_daily_email_status.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./mbf_daily_email_status.csv')); ?></p>

<!-- Daily percentage of posts by email status -->
<h3>Daily percentage of moodbar posts by email registration status</h3>
<div id="graphdiv_mbf_daily_perc_email_status" class="smallgraphdiv"></div>
<p class="small">Daily percentage of posts by email registration status data: <a href="mbf_daily_perc_email_status.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./mbf_daily_perc_email_status.csv')); ?></p>

<!-- Cumulative posts by email status -->
<h3>Cumulative number of moodbar posts by email registration status</h3>
<div id="graphdiv_mbf_cum_email_status" style="width:900px; height:300px;"></div>
<p class="small">Cumulative posts by email registration status data: <a href="mbf_cum_email_status.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./mbf_cum_email_status.csv')); ?></p>

<!-- Daily mailable posts -->
<h3>Daily number of mailable moodbar posts</h3>
<div id="graphdiv_mbf_daily_email_status_by_type" style="width:900px; height:300px;"></div>
<p class="small">Mailable moodbar post data: <a href="mbf_daily_email_status_by_type.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./mbf_daily_email_status_by_type.csv')); ?></p>

</div>
<script type="text/javascript">
  g_mbf_daily_email_status = new Dygraph(
    document.getElementById('graphdiv_mbf_daily_email_status'),
    "./mbf_daily_email_status.csv",
    {
      ylabel: 'Posts by email registration status',
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
      colors: ["rgba(50,50,50,0.3)","rgba(200,50,50,0.4)","rgba(50,50,200,0.6)"],
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
          }
    }
  );

  g_mbf_daily_perc_email_status = new Dygraph(
    document.getElementById('graphdiv_mbf_daily_perc_email_status'),
    "./mbf_daily_perc_email_status.csv",
    {
      ylabel: 'Posts (%)',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 30,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      colors: ["rgba(50,50,50,0.3)","rgba(200,50,50,0.4)","rgba(50,50,200,0.6)"],
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
          }
    }
  );

  g_mbf_cum_email_status = new Dygraph(
    document.getElementById('graphdiv_mbf_cum_email_status'),
    "./mbf_cum_email_status.csv",
    {
      ylabel: 'Posts by email registration status',
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
      colors: ["rgba(50,50,50,0.3)","rgba(200,50,50,0.4)","rgba(50,50,200,0.6)"],
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
          }
    }
  );

g_mbf_daily_email_status_by_type = new Dygraph(
    document.getElementById('graphdiv_mbf_daily_email_status_by_type'),
    "./mbf_daily_email_status_by_type.csv",
    {
      ylabel: 'Mailable posts',
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

</script>
</body>
</html>
