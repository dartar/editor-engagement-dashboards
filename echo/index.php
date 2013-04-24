<html>
<head>
<title>Echo notifications dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>Echo notifications dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed hourly. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>


<!-- Daily events by group -->
<h3>Daily notifications by <a href="https://www.mediawiki.org/wiki/Echo/Feature_requirements#Notification_Groups">group</h3>
<div id="echo_group" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_group.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_group.csv')); ?></p>

<!-- Daily events by group % -->
<h3>Daily notifications by <a href="https://www.mediawiki.org/wiki/Echo/Feature_requirements#Notification_Groups">group</a> (percentage)</h3>
<div id="echo_group_perc" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_group_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_group_perc.csv')); ?></p>

<!-- Daily events by category -->
<h3>Daily notifications by <a href="https://www.mediawiki.org/wiki/Echo/Feature_requirements#Notification_Categories">category</a></h3>
<div id="echo_category" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_category.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_category.csv')); ?></p>


<!-- Daily events by category % -->
<h3>Daily notifications by <a href="https://www.mediawiki.org/wiki/Echo/Feature_requirements#Notification_Categories">category</a> (percentage)</h3>
<div id="echo_category_perc" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_category_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_category_perc.csv')); ?></p>

<!-- Daily events by user group -->
<h3>Daily notifications by user group</h3>
<div id="echo_user" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_user.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_user.csv')); ?></p>

<script type="text/javascript">

  echo_group = new Dygraph(
    document.getElementById('echo_group'),
    "./echo_group.csv",
    {
      ylabel:'Number of notifications',
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
       colors: [
	"#07AA33",
	"#333333", 
	"#AAAAAA", 
	"#CD3307",
	"#336699"
      ],
      visibility: [true, true, true, true, true],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  echo_group_perc = new Dygraph(
    document.getElementById('echo_group_perc'),
    "./echo_group_perc.csv",
    {
      ylabel:'% of daily notifications',
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
       colors: [
	"#07AA33",
	"#333333", 
	"#AAAAAA", 
	"#CD3307",
	"#336699"
      ],
      stackedGraph: true,
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  echo_category = new Dygraph(
    document.getElementById('echo_category'),
    "./echo_category.csv",
    {
      ylabel:'Number of notifications',
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
       colors: [
	"#CC6666",
	"#DD9999",
	"#B1B17B", 
	"#C1C199", 
	"#CD6607", 
	"#F6A03D",
	"#405774",
	"#6787B0",
	"#336644",
	"#339988" 
      ],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

echo_category_perc = new Dygraph(
    document.getElementById('echo_category_perc'),
    "./echo_category_perc.csv",
    {
      ylabel:'% of daily notifications',
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
       colors: [
	"#CC6666",
	"#DD9999",
	"#B1B17B", 
	"#C1C199", 
	"#CD6607", 
	"#F6A03D",
	"#405774",
	"#6787B0",
	"#336644",
	"#339988" 
      ],
      stackedGraph: true,
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  echo_user = new Dygraph(
    document.getElementById('echo_user'),
    "./echo_user.csv",
    {
      ylabel:'Number of notifications',
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
       colors: [
	"#CC6666",
	"#336644"
      ],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

</script>
</body>
</html>
