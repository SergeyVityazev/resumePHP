<?php

abstract class Product
{
    private $weight;
    private $type;
    private $color;
    private $price;
    private $namemarket='MyMarket';
    private $Delivary;


    abstract public function Discount();

    public function Comment(){
        echo "<br>";
        echo "<br>";
        return 'Name - '.$this->namemarket;
    }


}


abstract class Cookie //Управления куками
{
    public static function set($key, $value, $time = 31536000)
    {
        setcookie($key, $value, time() + $time, '/') ;
    }

    public static function get($key)
    {
        if ( isset($_COOKIE[$key]) ){
            return $_COOKIE[$key];
        }
        return null;
    }

    public static function delete($key)
    {
        if ( isset($_COOKIE[$key]) ){
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}


class Cart
{
private $MassProduct;

    private $products;

    function __construct()
    {
        $this->products = Cookie::get('books') == null ?
            array()
            :
            unserialize(Cookie::get('books'));
    }
    public function getProducts()
    {
        return $this->products;
    }

    public function addProduct($id)
    {
        $id = (int)$id;

        if (!in_array($id, $this->products)) {
            array_push($this->products, $id);
        }

        Cookie::set('books', serialize($this->products));
    }

    public function deleteProduct($id)
    {
        $id = (int)$id;

        $key = array_search($id, $this->products);
        if ($key !== false){
            unset($this->products[$key]);
        }

        Cookie::set('books', serialize($this->products));
    }

    public function clear()
    {
        Cookie::delete('books');
    }

    public function getPrice($id)
    {
        $id = (int)$id;
        $price = array_search($id, $MassProduct);
return $this->$price;
    }




    public function Delivery($id){
        $id = (int)$id;
        $id = array_search($id, $MassProduct);
        $weight=$Massproduct[$id,'weight'];

        if ($weight>10){
            return  $this->Delivery=300;
        }
        else {
            return  $this->Delivery=250;
        }
    }

}


// обработка результатов формы заказа
$cart=new Cart;
if ($_GET['action']== 'add') {
    $id = $_GET['id'];
    $cart->addProduct($id);
    header('Location: index.php');
}elseif ($_GET['action'] == 'clear') {

    $cart->deleteProduct($id);
    header('Location: index.php');
}




class Order extends Cart {

    public function PrintMethod ($id) {
        echo 'Product:'.$this->$id;
        echo 'Price:'.$this->getPrice($id);
        echo 'Delivery:'.$this->Delivery($id);
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



//Не получаеться АВТОЛОУДЕР ПРОПИСАТЬ. ЧТО НЕ ТАК

function MyAutoload($classNameWithNamespace)
{
    $pathToFile=$_SERVER['DOCUMENT_ROOT'].str_replace('\\',DIRECTORY_SEPARATOR,$classNameWithNamespace).'php';
if (file_exists($pathToFile))
    include $pathToFile;
}

spl_autoload_register('MyAutoload');

namespace home\sergey\PhpstormProjects\NameSpacePHP\Auto\Cars;

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

$Pen->Comment();