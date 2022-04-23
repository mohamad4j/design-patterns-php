<?php
/**
 * Created by PhpStorm.
 * User: mohamad
 * Date: 4/23/22
 * Time: 11:55 AM
 */
//In Factory pattern, we create object without exposing the creation
// logic to the client and refer to newly created object using a common interface.
namespace Factory;
interface Shape {
    public function draw ();
}

/***
 * Class Circle
 */
class Circle implements Shape {

    public function draw()
    {
        // TODO: Implement draw() method.
        echo 'Inside Circle::draw() Method.';
    }
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
 * Class ShapeFactory
 */
class ShapeFactory {
    public function shape($shapeType) {
        if ($shapeType == Null) {
            return null;
        }
        if ($shapeType === 'CIRCLE') {
            return new Circle();
        }
        if ($shapeType === 'RECTANGLE') {
            return new Rectangle();
        }
        if ($shapeType === 'SQUARE') {
            return new Square();
        }
        return null;
    }
}

$shapeFactory = new ShapeFactory();

$circle = $shapeFactory->shape('CIRCLE');
$circle->draw();
echo "</br></br>";

$rectangle = $shapeFactory->shape('RECTANGLE');
$rectangle->draw();
echo "</br></br>";

$square = $shapeFactory->shape('SQUARE');
$square->draw();
echo "</br></br>";