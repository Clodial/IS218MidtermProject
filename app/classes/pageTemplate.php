<?php
class pageTemplate{

	private $csv = 'files/names.csv';

	/**
	* @classBrief 	The template of what each page is going to incorporate
	*/

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

	/**
	* @brief 	reads a CSV file
	* @param 	$file -> the file pathname
	* @return 	array with data of the CSV file
	*/
	public function readCSV($file){
		$locArray = array();
		$i = 0;
		if(!file_exists($file)){
			$this->createCSV('names');
			$file = $this->getCSVFile();
		}
		$locHandle = fopen($file, 'r');
		while(($row = fgetcsv($locHandle, 1024)) !== false){
			foreach($row as $k=> $value){
				$locArray[$i][$k] = $value;
			}
			$i++;
		}
		fclose($locHandle);
		return $locArray;
	}

	/**
	* @brief 	creates a CSV file
	* @param 	$fileName -> the name of the file to be created
	*/
	public static function createCSV($fileName){
		$file = fopen('files/' . $fileName .'.csv', 'w');
		fputcsv($file, $locArray);
		fclose($file);
	}

	/**
	* @brief 	adds to end of csv file
	* @param 	$file -> file pathname
	* @param 	$index -> line of csv file being edited
	* @param 	$array -> data being inserted at index
	*/
	public function writeCSV($file, $array){
		$tempFile = fopen('files/temp.csv', 'a');
		$i = 0;
		if(!file_exists($file)){
			$this->createCSV($csv);
			$file = $this->getCSVFile();
		}
		$tempArray = $this->readCSV($file);
		$temp2Array = array();
		$retArray = array();
		
		foreach($tempArray as $row=>$add){
			$i += 1;
			array_push($retArray, $add);
		}

		array_push($temp2Array, $i);
		array_push($temp2Array, $array[0]);
		array_push($temp2Array, $array[1]);
		array_push($temp2Array, $array[2]);
		array_push($tempArray, $temp2Array);

		foreach($tempArray as $row=>$next){
			fputcsv($tempFile, $next);
		}

		rename('files/temp.csv', $file);
	}

	/**
	* @brief 	deletes a file in the csv file
	* @param 	$file -> file pathname
	* @param 	$index -> line of csv file being removed
	*/
	public function deleteCSV($file, $index){
		echo $index;
		$deleted = 0;
		$tempFile = fopen('files/temp.csv', 'a');
		if(!file_exists($file)){
			$this->createCSV('names');
			$file = $this->getCSVFile();
		}
		$tempArray = $this->readCSV($file);
		$temp2Array = array();
		foreach($tempArray as $row=>$next){
			if($deleted == 0){
				if($next[0] != $index){
					array_push($temp2Array, $next);
				}else{
					$deleted = 1;
				}
			}else{
				$next[0] -= 1;
				array_push($temp2Array, $next);
			}
		}
		foreach($temp2Array as $row=>$next){
			fputcsv($tempFile, $next);
		}
		rename('files/temp.csv', $file);
	}

	/**
	* @brief edit the CSV file based on the given array
	* @param $file -> file to be edited
	* @param $array -> array with index to change
	*/
	public function updateCSV($file, $array){
		$tempFile = fopen('files/temp.csv', 'a');
		if(!file_exists($file)){
			$this->createCSV('names');
			$file = $this->getCSVFile();
		}
		$tempArray = $this->readCSV($file);
		$temp2Array = array();
		foreach($tempArray as $row=>$next){
			if($next[0] == $array[0]){
				$next[1] = $array[1];
				$next[2] = $array[2];
				$next[3] = $array[3];
 			}
 			array_push($temp2Array, $next);
		}
		foreach($temp2Array as $row=>$next){
			fputcsv($tempFile, $next);
		}
		rename('files/temp.csv', $file);
	}

	/**
	* @brief get access to the CSV file
	* @return the csv file associated with the program
	*/
	public function getCSVFile(){
		if(!file_exists($this->csv)){
			$this->createCSV('names');
		}
		return $this->csv;
	}

}
?>