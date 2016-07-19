<?php
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	$pageTitle='Manage Cities';
	include "../inc/connect.php";
	include "inc/incCities.php";
	include "inc/incManageCities.php";
	include "../inc/globalFunctions.php";
	
	
?>

<div id=container>
<?php global $errMsg;?>	
	<div class=originalPage>
	
		<h1>Manage Cities</h1>
		<?php print_errors($errMsg);?>
		
		<form name="manageCity" action="" method="POST">
			<input type="hidden" name="action" value="<?php echo "$action";?>">
			<input type="hidden" name="id" value="<?php echo "$id";?>">
			
			<table>
			<tr>
				<td>Name of city</td>
				<td><input type="text" name="cityName" value="<?php echo "$cityName";?>"></td>
			</tr>
			
			<tr>
			<td>Select State</td>
			<td>
				<select name="stateDropDown" id="city">
					<option value="0"> </option>
					<?php displayStateOfCity();?>
				</select>
			</td>
			
			<tr>
				<td colspan =2 align="center"><input type="submit" value="Save"></td>
			</tr>
			</table>
		</form>
	
	
	</div>
	
</div>
