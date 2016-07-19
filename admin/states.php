<?php 
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	$pageTitle='Manage Places';
	include "../inc/connect.php";
	include "inc/incstates.php";
	include "inc/template.php";
	include "../inc/globalFunctions.php";
	include "inc/header.php";
?>


<div id=container>
	
	<div class=originalPage>
	
		<h1>Manage Places</h1>
		<?php echo "<p style=\"text-align:center; color:green;\">$successMessage</p>";?>
		
		
		<form method="POST" id="cities" action="managestate.php" name="submitForDelete">
		
			<input type="hidden" name="dropDownSet" value="false">		
			<input type="hidden" name="action" value="delete">
			<input type="hidden" name="id" value=""> 
			<table class="managePlacesTable">
			
				<tr class="managePlacesTr">
					<th colspan="2" class="managePlacesTh">List of States<a href="managestate.php">[ADD]</a></th>
				</tr>
				
				<?php printStatesinTable();?>
			
			</table>
		</form>
		
	</div>


</div>

<script>
function deleteStates(id){
	
	$('form[name="submitForDelete"]').find('input[name="id"]').val(id);
	$('form[name="submitForDelete"]').submit();
	
}
</script>
<?php include "inc/footer.php";?>
