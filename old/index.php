<?php
namespace Human;

abstract class Human{
	abstract function greet();
}

class japanese extends Human{
	private $name;
	public static $CountryName = japanese;
        public function __construct($name){
		$this->name=$name;
	}
	public function greet(){
		echo "こんにちは".$this->name."です";
	}
}

class American extends Human{
	private $name;
	public static $CountryName = A;
	public function __construct ($name){
		$this->name=$name;
	}
	public function greet(){
		echo "hello".$this->name."!";
	}
}

//$tanaka=new japanese("田中");
//$bob = new American ("bob");

//$tanaka->greet();
//$bob ->greet();
?>
