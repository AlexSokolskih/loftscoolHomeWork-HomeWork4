<?php
/**
 * Created by PhpStorm.
 * User: sokolskih
 * Date: 03.04.2017
 * Time: 8:28
 */

$c = curl_init('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
//curl_setopt($c, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/$twitter_id.xml?count=1");
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt  ($c, CURLOPT_HEADER, true);

$src = curl_exec($c);
curl_close($c);

$json = json_decode($src);

echo "pageid: ".$json->query->pages->{'15580374'}->pageid.'<br>';
echo "title: ".$json->query->pages->{'15580374'}->title.'<br>';
