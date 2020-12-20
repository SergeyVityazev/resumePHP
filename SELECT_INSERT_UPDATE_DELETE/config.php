<?php
//ini_set('display_errors',1);
$connect=new PDO ("mysql:host=localhost;dbname=SELECT","root","1986215554a");
$sqlchar='utf8';
//$connect->exec('SET CHARACTER SET utf8');
$connect->query ( 'SET character_set_connection = '.$sqlchar );
$connect->query ( 'SET character_set_client = '.$sqlchar );
$connect->query ( 'SET character_set_results = '.$sqlchar );


