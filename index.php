<?php
require 'vendor/autoload.php';
$redis = new Predis\Client([
    'host' => 'redis'
]);

do {
    $value = $redis->get('time');
} while (!isset($value));

header('Cache-Control: public');
header('Expires: ' . gmdate('D, d M Y H:i:s', floatval($value) + 30) . ' GMT');
header('ETag: ' . md5(strval($value)));

echo $value;
