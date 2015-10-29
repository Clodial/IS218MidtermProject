<?php
include("app/app_page.php");
class pageIndex extends pageTemplate{

	/**
	* @Overrides 	pageTemplate's get function
	* @brief 	 	Creates the web application based on information
	*				obtained via method=GET
	*/
	public function get(){
		$this->createHeader();
		$this->createFooter();
	}
	/**
	* @Overrides 	pageTemplate's post function
	* @brief 	 	Creates the web application based on information
	*				obtained via method=POST
	*/
	public function post(){
		$this->createHeader();
		$this->createFooter();
	}

}
	
?>