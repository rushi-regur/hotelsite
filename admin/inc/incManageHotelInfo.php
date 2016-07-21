<?php

$hotelName = "";
$stateId = "";
$cityId = "";
$add1 = "";
$add2 = "";
$landmark = "";
$pincode = "";
$star = "1";
$description = "";
$isFeatured = "";

if(isPost())
{
	
	$hotelName  = 	isset($_POST['hotelName']) 	? $_POST['hotelName'] : "";	
	$stateId 	=	isset($_POST['states']) 	? $_POST['states'] : "";
	$cityId 	= 	isset($_POST['cities']) 	? $_POST['cities'] : "";
	$add1 		= 	isset($_POST['add1']) 		? $_POST['add1'] : "";
	$add2 		=	isset($_POST['add2']) 		? $_POST['add2'] : "";
	$landmark 	= 	isset($_POST['landmark']) 	? $_POST['landmark'] : "";
	$pincode 	= 	isset($_POST['pincode']) 	? $_POST['pincode'] : "";
	$star 		= 	isset($_POST['star']) 		? $_POST['star'] : "";
	$description= 	isset($_POST['description'])? $_POST['description'] : "";
	$isFeatured = 	isset($_POST['isFeatured']) ? $_POST['isFeatured'] : "";
	
}

if(isGet())
{
	
	
	
}