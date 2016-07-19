<?php 
$cityName = '';
$stateId = 0;
$action = "add";

$errMsg = array();

function validateCity()
{
	global $errMsg;
	$count = count($errMsg);
	
	$name = $_POST['cityName'];
	if(!preg_match("/^[a-zA-Z'-]+$/",$name))
	{
		$errMsg[]  = "Enter only characters and Numbers";
	}
	
	if(count($errMsg)>0)
	{
		return false;
	}
	else
	{
		return true;
	}
}


function addCity()
{
	if(validateCity())
	{
		global $db;
		echo "In add";
		$name = $_POST['cityName'];
		$stateId = $_POST['stateDropDown'];
		$query = "INSERT INTO city (name, stateId) VALUES ('$name', '$stateId')";
		mysqli_query($db,$query) or die(mysql_error());
		header("LOCATION: cities.php?added=1");
	}
}

function displayCity()
{
	global $db;
	global $cityName, $stateId, $action, $id;
	
	$query = "SELECT name, stateID FROM city WHERE id = {$id}";
	$results = mysqli_query($db,$query) or die(mysql_error());
	$row = mysqli_fetch_assoc($results);
	$cityName = $row['name'];
	$stateId = $row['stateID'];
	

}

function displayStateOfCity()
{
	global $stateId;
	allStatesInDropDown();
}

function deleteCity()
{
	global $db;
	echo "In Delete";
	$query = "DELETE FROM city WHERE id = {$_POST['id']}";
	mysqli_query($db,$query) or die(mysql_error());
	header("LOCATION: cities.php?deleted=1");
}

function editCity()
{
	if(validateCity())
	{
		global $db;
		$query = "UPDATE city SET name = '$_POST[cityName]', stateId = '$_POST[stateDropDown]' WHERE id = '$_POST[id]'";
		mysqli_query($db,$query) or die(mysql_error());
		header("LOCATION: cities.php?updated=1");
	}
	else 
	{	
		displayCity();	
	}
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$action = $_POST['action'];
	$id = $_POST['id'];
	
	if($action == "edit")
	{
		editCity();
	}
	
	if($action == "add")
	{
		addCity();
	}
	
	if($action == "delete")
	{
		deleteCity();
	}
}

elseif($_SERVER['REQUEST_METHOD']=="GET")
{
	$id = (isset($_GET['id']))?$_GET['id']:0;
	$action = (isset($_GET['action']))?$_GET['action']:'add';
	
	if($id>0)
	{
		displayCity();
	}
}

?>