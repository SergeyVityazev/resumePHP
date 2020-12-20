<?php
$link = 'http://api.openweathermap.org/data/2.5/weather';
$city = 'Rostov-na-Donu,ru';
$appid = 'fhgffghdf';

$url="$link?q=$city&appid=$appid";

echo "Полученная ссылка: $url";