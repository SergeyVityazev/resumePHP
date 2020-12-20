<?php
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