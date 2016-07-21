<?php 
	include "inc/header.php";
	$pageTitle='Manage Hotels Info';
	include "../inc/globalFunctions.php";
	include "../inc/connect.php";
	include "inc/incManageHotelInfo.php";
?>

	<div id=container>
		
		<div class=originalPage>
		
			<h1>Manage Hotels Info</h1>
			
			<form  method="POST" action=""  class="hotelInfo">
			
				<table>
				
					<tr>
						<td width="100">Hotel Name</td>
						<td><input type="text" name="hotelName" value="<?php echo $hotelName;?>"></td>
					</tr>
					
					
					<tr>
						<td width="100">Hotel State</td>
						<td>
							<select name="states" id="state" style="width:173px;">
								<option value="0"> </option>
								<?php allStatesInDropDown($stateId);?>
							</select>
						</td>
					</tr>
	
	
					<tr>
						<td width="100">Hotel City</td>
						<td>
							<select name="cities" id="city" style="width:173px;">
								<option value="0"> </option>
								<?php allCitiesInDropDown($stateId,$cityId);?>
							</select>
						</td>
					</tr>
				
					
					<tr>
						<td>Address Line 1</td>
						<td><input type="text" name="add1" value="<?php echo $add1;?>"></td>
					</tr>
					
					
					<tr>
						<td>Address Line 2</td>
						<td><input type="text" name="add2" value="<?php echo $add2;?>"></td>
					</tr>
					
					
					<tr>
						<td>Landmark</td>
						<td><input type="text" name="landmark" value="<?php echo $landmark;?>"></td>
					</tr>
					
					
					<tr>
						<td>Pin Code</td>
						<td><input type="text" name="pincode" value="<?php echo $pincode;?>"></td>
					</tr>
					
					
					<tr>
						<td>Hotel Stars</td>
						<td>
							<input type="radio" name="star" value="1" <?php if($star==1) {echo "checked=checked";}?>>
							<input type="radio" name="star" value="2" <?php if($star==2) {echo "checked=checked";}?>>
							<input type="radio" name="star" value="3" <?php if($star==3) {echo "checked=checked";}?>>
							<input type="radio" name="star" value="4" <?php if($star==4) {echo "checked=checked";}?>>
							<input type="radio" name="star" value="5" <?php if($star==5) {echo "checked=checked";}?>>
						</td>
					</tr>
					
					
					<tr>
						<td>Description</td>
						<td><textarea rows="5" cols="50" name="description"><?php echo $description?></textarea></td>
					</tr>
					
					
					<tr>
						<td>Is Featured</td>
						<td><input type="checkbox" name="isFeatured" <?php if($isFeatured == 'on'){echo "checked=\"checked\"";}?>></td>
					</tr>
					
					
					<tr>
						<td><input type="submit"></td>
					</tr>
					
				</table>
				
			</form>
			
		</div>
	
	</div>
	
	<script>
	
	$(function() {
	    $('#state').change(function() {
	        this.form.submit();
	    });
	});
	
	</script>

<?php include "inc/footer.php";?>