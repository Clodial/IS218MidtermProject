<?php

class person{

	private $index;
	private $first;
	private $last;
	private $email;

	public function __construct($index, $first, $last, $email){

		$this->index = $index;
		$this->first = $first;
		$this->last = $last;
		$this->email = $email;

	}
	public function setOpenButton(){
		echo '<form class="hoverButton" method="post">';
		echo '<input type="hidden" value="' . $this->index . '" name="index">';
		echo '<button type="submit" name="page" value="pageUpdate">';
		echo '<div class="col-md-4"> First Name: ' . $this->first . '</div>';
		echo '<div class="col-md-4"> Last Name: ' . $this->last . '</div>';
		echo '<div class="col-md-4"> Email: ' . $this->email . '</div>';
		echo '</button>';
		echo '</form>';
	}
	public function getFirst(){
		return $this->first;
	}
	public function getLast(){
		return $this->last;
	}
	public function getEmail(){
		return $this->email;
	}

}

?>