<?php

if (!isset($_GET['p']) || $_GET['p'] == '')
{
echo <<<EOF
<html>
<head>
<title>Article Feedback: daily ratings for $page_title</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="wrapper">
<h1>Article Feedback: daily ratings per article</h1>
<form method="GET">
<fieldset><legend>Article Title</legend>
<input type="text" name="p" id="title" value="Justin Bieber" /> <input type="submit" />
</fieldset>
</form>
</div>
</body>
</html>
EOF;
}
else
{
//DB connection
$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('enwiki-p.rrdb.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);
mysql_select_db('enwiki_p', $db);

//utilities
require_once('../inc/utilities.inc.php');

// get page ID from title
$p = urldecode($_GET['p']);
$page_title = str_replace("_", " ", $p);
$page_title_n = str_replace(" ", "_", $p);

$pars = array('prop' => 'info', 'titles' => $page_title_n);
$s = callAPI('en', 'query', $pars);
$st = array_keys($s['query']['pages']);
$page_id = $st[0];

// get rev lengths
/*
$l = array();
$pars = array('prop' => 'revisions', 'titles' => $_GET['p'], 'rvstart' => '20110723000000', 'rvprop' => 'size|timestamp');
$h = callAPI('en', 'query', $pars);
$hst = $h['query']['pages'][$page_id]['revisions'];
foreach($hst as $ht)
{
	$k = substr($ht['timestamp'], 0, 10);
	$v = $ht['size'];
	$l[$k] = $v;
} 
print_r($l);
*/

// get daily ratings
$sql = 'SELECT DATE(aa_timestamp) AS date, CEILING(COUNT(*)/4) AS ratings FROM enwiki_p.article_feedback WHERE aa_timestamp >= "20110723000000" AND 
aa_page_id = "'.$page_id.'" GROUP BY LEFT(aa_timestamp,8);';
$result = mysql_query($sql, $db);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$r = array();
while($row = mysql_fetch_assoc($result))
{
	$r[$row['date']] = $row['ratings'];
}


if ($_GET['format'] == 'json')
{
	echo json_encode($r);
}
else if ($_GET['format'] == 'csv')
{
	header("Content-Type: text/plain");
	$csv ="Date,Daily ratings\n";
	foreach($r as $k => $v)
	{
    		$csv .= "$k,$v\n";
	}
	echo $csv;
}
else
{
	$csv_link = "?p=".$_GET['p']."&amp;format=csv";
	$json_link = "?p=".$_GET['p']."&amp;format=json";
	echo <<<EOF
<html>
<head>
<title>AFT: daily ratings for $page_title</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="wrapper">
<h1>AFT: daily ratings per article</h1>
<form method="GET">
<fieldset><legend>Article Title</legend>
<input type="text" name="p" id="title" value="$page_title" /> <input type="submit" />
</fieldset>
</form>
<h3>Daily ratings for article: <a style="text-decoration:none" href="http://en.wikipedia.org/wiki/$page_title">$page_title</a></h3>
<h3>[plot] <a style="text-decoration:none" href="$json_link">[json]</a> <a href="$csv_link" style="text-decoration:none">[csv]</a></h3>
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Graphs refreshed daily. Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>
<div id="graphdiv"></div>
<p class="small">Last updated: 
EOF;

	echo date("Y-m-d H:i:s T");

	echo <<<EOF
</p>
</div>
<script type="text/javascript">
  g3 = new Dygraph(
    document.getElementById('graphdiv'),

EOF;

$csv = '    "Date,Daily ratings\n" +'."\n";

foreach($r as $k => $v)
{
    $csv .= '    "'.$k.','.$v.'\n" +'."\n";
}

echo substr($csv, 0,-3).",\n";

echo <<<EOF
    {
      ylabel: 'Daily ratings',
      legend: 'always',
      axisLabelFontSize: 12,
      rollPeriod: 1,
      showRoller: true,
      labelsDivWidth: 200,
      labelsDivStyles: {
        'backgroundColor': 'transparent',
         'font-weight': 300,
         'text-align': 'left'
      },
      colors: ["rgba(50,50,200,0.6)"],
      labelsSeparateLines: true,                                       
      showRangeSelector: false,
      rangeSelectorHeight: 30,
      rangeSelectorPlotStrokeColor: 'rgba(50,50,50,0.3)',
      rangeSelectorPlotFillColor: 'rgba(50,50,50,0.1)'
    }
  );
</script>
</body>
</html>
EOF;
}
}
?>
