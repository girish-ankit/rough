<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

#######################################################
############# LAMBDA FUNCTION IN PHP ##################
#######################################################
// Anonymous function
// assigned to variable
$greeting = function ($m) {
            return $m;
        };

// Call function
echo $greeting('Hello world <br />');

// Returns "Hello world"
// Pass Lambda to function
function shout($message) {
    echo $message();
}

// Call function
shout(function() {
            return "Hello ankit <br />";
        });

#######################################################
############# CLOSER FUNCTION IN PHP ##################
#######################################################
// Create a user
$user = "Girish";

// Create a Closure
$greeting = function() use ($user) {
            echo "Hello $user <br />";
        };

// Greet the user
$greeting(); // Returns "Hello Philip"
// Set counter
$i = 0;
// Increase counter within the scope
// of the function
$closure = function () use ($i) {
            $i++;
        };
// Run the function
$closure();
// The global count hasn't changed
echo $i; // Returns 0
echo '<br />';




// Reset count
$i = 0;
// Increase counter within the scope
// of the function but pass it as a reference
$closure = function () use (&$i) {
            $i++;
        };
// Run the function
$closure();
// The global count has increased
echo $i; // Returns 1
echo '<br />';


// Set a multiplier
$multiplier = 3;

// Create a list of numbers
$numbers = array(1, 2, 3, 4);

// Use array_walk to iterate
// through the list and multiply
array_walk($numbers, function($number) use($multiplier) {
            echo $number * $multiplier;
            echo '<br />';
        });

class Foo {

    private $color;

    function __construct($color) {
        $this->color = $color;
    }

    public function getProperty() {
        return function() {
                    echo ucfirst($this->color);
                };
    }

}

// end of Class Foo
$a = new Foo('red');
$func = $a->getProperty();
//print_r($func); die();
$func(); // Outputs: Red (only on php5.4)




