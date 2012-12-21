<html>
<head>
<title>New user registrations</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>New user registrations</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<h3>New accounts per day</h3>
<div class="plot" id="gd"></div>
<p class="small">Daily registration data: <a href="reg2_daily.csv">csv</a><br />
Data available since 2010-01-01<br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./reg2_daily.csv')); ?> (plot refreshed daily)</p>

<h3>New accounts per hour, year to year comparison</h3>
<p class="small"><strong>Show Series:</strong>
<input type=checkbox id="0" checked onClick="change(this)">
<label for="0">2007</label> 
<input type=checkbox id="1" checked onClick="change(this)">
<label for="1">2008</label>
<input type=checkbox id="2" checked onClick="change(this)">
<label for="2">2009</label>
<input type=checkbox id="3" checked onClick="change(this)">
<label for="3">2010</label>
<input type=checkbox id="4" checked onClick="change(this)">
<label for="4">2011</label>
<input type=checkbox id="5" checked onClick="change(this)">
<label for="5">2012</label>
</p>
<div class="plot" id="g0"></div>
<p class="small">Y2Y hourly registration data: <a href="reg_y2y.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./reg_y2y.csv')); ?> (plot refreshed hourly)</p>

<h3>Active accounts</h3>
<p class="small">LIVE ACCOUNTS: 1+ click on the edit button on a ns0 article.<br />EDITING ACCOUNTS: 1+ lifetime edits</p>
<div class="plot" id="g1"></div>
<p class="small">Daily registration data: <a href="reg2_combo.csv">csv</a><br />
Data available since 2011-07-25<br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./reg2_combo.csv')); ?> (plot refreshed daily)</p>

<h3>Active accounts (%)</h3>
<p class="small">LIVE ACCOUNTS: 1+ click on the edit button on a ns0 article.<br />EDITING ACCOUNTS: 1+ lifetime edits</p>
<div class="plot" id="g2"></div>
<p class="small">Daily live account rate data: <a href="reg2_rate_combo.csv">csv</a><br />
Data available since 2011-07-25<br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./reg2_rate_combo.csv')); ?> (plot refreshed daily)</p>

<h3>Daily new and active accounts, year-to-year change (%)</h3>
<div class="plot" id="g3"></div>
<p class="small">y2y new account data: <a href="reg2_alive_y2y.csv">csv</a><br />
Data available since 2011-07-25<br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./reg2_alive_y2y.csv')); ?> (plot refreshed daily)</p>

<h3>New accounts by daily traffic</h3>
<div class="plot" id="g4"></div>
<p class="small">New accounts by page view data: <a href="reg2_new_by_traffic.csv">csv</a><br />
Data available since 2010-01-01<br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./reg2_new_by_traffic.csv')); ?> </p>

<h3>New accounts vs page views (x100,000)</h3>
<div class="plot" id="g5"></div>
<p class="small">New accounts vs page view data: <a href="reg2_new_by_traffic2.csv">csv</a><br />
Data available since 2010-01-01<br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./reg2_new_by_traffic2.csv')); ?> </p>

<script type="text/javascript">
   var labels = [
        {
          series: "new accounts",
          x: "2010-12-25",
          shortText: "A",
          text: "Christmas 2010"
        },
        {
          series: "new accounts",
          x: "2011-12-25",
          shortText: "B",
          text: "Christmas 2011"
        },
        {
          series: "new accounts",
          x: "2012-01-18",
          shortText: "C",
          text: "SOPA blackout"
        },
       {
          series: "new accounts",
          x: "2012-10-30",
          shortText: "D",
          text: "Traffic surge for Hurricane Sandy"
        },
       {
          series: "new accounts",
          x: "2012-11-16",
          shortText: "E",
          text: "Fundraiser 2012 US test"
        },
       {
          series: "new accounts",
          x: "2012-11-27",
          shortText: "F",
          text: "Fundraiser 2012 launch"
        },
	{
          series: "new accounts",
          x: "2012-12-25",
          shortText: "G",
          text: "Christmas 2012"
        },
       ]; 

   gd = new Dygraph(
    document.getElementById('gd'),
    "./reg2_daily.csv",
    {
      ylabel: 'Daily registrations',
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
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels);
          }
     }
  );

  g0 = new Dygraph(
    document.getElementById('g0'),
    "./reg_y2y.csv",
    {
      ylabel: 'Registrations per hour',
      legend: 'always',
      axisLabelFontSize: 12,
      rollPeriod: 24,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      visibility: [true, true, true, true, true, true],
      labelsSeparateLines: true,
      showRangeSelector: false
    }
  );

  g1 = new Dygraph(
    document.getElementById('g1'),
    "./reg2_combo.csv",
    {
      ylabel: 'New accounts',
      legend: 'always',
      axisLabelFontSize: 12,
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      colors: ["rgba(50,50,50,0.8)", "rgba(0,0,150,0.8)", "rgba(0,150,0,0.8)"],
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels);
          }
    }
  );

  g2 = new Dygraph(
    document.getElementById('g2'),
    "./reg2_rate_combo.csv",
    {
      ylabel: 'Active accounts (%)',
      legend: 'always',
      axisLabelFontSize: 12,
      rollPeriod: 1,
      showRoller: true,
      colors: ["rgba(0,0,150,0.8)","rgba(0,150,0,0.8)"],
      labelsKMB: true,
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels);
          }
    }
  );

  g3 = new Dygraph(
    document.getElementById('g3'),
    "./reg2_alive_y2y.csv",
    {
      ylabel: 'Year-to-year variation (%)',
      legend: 'always',
      axisLabelFontSize: 12,
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      colors: ["rgba(0,0,150,0.8)","rgba(50,50,50,0.8)"],
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels);
          }
    }
  );

g4 = new Dygraph(
    document.getElementById('g4'),
    "./reg2_new_by_traffic.csv",
    {
      ylabel: 'Registrations per page view',
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
      showRangeSelector: false
    }
  );

g5 = new Dygraph(
    document.getElementById('g5'),
    "./reg2_new_by_traffic2.csv",
    {
      ylabel: 'Registrations, page view (100K)',
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
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels);
          }
    }
  );

 setStatus();

 function setStatus() {
    document.getElementById("visibility").innerHTML = g0.visibility().toString();
 }

 function change(el) {
   g0.setVisibility(parseInt(el.id), el.checked);
   setStatus();
 }
</script>
</body>
</html>
