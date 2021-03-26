<?php require_once('constants.php');
	$page_title = "New Polling Unit";

	require_once('header.php');

   $sql = "SELECT partyname FROM party";
	$res = mysqli_query($conn, $sql);

	?>


<div class="content">
	<form action="" method="POST">

		Enter LGA Id: <input type="text" name="lga_id" placeholder="Enter LGA Id"><br>
		Enter Polling Unit Id: <input type="text" name="polling_unit_id" placeholder="Enter Polling unit Id"><br>

		Enter Polling Unit Name: <input type="text" name="polling_unit_name" placeholder="Enter Polling unit name"><br>
		Enter Polling Unit Number: <input type="text" name="polling_unit_no" placeholder="Enter Polling unit no "><br>
		Enter Polling Unit Description: <input type="text" name="polling_unit_descp" placeholder="Enter Polling unit Description"><br>

		 <label for="lga">Select Party</label>
			<Select name="select">

			<?php

		while($row = mysqli_fetch_array($res)){
			  

          echo "<option value= ".$row['partyname'] .">" . $row['partyname'] . "</option>";

			}
				?>

					
				
			</Select>

		Enter Party Score: <input type="text" name="score" placeholder="Enter party score"><br>

		Enter Ward Id: <input type="text" name="ward_id" placeholder="Enter ward Id"><br>

		Enter Unique Ward Id: <input type="text" name="uniqueward_id" placeholder="Enter ward Id"><br>

		Enter Ward Description: <input type="text" name="ward_desp" placeholder="Enter ward Description "><br>

		<input type="submit" name="submit">
		


	</form>
</div>

<?php
	if(isset($_POST['submit'])){
		$lga_id = mysqli_real_escape_string($conn, $_POST['lga_id']);
		$polling_unit_id = mysqli_real_escape_string($conn, $_POST['polling_unit_id']);
		$polling_unit_name = mysqli_real_escape_string($conn, $_POST['polling_unit_name']);

		$polling_unit_no =  mysqli_real_escape_string($conn, $_POST['polling_unit_no']);
		$polling_unit_descp =  mysqli_real_escape_string($conn, $_POST['polling_unit_descp']);
		$party = mysqli_real_escape_string($conn, $_POST['select']);
		$score = mysqli_real_escape_string($conn, $_POST['score']);
		$ward_id = mysqli_real_escape_string($conn, $_POST['ward_id']);
		$uniqueward_id = mysqli_real_escape_string($conn, $_POST['uniqueward_id']);
		$ward_desp = mysqli_real_escape_string($conn, $_POST['ward_desp']);

		

			
	$sql = "INSERT INTO announced_pu_results SET

			polling_unit_uniqueid = '$polling_unit_id',
			party_abbreviation = '$party',
			party_score = '$score'
          ";

     $res1 = mysqli_query($conn, $sql);

     if($res){
     	$sql2 = "INSERT INTO pooling_unit SET
     			polling_unit_id = '$polling_unit_id',
     			ward_id = '$ward_id',
     			lga_id = '$lga_id',
     			uniquewardid = '$uniqueward_id',
     			polling_unit_number = '$polling_unit_no',
     			polling_unit_name = '$polling_unit_name',
     			polling_unit_description = '$polling_unit_descp'

     			";

     	$res2 = mysqli_query($conn, $sql);

     	if($res2){
     		echo "Polling Unit Result Saved";
     	}

     	else{
     			echo "An Error  occured";
     	}

     	
     }else{

     		echo "Error saving Polling unit data";
     }


	}




?>

<?php require_once('footer.php'); ?>