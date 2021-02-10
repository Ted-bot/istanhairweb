<?php

$url = "https://www.reviewsmaker.com/api/public/yelp/?url=https://www.yelp.com/biz/munchinette-brooklyn";

$data_array = array(
    'name' => 'John Doe',
    'job' => 'web developer'
);

$data = http_build_query($data_array);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e = curl_exec($ch)) {
    echo $e;
}else {
    $decoded = json_decode($resp);
    foreach($decoded as $key => $val) {
        echo $key . '; ' . $val . '<br>';
    }
}
curl_close($ch);

?>