<?php


$stateName = '';
$action = '';
function validateState()
{
	
}

function addState()
{
		$name = $_POST['stateName'];
		$query = "INSERT INTO state(name) VALUES ('$name')";
		mysql_query($query) or die(mysql_error());
		header("LOCATION: manageplaces.php?added=1");
}

function displayState()
{
	global $stateName, $action, $id;
	$query = "SELECT name FROM state WHERE id = {$id}";
	$results = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($results);
		$stateName = $row['name'];
	
}

function deleteState()
{
	$query = "DELETE FROM state WHERE id = '$_GET[id]'";
	mysql_query($query) or die(mysql_error());
	header("LOCATION: manageplaces.php?deleted=1");
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	if($_POST['action'] == "edit")
	{
		$query = "UPDATE state SET name = '$_POST[stateName]' WHERE id = '$_POST[id]'";
		mysql_query($query) or die(mysql_error());
		header("LOCATION: manageplaces.php?updated=1");
	}
	
	if($_POST['action'] == "add")
	{
		addState();
	}
}

elseif($_SERVER['REQUEST_METHOD']=="GET")
{
	$id = $_GET['id'];
	$action = $_GET['action'];

	if($action == "edit")
	{
		displayState();
	}
	elseif($action == "delete")
	{
		deleteState();
	}
}


?>