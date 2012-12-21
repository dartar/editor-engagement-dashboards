<?php
define('DEFAULT_FILTER', '');
switch ($_GET['c'])
{
	case 'r':
	$c = '_r';
	$p = '?c=r';
	$filter = '<h2 class="toggle"><strong>articles:</strong> <a href="?c=">[all articles]</a> [random sample] <a href="?c=a">[additional articles]</a> <a href="./articles/?p=Global+warming">[single articles]</a></h2>'."\n";
	break;

	case 'a':
	$c = '_a';
	$p = '?c=a';
	$filter = '<h2 class="toggle"><strong>articles:</strong> <a href="?c=">[all articles]</a> <a href="?c=r">[random sample]</a> [additional articles] <a href="./articles/?p=Global+warming">[single articles]</a></h2>'."\n";
	break;

	default:
	$c = DEFAULT_FILTER;
	$p = '?c=';
	$filter = '<h2 class="toggle"><strong>articles:</strong> [all articles] <a href="?c=r">[random sample]</a> <a href="?c=a">[additional articles]</a> <a href="./articles/?p=Global+warming">[single articles]</a></h2>'."\n";
	break;	
}
?>
<html>
<head>
<title>Article Feedback v5 dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="header_fixed">
<h1>Article Feedback v5 dashboard</h1>
<?php echo $filter; ?>
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
<p class="small">Daily feedback volume data: <a href="aft5<?php echo $c; ?>_daily.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily.csv')); ?></p>

<!-- Cumulative posts (aggregate) -->
<h3>Cumulative feedback volume (aggregate)</h3>
<div id="graphdiv_cum" style="width:900px; height:300px;"></div>
<p class="small">Cumulative feedback volume data: <a href="aft5<?php echo $c; ?>_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_cum.csv')); ?></p>

<!-- Unique articles commented -->
<h3>Daily number of unique articles commented</h3>
<div id="graphdiv_daily_unique_articles" style="width:900px; height:300px;"></div>
<p class="small">Unique articles commented data: <a href="aft5<?php echo $c; ?>_daily_unique_articles.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_unique_articles.csv')); ?></p>

<!-- Feedback by user category -->
<h3>Daily posts by user category</h3>
<div id="graphdiv_daily_by_usertype" style="width:900px; height:300px;"></div>
<p class="small">Posts by user category data: <a href="aft5<?php echo $c; ?>_daily_by_usertype.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'aft5_daily_by_usertype.csv')); ?></p>

<!-- Feedback by user category (%) -->
<h3>Daily posts by user category (%)</h3>
<div id="graphdiv_daily_by_usertype_perc" style="width:900px; height:300px;"></div>
<p class="small">Posts by user category (%) data: <a href="aft5<?php echo $c; ?>_daily_by_usertype_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'aft5_daily_by_usertype_perc.csv')); ?></p>

<h2 class="archive">Archive</h2>
<p class="small">The following dashboards are kept for historical interest</p>

<!-- Daily posts (by design) -->
<h3>Daily feedback volume (by design)</h3>
<div id="graphdiv_daily_by_design" style="width:900px; height:300px;"></div>
<p class="small">Daily feedback volume data (by design): <a href="aft5<?php echo $c; ?>_daily_by_design.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_by_design.csv')); ?></p>

<!-- Cumulative posts (by design) -->
<h3>Cumulative feedback volume (by design)</h3>
<div id="graphdiv_cum_by_design" style="width:900px; height:300px;"></div>
<p class="small">Cumulative feedback volume data (by design): <a href="aft5<?php echo $c; ?>_cum_by_design.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_cum_by_design.csv')); ?></p>

<!--% of daily posts with text (by design) -->
<h3>Daily % of feedback with text (by design)</h3>
<div id="graphdiv_daily_by_design_text_perc" class="smallgraphdiv"></div>
<p class="small">Feedback with text (daily %) : <a href="aft5<?php echo $c; ?>_daily_by_design_text_perc.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_by_design_text_perc.csv')); ?></p>

<!-- Daily anonymous users  (by design) -->
<h3>Feedback by anonymous users (by design)</h3>
<div id="graphdiv_daily_by_design_text_anon" style="width:900px; height:300px;"></div>
<p class="small">Daily anonymous users data (by design): <a href="aft5<?php echo $c; ?>_daily_by_design_text_anon.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_by_design_text_anon.csv')); ?></p>

<!-- Daily registerd users  (by design) -->
<h3>Feedback by registered users (by design)</h3>
<div id="graphdiv_daily_by_design_text_reg" style="width:900px; height:300px;"></div>
<p class="small">Daily registered users data (by design): <a href="aft5<?php echo $c; ?>_daily_by_design_text_reg.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_by_design_text_reg.csv')); ?></p>

<!-- Daily posts (option 1) -->
<h3>Daily feedback volume (option 1)</h3>
<div id="graphdiv_daily_option1" style="width:900px; height:300px;"></div>
<p class="small">Daily feedback volume data (option1): <a href="aft5<?php echo $c; ?>_daily_option1.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_option1.csv')); ?></p>

<!-- Cumulative posts (option 1) -->
<h3>Cumulative feedback volume (option 1)</h3>
<div id="graphdiv_cum_option1" style="width:900px; height:300px;"></div>
<p class="small">Cumulative feedback volume data (option 1): <a href="aft5<?php echo $c; ?>_cum_option1.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_cum_option1.csv')); ?></p>

<!-- Daily posts (option 2) -->
<h3>Daily feedback volume (option 2)</h3>
<div id="graphdiv_daily_option2" style="width:900px; height:300px;"></div>
<p class="small">Daily feedback volume data (option2): <a href="aft5<?php echo $c; ?>_daily_option2.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_option2.csv')); ?></p>

<!-- Cumulative posts (option 2) -->
<h3>Cumulative feedback volume (option 2)</h3>
<div id="graphdiv_cum_option2" style="width:900px; height:300px;"></div>
<p class="small">Cumulative feedback volume data (option 2): <a href="aft5<?php echo $c; ?>_cum_option2.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_cum_option2.csv')); ?></p>

<!-- Daily posts (option 3) -->
<h3>Daily feedback volume (option 3)</h3>
<div id="graphdiv_daily_option3" style="width:900px; height:300px;"></div>
<p class="small">Daily feedback volume data (option 3): <a href="aft5<?php echo $c; ?>_daily_option3.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_daily_option3.csv')); ?></p>

<!-- Cumulative posts (option 3) -->
<h3>Cumulative feedback volume (option 3)</h3>
<div id="graphdiv_cum_option3" style="width:900px; height:300px;"></div>
<p class="small">Cumulative feedback volume data (option 3): <a href="aft5<?php echo $c; ?>_cum_option3.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./aft5'.$c.'_cum_option3.csv')); ?></p>

<script type="text/javascript">
<?php 
//annotations for additional list
if ($_GET['c'] == 'a')
{
echo <<<EOF
   var labels_g1 = [
        {
          series: "feedback",
          x: "2012-01-02",
          shortText: "A",
          text: "Additional article list expanded"
        },
        {
          series: "feedback",
          x: "2012-01-09",
          shortText: "C",
          text: "Patch to fix option 3"
        },
        {
          series: "feedback",
          x: "2012-01-10",
          shortText: "D",
          text: "AFT5 enabled on Google doodle article Nicolas Steno"
        },
        {
          series: "feedback",
          x: "2012-01-11",
          shortText: "E",
          text: "Feedback trigger and overlay widget deployed"   
        },
        {
          series: "feedback",
          x: "2012-01-18",
          shortText: "F",
          text: "SOPA blackout"
        },
        {
          series: "feedback",
          x: "2012-03-28",
          shortText: "G",
          text: "Start AFT5 Stage 2 test"  
        },
        {
          series: "feedback",
          x: "2012-04-19",
          shortText: "H",
          text: "Start AFT5 Stage 3 test"  
        }
       ];
EOF;
}
//annotations for random sample
else if ($_GET['c'] == 'r')
{
echo <<<EOF
   var labels_g1 = [
        {
          series: "feedback",
          x: "2012-01-03",
          shortText: "B",
          text: "Random article sample doubled in size"
        },
        {
          series: "feedback",
          x: "2012-01-09",
          shortText: "C",
          text: "Patch to fix option 3"
        },
        {
          series: "feedback",
          x: "2012-01-11",
          shortText: "E",
          text: "Feedback trigger and overlay widget deployed"
        },
        {
          series: "feedback",
          x: "2012-01-18",
          shortText: "F",
          text: "SOPA blackout"
        },
        {
          series: "feedback",
          x: "2012-03-28",
          shortText: "G",
          text: "Start AFT5 Stage 2 test"
        },
        {
          series: "feedback",
          x: "2012-04-19",
          shortText: "H",
          text: "Start AFT5 Stage 3 test"
        }
       ];
EOF;
}
//default annotations
else
{
echo <<<EOF
   var labels_g1 = [
        {
          series: "feedback",
          x: "2012-01-02",
          shortText: "A",
          text: "Additional article list expanded"
        },
        {
          series: "feedback",
          x: "2012-01-03",
          shortText: "B",
          text: "Random article sample doubled in size"
        },
        {
          series: "feedback",
          x: "2012-01-09",
          shortText: "C",
          text: "Patch to fix option 3"   
        },
        {
          series: "feedback",
          x: "2012-01-10",
          shortText: "D",
          text: "AFT5 enabled on Google doodle article Nicolas Steno"
        },
        {
          series: "feedback",
          x: "2012-01-11",
          shortText: "E",
          text: "Feedback trigger and overlay widget deployed"
        },
        {
          series: "feedback",
          x: "2012-01-18",
          shortText: "F",
          text: "SOPA blackout"
        },
        {
          series: "feedback",
          x: "2012-03-28",
          shortText: "G",
          text: "Start AFT5 Stage 2 test"
        },
        {
          series: "feedback",
          x: "2012-04-19",
          shortText: "H",
          text: "Start AFT5 Stage 3 test"
        },
        {
          series: "feedback",
          x: "2012-07-23",
          shortText: "I",
          text: "AFT5 enabled on 10% of English Wikipedia articles"
        }       
];
EOF;
}
?>
  g_cum = new Dygraph(
    document.getElementById('graphdiv_cum'),
    "./aft5<?php echo $c; ?>_cum.csv",
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
    "./aft5<?php echo $c; ?>_daily.csv",
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
    "./aft5<?php echo $c; ?>_daily_unique_articles.csv",
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


  g_daily_by_design = new Dygraph(
    document.getElementById('graphdiv_daily_by_design'),
    "./aft5<?php echo $c; ?>_daily_by_design.csv",
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
      colors: ["rgb(50,200,50)", "rgba(50,200,50,0.6)", "rgb(200,50,50)", "rgba(200,50,50,0.6)","rgb(200,180,50)", "rgba(200,180,50,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

  g_cum_by_design = new Dygraph(
    document.getElementById('graphdiv_cum_by_design'),
    "./aft5<?php echo $c; ?>_cum_by_design.csv",
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
      colors: ["rgb(50,200,50)", "rgba(50,200,50,0.6)", "rgb(200,50,50)", "rgba(200,50,50,0.6)","rgb(200,180,50)", "rgba(200,180,50,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

 g_daily_by_design_text_perc = new Dygraph(
    document.getElementById('graphdiv_daily_by_design_text_perc'),
    "./aft5<?php echo $c; ?>_daily_by_design_text_perc.csv",
    {
      ylabel: '% of daily feedback',
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
      strokeWidth: 1.5,
      showRangeSelector: false
    }
  );


 g_daily_by_design_text_anon = new Dygraph(
    document.getElementById('graphdiv_daily_by_design_text_anon'),
    "./aft5<?php echo $c; ?>_daily_by_design_text_anon.csv",
    {
      ylabel: 'Unique anonymous users',
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
      strokeWidth: 1.5,
      showRangeSelector: false
    }
  );

 g_daily_by_design_text_reg = new Dygraph(
    document.getElementById('graphdiv_daily_by_design_text_reg'),
    "./aft5<?php echo $c; ?>_daily_by_design_text_reg.csv",
    {
      ylabel: 'Unique registered users',
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
      strokeWidth: 1.5,
      showRangeSelector: false
    }
  );

  g_daily_option1 = new Dygraph(
    document.getElementById('graphdiv_daily_option1'),
    "./aft5<?php echo $c; ?>_daily_option1.csv",
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
      colors: ["rgb(50,50,200)", "rgba(50,50,200,0.6)", "rgb(200,50,50)", "rgba(200,50,50,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

  g_cum_option1 = new Dygraph(
    document.getElementById('graphdiv_cum_option1'),
    "./aft5<?php echo $c; ?>_cum_option1.csv",
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
      colors: ["rgb(50,50,200)", "rgba(50,50,200,0.6)", "rgb(200,50,50)", "rgba(200,50,50,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

  g_daily_option2 = new Dygraph(
    document.getElementById('graphdiv_daily_option2'),
    "./aft5<?php echo $c; ?>_daily_option2.csv",
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
      colors: ["rgba(50,50,200,0.8)", "rgba(50,50,200,0.6)", "rgba(50,200,50,0.8)", "rgba(50,200,50,0.6)", "rgba(200,50,50,0.8)","rgba(200,50,50,0.6)","rgba(200,200,50,0.8)", "rgba(200,200,50,0.6)",],
      strokeWidth: 1.5,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

  g_cum_option2 = new Dygraph(
    document.getElementById('graphdiv_cum_option2'),
    "./aft5<?php echo $c; ?>_cum_option2.csv",
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
      colors: ["rgb(50,50,200)", "rgba(50,50,200,0.6)", "rgb(50,200,50)", "rgba(50,200,50,0.6)", "rgb(200,50,50)","rgba(200,50,50,0.6)","rgb(200,200,50)", "rgba(200,200,50,0.6)",],
      strokeWidth: 1.5,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

  g_daily_option3 = new Dygraph(
    document.getElementById('graphdiv_daily_option3'),
    "./aft5<?php echo $c; ?>_daily_option3.csv",
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
      colors: ["rgb(200,50,50)", "rgba(200,50,50,0.6)", "rgb(170,80,50)", "rgba(170,80,50,0.6)", "rgb(140,110,50)","rgba(140,110,50,0.6)","rgb(110,140,50)", "rgba(110,140,50,0.6)","rgb(80,170,50)", "rgba(80,170,50,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

  g_cum_option3 = new Dygraph(
    document.getElementById('graphdiv_cum_option3'),
    "./aft5<?php echo $c; ?>_cum_option3.csv",
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
      colors: ["rgb(200,50,50)", "rgba(200,50,50,0.6)", "rgb(170,80,50)", "rgba(170,80,50,0.6)", "rgb(140,110,50)","rgba(140,110,50,0.6)","rgb(110,140,50)", "rgba(110,140,50,0.6)","rgb(80,170,50)", "rgba(80,170,50,0.6)"],
      strokeWidth: 1.5,
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
    }
  );

</script>
</div>
</body>
</html>
