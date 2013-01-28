<?php
if (!isset($_GET['p']) || $_GET['p'] == '')
{
echo <<<EOF
<html>
<head>
<title>Article Feedback v5: feedback by article (DE)</title>
<link rel="stylesheet" type="text/css" href="../../css/features.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="header_fixed">
<h1>Article Feedback v5 dashboard (DE)</h1>
<h2 class="toggle"><strong>articles:</strong> <a href="../?c=">[all articles]</a> [single articles]</h2>
<form method="GET">
<fieldset><legend>Article Title</legend>
<input type="text" name="p" id="title" value="Eichhörnchen" /> <input type="submit" />
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
$db = mysql_connect('dewiki-p.rrdb.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);
mysql_select_db('dewiki_p', $db);

//utilities
require_once('../../inc/utilities.inc.php');

// get page ID from title
$p = urldecode($_GET['p']);
$page_title = str_replace("_", " ", $p);
$page_title_n = str_replace(" ", "_", $p);

$pars = array('prop' => 'info', 'titles' => $page_title_n);
$s = callAPI('de', 'query', $pars);
$st = array_keys($s['query']['pages']);
$page_id = trim($st[0]);

$sql = 'SELECT DATE(f.af_created) AS date, COUNT(DISTINCT f.af_id) AS f, SUM(CASE WHEN f.af_has_comment = 1 THEN 1 ELSE 0 END) AS ft FROM aft_article_feedback f WHERE af_page_id = "'.$page_id.'" GROUP BY 1;';
$sql1 = 'SELECT DATE(f.af_created) AS date, f.af_bucket_id AS bucket, f.af_link_id AS link, a.aa_response_text AS text FROM aft_article_answer a JOIN aft_article_feedback f ON a.aa_feedback_id = f.af_id WHERE a.aa_field_id IN (2,4,6) AND f.af_page_id = "'.$page_id.'" ORDER BY date ASC';	
$headers= array('timestamp','bucket','link','text');

// get daily feedback
$result = mysql_query($sql, $db);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$r = array();
while($row = mysql_fetch_assoc($result))
{
	$r[$row['date']] = array($row['f'],$row['ft']);
	$csv .=  implode(',',$row)."\n";
	$csv2 .= '    "'.$row['date'].','.$row['f'].','.$row['ft'].'\n" +'."\n";
}

if ($_GET['format'] == 'json')
{
	echo json_encode($r);
}
else if ($_GET['format'] == 'csv')
{
	header("Content-Type: text/plain");
	echo "date,feedback,feedback with text\n";
	echo $csv;
}
else
{
	$csv_link = "?p=".$_GET['p']."&amp;o=".$_GET['o']."&amp;format=csv";
	$json_link = "?p=".$_GET['p']."&amp;o=".$_GET['o']."&amp;format=json";
	echo <<<EOF
<html>
<head>
<title>Article Feedback v5: feedback for $page_title (DE)</title>
<link rel="stylesheet" type="text/css" href="../../css/features.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="../../js/dygraph-combined.js"></script>
<script type="text/javascript" src="../../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../js/jquery.tablesorter.dev.js"></script>
<script>
	$(document).ready(function() 
    { 
        $("#csv").tablesorter(); 
    } 
	); 
</script>
</head>
<body>
<div id="header_fixed">
<h1>Article Feedback v5 dashboard (DE)</h1>
<h2 class="toggle"><strong>articles:</strong> <a href="../?c=">[all articles]</a> [single articles]</h2>
<form method="GET">
<fieldset><legend>Article Title</legend>
<input type="text" name="p" id="title" value="$page_title" />
<input type="submit" />
</fieldset>
</form>
</div>
<div id="wrapper_scrollable">
<h3 style="padding-top:1em">Daily feedback for article: <a style="text-decoration:none" 
href="http://de.wikipedia.org/wiki/$page_title">$page_title</a></h3>
EOF;


if (count($r) >0)
{

	/*
	$result1 = mysql_query($sql1, $db);

	$r1 = array();
	$i = 1;
	$t = '<table id="csv" class="csv">'."\n";
	$t .= '<thead><tr>'."\n";
	foreach($headers as $h)
	{
		$t .= "<th>$h</th>\n";
	}
	$t .= '</tr></thead>'."\n";
	$t .= '<tbody>'."\n";
	while($row1 = mysql_fetch_assoc($result1))
	{
		$class = ($i % 2)? "odd" : "";
		$t .= '<tr class="'.$class.'">'."\n";
		foreach($row1 as $f)
		{
			$t .= "<td>$f</td>\n";
		}
		$t .= '</tr>'."\n";
		$i++;
	}
	$t .= '</tbody>'."\n";
	$t .= '</table>'."\n";
	*/

	echo <<<EOF

<!-- page_id: $page_id -->
<h3><a style="text-decoration:none" href="$json_link">[json]</a> <a href="$csv_link" style="text-decoration:none">[csv]</a></h3>
<!--
<p class="small">
<strong>Hover</strong> over the graph to  display values for specific dates<br />
<strong>Click and hold</strong> on the graph to zoom in on a specific date range<br />
<strong>Double click</strong> to reset the default date range<br />
Use the <strong>input box</strong> to adjust the moving average span
</p>
<p class="small">Data released under <a href="http://creativecommons.org/publicdomain/zero/1.0/">CC0</a> license</p>
-->
<p class="small">Last updated: 
EOF;

	echo date("Y-m-d H:i:s T");

	echo <<<EOF
</p>
<div id="graphdiv" style="width:900px; height:240px;"></div>
</div>
<script type="text/javascript">
   var labels_g = [
        {
          series: "feedback",
          x: "2012-01-11",
          shortText: "D",
          text: "Feedback trigger and overlay widget deployed"
        },
        {
          series: "feedback",
          x: "2012-01-18",
          shortText: "E",
          text: "SOPA blackout"
        }
       ];

  g3 = new Dygraph(
    document.getElementById('graphdiv'),

EOF;

echo '    "date,feedback,feedback with text\n" +'."\n";
echo substr($csv2, 0,-3).",\n";

echo <<<EOF
    {
      ylabel: 'Daily feedback',
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
      colors: ["rgba(50,50,200,0.8)","rgba(50,50,200,0.4)"],
      strokeWidth: 1.5,
      labelsSeparateLines: true,                                       
      showRangeSelector: false,
      drawCallback: function(g, is_initial) {
            if (!is_initial) return;
            g.setAnnotations(labels_g);
          }
      }
  );
</script>
<div style="height:11.6em" id="stream"></div>
$t
</body>
</html>
EOF;

}
else
{	
	echo <<<EOF
	<p class="error">Sorry, no feedback found for this article.</p>
</body>
</html>
EOF;
}
}
}
?>
