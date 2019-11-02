<?php
require('vendor/autoload.php');
$redis = new Predis\Client([
    'host' => 'redis'
]);
sleep(2);
echo $redis->ping();
