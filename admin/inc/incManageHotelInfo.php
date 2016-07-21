<?php

$hotelName 	= "";
$stateId 	= "";
$cityId 	= "";
$add1 		= "";
$add2 		= "";
$landmark 	= "";
$pincode 	= "";
$star 		= "1";
$description= "";
$isFeatured = "no";

$aciton = 'add';
$errMsg = array();

function validateHotel($inputSet)
{
	global $errMsg; //, $hotelName, $stateId, $cityId, $add1, $add2, $landmark, $pincode, $star, $description, $isFeatured;
	extract ($inputSet);
	
	$field = array ('Hotel Name', 'Hotel State', 'Hotel City', 'Address Line 1', "Address Line 2", "Landmark", "Pincode", "Hotel Star", "Description", "Featured");
	$i=0;
	
	foreach($inputSet as $key=>$value)
	{	
		if($key == "stateId" || $key == "cityId")
		{
			if($value==0)
			{
				$errMsg[] = "$field[$i] is mandatory";
			}
		}
		
		else
		{
			if($value=="")
			{
				$errMsg[] = "$field[$i] is mandatory";
			}
		}
		$i++;
	}

	
	if($hotelName!="" && !preg_match("/^[a-zA-Z' -]+$/",$hotelName))
	{
		$errMsg[]  = "In Hotel Name enter only characters and Numbers";
	}
	
	if($pincode!="" && !preg_match("/^[0-9]+$/",$pincode))
	{
		$errMsg[] = "In Pincode enter only numbers";
	}

	$count = count($errMsg);
	if(count($errMsg)>0)
	{
		return false;
	}
	else
	{
		return true;
	}
	
}


function addHotel($inputSet)
{
	if(validateHotel($inputSet))
	{
		global $db;
		extract ($inputSet);
		
		$query = "INSERT INTO hotel (name, stateId, cityId, addressLine1, addressLine2, addressLandmark, pinCode, stars, description, isFeatured)
				VALUES
				('$hotelName', '$stateId', '$cityId', '$add1', '$add2', '$landmark', '$pincode', '$star', '$description', '$isFeatured')"; //?????Can we use foreach loop here
		
		mysqli_query($db,$query) or die(mysqli_error($db));
		header("LOCATION: manageHotelPhotos.php");
	}
}

function displayHotel()
{
	
}


function editHotel()
{
	if(validateHotel())
	{
		
	}
	
	else 
	{
		displayHotel();
	}
}


function deleteHotel()
{
	
}



if(isPost())
{
	
	$hotelName  = 	isset($_POST['hotelName']) 	? $_POST['hotelName'] 	: "";	
	$stateId 	=	isset($_POST['states']) 	? $_POST['states'] 		: "";
	$cityId 	= 	isset($_POST['cities']) 	? $_POST['cities'] 		: "";
	$add1 		= 	isset($_POST['add1']) 		? $_POST['add1'] 		: "";
	$add2 		=	isset($_POST['add2']) 		? $_POST['add2'] 		: "";
	$landmark 	= 	isset($_POST['landmark']) 	? $_POST['landmark'] 	: "";
	$pincode 	= 	isset($_POST['pincode']) 	? $_POST['pincode'] 	: "";
	$star 		= 	isset($_POST['star']) 		? $_POST['star'] 		: "";
	$description= 	isset($_POST['description'])? $_POST['description'] : "";
	$isFeatured = 	isset($_POST['isFeatured']) ? $_POST['isFeatured'] 	: "";
	
	$inputSet = array ('hotelName' => $hotelName, 'stateId' => $stateId, 'cityId' => $cityId, 'add1'=> $add1, 'add2'=>$add2, 'landmark'=>$landmark, 'pincode'=>$pincode, 'star'=>$star, 'description'=>$description,'isFeatured'=>$isFeatured);
	//list
	
	//extract
	
	if($action = "add" && $_POST['onlyStateSubmit']!= "true")
	{
		addHotel($inputSet);
	}
	
	if($action = "edit")
	{
		
	}
	
	if($action = "delete")
	{
		
	}
}

if(isGet())
{
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$action = isset($_GET['action']) ? $_GET['action'] : 'add';
	
	if($id>0)
	{
		//When it comes for editing retrive the values
	}
	
	
}