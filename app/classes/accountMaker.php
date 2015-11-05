<?php namespace app\classes;
class accountMaker{

	/**
	* @brief 	Creats a person object
	* @return 	New person object
	*/
	public static function make($index, $first, $last, $email){
		return new person($index, $first, $last, $email);
	}

}
?>