<?php require('constants.php'); ?>

<html>
<head>
<title>GuestBook | Add Guest</title>

<style>

body{
     font-family: Georgia, arial, sans-serif;
        background:url('bg1.jpg');
        background-repeat: none;
        background-position: 

}

h1{
    margin-top: 6%;
    letter-spacing:2;
    line-height:1;
    color:#495c70;
}

h2{
    color:#fff;
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
    border:2px solid white;
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

<h2 class="text-center"> Add Guest</h2>

<?php 
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
             }

        ?>


<div class="wrapper">

    <form method="POST" action="" class="text-center" enctype="multipart/form-data">

    <!-- Establish a maximum file size for file uploads, in this case 32kb(32,768 bytes)
    <input type="hidden" name="Max_FILE_SIZE" value="32768" />-->

    <label for="first_name">First Name</label><br>
    <input type="text" name="first_name"  required/><br>

   <label for="last_name">Last Name</label><br>
    <input type="text" name="last_name"  required/><br>


    <input type="submit" name="submit" value="Add Guest" />

    </form>

    <a class="btn" href="http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php">Guest Box Entries</a>

</div>

  

   <?php

        if($conn){

                if(isset($_POST['submit'])){
                
                    $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
                    $lastname = mysqli_real_escape_string($conn, $_POST['last_name']);                
               

                        $sql = "INSERT INTO guest SET
                            first_name = '$firstname',
                            last_name = '$lastname'
                            ";

                        $res = mysqli_query($conn, $sql);

                        if($res){
                            $_SESSION['add'] ="<div class='success text-center'>Guest Added Successfully!</div>";
                        header('location:http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php');
                        }

                        else{
                            echo "failed";
                        }

                }
        }
    

        else{
            die();
        }



    ?>


</body>

</html>



