<?php 
class pageAdd extends pageTemplate{

	/**
	* @Overrides 	pageTemplate's get function
	* @brief 	 	Creates the web application based on information
	*				obtained via method=GET
	*/
	public function get(){
		$this->createHeader();
		$this->createBody();
		$this->createFooter();
	}
	/**
	* @Overrides 	pageTemplate's post function
	* @brief 	 	Creates the web application based on information
	*				obtained via method=POST
	*/
	public function post(){
		$this->createHeader();
		$this->createBody();
		$this->createFooter();
	}	

	public function createBody(){
		if((isset($_REQUEST['first']) && $_REQUEST['first'] != '') && (isset($_REQUEST['last']) && $_REQUEST['last'] != '') && (isset($_REQUEST['email']) || $_REQUEST['email'] != '')){
			echo 'success';
			$argArray = array($_REQUEST['first'], $_REQUEST['last'], $_REQUEST['email']);
			$this->writeCSV($this->getCSVFile(), $argArray);		
		}
		$this->makeForm();

	}

	public function makeForm(){
		echo '<form method="post">';
		echo ' 	First Name<input type="text" name="first" required><br/>';
		echo '	Last Name<input type="text" name="last" required></br>';
		echo '	Email<input type="text" name="email" required></br>';
		echo ' 	<button type="submit" value="pageAdd" name="page">Update</button>';
		echo '</form>';
		echo '<form method="post">';
		echo ' 	<button type="submit" value="pageIndex" name="page">Back to Main Menu</button>';
		echo '</form>';
	}
}
	
?>