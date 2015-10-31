<?php
namespace 
class pageIndex extends pageTemplate{

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

	/**
	* @Overrides 	pageTemplate's createBody function
	* @brief 		Creates the page's container
	*/
	public function createBody(){
		
	}



}
	
?>