
<!DOCTYPE html>
<html>
<head>
	<title>Todo list</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
  
     <div class="header">
     	<h1>Todo List Application with PHP and MYSQL</h1>
     </div>

     <div id="form">
	<form method="POST" action="">	

	 <?php
    $db = mysqli_connect("localhost:3308","root", "","todo") or die("QUERY Failed". mysqli_error($db));?>

<?php
  if(isset($_POST['submit'])){
  	$task = $_POST['task'];
  	$query = "INSERT INTO tasks(task) VALUES('$task')";
  	$run_query = mysqli_query($db, $query);
  }

?>

	<input type="text" name="task" placeholder="Enter task" required="required" class="task">

	<input type="submit" name="submit" value="Add Task" class="btn">

	</form>
  </div>


	<table>
	<thead>
	<th>s/n</th>
	<th></th>

	<th>User</th>
	<th></th>

    <th>Task</th>
	<th></th>

	<th>Action</th>
	<th></th>
	<th></th>

	<th>Time</th>
	<th></th>
	</tr>
	</thead>
	<tbody>

	<?php

	$run_task = mysqli_query($db,"SELECT * FROM tasks LIMIT 20");

	while($row = mysqli_fetch_assoc($run_task)){
		$id= $row['id'];
		$task1 = $row['task'];
		$name = "<i style='color:skyblue;'>Arnauld</i>";
		$time = $row['time'];

	

	?> 
		<tr>
		<td><?php echo $id; ?></td>
		<td></td>	
		<td><?php echo $name;?></td>	
		<td></td>	
		<td><?php echo $task1;?></td>	
		<td></td>
		<td class="edit"><a href=""><img src="edit.png" height="15px" width="15px" ></a></td>
		<td class="delete"><a href="index.php?delete=<?php 
           echo $id;
		?>"><img src="remove.png" height="15px" width="15px" ></a></td>	
		<td></td>		
		<td><?php echo $time;?></td>			
		</tr>
		<?php }?>
	</tbody>
       <?php
       if(isset($_GET['delete'])){
       	$delete = $_GET['delete'];
       	$query = "DELETE FROM tasks WHERE id= $delete ";
       	$run = mysqli_query($db, $query);

       	if(!$run){
       		echo "alert('delete query failed!')";
       	}
       	else{
       		header('location: index.php');
       	}
       }
	?>






	
	</table>

	


</body>
</html>
