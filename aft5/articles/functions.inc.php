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
?>
