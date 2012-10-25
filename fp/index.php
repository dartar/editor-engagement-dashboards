<html>
<head>
<title>FeedbackPage usage dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>FeedbackPage usage dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed hourly. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<!-- Daily events -->
<h3>Daily moderation actions</h3>
<p class="small"><strong>Action:</strong>
<input type=checkbox id="0" checked onClick="change(this,fp_logging)">
<label for="0">oversight</label>
<input type=checkbox id="1" checked onClick="change(this,fp_logging)">
<label for="1">request</label>
<input type=checkbox id="2" checked onClick="change(this,fp_logging)">
<label for="2">hide</label>
<input type=checkbox id="3" onClick="change(this,fp_logging)">
<label for="3">autohide</label>
<input type=checkbox id="4" checked onClick="change(this,fp_logging)">
<label for="4">flag</label>
<input type=checkbox id="5" onClick="change(this,fp_logging)">
<label for="5">autoflag</label>
<input type=checkbox id="6" checked onClick="change(this,fp_logging)">
<label for="6">unhelpful</label>
<input type=checkbox id="7" checked onClick="change(this,fp_logging)">
<label for="7">helpful</label>
<input type=checkbox id="8" checked onClick="change(this,fp_logging)">
<label for="8">feature</label>
<input type=checkbox id="9" checked onClick="change(this,fp_logging)">
<label for="9">resolved</label>
</p>
<div id="fp_logging" style="width:900px; height:300px;"></div>
<p class="small">Daily moderation action data: <a href="fp_logging.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging.csv')); ?></p>

<!-- Daily events % -->
<h3>Daily moderation actions (percentage)</h3>
<div id="fp_logging_perc" style="width:900px; height:300px;"></div>
<p class="small">Daily moderation action data: <a href="fp_logging_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_perc.csv')); ?></p>

<!-- Cumulative events -->
<h3>Cumulative moderation actions</h3>
<p class="small"><strong>Action:</strong>
<input type=checkbox id="0" checked onClick="change(this,fp_logging_cum)">
<label for="0">oversight</label>
<input type=checkbox id="1" checked onClick="change(this,fp_logging_cum)">
<label for="1">request</label>
<input type=checkbox id="2" checked onClick="change(this,fp_logging_cum)">
<label for="2">hide</label>
<input type=checkbox id="3" onClick="change(this,fp_logging_cum)">
<label for="3">autohide</label>
<input type=checkbox id="4" checked onClick="change(this,fp_logging_cum)">
<label for="4">flag</label>
<input type=checkbox id="5" onClick="change(this,fp_logging_cum)">
<label for="5">autoflag</label>
<input type=checkbox id="6" checked onClick="change(this,fp_logging_cum)">
<label for="6">unhelpful</label>
<input type=checkbox id="7" checked onClick="change(this,fp_logging_cum)">
<label for="7">helpful</label>
<input type=checkbox id="8" checked onClick="change(this,fp_logging_cum)">
<label for="8">feature</label>
<input type=checkbox id="9" checked onClick="change(this,fp_logging_cum)">
<label for="9">resolved</label>
</p>
<div id="fp_logging_cum" style="width:900px; height:300px;"></div>
<p class="small">Cumulative moderation action data: <a href="fp_logging_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_cum.csv')); ?></p>

<!-- Total events % -->
<h3>Cumulative moderation actions (percentage)</h3>
<div id="fp_logging_cum_perc" style="width:900px; height:300px;"></div>
<p class="small">Cumulative moderation action (percentage) data: <a href="fp_logging_cum_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_cum_perc.csv')); ?></p>

<!-- Unique articles -->
<h3>Unique daily articles with feedback moderated</h3>
<div id="fp_logging_by_article_unique" style="width:900px; height:300px;"></div>
<p class="small">Unique daily articles with feedback moderated data: <a href="fp_logging_by_article_unique.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_by_article_unique.csv')); ?></p>

<!-- Unique articles moderated/commented ratio -->
<h3>Proportion of unique articles moderated/commented (%)</h3>
<p class="small" style="width:900px">This plot represents the proportion of articles with at least one manual moderation action on a given data over the number of articles with at least one new 
comment on that day. Note that moderation actions and new posts can happen on entirely distinct sets of articles</p>
<div id="fp_logging_daily_article_moderation_perc" style="width:900px; height:300px;"></div>
<p class="small">Articles moderated vs commented (%): <a href="fp_logging_daily_article_moderation_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_daily_article_moderation_perc.csv')); ?></p>

<!-- Daily posts moderated -->
<h3>Proportion of daily posts moderated (%)</h3>
<p class="small" style="width:900px">This plot shows the percentage of feedback posted on a given date that was moderated within 1 day, 1 week, 2 weeks, 1 month or to date. With the exception of 
the <em>to date</em> series (marked as a dotted line), data subject to right-censorship is removed from the plot, as moderation can happen any time in the future.</p>
<p class="small"><strong>Series:</strong>
<input type=checkbox id="0" checked onClick="change(this,fp_logging_daily_moderation_perc)">
<label for="0">1 day</label>
<input type=checkbox id="1" checked onClick="change(this,fp_logging_daily_moderation_perc)">
<label for="1">1 week</label>
<input type=checkbox id="2" checked onClick="change(this,fp_logging_daily_moderation_perc)">
<label for="2">2 weeks</label>
<input type=checkbox id="3" checked onClick="change(this,fp_logging_daily_moderation_perc)">
<label for="3">1 month</label>
<input type=checkbox id="4" checked onClick="change(this,fp_logging_daily_moderation_perc)">
<label for="4">to date</label>
</p>
<div id="fp_logging_daily_moderation_perc" style="width:900px; height:300px;"></div>
<p class="small">Posts moderated (%): <a href="fp_logging_daily_moderation_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_daily_moderation_perc.csv')); ?></p>

<!-- Moderation source -->
<h3>Moderation actions by source (anonymous users)</h3>
<p class="small" style="width:900px">This plot shows the daily number of moderation actions performed by anonymous users as a function of the interface they used.</p>
<div id="fp_logging_daily_moderation_source_anon" style="width:900px; height:300px;"></div>
<p class="small">Moderation source data: <a href="fp_logging_daily_moderation_source_anon.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_daily_moderation_source_anon.csv')); ?></p>

<!-- Moderation source -->
<h3>Moderation actions by source (registered users)</h3>
<p class="small" style="width:900px">This plot shows the daily number of moderation actions performed by registered users as a function of the interface they used.</p>
<div id="fp_logging_daily_moderation_source_reg" style="width:900px; height:300px;"></div>
<p class="small">Moderation source data: <a href="fp_logging_daily_moderation_source_reg.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_daily_moderation_source_reg.csv')); ?></p>

<!-- Unique users  -->
<h3>Unique daily moderators by category</h3>
<div id="fp_logging_by_user_type_unique" style="width:900px; height:300px;"></div>
<p class="small">Unique daily moderators by category data: <a href="fp_logging_by_user_type_unique.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_by_user_type_unique.csv')); ?></p>

<!-- Unique daily posts processed by user category  -->
<h3>Unique daily posts processed by user category</h3>
<div id="fp_logging_by_user_type" style="width:900px; height:300px;"></div>
<p class="small">Unique daily posts processed by user category data: <a href="fp_logging_by_user_type.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_by_user_type.csv')); ?></p>

<!-- Unique daily posts autoprocessed  -->
<h3>Unique daily posts autoprocessed</h3>
<div id="fp_logging_auto" style="width:900px; height:300px;"></div>
<p class="small">Unique daily posts autoprocessed data: <a href="fp_logging_auto.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./fp_logging_auto.csv')); ?></p>

<script type="text/javascript">

  var labels_fp = [
        {
          series: "helpful",
          x: "2012-07-03",
          shortText: "A",
          text: "AFTv5 deployed to 1% of English Wikipedia"
        },
        {
          series: "helpful",
          x: "2012-07-05",
          shortText: "B",
          text: "AFTv5 deployed to 2% of English Wikipedia"
        },
        {
          series: "helpful",
          x: "2012-07-10",
          shortText: "C",
          text: "AFTv5 deployed to 3% of English Wikipedia"
        },
        {
          series: "helpful",
          x: "2012-07-17",
          shortText: "D",
          text: "AFTv5 deployed to 5% of English Wikipedia + CentralNotice announcement"
        },
     	{
          series: "helpful",
          x: "2012-07-23",
          shortText: "E",
          text: "AFTv5 deployed to 10% of English Wikipedia"
        },      
        {
          series: "helpful",
          x: "2012-07-30",
          shortText: "F",
          text: "Site-wide outage"
        },
        {
          series: "helpful",
          x: "2012-08-14",
          shortText: "G",
          text: "Enabled watchlist filter and reset CTAs"
        }
	];

  var labels_md = [
        {
          series: "to date",
          x: "2012-07-03",
          shortText: "A",
          text: "AFTv5 deployed to 1% of English Wikipedia"
        },
        {
          series: "to date",
          x: "2012-07-05",
          shortText: "B",
          text: "AFTv5 deployed to 2% of English Wikipedia"
        },
        {
          series: "to date",
          x: "2012-07-10",
          shortText: "C",
          text: "AFTv5 deployed to 3% of English Wikipedia"
        },
        {
          series: "to date",
          x: "2012-07-17",
          shortText: "D",
          text: "AFTv5 deployed to 5% of English Wikipedia + CentralNotice announcement"
        },
     	{
          series: "to date",
          x: "2012-07-23",
          shortText: "E",
          text: "AFTv5 deployed to 10% of English Wikipedia"
        },      
        {
          series: "to date",
          x: "2012-07-30",
          shortText: "F",
          text: "Site-wide outage"
        },
        {
          series: "to date",
          x: "2012-08-14",
          shortText: "G",
          text: "Enabled watchlist filter and reset CTAs"
        },
        {
          series: "to date",
          x: "2012-09-07",
          shortText: "H",
          text: "Disabled self-moderation for feedback authors"
        }
	];


  fp_logging = new Dygraph(
    document.getElementById('fp_logging'),
    "./fp_logging.csv",
    {
      ylabel:'Number of actions',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 100,
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
      visibility: [true, true, true, false, true, false, true, true, true, true],
      logscale: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  fp_logging_perc = new Dygraph(
    document.getElementById('fp_logging_perc'),
    "./fp_logging_perc.csv",
    {
      ylabel:'% of daily actions',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 7,
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

  fp_logging_cum_perc = new Dygraph(
    document.getElementById('fp_logging_cum_perc'),
    "./fp_logging_cum_perc.csv",
    {
      ylabel:'% of total actions',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 7,
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

  fp_logging_cum = new Dygraph(
    document.getElementById('fp_logging_cum'),
    "./fp_logging_cum.csv",
    {
      ylabel: 'Number of actions',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 100,
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
      visibility: [true, true, true, false, true, false, true, true, true, true],
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_fp);
          }
    }
  );

  fp_logging_by_user_type_unique = new Dygraph(
    document.getElementById('fp_logging_by_user_type_unique'),
    "./fp_logging_by_user_type_unique.csv",
    {
      ylabel: 'Unique daily users',
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
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
          }
    }
  );

  fp_logging_by_article_unique = new Dygraph(
    document.getElementById('fp_logging_by_article_unique'),
    "./fp_logging_by_article_unique.csv",
    {
      ylabel: 'Unique daily articles',
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
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
          }
    }
  );

  fp_logging_daily_article_moderation_perc = new Dygraph(
    document.getElementById('fp_logging_daily_article_moderation_perc'),
    "./fp_logging_daily_article_moderation_perc.csv",
    {
      ylabel: 'Articles commented/moderated (%)',
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
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_md);
          }
    }
  );

  fp_logging_daily_moderation_perc = new Dygraph(
    document.getElementById('fp_logging_daily_moderation_perc'),
    "./fp_logging_daily_moderation_perc.csv",
    {
      ylabel: 'Posts moderated (%)',
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
	"#B1B17B", 
	"#405774",
	"#336644",
	"#AABBCC"
      ],
      'to date': {
          strokePattern: Dygraph.DOTTED_LINE,
          strokeWidth: 3
      },
      visibility: [true, true, true, true, true],
      stackedGraph: false,
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_md);
          }
    }
  );

  fp_logging_daily_moderation_source_anon = new Dygraph(
    document.getElementById('fp_logging_daily_moderation_source_anon'),
    "./fp_logging_daily_moderation_source_anon.csv",
    {
      ylabel: 'Moderation actions by source',
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
	"#B1B17B", 
	"#405774",
	"#336644"
      ],
      visibility: [true, true, true, true],
      stackedGraph: false,
      labelsSeparateLines: true,
      showRangeSelector: false
    }
  );

  fp_logging_daily_moderation_source_reg = new Dygraph(
    document.getElementById('fp_logging_daily_moderation_source_reg'),
    "./fp_logging_daily_moderation_source_reg.csv",
    {
      ylabel: 'Moderation actions',
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
	"#B1B17B", 
	"#405774",
	"#336644"
      ],
      visibility: [true, true, true, true],
      stackedGraph: false,
      labelsSeparateLines: true,
      showRangeSelector: false
    }
  );

  fp_logging_by_user_type = new Dygraph(
    document.getElementById('fp_logging_by_user_type'),
    "./fp_logging_by_user_type.csv",
    {
      ylabel: 'Unique daily posts processed',
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
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
          }
    }
  );

  fp_logging_auto = new Dygraph(
    document.getElementById('fp_logging_auto'),
    "./fp_logging_auto.csv",
    {
      ylabel: 'Unique daily posts processed',
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
      labelsSeparateLines: true,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
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
