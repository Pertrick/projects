<?php include('constants.php'); ?>

<html>
   <head>
     <title>GuestBook | Edit Guest</title>

     <style>

body{
     font-family: Georgia, arial, sans-serif;
        background:url('bg1.jpg');
        background-repeat: none;
        background-position: 

}

h1{
    margin-top: 6%;
    letter-spacing:1;
    line-height:1;
}

a{
    text-decoration:none;
    font-size:0.9rem;
    color:green;
    text-align: center;
}

a:hover{
    text-decoration:underline;
    font-weight:bold;
}


.text-center{
    text-align:center;
}

.wrapper{
    margin:4% auto 5% auto;
    padding:1%;
    border-radius:1%;
    border:2px solid #fff;
    width:400px;
    text-align:center;
}

label{
    color:#495c70;
    letter-spacing: 1;
    font-weight: 700;
}
 .wrapper input[type="text"]{
            border:none;
            outline:0;
            padding:10px;
            background-color: #e8eeef;
            box-shadow: 0 1px 0 rgba(0,0,0,0.3) inset;
            box-sizing: border-box;
            font-size:15px;
            color:#8a97a4;
            margin:15px 0 10px 0;
            width:70%;
        }




.wrapper input[type="text"]:focus{
            background: #d2d9dd;
            color:#495c70;
        }

input[type="submit"]{
            margin:4% auto;
            font-size:15px;
            display:block;
            letter-spacing: 2;
            padding:7px 18px 7px 18px;
            width:60%;
            background-color:#495c70;
            color:#fff;
            border:none;
            border-radius:10px;
        }

form{
    margin:3%;
}

.failed{
    color:red;
}


</style>

   
   </head>
   <body>

    <h1 class="text-center">Guest Book Application</h2>

    <h2 class="text-center"> Edit Guest</h2>

   <?php
     //1. get the ID of Selected Admin
     $id = $_GET['id'];

     //2.  Create SQL Query to get the Details
     $sql = "SELECT * FROM guest WHERE id = $id ";

     //3. execute the query
     $result = mysqli_query($conn, $sql);

     //check whether the query is executed or not
     if($result == true){
         //check whether the data is available or not
         $count = mysqli_num_rows($result);

         //check whether we have admain data or not
         if($count ==1){
             //get  the details
             $row =mysqli_fetch_assoc($result);

             $firstname = $row['first_name'];
             $lastname = $row['last_name'];
        
         }

         else{
             //Redirect to Manage Amin Page
             header('location:http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php');
         }
     }

     ?>
   
   
<div class="wrapper">

        


    <form method="POST" action="" class="text-center" enctype="multipart/form-data">

    <!-- Establish a maximum file size for file uploads, in this case 32kb(32,768 bytes)
    <input type="hidden" name="Max_FILE_SIZE" value="32768" />-->

    <label for="first_name">First Name</label><br>
    <input type="text" name="first_name"  value="<?php echo $firstname?>" required/><br>

   <label for="last_name">Last Name</label><br>
    <input type="text" name="last_name"   value="<?php echo $lastname ?>"  required/><br>


    <input type="submit" name="submit" value="update Guest" />
     <input type="hidden" name="id" value="<?php echo $id; ?>"> 

    </form>

    <p>Click to go back to<a class="btn" href="http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php">Guest List</a></p>

</div>

  </body>
</html>

<?php

//check whether the submit button is clicked
if(isset($_POST['submit'])){
   
    //get all the values from form to update
    $id = $_POST['id'];
    
    $firstname = $_POST['first_name'];
     $lastname = $_POST['last_name'];

    

    //Create a SQL Query to update task
    $sql = "UPDATE guest SET
    first_name = '$firstname',
    last_name = '$lastname'
    WHERE id = '$id'
    ";

    //Execute the query
    $result = mysqli_query($conn, $sql);

    //check whether the query executed successfully
    if($result == true){

      $_SESSION['edit'] ="<div class='success text-center'>Guest updated Successfully!</div>";
       
        //redirect to manage admin page
        header('location:http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php');
    }

    
else{


    //redirect to manage admin page
     $_SESSION['edit'] ="<div class='success text-center'>failed to update Guest!</div>";
    
    header('location:http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php');

}



}



?>
