<?php

/**
* PHP bits and pieces
*
* @author: Darren Williams <design@phoenix1331.co.uk>
* @date: 30th September 2014
*
*/

//Finding the type of $this
/*print gettype($this);            //object
print get_object_vars($this);    //Array
print is_array($this);            //false
print is_object($this);           //true
print_r($this);                  //dump of the objects inside it
print count($this);              //true
print get_class($this);          //YourProject\YourFile\YourClass
print isset($this);              //true
print get_parent_class($this);    //YourBundle\YourStuff\YourParentClass
print gettype($this->container);*/


//Variable variables
$foo = 'bar';
$$foo = 'hello'; //Double $$ takes the value of foo and creates a variable
echo $bar;
//Prints hello

	echo '<br>';

//References
$foo = 1;
$bar = &$foo; //Reference foo in bar
$bar = 2; //Changes the value of bar and foo
echo $foo; //Outputs 2

	echo '<br>';
	
	
//Simple calculator class	
class calc{
	//Set default values
	static $x = 3;
	static $y = 1;
	//Construct method
	public function __construct($x,$y){
		$this->x = $x;
		$this->y = $y;
	}
	//Sum method
	public function sum(){
		if($this->x != 0 && $this->y != 0){
				//Use x & y from $this object created in construct method
				return 'The total sum is: ' . ($this->x + $this->y);
			}else{
				//Use static variables with scope resolution operator
				return 'The total sum is: ' . (self::$x + self::$y);
			}
	}
}
//Istatitate new calc object
$cal = new calc(10,12);
//Echo out
echo $cal->sum();


	echo '<br>';





?>