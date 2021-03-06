<?php 
namespace app\classes;
class main{

	/**
	* @brief 	The main controller that starts the app
	*/

	private $cCsvArray = [];

	/**
	* @brief 	create the constructor for the web app
	* 		 	-> create the page array for the program
	*			-> figure out what page to load
	*/
	public function __construct(){

		$page_request = 'app\classes\\' .'pageShow';
		
		if(!empty($_REQUEST) && isset($_REQUEST['page'])){

			$page_request = 'app\classes\\' . $_REQUEST['page'];
			
		}

		$page = new $page_request();

		if($_SERVER['REQUEST_METHOD'] == "GET"){
			$page->get();
		}else{
			$page->post();
		}
		
	}

}
?>