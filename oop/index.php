<?php
class Car {
  public $brand;
  public $color;
  private $speed;

  public function __construct($brand, $color, $speed = 0) {
    $this->brand = $brand;
    $this->color = $color;
    $this->speed = $speed;
  }

  public function setSpeed($speed){
    if($speed > 0){
      $this->speed = $speed;
    }
  }

  public function getSpeed(){
    return $this->speed;
  }

  public function getDescription(){
    return "This car is a " . $this->color . " " . $this->brand;
  }
}

$car = new Car("Tesla", "Black", 120);
echo $car->getDescription();
echo "<br/>";
echo $car->getSpeed() . "KM/H";
?>