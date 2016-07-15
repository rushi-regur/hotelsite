<?php

global $message;
$message = '';

function printStatesinTable()
{
	$results = getAllStates();
	displayStateAndLinks($results);
}

function getAllStates()
{
	$query = "SELECT * FROM state ORDER BY name";
	$results = mysql_query($query) or die(mysql_error());
	return $results;
}


function displayStateAndLinks($results)
{
	$odd=1;
	while($row=mysql_fetch_assoc($results))
	{
		echo $odd==1 ? '<tr class=managePlacesOddRow>' : '<tr class=managePlacesEvenRow>';
		$odd=~$odd;
		echo '<td style="width:70%">';
		echo $row['name'];
		echo '</td>';
			
		echo '<td>';
		echo '<a href="managestate.php?action=edit&id=' . $row['id'] . '">[EDIT]</a>';
		echo ' <a href="managestate.php?action=delete&id=' . $row['id'] . '">[DELETE]</a>';
		echo '</td>';
		echo '</tr>';
	}
}

if($_SERVER['REQUEST_METHOD']=="GET")
{
	if(isset($_GET['updated']))
	{
		$successMessage = "State has been updated successfully";
	}
	if(isset($_GET['added']))
	{
		$successMessage = "State has been added successfully";
	}
	if(isset($_GET['deleted']))
	{
		$successMessage = "State has been deleted successfully";
	}
}
?>