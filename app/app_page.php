<?php
class pageTemplate(){

	/**
	* @classBrief 	The template of what each page is going to incorporate
	*/

	/**
	* @brief 	what runs when get values are detected from server
	*/
	public function get(){}

	/**
	* @brief 	what runs when post values are detected from server
	*/
	public function post(){}

	/**
	* @brief 	creates the body/container for the application
	* 			Requires Overriding
	*/
	public function createBody(){}

	/**
	* @brief 	creates the header/navbar for the application
	*/
	public function createHeader(){

	}
	/**
	* @brief	creates the footer for the application
	*/
	public function createFooter(){

	}
}



?>