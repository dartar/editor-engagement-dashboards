<?php

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
$base_url = 'http://en.wikipedia.org/wiki';

$sql = 'SELECT p.page_title AS page_title,cl_from AS page_id,cl_timestamp AS ts FROM categorylinks c JOIN page p ON c.cl_from = p.page_id WHERE cl_to = 
"Article_Feedback_5" ORDER BY cl_timestamp DESC LIMIT 20;';
$sql1 = 'SELECT p.page_title AS page_title,cl_from AS page_id,cl_timestamp AS ts FROM categorylinks c JOIN page p ON c.cl_from = p.page_id WHERE cl_to = 
"Article_Feedback_5_Additional_Articles" ORDER BY cl_timestamp DESC LIMIT 20;';

$result = mysql_query($sql, $db);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$r = array();
while($row = mysql_fetch_assoc($result))
{
	$r[$row['page_title']] = $row['ts'];
}

$result1 = mysql_query($sql1, $db);

if (!$result1) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$r1 = array();
while($row1 = mysql_fetch_assoc($result1))
{
	$r1[$row1['page_title']] = $row1['ts'];
}

echo <<<EOF
<html>
<head>
<title>AFT 5 categories</title>
<link rel="stylesheet" type="text/css" href="../css/features.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="wrapper">
<h1>AFT 5 categories</h1>
<h3><a style="text-decoration:none" href="$base_url/Category:Article Feedback 5">Category:Article Feedback 5</a></h3>
<table class="hof">
<tr><th>Article</th><th>Added</th></tr>
EOF;

foreach($r as $k => $v)
{
    echo "<tr><td><a style=\"text-decoration:none\" href=\"$base_url/$k\">$k</a></td><td>$v</td></tr>\n";
}

echo <<<EOF
</table>
<h3><a style="text-decoration:none" href="$base_url/Category:Article Feedback 5 Additional Articles">Category:Article Feedback 5 Additional 
Articles</a></h3>
<table class="hof">
<tr><th>Article</th><th>Added</th></tr>
EOF;

foreach($r1 as $k => $v)
{
    echo "<tr><td><a style=\"text-decoration:none\" href=\"$base_url/$k\">$k</a></td><td>$v</td></tr>\n";
}

echo <<<EOF
</table>
</body>
</html>
EOF;
?>
