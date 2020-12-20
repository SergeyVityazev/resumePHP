<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Standart_function</title>
</head>

<body>

<?php
$link='https://api.openweathermap.org/data/2.5/weather';
$city = 'London';
$appid='059d32e4933efe1aad5128e726d200c3';


$url="$link?q=$city&appid=$appid";
$array_string= file_get_contents($url);

if ($array_string === false) {
 exit('Не удалось получить данные');
}


$array=json_decode($array_string,true);
if ($array === null) {
    exit('Ошибка декодирования json');
}


$NewArray["temp"]=(!empty($array['main']['temp']))?$array['main']['temp']:'Данные не получены';
$NewArray["pressure"]=(!empty($array['main']['pressure']))?$array['main']['pressure']:'Данные не получены';
$NewArray["speed"]=(!empty($array['wind']['speed']))?$array['wind']['speed']:'Данные не получены';

echo "Town is ". $city;
echo "<br>";
echo 'temp='.$NewArray["temp"];
echo "<br>";
echo 'pressure='.$NewArray["pressure"];
echo "<br>";
echo 'speed='.$NewArray["speed"];

?>

</body>

</html>







