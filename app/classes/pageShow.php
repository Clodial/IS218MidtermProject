<?php
class pageShow extends pageTemplate{

	/**
	* @Overrides pageTemplate's post function
	*/
	public function post(){
		$this->createBody();
	}

	/**
	* @brief Creates the body of the html file
	*/
	public function createBody(){
		echo '<h3 class="jumbotron">Data Records</h3>';
		$csvArray = $this->readCSV($this->getCSVFile());
		foreach($csvArray as $row => $account){
			$person = accountMaker::make($account[0],$account[1],$account[2],$account[3]);
			print_r($person->setOpenButton());
			unset($person);
		}
		echo '<h5>Click To Edit Record</h5>';
		echo '<form method="post">';
		echo '	<button type="submit" name="page" value="pageAdd">Add Entry</button>';
		echo '</form>';
	}

}
	
?>