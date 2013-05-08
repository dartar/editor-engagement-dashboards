<html>
<head>
<title>Echo notifications dashboard (EN)</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>Echo notifications dashboard (EN)</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>


<!-- Daily events -->
<h3>Daily notifications</h3>
<div id="echo_all" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_all.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_all.csv')); ?></p>

<!-- Cumulative events -->
<h3>Total notifications</h3>
<div id="echo_all_cum" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_all_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_all_cum.csv')); ?></p>

<!-- Daily events by category -->
<h3>Daily notifications by <a href="https://www.mediawiki.org/wiki/Echo/Feature_requirements#Notification_Categories">category</a></h3>
<p class="small"><strong>Category:</strong>
<input type=checkbox id="0" checked onClick="change(this,echo_category)">
<label for="0">talk</label>
<input type=checkbox id="1" checked onClick="change(this,echo_category)">
<label for="1">thank</label>
<input type=checkbox id="2" checked onClick="change(this,echo_category)">
<label for="2">mention</label>
<input type=checkbox id="3" checked onClick="change(this,echo_category)">
<label for="3">link</label>
<input type=checkbox id="4" checked onClick="change(this,echo_category)">
<label for="4">page review</label>
<input type=checkbox id="5" checked onClick="change(this,echo_category)">
<label for="5">revert</label>
<input type=checkbox id="6" checked onClick="change(this,echo_category)">
<label for="6">system</label>
</p>
<div id="echo_category" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_category.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_category.csv')); ?></p>


<!-- Daily events by category % -->
<h3>Daily notifications by <a href="https://www.mediawiki.org/wiki/Echo/Feature_requirements#Notification_Categories">category</a> (percentage)</h3>
<div id="echo_category_perc" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_category_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_category_perc.csv')); ?></p>

<!-- Cumulative events by category % -->
<h3>Total notifications by <a href="https://www.mediawiki.org/wiki/Echo/Feature_requirements#Notification_Categories">category</a> (percentage)</h3>
<div id="echo_category_cum" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_category_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_category_cum.csv')); ?></p>

<!-- Daily events by user group -->
<h3>Daily notifications by user group</h3>
<p class="small">Registered users with 0 edits at the time of the notification are considered as "new users".</p>
<div id="echo_user" style="width:900px; height:300px;"></div>
<p class="small">Data: <a href="echo_user.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./echo_user.csv')); ?></p>

<script type="text/javascript">

  echo_all = new Dygraph(
    document.getElementById('echo_all'),
    "./echo_all.csv",
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
        "#336699"
      ],
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  echo_all_cum = new Dygraph(
    document.getElementById('echo_all_cum'),
    "./echo_all_cum.csv",
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
        "#336699"
      ],
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
      visibility: [true, true, true, true, true, true, true, true, true, true],
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
      rollPeriod: 24,
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

  echo_category_cum = new Dygraph(
    document.getElementById('echo_category_cum'),
    "./echo_category_cum.csv",
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
      visibility: [true, true, true, true, true, true, true, true, true, true],
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

 setStatus(pl);

 function setStatus(pl) {
    document.getElementById("visibility").innerHTML = pl.visibility().toString();
 }

 function change(el,pl) {
   pl.setVisibility(parseInt(el.id), el.checked);
   setStatus(pl);
 }
</script>
</body>
</html>
