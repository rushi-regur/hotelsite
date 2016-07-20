<?php

$stateName = '';
$action = 'add';


$errMsg = array();

function validateState()
{
	global $errMsg;
	$count = count($errMsg);
	
		$name = $_POST['stateName'];
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

function addState()
{
	if(validateState())
	{
		global $db;
		$name = $_POST['stateName'];
		$query = "INSERT INTO state(name) VALUES ('$name')";
		mysqli_query($db,$query) or die(mysql_error());
		header("LOCATION: states.php?added=1");
	}
}

function displayState($id)
{
	global $db;
	$query = "SELECT name FROM state WHERE id = {$id}";
	$results = mysqli_query($db,$query) or die(mysql_error());
	$row = mysqli_fetch_assoc($results);
	$stateName = $row['name'];
	return $stateName;
}

function editState()
{
	if(validateState())
	{
		global $db;
		$query = "UPDATE state SET name = '$_POST[stateName]' WHERE id = '$_POST[id]'";
		mysqli_query($db,$query) or die(mysql_error());
		header("LOCATION: states.php?updated=1");
	}
	else {
		$stateName = displayState($id);
		return $statename;
	}
}

function deleteState()
{
	global $db;
	$query = "DELETE FROM state WHERE id = '$_POST[id]'";
	mysqli_query($db,$query) or die(mysql_error());
	header("LOCATION: states.php?deleted=1");
}

if($_SERVER['REQUEST_METHOD']=="POST")
{

	$action = $_POST['action'];
	$id = $_POST['id'];


	if($action == "edit")
	{
		$stateName = editState($id);
	}

	if($action == "add")
	{
		addState();
	}

	if($action == "delete")
	{
		deleteState();
	}
	
}

elseif($_SERVER['REQUEST_METHOD']=="GET")
{
	$id = (isset($_GET['id']))?$_GET['id']:0;
	$action = (isset($_GET['action']))?$_GET['action']:'add';
	
	if($id>0)
	{
		$stateName = displayState($id);
	}

}

?>