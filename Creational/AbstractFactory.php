<?php
/**
 * Created by PhpStorm.
 * User: mohamad
 * Date: 4/23/22
 * Time: 11:55 AM
 */
/*
 * In Abstract Factory pattern an interface is responsible for creating
 * a factory of related objects without explicitly specifying their classes.
 * Each generated factory can give the objects as per the Factory pattern.
 */
namespace AbstractFactory;
interface Shape {
    public function draw ();
}


/***
 * Class Rectangle
 */
class Rectangle implements Shape {

    public function draw()
    {
        // TODO: Implement draw() method.
        echo 'Inside Rectangle::draw() Method.';
    }
}

/***
 * Class Square
 */
class Square implements Shape {

    public function draw()
    {
        // TODO: Implement draw() method.
        echo 'Inside Square::draw() Method.';
    }
}

/***
 * Class RoundedRectangle
 */
class RoundedRectangle implements Shape {

    public function draw()
    {
        // TODO: Implement draw() method.
        echo 'Inside RoundedRectangle::draw() Method.';
    }
}

/***
 * Class RoundedSquare
 */
class RoundedSquare implements Shape {

    public function draw()
    {
        // TODO: Implement draw() method.
        echo 'Inside RoundedSquare::draw() Method.';
    }
}

Abstract class AbstractFactory {
    abstract function getShape($shapeType);
}

/***
 * Class ShapeFactory
 */
class ShapeFactory extends AbstractFactory {
    public function getShape($shapeType) {
        if (strcasecmp($shapeType,'RECTANGLE') === 0) {
            return new Rectangle();
        }
        else if (strcasecmp($shapeType,'SQUARE') === 0) {
            return new Square();
        }

        return null;
    }
}

/*
 * Class RoundedShapeFactory
 */
class RoundedShapeFactory extends AbstractFactory {
    public function getShape($shapeType) {
        if (strcasecmp($shapeType,'RECTANGLE') === 0) {
            return new RoundedRectangle();
        }
        else if (strcasecmp($shapeType,'SQUARE') === 0) {
            return new RoundedSquare();
        }

        return null;
    }
}

/*
 * Class FactoryProducer
 */
class FactoryProducer {
    public function getFactory($rounded) {
        if ($rounded) {
            return new RoundedShapeFactory();
        } else {
            return new ShapeFactory();
        }
    }
}
$factoryProducer = new FactoryProducer();

$type = $factoryProducer->getFactory(false);
$rec = $type->getShape('RECTANGLE');
$rec->draw();
echo "</br></br>";

$type1 = $factoryProducer->getFactory(true);
$rec1 = $type1->getShape('RECTANGLE');
$rec1->draw();
echo "</br></br>";

$type2 = $factoryProducer->getFactory(true);
$squ = $type2->getShape('SQUARE');
$squ->draw();
echo "</br></br>";