<?php
/**
 * Created by PhpStorm.
 * User: mohamad
 * Date: 4/24/22
 * Time: 11:40 AM
 */

namespace RefactoringGuru\Prototype\Conceptual;

/**
 * The example class that has cloning ability. We'll see how the values of field
 * with different types will be cloned.
 */
class Prototype
{
    public $primitive;
    public $component;
    public $circularReference;

    /**
     * PHP has built-in cloning support. You can `clone` an object without
     * defining any special methods as long as it has fields of primitive types.
     * Fields containing objects retain their references in a cloned object.
     * Therefore, in some cases, you might want to clone those referenced
     * objects as well. You can do this in a special `__clone()` method.
     */
    public function __clone()
    {
        $this->component = clone $this->component;

        // Cloning an object that has a nested object with backreference
        // requires special treatment. After the cloning is completed, the
        // nested object should point to the cloned object, instead of the
        // original object.
        $this->circularReference = clone $this->circularReference;
        $this->circularReference->prototype = $this;
    }
}

class ComponentWithBackReference
{
    public $prototype;

    /**
     * Note that the constructor won't be executed during cloning. If you have
     * complex logic inside the constructor, you may need to execute it in the
     * `__clone` method as well.
     */
    public function __construct(Prototype $prototype)
    {
        $this->prototype = $prototype;
    }
}

/**
 * The client code.
 */
function clientCode()
{

    $p1 = new Prototype();
    $p1->primitive = 245;
    $p1->component = new \DateTime();
    $p1->circularReference = new ComponentWithBackReference($p1);
    
    $p2 = clone $p1;
    if ($p1->primitive === $p2->primitive) {
        echo "Primitive field values have been carried over to a clone. Yay!";
        echo "</br>";
    } else {
        echo "Primitive field values have not been copied. Booo!";
        echo "</br>";
    }
    if ($p1->component === $p2->component) {
        echo "Simple component has not been cloned. Booo!";
        echo "</br>";
    } else {
        echo "Simple component has been cloned. Yay!";
        echo "</br>";
    }

    if ($p1->circularReference === $p2->circularReference) {
        echo "Component with back reference has not been cloned. Booo!";
        echo "</br>";
    } else {
        echo "Component with back reference has been cloned. Yay!";
        echo "</br>";
    }

    if ($p1->circularReference->prototype === $p2->circularReference->prototype) {
        echo "Component with back reference is linked to original object. Booo!";
        echo "</br>";
    } else {
        echo "Component with back reference is linked to the clone. Yay!";
        echo "</br>";
    }
}

clientCode();