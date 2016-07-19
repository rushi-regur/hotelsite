<?php 
error_reporting(E_ALL);
ini_set('display_errors','On');
	$pageTitle='Manage Amenities';
	include "../inc/connect.php";
	include "inc/incAmenities.php";
	include "inc/incManageAmenities.php";
	include "../inc/globalFunctions.php";
?>

<div id=container>
<?php global $errMsg;?>	
	<div class=originalPage>
	
		<h1>Manage Amenitites</h1>
		<?php print_errors($errMsg);?>
		<form name="manageAmenities" action="" method="POST">
			<input type="hidden" name="action" value="<?php echo "$action";?>">
			<input type="hidden" name="id" value="<?php echo "$id";?>">
			<input type="text" name="amenityName" value="<?php echo "$amenityName";?>">
			<input type="submit" value="Save">
		</form>
	
	
	</div>
	
</div>