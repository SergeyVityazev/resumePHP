<?php
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