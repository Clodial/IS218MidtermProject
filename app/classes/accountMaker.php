<?php
class accountMaker{

	public static function make($index, $first, $last, $email){
		return new person($index, $first, $last, $email);
	}

}
?>