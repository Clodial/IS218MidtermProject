<?php

class autoload{

	public static function load($class){

		$filename = $class . '.php';
		$file = 'app/classes/' . $filename;
		if(!file_exists($file)){
			return false;
		}
		include $file;

	}

}

?>
