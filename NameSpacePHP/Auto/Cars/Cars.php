<?php
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