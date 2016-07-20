<?php 
error_reporting(E_ALL);
ini_set('display_errors','On');
	$pageTitle='Manage State';
	include "../inc/connect.php";
	include "inc/incManageState.php";
	include "../inc/globalFunctions.php";
?>

<div id=container>
<?php global $errMsg;?>	
	<div class=originalPage>
	
		<h1>Manage States</h1>
		<?php print_errors($errMsg);?>
		<form name="manageState" action="" method="POST">
			<input type="hidden" name="action" value="<?php echo "$action";?>">
			<input type="hidden" name="id" value="<?php echo "$id";?>">
			<input type="text" name="stateName" value="<?php echo "$stateName";?>">
			<input type="submit" value="Save">
		</form>
	
	
	</div>
	
</div>