<?php
class main{

	/**
	* @brief 	The main controller that starts the app
	*/

	private $cCsvArray = [];
	private $cPageArray = [];

	/**
	* @brief 	create the constructor for the web app
	* 		 	-> create the page array for the program
	*			-> figure out what page to load
	*/
	public function __construct(){
	
		array_push($his->cPageArray, 'indexPage'); //Default index page

		$page_request = 'indexPage';
		
		if(!empty($_REQUEST)){

			$page_request = $_REQUEST['page'];
			if(!in_array($_REQUEST['page'], $this->cPageArray))
		
		}

		$page = new $page_request;
		
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			
			$page->get();

		}else{

			$page->post();

		}

	}

}
?>