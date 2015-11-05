<?php
class pageShow extends pageTemplate{

	/**
	* @Overrides pageTemplate's post function
	*/
	public function get(){
		$this->createHeader();
		$this->createBody('get');
		$this->createFooter();
	}
	/**
	* @Overrides pageTemplate's post function
	*/
	public function post(){
		$this->createHeader();
		$this->createBody('post');
		$this->createFooter();
	}

	/**
	* @brief Creates the body of the html file
	*/
	public function createBody($type){
		echo '<h3 class="jumbotron">Data Records</h3>';
		$csvArray = $this->readCSV($this->getCSVFile());
		foreach($csvArray as $row => $account){
			$person = accountMaker::make($account[0],$account[1],$account[2],$account[3]);
			print_r($person->setOpenButton());
			unset($person);
		}
		$this->makeForm($type);
	}
	public function makeForm($type){
		echo '<h5>Click To Edit Record</h5>';
		echo '<form method="'. $type .'">';
		echo '	<button type="submit" name="page" value="pageAdd">Add Entry</button>';
		echo '</form>';
	}

}
	
?>