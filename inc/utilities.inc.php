<?php

function getPage($proxy, $url, $referer, $agent, $header, $timeout) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);

    $result['EXE'] = curl_exec($ch);
    $result['INF'] = curl_getinfo($ch);
    $result['ERR'] = curl_error($ch);
    curl_close($ch);
    return $result;
}

function callAPI($project, $action, $parameters, $format="json") {
     $url_base = "http://";
     switch($project)
     {
        case "commons":
        case "meta":
		$url_base .= $project.".wikimedia.org/w/api.php?";
	break;

	default:
		$url_base .= $project.".wikipedia.org/w/api.php?";
     }
     $url .= $url_base;
     $url .= "action=$action";
     foreach($parameters as $k => $v)
     {
	$url .= "&$k=$v";
     }
     $url .= "&format=$format";
     $result = getPage(
     	'',// leave it blank if using no proxy
     	$url,
        '', // leave it blank if no referer
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8',
         0,
         15);

     $res = json_decode($result['EXE'], TRUE);
     if ($res != NULL)
     {
	return $res;
    }
    else
    {
	return "NA";
    }
}

?>
