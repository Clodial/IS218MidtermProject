<?php
class pageUpdate extends pageTemplate{

	private $index;
	private $first;
	private $last;
	private $email;

	/**
	* @Overrides pageTemplate's post function
	*/
	public function post(){
		$this->createBody();
	}

	public function createBody(){
		if(isset($_REQUEST['index']) && !isset($_REQUEST['delete']) && !isset($_REQUEST['first']) && !isset($_REQUEST['last']) && !isset($_REQUEST['email'])){
			echo '<h3 class="jumbotron">Update Data</h3>';
			$this->index = $_REQUEST['index'];
			$csvArray = $this->readCSV($this->getCSVFile());
			foreach($csvArray as $row=>$next){
				if($next[0] == $this->index){
					$this->first = $next[1];
					$this->last = $next[2];
					$this->email = $next[3];
				}
			}
			$this->makeForm($this->first, $this->last, $this->email);
		}else if(isset($_REQUEST['first']) && isset($_REQUEST['last']) && isset($_REQUEST['email'])){
			echo '<h3 class="jumbotron">Update Data</h3>';
			if(isset($_REQUEST['index'])){
				$locArray = array($_REQUEST['index'], $_REQUEST['first'], $_REQUEST['last'], $_REQUEST['email']);
				$this->updateCSV($this->getCSVFile(), $locArray);
				$this->makeForm($_REQUEST['first'], $_REQUEST['last'], $_REQUEST['email']);
			}
		}else if(isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'true' && isset($_REQUEST['index']) && $_REQUEST['index'] >= 0){
			echo '<h3 class="jumbotron">Delete Data</h3>';
			$this->index = $_REQUEST['index'];
			$this->deleteCSV($this->getCSVFile(), $this->index);
			$this->showDelete();
		}
	}

	public function makeForm($first, $last, $email){
		echo 'First Name: ' . $first . '</br>';
		echo 'Last Name: ' . $last . '</br>';
		echo 'Email: ' . $email . '</br></br>';
		echo '<form method="post">';
		echo ' 	<input type="hidden" name="index" value="' . $_REQUEST['index'] . '">';
		echo ' 	First Name<input type="text" name="first" required><br/>';
		echo '	Last Name<input type="text" name="last" required></br>';
		echo '	Email<input type="text" name="email" required></br>';
		echo ' 	<button type="submit" value="pageUpdate" name="page">Update</button>';
		echo '</form></br>';
		echo '<form method="post">';
		echo ' 	<button type="submit" value="pageShow" name="page">Back to Records</button>';
		echo '</form></br>';
		echo '<form method="post">';
		echo '	<input type="hidden" name="index" value="' . $_REQUEST['index'] . '">';
		echo '	<input type="hidden" name="delete" value="true">';
		echo ' 	<button type="submit" value="pageUpdate" name="page">Delete Record</button>';
		echo '</form>';
	}

	public function showDelete(){
		echo 'item deleted';
		echo '<form method="post">';
		echo ' 	<button type="submit" value="pageAdd" name="page">Add Records</button>';
		echo '	<button type="submit" value="pageShow" name="page">Check Results</button>';
		echo '</form></br>';
	}
	

}
	
?>