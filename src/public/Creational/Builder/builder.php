<?php

declare(strict_types=1);

class Car
{
    public string $color = 'white';
    public int $capacity = 5;
    public string $brand = 'unknown';
}


interface CarBuilderInterface
{
    public function build();

    public function setBrand(string $string);

    public function setCapacity(int $int);

    public function setColor(string $string);
}


class CarBuilder implements CarBuilderInterface
{

    private Car $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    public function setBrand(string $string): static
    {
        $this->car->brand = $string;
        return $this;
    }


    public function setCapacity(int $int): static
    {
        $this->car->capacity = $int;
        return $this;
    }


    public function setColor(string $string): static
    {
        $this->car->color = $string;
        return $this;
    }

    public function build(): Car
    {
        return $this->car;
    }
}

class MitsubishiCarDirector
{
    public function build(CarBuilder $builder): Car
    {
        $builder->setBrand(string: 'mitsubishi');
        $builder->setCapacity(int: 2);
        $builder->setColor(string: 'skyblue');
        return $builder->build();
    }
}

/**** response with director ****/
//$mitsubishiDirector = new MitsubishiCarDirector();
//$mitsubishiDirector = $director->build(new CarBuilder());
//var_dump($mitsubishiDirector);


/**** response normally ****/
$saipaCar = (new CarBuilder())
    ->setBrand('saipa')
    ->setCapacity(4)
    ->setColor('black')
    ->build();


$iranKhodroCar = (new CarBuilder())
    ->setBrand('irankhodro')
    ->setCapacity(2)
//    ->setColor('blue')
    ->build();


var_dump($saipaCar);
var_dump($iranKhodroCar);
