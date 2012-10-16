<?php
define('DEFAULT_FILTER_C', '');
define('DEFAULT_FILTER_O', '');
$csvheaders = "['bucket', 'link', 'page_title', 'text']";
switch ($_GET['c'])
{
	case 'r':
	$c = '_r';
	$p = '?c=r';
 	$filter_c = '<h2 class="toggle"><strong>articles:</strong> <a href="?c=">[all articles]</a> [random sample] <a href="?c=a">[additional articles]</a> <a href="../articles/?p=Global+warming">[single articles]</a></h2>'."\n";
	break;

	case 'a':
	$c = '_a';
	$p = '?c=a';
 	$filter_c = '<h2 class="toggle"><strong>articles:</strong> <a href="?c=">[all articles]</a> <a href="?c=r">[random sample]</a> [additional articles] <a href="../articles/?p=Global+warming">[single articles]</a></h2>'."\n";
	break;

	default:
	$c = DEFAULT_FILTER_C;
	$p = '?c=';
	$filter_c = '<h2 class="toggle"><strong>articles:</strong> [all articles] <a href="?c=r">[random sample]</a> <a href="?c=a">[additional articles]</a> <a href="../articles/?p=Global+warming">[single articles]</a></h2>'."\n";
	break;	
}
switch ($_GET['o'])
{
	case 1:
	$o = '_option1';
	$filter_o = '<h2 class="toggle"><strong>design:</strong> <a href="'.$p.'&amp;o=">[all options]</a> [option 1] <a href="'.$p.'&amp;o=2">[option 2]</a> <a href="'.$p.'&amp;o=3">[option 3]</a></h2>'."\n";
	$csvheaders = "['bucket', 'link', 'page_title', 'found', 'text']";
	break;

	case 2:
	$o = '_option2';
	$filter_o = '<h2 class="toggle"><strong>design:</strong> <a href="'.$p.'&amp;o=">[all options]</a> <a href="'.$p.'&amp;o=1">[option 1]</a> [option 2] <a href="'.$p.'&amp;o=3">[option 3]</a></h2>'."\n";
	$csvheaders = "['bucket', 'link', 'page_title', 'type', 'text']";
	break;

	case 3:
	$o = '_option3';
	$filter_o = '<h2 class="toggle"><strong>design:</strong> <a href="'.$p.'&amp;o=">[all options]</a> <a href="'.$p.'&amp;o=1">[option 1]</a> <a href="'.$p.'&amp;o=2">[option 2]</a> [option 3]</h2>'."\n";
	$csvheaders = "['bucket', 'link', 'page_title', 'rating', 'text']";
	break;
	
	default:
	$o = DEFAULT_FILTER_O;
	$filter_o = '<h2 class="toggle"><strong>design:</strong> [all options] <a href="'.$p.'&amp;o=1">[option 1]</a> <a href="'.$p.'&amp;o=2">[option 2]</a> <a href="'.$p.'&amp;o=3">[option 3]</a></h2>'."\n";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<title>Article Feedback v5 stream</title>
	<link rel="stylesheet" href="http://toolserver.org/~dartar/css/features.css" type="text/css" />
<!--
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.csvToTable.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.dev.js"></script>
	<script>
	$(function() {
		$('#csv').CSVToTable('aft_article_answer<?php echo $c; ?>_dump<?php echo $o; ?>.tsv', { headers: <?php echo $csvheaders; ?>, tableClass:'csv', loadingText: 'Loading data...', loadingImage: 'images/loading.gif', startLine: 1, separator: "\t" }).bind("loadComplete",function() { 
    			$('#csv').find('table').tablesorter();
		});
	});
	</script>
-->
</head>
<body style="margin:0">
<div id="csv_header">
	<h1>Article Feedback v5 stream</h1>
	<?php echo $filter_c."\n".$filter_o; ?>
	<h3 class="streamlink"><a href="../<?php echo $p; ?>" style="text-decoration:none">&#x25B8 dashboard</a></h3>
	<p>The feedback stream is temporarily disabled, apologies for the inconvenience.</p>
	<p class="small">Feedback stream dump: <a href="aft_article_answer<?php echo $c; ?>_dump.tsv">tsv</a> (last updated: <?php echo date("Y-m-d H:i:s T", filemtime('aft_article_answer'.$c.'_dump.tsv')); ?>)</p>
</div>
<div id="csv"></div>
</body>
</html>
