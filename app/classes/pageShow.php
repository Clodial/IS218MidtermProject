<?php
class pageShow extends pageTemplate{

	/**
	* @Overrides pageTemplate's get function
	*/
	public function get(){

	}
	/**
	* @Overrides pageTemplate's post function
	*/
	public function post(){
		$this->createBody();
	}

	public function createBody(){
		$csvArray = $this->readCSV($this->getCSVFile());
		foreach($csvArray as $row => $account){
			$person = accountMaker::make($account[0],$account[1],$account[2],$account[3]);
			print_r($person->setOpenButton());
			unset($person);
		}
		echo '<form method="post">';
		echo '	<button type="submit" name="page" value="pageIndex">Back to Main Menu</button>';
		echo '	<button type="submit" name="page" value="pageAdd">Add Entry</button>';
		echo '</form>';
	}

}
	
?>