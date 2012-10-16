<html>
<head>
<title>Moodbar data dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
</head>
<body>
<div id="wrapper">
<h1>Moodbar data dashboard</h1>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>

<!-- Total posts -->
<h3>Cumulative number of posts</h3>
<div id="graphdiv1" style="width:900px; height:300px;"></div>
<p class="small">Cumulative Moodbar post data: <a href="d1.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d1.csv')); ?></p>

<!-- Daily posts -->
<h3>Unique daily posts</h3>
<div id="graphdiv0" style="width:900px; height:300px;"></div>
<p class="small">Moodbar post data: <a href="d0.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d0.csv')); ?></p>

<!-- % of daily posts with a message -->
<h3 id="d0r">% of daily posts with a message</h3>
<div id="graphdiv0r" style="width:900px; height:300px;"></div>
<p class="small">Moodbar post data: <a href="d0r.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d0r.csv')); ?></p>

<!-- Cumulative users -->
<h3>% of moodbar users over total number of accounts created (cumulative)</h3>
<div id="graphdiv3" style="width:900px; height:300px;"></div>
<p class="small">% of posts per total number of account created data: <a href="d3.csv">csv</a><br />
New account created (cumulative) data: <a href="reg_cum.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d3.csv')); ?></p>

<!-- Daily users -->
<h3 id="d4">% of daily posts by 0-edit users over daily number of accounts created</h3>
<div id="graphdiv4" style="width:900px; height:300px;"></div>
<p class="small">% of daily moodbar post by 0-edit users per daily number of account created data: <a href="d4.csv">csv</a><br />
Daily new accounts created data: <a href="reg.csv">csv</a><br />
Daily posts by 0-edit users data: <a href="d_c00.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d4.csv')); ?></p>

<!-- Daily posts by mood -->
<h3>Unique daily posts by mood type</h3>
<div id="graphdiv" style="width:900px; height:300px;"></div>
<p class="small">Moodbar post data: <a href="d.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d.csv')); ?></p>

<!-- Daily posts by editor class -->
<h3>Daily posts by editor class</h3>
<div id="graphdiv2"></div>
<p class="small"> Moodbar posts by editor class data: <a href="d2.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d2.csv')); ?></p>

<!-- Daily mood by editor class -->
<h3>Mood breakdown by editor class (daily %)</h3>
<div id="graphdivc0" class="smallgraphdiv"></div>
<p class="small"> Mood by editors with 0 edits data: <a href="d_c0.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d_c0.csv')); ?></p>
<div id="graphdivc1" class="smallgraphdiv"></div>
<p class="small"> Mood by editors with 1 edit data: <a href="d_c1.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d_c1.csv')); ?></p>
<div id="graphdivc10" class="smallgraphdiv"></div>
<p class="small"> Mood by editors with 2-9 edits data: <a href="d_c10.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d_c10.csv')); ?></p>
<div id="graphdivc50" class="smallgraphdiv"></div>
<p class="small"> Mood by editors with 10-49 edits data: <a href="d_c50.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d_c50.csv')); ?></p>
<div id="graphdivc50plus" class="smallgraphdiv"></div>
<p class="small"> Mood by editors with 50+ edits data: <a href="d_c50plus.csv">csv</a><br />
Last updated: <?php echo date("Y-m-d H:i:s T", filemtime('./d_c50plus.csv')); ?></p>
</div>
<script type="text/javascript">
   var labels_g1 = [
        {
          series: "posts",
          x: "2011-11-01",
          shortText: "A",
          text: "Added icon to increase MoodBar link saliency"
        },
       {
          series: "posts",  
          x: "2011-12-14",
          shortText: "B",
          text: "Added tooltip to increase MoodBar link saliency"   
        },
       {
          series: "posts",  
          x: "2012-05-23",
          shortText: "C",
          text: "UI changes to make MoodBar link more visibile"   
        },
       {
          series: "posts",
          x: "2012-06-14",
          shortText: "D",
          text: "MoodBar disabled for new registered users for 2 weeks"
        },
       {
          series: "posts",
          x: "2012-06-29",
          shortText: "E",
          text: "MoodBar re-enabled"
        }
       ];

   var labels_g3 = [
        {
          series: "% of moodbar users over accounts created",
          x: "2011-11-01",
          shortText: "A",
          text: "Added icon to increase MoodBar link saliency"
        },
       {
          series: "% of moodbar users over accounts created",
          x: "2011-12-14",
          shortText: "B",
          text: "Added tooltip to increase MoodBar link saliency"
        },
       {
          series: "% of moodbar users over accounts created",
          x: "2012-05-23",
          shortText: "C",
          text: "UI changes to make MoodBar link more visibile"
        },
       {
          series: "% of moodbar users over accounts created", 
          x: "2012-06-14",
          shortText: "D",
          text: "MoodBar disabled for new registered users for 2 weeks"
        },
       {
          series: "% of moodbar users over accounts created",
          x: "2012-06-29",
          shortText: "E",
          text: "MoodBar re-enabled"
        }
   ];

   var labels_g0 = [
        {
          series: "posts",
          x: "2011-09-09",
          shortText: "A",
          text: "Vandalism"
        },
        {  
          series: "posts",
          x: "2011-10-05",
          shortText: "B",
          text: "Spam"
        },
        {
          series: "posts",
          x: "2011-11-01",
          shortText: "C",
          text: "Added icon to increase MoodBar link saliency"
        },
        {
          series: "posts",
          x: "2011-11-17",
          shortText: "D",
          text: "Made Moodbar message mandatory"
        },
       {
          series: "posts",
          x: "2011-12-14",
          shortText: "E",
          text: "Added tooltip to increase MoodBar link saliency"
        },
       {
          series: "posts",
          x: "2012-05-23",
          shortText: "F",
          text: "UI changes to make MoodBar link more visibile"
        },
       {
          series: "posts",
          x: "2012-06-14",
          shortText: "G",
          text: "MoodBar disabled for new registered users for 2 weeks"
        },
       {
          series: "posts",
          x: "2012-06-29",
          shortText: "H",
          text: "MoodBar re-enabled"
        }
      ];

   var labels_g0r = [
        {
          series: "% of posts with message",
          x: "2011-11-17",
          shortText: "A",
          text: "Made Moodbar message mandatory"
        }
      ];

   var labels_g = [
        {
          series: "sad",
          x: "2011-09-09",
          shortText: "A",
          text: "Vandalism (46 identical posts by single user)"
        },
        {
          series: "happy",
          x: "2011-10-05",
          shortText: "B",
          text: "Spam (77 identical posts by single user)"
        },
        {
          series: "happy",
          x: "2011-11-01",
          shortText: "C",
          text: "Added icon to increase MoodBar link saliency"
        },
        {
          series: "happy",
          x: "2011-11-17",
          shortText: "D",
          text: "Made Moodbar message mandatory"
        },
       {
          series: "happy",
          x: "2011-12-14",
          shortText: "E",
          text: "Added tooltip to increase MoodBar link saliency"
        },
       {
          series: "happy",
          x: "2012-05-23",
          shortText: "F",
          text: "UI changes to make MoodBar link more visibile"
        },
       {
          series: "happy",
          x: "2012-06-14",
          shortText: "G",
          text: "MoodBar disabled for new registered users for 2 weeks"
        },
       {
          series: "happy",
          x: "2012-06-29",
          shortText: "H",
          text: "MoodBar re-enabled"
        }
      ];

  g0 = new Dygraph(
    document.getElementById('graphdiv0'),
    "./d0.csv",
    {
      ylabel: 'Moodbar posts',
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
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0);
          }
    }
  );

  g0r = new Dygraph(
    document.getElementById('graphdiv0r'),
    "./d0r.csv",
    {
      ylabel: '% of posts with message',
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
      colors: ["rgba(50,50,100,0.6)"],
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g0r);
          }
    }
  );

  g1 = new Dygraph(
    document.getElementById('graphdiv1'),
    "./d1.csv",
    {
      ylabel: 'Moodbar posts',
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

  g3 = new Dygraph(
    document.getElementById('graphdiv3'),
    "./d3.csv",
    {
      ylabel: '% of users by accounts created',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,
      labelsDivWidth: 350,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      colors: ["rgb(50,100,100)"],
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)',
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g3);
          }
    }
  );

  g4 = new Dygraph(
    document.getElementById('graphdiv4'),
    "./d4.csv",
    {
      ylabel: '% of users by accounts created',
      axisLabelFontSize: 12,
      legend: 'always',
      rollPeriod: 1,
      showRoller: true,
      labelsKMB: true,                                                 
      labelsDivWidth: 350,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      labelsSeparateLines: true,
      colors: ["rgb(100,50,100)"],
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)'
    }
  );

  g = new Dygraph(
    document.getElementById('graphdiv'),
    "./d.csv",
    {
      ylabel: 'Moodbar posts',
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

  g2 = new Dygraph(
    document.getElementById('graphdiv2'),
    "./d2.csv",
    {
      ylabel: 'Moodbar posts',
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
      colors: [
	"#F6A03D",
	"#CD6607", 
	"#B1B17B", 
	"#6787B0", 
	"#405774"
      ],
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)'
    }
  );

  gc0 = new Dygraph(
    document.getElementById('graphdivc0'),
    "./d_c0.csv",
    {
      title: 'editors with 0 edits',
      valueRange: [0, 110],
      ylabel: '% of daily posts',
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

  gc1 = new Dygraph(
    document.getElementById('graphdivc1'),
    "./d_c1.csv",
    {
      title: 'editors with 1 edit',
      ylabel: '% of daily posts',
      valueRange: [0, 110],
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

   gc10 = new Dygraph(
    document.getElementById('graphdivc10'),
    "./d_c10.csv",
    {
      title: 'editors with 2-9 edits',
      ylabel: '% of daily posts',
      valueRange: [0, 110],
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

  gc50 = new Dygraph(
    document.getElementById('graphdivc50'),
    "./d_c50.csv",
    {
      title: 'editors with 10-49 edits',
      ylabel: '% of daily posts',
      valueRange: [0, 110],
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

  gc50plus = new Dygraph(
    document.getElementById('graphdivc50plus'),
    "./d_c50plus.csv",
    {
      title: 'editors with 50+ edits',
      ylabel: '% of daily posts',
      valueRange: [0, 110],
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

</script>
</body>
</html>
