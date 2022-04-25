<?php
/**
 * Created by PhpStorm.
 * User: mohamad
 * Date: 4/25/22
 * Time: 12:18 PM
 */

namespace Adapter;

/**
 * The Target defines the domain-specific interface used by the client code.
 */
class Target
{
    public function request()
    {
        return "Target: The default target's behavior.";
    }
}

/**
 * The Adaptee contains some useful behavior, but its interface is incompatible
 * with the existing client code. The Adaptee needs some adaptation before the
 * client code can use it.
 */
class Adaptee
{
    public function specificRequest()
    {
        return ".eetpadA eht fo roivaheb laicepS";
    }
}

/**
 * The Adapter makes the Adaptee's interface compatible with the Target's
 * interface.
 */
class Adapter extends Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        return "Adapter: (TRANSLATED) " . strrev($this->adaptee->specificRequest());
    }
}

/**
 * The client code supports all classes that follow the Target interface.
 */
function clientCode(Target $target)
{
    echo $target->request();
}

echo "Client: I can work just fine with the Target objects:";
echo "</br>";
$target = new Target();
clientCode($target);
echo "";

$adaptee = new Adaptee();
echo "Client: The Adaptee class has a weird interface. See, I don't understand it:";
echo "</br>";
echo "Adaptee: " . $adaptee->specificRequest();
echo "";

echo "Client: But I can work with it via the Adapter:";
echo "</br>";
$adapter = new Adapter($adaptee);
clientCode($adapter);