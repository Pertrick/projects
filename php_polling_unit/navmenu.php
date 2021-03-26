<?php

	echo "<hr />";

	if(isset($_SESSION['user'])){

		$id = $_SESSION['id'];
		?>

		<a href="index.php">Home</a>  &#10084;
		<a href="viewprofile.php">View Profile</a>  &#10084;
		<a href="editprofile.php?id=<?php echo $id;?>">Edit Profile</a>  &#10084;
		<a href="interest.php">Edit Interest</a> &#10084;
		<a href="logout.php">Logout</a>  &#10084;

		<?php

	}else{
		?>
		<a href="login.php">log in</a>  &#10084;
		<a href="register.php">Sign up</a>  &#10084;

		<?php
	}






?>