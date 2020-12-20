<?php
class Cars
{
    public $price;
    public $weight;

    public function __construct($price,$weight){
        $this->price=$price;
        $this->weight=$weight;
    }
}

class TV
{
    public $price;
    public $color="black";

    public function simpleMethod($priceTV,$colorTV){
        $this->price=$priceTV;
        $this->color=$colorTV;
    }
}

class Pen
{
    public $price;
    public $color;

    public function __construct($price,$color){
        $this->price=$price;
        $this->color=$color;
    }
}

class Duck
{
    public $weight;
    public $color;

    public function __construct($weight,$price){
        $this->weight=$weight;
        $this->color=$price;
    }
}

class Product
{
    public $weight;
    public $type;
    public $color;
    public $price;

    public function __construct($type,$price,$weight,$color){
        $this->weight=$weight;
        $this->type=$type;
    }
}

$BMV=new Cars('2000',1000);
$Samsung=new TV();
$Duck=new Duck(1,100);
$Pen=new Pen(12,23);
$Product=new Product('milk',100,1.0,'white');

$BMV->weight=2000;
$BMV->price=10000;
$Samsung->simpleMethod(500,"white");

echo "Samsung color: ".$Samsung->color;
echo "<br>";
echo "BMW price: ".$BMV->price;
echo "<br>";
echo "BMW weight: " .$BMV->weight;