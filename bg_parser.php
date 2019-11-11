<?php
require 'vendor/autoload.php';
$redis = new Predis\Client([
    'host' => 'redis'
]);
do {
    $data = strval(file_get_contents('http://nginx/service.php'));
    $redis->set('time', $data);
    $redis->expire('time',30);
    sleep(30);
} while (true);