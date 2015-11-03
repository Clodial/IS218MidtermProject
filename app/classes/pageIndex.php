<?php 
class pageIndex extends pageTemplate{

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

	/**
	* @Overrides 	pageTemplate's createBody function
	* @brief 		Creates the page's container
	*/
	public function createBody(){
		echo '<h3 class="jumbotron">Welcome!</h3>';
		echo '<form method="post">';
		echo '	<button type="submit" name="page" value="pageShow">Show Data</button>';
		echo '	<button type="submit" name="page" value="pageAdd">Add Entry</button>';
		echo '</form>';
	}



}
	
?>