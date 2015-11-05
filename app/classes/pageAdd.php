<?php namespace app\classes;
class pageAdd extends pageTemplate{

	/**
	* @Overrides 	pageTemplate's get function
	* @brief 	 	Creates the web application based on information
	*				obtained via method=GET
	*/
	public function get(){
		$this->createHeader();
		$this->createBody('get');
		$this->createFooter();
	}	
	/**
	* @Overrides 	pageTemplate's post function
	* @brief 	 	Creates the web application based on information
	*				obtained via method=POST
	*/
	public function post(){
		$this->createHeader();
		$this->createBody('post');
		$this->createFooter();
	}	

	/**
	* @Override 	pageTemplate's createBody function
	* @param 		$type -> the type of form method the program will use
	*/
	public function createBody($type){
		echo '<h3 class="jumbotron">Add Data</h3>';
		if((isset($_REQUEST['first']) && $_REQUEST['first'] != '') && (isset($_REQUEST['last']) && $_REQUEST['last'] != '') && (isset($_REQUEST['email']) || $_REQUEST['email'] != '')){
			echo 'success';
			$argArray = array($_REQUEST['first'], $_REQUEST['last'], $_REQUEST['email']);
			$this->writeCSV($this->getCSVFile(), $argArray);		
		}
		$this->makeForm($type);

	}

	public function makeForm($type){
		echo '<form method="'. $type .'">';
		echo ' 	First Name<input type="text" name="first" required><br/>';
		echo '	Last Name<input type="text" name="last" required></br>';
		echo '	Email<input type="text" name="email" required></br>';
		echo ' 	<button type="submit" value="pageAdd" name="page">Add Record</button>';
		echo '</form></br>';
		echo '<form method="'. $type .'">';
		echo ' 	<button type="submit" value="pageShow" name="page">Back to Records</button>';
		echo '</form>';
	}
}
	
?>