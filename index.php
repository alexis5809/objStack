<?php

include 'objStack.php';

class Toy {

	public $name;
	public $price;

	function __construct($name, $price)
	{
		$this->name = $name;
		$this->price = $price;
	}
}

$toy0 = new Toy('Ball', '10');
$toy1 = new Toy('Ball', '8');
$toy2 = new Toy('Tetris', '15');
$toy3 = new Toy('Game boy', '15');
$toy4 = new Toy('Water pistol', '9');
$toy5 = new Toy('Water pistol', '7');

$toys = new objStack([$toy0, $toy1, $toy2, $toy3, $toy4, $toy5]);

echo "<pre>";
echo "<h3>Toys Stack of object</h3><br>";

var_dump($toys);

echo "<br>";
echo "<br>";
echo "<h2>find_by('name', 'Water pistol') Find object with 'Water pistol' value in name property example</h2><br>";

var_dump($toys->find_by('name', 'Water pistol'));

echo "<br>";
echo "<br>";
echo "<h2>find_all_by('name', 'Water pistol') Find all objects with 'Water pistol' value in name property example</h2><br>";

var_dump($toys->find_all_by('name', 'Water pistol'));

echo "<br>";
echo "<br>";
echo "<h2>max('price') Find first object with max value of price property example</h2><br>";

var_dump($toys->max('price'));

echo "<br>";
echo "<br>";
echo "<h2>max('price') Find all objects with max value of price property example</h2><br>";

var_dump($toys->max('price'), TRUE);

