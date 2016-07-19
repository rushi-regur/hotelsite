<?php


$amenityName = '';
$action = 'add';
$errMsg=array();

function validateAmenity()
{
	global $errMsg;
	$count = count($errMsg);
	
	$name = $_POST['amenityName'];
	if($name=="")
	{
		$errMsg[]  = "Name is Compulsory";
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

function addAmenity()
{
	if(validateAmenity())
	{
		global $db;
		$name = $_POST['amenityName'];
		$query = "INSERT INTO amenities (name) VALUES ('$name')";
		mysqli_query($db,$query) or die(mysql_error());
		header("LOCATION: amenities.php?added=1");
	}
}

function displayAmenity()
{
	global $db;
	global $amenityName, $action, $id;
	$query = "SELECT name FROM amenities WHERE id = {$id}";
	$results = mysqli_query($db,$query) or die(mysql_error());
	$row = mysqli_fetch_assoc($results);
		$amenityName = $row['name'];
	
}

function deleteAmenity()
{
	global $db;
	$query = "DELETE FROM amenities WHERE id = '$_POST[id]'";
	mysqli_query($db,$query) or die(mysql_error());
	header("LOCATION: amenities.php?deleted=1");
}

function editAmenity()
{
	if(validateAmenity())
	{
		global $db;
		$query = "UPDATE amenities SET name = '$_POST[amenityName]' WHERE id = '$_POST[id]'";
		mysqli_query($db,$query) or die(mysql_error());
		header("LOCATION: amenities.php?updated=1");
	}
	else
	{
		displayAmenity();
	}
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$action = $_POST['action'];
	$id = $_POST['id'];
	
	if($_POST['action'] == "edit")
	{
		editAmenity();
	}
	
	if($_POST['action'] == "add")
	{
		addAmenity();
	}
	
	if($_POST['action'] == "delete")
	{
		deleteAmenity($db);
	}
}

elseif($_SERVER['REQUEST_METHOD']=="GET")
{
	$id = (isset($_GET['id']))?$_GET['id']:0;
	$action = (isset($_GET['action']))?$_GET['action']:'add';

	if($id>0)
	{
		displayAmenity();
	}
}


?>