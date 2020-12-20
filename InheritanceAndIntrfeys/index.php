<?php

abstract class Product
{
    private $weight;
    private $type;
    private $color;
    private $price;
    private $namemarket='MyMarket';



    abstract public function Discount();

    public function Comment(){
        echo "<br>";
        echo "<br>";
     return 'Name - '.$this->namemarket;
  }

    public function Delivery($weight){
     if ($weight>10){
        return  $this->Delivery=300;
     }
     else {
         return  $this->Delivery=250;
     }
    }

}


interface iCars
{
    public function Mileage();

    public function State();
}

interface iPEn{
    public function Year();
}

interface iDuck{
    public function State();
}

interface iTV{
    public function Type();
}



class Cars extends Product implements iCars
{
    private $price;
    private $weight;
    private $brand;

    public function CarsMethod($price,$weight,$brand){
        $this->price=$price;
        $this->weight=$weight;
        $this->brand=$brand;
        echo $this->market = parent::Comment();
        echo "<br>";
        echo $this->delivery = parent::Delivery($weight);
        echo "<br>";
        echo $brand;
    }

    public function Discount()
    {
        // TODO: Implement Discount() method.
    }

    public function Mileage()
    {
     return 10000;   // TODO: Implement Mileage() method.
    }

    public function State()
    {
        return "Germany";   // TODO: Implement Mileage() method.
    }

}



class Pen extends Product implements iPen
{
    private $price;
    private $color;


    public function PenMethod($price,$color){
        $this->price=$price;
        $this->color=$color;
        echo "<br>";
        echo $this->market = parent::Comment();
    }

    public function Discount()
    {
        // TODO: Implement Discount() method.
    }

    public function Year()
    {
        return "2018";
    }

}

class Duck extends Product implements iDuck
{
    private $price;
    private $state;


    public function DuckMethod($price,$state){
        echo "<br>";
        echo $this->price=$price;
        echo "<br>";
        echo  $this->state=$state;
        echo "<br>";
        echo $this->market = parent::Comment();
    }

    public function Discount()
    {
        // TODO: Implement Discount() method.
    }

    public function State()
    {
        return "USA";
    }

}

class TV extends Product implements iTV
{
    private $price;
    private $color;


    public function TVMethod($price,$color){
        $this->price=$price;
        $this->color=$color;
        echo "<br>";
        echo $this->market = parent::Comment();
    }

    public function Discount()
    {
        // TODO: Implement Discount() method.
    }

    public function Type()
    {
        return "Samsung";
    }

}




$BMV = new Cars;
$BMV->CarsMethod(1000,5,"BMV");

$Audi = new Cars;
$Audi->CarsMethod(2000,25,"Audi");

$Samsung=new TV;
$Samsung->TVMethod(500,"white");

$Duck=new Duck;
$Duck->DuckMethod(100,"grey");

$Pen=new Pen;
$Pen->PenMethod(200,"red");

