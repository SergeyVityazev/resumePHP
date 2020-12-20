<?php
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