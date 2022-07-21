<?php

declare(strict_types=1);

//abstract class Vehicle
//{
//    private $data = [];
//
//    final public function setPart(string $key, object $value)
//    {
//        $this->data[$key] = $value;
//    }
//}
//
//class Car extends Vehicle
//{
//} //model of Car
//class Truck extends Vehicle
//{
//} //Model of Truck
//class Wheel
//{
//}
//class Engine
//{
//}
//class Door
//{
//}
//
//
//interface Builder
//{
//    public function createVehicle();
//
//    public function addWheel();
//
//    public function addEngine();
//
//    public function addDoors();
//
//    public function getVehicle(): Vehicle;
//}
//
//class TruckBuilder implements Builder
//{
//
//    private Truck $truck;
//
//    public function createVehicle()
//    {
//        $this->truck = new Truck();
//    }
//
//    public function addWheel()
//    {
//        $this->truck->setPart('wheel create', new Wheel());
//    }
//
//    public function addEngine()
//    {
//        $this->truck->setPart('engine create', new Engine());
//    }
//
//    public function addDoors()
//    {
//        $this->truck->setPart('door create', new Door());
//    }
//
//    public function getVehicle(): Truck
//    {
//        return $this->truck;
//    }
//}
//
//class Director
//{
//    private $builder;
//
//    public function build(Builder $builder)
//    {
//        $builder->createVehicle();
//        $builder->addDoors();
//        $builder->addEngine();
//        $builder->addWheel();
//
//        return $builder->getVehicle();
//    }
//}
//
//$truck = new TruckBuilder();
//$newVehicle = (new Director())->build($truck);
//
//print_r($newVehicle);

class Home
{
    public $dar;
    public $panjere;
    public $divar;
}

interface Builder
{
    public function reset();

    public function setDar($bool);

    public function setDivar($divar);

    public function setPanjere($bool);

    public function build();
}

class HomeBuilder implements Builder
{

    private $home;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->home = new Home();
    }

    public function setDar($bool)
    {
        $this->home->dar = $bool;
        return $this;
    }

    public function setDivar($divar)
    {
        $this->home->divar = $divar;
        return $this;
    }

    public function setPanjere($bool)
    {
        $this->home->panjere = $bool;
        return $this;
    }

    // sakhtim baaye in ke obj HomeBuilder tabdil be Obj Home beshe
    public function build()
    {
        return $this->home;
    }
}

//$HOME = (new HomeBuilder())
//    ->setDar(true)
//    ->setDivar(4)
//    ->setPanjere(true)
//    ->build();


//OR

class Director
{
    public $builder;

    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }
    public function ConstraintHome(Builder $builder)
    {
        $builder->setDar(true);
        $builder->setDivar(4);
        $builder->setPanjere(true);
        return $builder->build();
    }
}

$director = new Director();
$home = $director->ConstraintHome(new HomeBuilder());
var_dump($home);