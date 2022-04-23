<?php
/**
 * Created by PhpStorm.
 * User: mohamad
 * Date: 4/23/22
 * Time: 8:24 PM
 */
namespace Builder;


// Concrete Class
class Vehicle
{
    public $model;

    public $enginesCount;

    public $type;

    const CAR = "Car";

    const BUS = "Bus";

    const TRAILER = "Trailer";

    public function __construct()
    {

    }
}

// Builder interface
interface VehicleBuilderInterface
{
    public function setModel();

    public function setEnginesCount();

    public function setType();

    public function getVehicle();
}

// Builder implementations
class KiaCarBuilder implements VehicleBuilderInterface
{
    private $vehicle;


    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function setModel()
    {
        $this->vehicle->model = "Kia";
    }

    public function setEnginesCount()
    {
        $this->vehicle->enginesCount = 1;
    }

    public function setType()
    {
        $this->vehicle->type = Vehicle::CAR;
    }

    public function getVehicle()
    {
        return $this->vehicle;
    }
}

class BmwBusBuilder implements VehicleBuilderInterface
{
    private $vehicle;


    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function setModel()
    {
        $this->vehicle->model = "Bmw";
    }

    public function setEnginesCount()
    {
        $this->vehicle->enginesCount = 2;
    }

    public function setType()
    {
        $this->vehicle->type = Vehicle::BUS;
    }

    public function getVehicle()
    {
        return $this->vehicle;
    }
}

class ChevroletTrailerBuilder implements VehicleBuilderInterface
{
    private $vehicle;


    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function setModel()
    {
        $this->vehicle->model = "Chevrolet";
    }

    public function setEnginesCount()
    {
        $this->vehicle->enginesCount = 2;
    }

    public function setType()
    {
        $this->vehicle->type = Vehicle::TRAILER;
    }

    public function getVehicle()
    {
        return $this->vehicle;
    }
}

class VehicleDirector
{
    public function build(VehicleBuilderInterface $builder)
    {
        $builder->setModel();
        $builder->setEnginesCount();
        $builder->setType();

        return $builder->getVehicle();
    }
}

$kiaCar = (new VehicleDirector())->build(new KiaCarBuilder(new Vehicle()));

$bmwBus = (new VehicleDirector())->build(new BmwBusBuilder(new Vehicle()));

$chevroletTrailer = (new VehicleDirector())->build(new ChevroletTrailerBuilder(new Vehicle()));


echo "<pre>";
var_dump($kiaCar);
echo "\n";
echo "Vehicle Model: " . $kiaCar->model . "\n";
echo "vehicle Engines: " . $kiaCar->enginesCount . "\n";
echo "vehicle Type: " . $kiaCar->type . "\n";
echo "<hr/>";
var_dump($bmwBus);
echo "\n";
echo "vehicle Model: " . $bmwBus->model . "\n";
echo "vehicle Engines: " . $bmwBus->enginesCount . "\n";
echo "vehicle Type: " . $bmwBus->type . "\n";
echo "<hr/>";
var_dump($chevroletTrailer);
echo "\n";
echo "vehicle Model: " . $chevroletTrailer->model . "\n";
echo "vehicle Engines: " . $chevroletTrailer->enginesCount . "\n";
echo "vehicle Type: " . $chevroletTrailer->type . "\n";
echo "<pre>"; 