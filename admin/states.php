<?php 
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	$pageTitle='Manage Places';
	include "../inc/connect.php";
	include "inc/incstates.php";
	include "../inc/globalFunctions.php";
	include "inc/header.php";
?>


<div id=container>
	
	<div class=originalPage>
	
		<h1>Manage Places</h1>
		<?php echo "<p style=\"text-align:center; color:green;\">$successMessage</p>";?>
		
		<table class="managePlacesTable">
		
			<tr class="managePlacesTr">
				<th colspan="2" class="managePlacesTh">List of States<a href="managestate.php?action=add">[ADD]</a></th>
			</tr>
			
			<?php printStatesinTable();?>
		
		</table>
		
	</div>


</div>


<?php include "inc/footer.php";?>
