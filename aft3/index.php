<?php
//DB connection
$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('enwiki-p.rrdb.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);
mysql_select_db('enwiki_p', $db);

//utilities
require_once('../inc/utilities.inc.php');

// top rated articles ever
$max = 50;
$psql = 'SELECT p.page_title AS title, t.aap_page_id AS pid, t.ratings AS ratings FROM (SELECT aap_page_id, MAX(aap_count) AS ratings FROM article_feedback_pages GROUP BY aap_page_id HAVING ratings <= 20000 ORDER BY ratings DESC LIMIT '.$max.') AS t LEFT JOIN page p ON t.aap_page_id = p.page_id;';
$presult = mysql_query($psql, $db);
$pr = array();
$pt = array();
while($row = mysql_fetch_assoc($presult))
{
        $pr[$row['pid']] = $row['ratings'];
        $pt[$row['pid']] = $row['title'];
}

if (!$presult) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    die($message);
}

echo <<<EOF
<html>
<head>
<title>Article Feedback Hall of Fame</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<script type="text/javascript" src="../js/dygraph-combined.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="wrapper">
<h1>Article Feedback Hall of Fame</h1>
<h3>$max most rated articles ever</h3>
<table class="hof">
<tr><th>Article</th><th>Cumulative ratings</th></tr>
EOF;

foreach($pr as $k => $v)
{
	$t = $pt[$k];
	$v = number_format($v);
	echo "<tr><td><a title=\"Daily ratings for article: $t\" href=\"../aft2/?p=$t\">$t</td><td>$v</td></tr>\n";
}

echo <<<EOF
</table>
<p class="small">Last updated:
EOF;
echo date("Y-m-d H:i:s T");
echo <<<EOF
</p>
</div>
</body>
</html>
EOF;
?>
