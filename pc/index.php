<html>
<head>
<title>PageCuration dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>PageCuration dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<!-- Daily curation events -->
<h3>Pages reviewed per day</h3>
<div class="loglin" id="pc_logging_actions_daily" style="width:900px; height:300px;"></div>
<p class="small">Daily curation actions by type data: <a href="pc_logging_actions_daily.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_actions_daily.csv')); ?></p>

<!-- Daily events % -->
<h3>Pages reviewed per day (%)</h3>
<div id="pc_logging_actions_daily_perc" style="width:900px; height:300px;"></div>
<p class="small">Daily curation action data: <a href="pc_logging_actions_daily_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_actions_daily_perc.csv')); ?></p>

<!-- Cumulative events -->
<h3>Cumulative pages reviewed</h3>
<div id="pc_logging_actions_cum" style="width:900px; height:300px;"></div>
<p class="small">Cumulative moderation action data: <a href="pc_logging_actions_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_actions_cum.csv')); ?></p>

<!-- Total events % -->
<h3>Cumulative pages reviewed (%)</h3>
<div id="pc_logging_actions_cum_perc" style="width:900px; height:300px;"></div>
<p class="small">Cumulative curation action (percentage) data: <a href="pc_logging_actions_cum_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_actions_cum_perc.csv')); ?></p>

<!-- Unique daily reviewers -->
<h3>Unique daily reviewers</h3>
<div class="loglin" id="pc_logging_users_actions_daily" style="width:900px; height:300px;"></div>
<p class="small">Daily unique reviewers per action data: <a href="pc_logging_users_actions_daily.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_users_actions_daily.csv')); ?></p>

<!-- Daily patrol vs review events -->
<h3>Pages patrolled vs reviewed per day</h3>
<div class="loglin" id="pc_logging_actions_daily_comp" style="width:900px; height:300px;"></div>
<p class="small">Daily patrol vs review action data: <a href="pc_logging_actions_daily_comp.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_actions_daily_comp.csv')); ?></p>

<!-- Daily patrollers vs reviewers -->
<h3>Unique daily patrollers vs reviewers</h3>
<div class="loglin" id="pc_logging_users_actions_daily_comp" style="width:900px; height:300px;"></div>
<p class="small">Unique daily patroller vs reviewers data: <a href="pc_logging_users_actions_daily_comp.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_users_actions_daily_comp.csv')); ?></p>

<!-- Daily patrol vs review events (%) -->
<h3>Pages patrolled vs reviewed per day (%)</h3>
<div class="loglin" id="pc_logging_actions_daily_comp_perc" style="width:900px; height:300px;"></div>
<p class="small">Daily patrol vs review action data: <a href="pc_logging_actions_daily_comp_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_actions_daily_comp_perc.csv')); ?></p>

<!-- Daily patrollers vs reviewers (%) -->
<h3>Unique daily patrollers vs reviewers (%)</h3>
<div class="loglin" id="pc_logging_users_actions_daily_comp_perc" style="width:900px; height:300px;"></div>
<p class="small">Unique daily patroller vs reviewers data: <a href="pc_logging_users_actions_daily_comp_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_users_actions_daily_comp_perc.csv')); ?></p>

<!-- The following dashboards are temporarily disabled as the data is inaccurate -->
<!-- 
<h3>Daily curation vs patrol actions</h3>
<p class="small" id="pc_logging_scale">
SCALE: <input class="log" type="button" disabled="disabled" value="log" onclick="setLogScale(pc_logging,true)" /> <input class="lin" type="button" value="linear" onclick="setLogScale(pc_logging,false)">
</p>
<div class="loglin" id="pc_logging" style="width:900px; height:300px;"></div>
<p class="small">Daily curation actions data: <a href="pc_logging.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging.csv')); ?></p>

<h3>Daily curation vs patrol actions (percentage)</h3>
<div id="pc_logging_perc" style="width:900px; height:300px;"></div>
<p class="small">Daily curation actions (%) data: <a href="pc_logging_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_perc.csv')); ?></p>

<h3>Daily autopatrolled pages</h3>
<p class="small" id="pc_logging_scale">
SCALE: <input class="log" type="button" disabled="disabled" value="log" onclick="setLogScale(pc_logging_auto,true)" /> <input class="lin" type="button" value="linear" onclick="setLogScale(pc_logging_auto,false)">
</p>
<div id="pc_logging_auto" style="width:900px; height:300px;"></div>
<p class="small">Daily autopatrolled page data: <a href="pc_logging_auto.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_auto.csv')); ?></p>

<h3>Daily unique curators vs patrollers</h3>
<p class="small" id="pc_logging_user_scale">
SCALE: <input class="log" type="button" disabled="disabled" value="log" onclick="setLogScale(pc_logging_user,true)" /> <input class="lin" type="button" value="linear" onclick="setLogScale(pc_logging_user,false)">
</p>
<div class="loglin" id="pc_logging_user" style="width:900px; height:300px;"></div>
<p class="small">Daily unique curator data: <a href="pc_logging_user.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_user.csv')); ?></p>

<h3>Daily unique curators vs patrollers (percentage)</h3>
<div id="pc_logging_user_perc" style="width:900px; height:300px;"></div>
<p class="small">Daily unique curators (%) data: <a href="pc_logging_user_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./pc_logging_user_perc.csv')); ?></p>
-->


<script type="text/javascript">

 var labels_pc = [
        {
          series: "reviewed",
          x: "2012-09-20",
          shortText: "A",
          text: "Complete feature deployed. Pages marked for deletion or tagged are automatically marked as reviewed."
        },
        {
          series: "reviewed",
          x: "2012-09-24",
          shortText: "B",
          text: "Official release announcement"
        },
        {
          series: "reviewed",
          x: "2012-09-27",
          shortText: "C",
          text: "Bugfix release"
        }
        ];


 pc_logging_actions_daily = new Dygraph(
    document.getElementById('pc_logging_actions_daily'),
    "./pc_logging_actions_daily.csv",
    {
      ylabel:'Number of pages reviewed',
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
	"#CC6666",
	"#B1B17B", 
	"#405774",
	"#336644",
	"#AABBCC"
      ],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          },
      'autoreviewed': {
          strokePattern: Dygraph.DOTTED_LINE,
          strokeWidth: 3
      }
    }
  );

  pc_logging_actions_daily_perc = new Dygraph(
    document.getElementById('pc_logging_actions_daily_perc'),
    "./pc_logging_actions_daily_perc.csv",
    {
      ylabel:'% of pages reviewed',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 100,
      labelsDivStyles: {
         'padding':'5px',
	 'opacity':'0.7',
  	 'filter':'alpha(opacity=70)',
         'backgroundColor': 'white',
         'font-weight': 300,
         'text-align': 'left'
      },
       colors: [
	"#CC6666",
	"#B1B17B", 
	"#405774",
	"#336644"
      ],
      stackedGraph: true,
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          }
    }
  );

  pc_logging_actions_cum = new Dygraph(
    document.getElementById('pc_logging_actions_cum'),
    "./pc_logging_actions_cum.csv",
    {
      ylabel: 'Pages reviewed',
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
	"#CC6666",
	"#B1B17B", 
	"#405774",
	"#336644",
	"#AABBCC"
      ],
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          },
      'autoreviewed': {
          strokePattern: Dygraph.DOTTED_LINE,
          strokeWidth: 3
      },
    }
  );

  pc_logging_actions_cum_perc = new Dygraph(
    document.getElementById('pc_logging_actions_cum_perc'),
    "./pc_logging_actions_cum_perc.csv",
    {
      ylabel:'% of pages reviewed per day',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 100,
      labelsDivStyles: {
         'padding':'5px',
	 'opacity':'0.7',
  	 'filter':'alpha(opacity=70)',
         'backgroundColor': 'white',
         'font-weight': 300,
         'text-align': 'left'
      },
       colors: [
	"#CC6666",
	"#B1B17B", 
	"#405774",
	"#336644"
      ],
      stackedGraph: true,
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          }
    }
  );

 pc_logging_users_actions_daily = new Dygraph(
    document.getElementById('pc_logging_users_actions_daily'),
    "./pc_logging_users_actions_daily.csv",
    {
      ylabel:'Number of unique reviewers',
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
	"#CC6666",
	"#B1B17B", 
	"#405774",
	"#336644",
        "#AABBCC"
      ],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          },
      'autoreviewed': {
          strokePattern: Dygraph.DOTTED_LINE,
          strokeWidth: 3
      },
    }
  );

 pc_logging_actions_daily_comp = new Dygraph(
    document.getElementById('pc_logging_actions_daily_comp'),
    "./pc_logging_actions_daily_comp.csv",
    {
      ylabel:'Pages patrolled vs reviewed per day',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 120,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
       colors: [
        "#AABBCC",
	"#B1B17B"
      ],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          },
      'autoreviewed': {
          strokePattern: Dygraph.DOTTED_LINE,
          strokeWidth: 3
      }
     }
  );

pc_logging_users_actions_daily_comp = new Dygraph(
    document.getElementById('pc_logging_users_actions_daily_comp'),
    "./pc_logging_users_actions_daily_comp.csv",
    {
      ylabel:'Patrollers vs reviewers',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 120,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
       colors: [
        "#AABBCC",
	"#B1B17B"
      ],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          },
     'autoreviewed': {
          strokePattern: Dygraph.DOTTED_LINE,
          strokeWidth: 3
      }
    }
  );

 pc_logging_actions_daily_comp_perc = new Dygraph(
    document.getElementById('pc_logging_actions_daily_comp_perc'),
    "./pc_logging_actions_daily_comp_perc.csv",
    {
      ylabel:'Pages patrolled vs reviewed per day (%)',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 120,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
       colors: [
        "#AABBCC",
	"#B1B17B"
      ],
      stackedGraph: true,
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          }
     }
  );

pc_logging_users_actions_daily_comp_perc = new Dygraph(
    document.getElementById('pc_logging_users_actions_daily_comp_perc'),
    "./pc_logging_users_actions_daily_comp_perc.csv",
    {
      ylabel:'Patrollers vs reviewers (%)',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 120,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
       colors: [
        "#AABBCC",
	"#B1B17B"
      ],
      stackedGraph: true,
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_pc);
          }
    }
  );

  pc_logging = new Dygraph(
    document.getElementById('pc_logging'),
    "./pc_logging.csv",
    {
      ylabel:'Number of pages curated',
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
      logscale: true,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  pc_logging_perc = new Dygraph(
    document.getElementById('pc_logging_perc'),
    "./pc_logging_perc.csv",
    {
      ylabel:'% of all pages curated',
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

  pc_logging_auto = new Dygraph(
    document.getElementById('pc_logging_auto'),
    "./pc_logging_auto.csv",
    {
      ylabel:'Number of autopatrolled pages',
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
      logscale: true,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  pc_logging_user = new Dygraph(
    document.getElementById('pc_logging_user'),
    "./pc_logging_user.csv",
    {
      ylabel:'Number of unique curators',
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
        "#339988",
        "#6787B0" 
      ],
      logscale: true,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  pc_logging_user_perc = new Dygraph(
    document.getElementById('pc_logging_user_perc'),
    "./pc_logging_user_perc.csv",
    {
      ylabel:'% of all pages curated',
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
        "#339988",
        "#6787B0"
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

   function setLogScale1(pl,val) {
        pl.updateOptions({ logscale: val });
	document.querySelector('input.lin').disabled = !val;
	document.querySelector('input.log').disabled = val;
      }

   function setLogScale(pl,val) {
        pl.updateOptions({ logscale: val });
	var logs = document.querySelectorAll(".log");
	var lins = document.querySelectorAll(".lin");
	for(var i = 0; i < logs.length; i++){logs[i].disabled = val};
	for(var i = 0; i < lins.length; i++){lins[i].disabled = !val};
      }


</script>
</body>
</html>
