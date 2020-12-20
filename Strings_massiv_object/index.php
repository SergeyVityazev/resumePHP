<?php

$Animals=array(
'Eurasia'=>Array("Birch silkworm","Small gopher","Hoses"),
'Australia'=>Array("ningo","guld mouse","earth parrot"),
'South_Amerika'=>Array("amozonian dolphin","capybara","mountain tapir"),
'Africa'=>Array("African buffalo","Warthog","Zebra Grevi"),
'North_Amerika'=>Array("Dasymutilla bonita","capybara","Ericrociss")
);


$Animals_buffer=array();
$Animals_2word=array();
$Animals_first=array();
$Animals_second=array();
$RandomAnimals=array();


foreach ($Animals as $key=>$animal) {
    foreach ($animal as $key_innit=>$value){
       if (substr_count($value," ")==1){
           $Animals_buffer = explode(' ',$value);
           $Animals_first[$key][]=$Animals_buffer[0];
           $Animals_second[]=$Animals_buffer[1];
           $Animals_2word[]=$value;
       }
    }
}

echo "<pre>";
print_r($Animals_2word);
echo"<br>";

shuffle($Animals_second);


$i=0;
    foreach ($Animals_first as $key => $animal) {
        foreach ($animal as $key_innit => $value) {
            $RandomAnimals[$key][] = $value . ' ' . $Animals_second[$i];
            $i=$i+1;
        }
    }

echo "<pre>";
print_r($RandomAnimals);




