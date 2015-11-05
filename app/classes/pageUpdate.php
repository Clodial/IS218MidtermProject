<?php 

namespace app\classes;
	
class pageUpdate extends pageTemplate{

	private $index;
	private $first;
	private $last;
	private $email;

	/**
	* @Overrides pageTemplate's post function
	*/
	public function get(){
		$this->createHeader();
		$this->createBody('get');
		$this->createFooter();
	}
	/**
	* @Overrides pageTemplate's post function
	*/
	public function post(){
		$this->createHeader();
		$this->createBody('post');
		$this->createFooter();
	}

	public function createBody($type){
		if(isset($_REQUEST['index'])){
			echo '<h3 class="jumbotron">Update Data</h3>';
			$this->index = $_REQUEST['index'];
			$csvArray = $this->readCSV($this->getCSVFile());
			$i = 0;
			foreach($csvArray as $row=>$next){
				$i += 1;
			}
			if($i < $this->index){
				echo 'Stop hacking, hacker. Hacking is bad. Stop it. Please?';
				$this->showFail();
			}else if(isset($_REQUEST['update']) && $_REQUEST['update'] == 'true'){
				foreach($csvArray as $row=>$next){
					if($next[0] == $this->index){
						$this->first = $next[1];
						$this->last = $next[2];
						$this->email = $next[3];
					}
				}
				$this->makeForm($this->first, $this->last, $this->email, $type);
			}else{
				echo 'You really have to stop hacking';
				$this->showFail();
			}
		}else if((isset($_REQUEST['first']) && isset($_REQUEST['last']) && isset($_REQUEST['email'])) && (isset($_REQUEST['update']) && $_REQUEST['update'] == 'true')){
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
			$this->showDelete($type);
		}else{
			echo '<h3 class="jumbotron">Update Data</h3>';
			echo 'Stop hacking, hacker. Hacking is bad. Stop it. Please?';
			$this->showFail();
		}
	}

	public function makeForm($first, $last, $email, $type){
		echo 'First Name: ' . $first . '</br>';
		echo 'Last Name: ' . $last . '</br>';
		echo 'Email: ' . $email . '</br></br>';
		echo '<form method="' . $type .'">';
		echo ' 	<input type="hidden" name="index" value="' . $_REQUEST['index'] . '">';
		echo ' 	First Name<input type="text" name="first" required><br/>';
		echo '	Last Name<input type="text" name="last" required></br>';
		echo '	Email<input type="text" name="email" required></br>';
		echo ' 	<input type="hidden" name="update" value="true"';
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

	public function showDelete($type){
		echo 'item deleted';
		echo '<form method="' . $type .'">';
		echo ' 	<button type="submit" value="pageAdd" name="page">Add Records</button>';
		echo '	<button type="submit" value="pageShow" name="page">Check Results</button>';
		echo '</form></br>';
	}

	public function showFail(){
		echo '<form method="GET">';
		echo ' 	<button type="submit" value="pageShow" name="page">Back to Main Menu</button>';
		echo '</form>';
	}
	

}
	
?>