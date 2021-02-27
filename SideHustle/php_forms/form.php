</!DOCTYPE html>
<html>
  <head>
	<title>Attendance | Register</title>
    <style>

    *{margin:0;
        padding: 0;
    }

   body{
        font-family: Georgia, arial, sans-serif;
        background-color:skyblue;
      }

        h2{
        margin-top: 1%;
        font-size:1.9rem;
        letter-spacing:1.2;
        color:#495c70;
        word-spacing: 1;
        line-height:1;
       }


        .text-center{
            text-align:center;
        }


        .wrapper{
            margin:0% auto;
            padding:2%;
            background-color: #F4f7f8;
            border-radius:5%;
            width:350px;
            text-align:center;
        }

        .container{
            margin:1% auto;
            padding:2%;
            background-color: #F4f7f8;
            border-radius:1%;
            width:350px;
        }


        .wrapper input[type="text"], .wrapper input[type="password"], .wrapper input[type="email"]{
            border:none;
            outline:0;
            padding:10px;
            background-color: #e8eeef;
            box-shadow: 0 1px 0 rgba(0,0,0,0.3) inset;
            box-sizing: border-box;
            font-size:15px;
            color:#8a97a4;
            margin:15px 0 0 0;
            width:70%;
        }


        .wrapper input[type="text"]:focus, .wrapper input[type="password"]:focus, .wrapper input[type="email"]:focus{
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
            margin-top:1%;
        }

        .margin-top{
            margin-top: 
        }



    </style>
  </head>
  <body>

    <h2 class="text-center">Register</h2><br>

    <div class="wrapper">
            

        <form method="POST" action="" class="text-center">

        <input type="text" name="first_name" placeholder="Enter First Name" required/><br>

        
        <input type="text" name="last_name" placeholder="Enter Last Name" required/><br>

        <input type="email" name="email" placeholder="Enter Email" required/><br>

        <input type="password" name="password" placeholder="Enter Password"required/><br>

        <input type="submit" name="submit"  value="Register" />

        </form>

        </div>





         </div>


        <?php 

        if(isset($_POST['submit'])){

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        ?>

         <div class="container">
         <h4 class="text-center">Php</h4><br>

        
        <?php
              echo"<div class='text-center'>first_name:<strong>$first_name</strong></div>";
              echo"<div class='text-center'>last_name:<strong>$last_name</strong></div>";
              echo"<div class='text-center'>email:<strong>$email</strong></div>";
              echo"<div class='text-center'>Password:<strong>$password</strong></div>";





            }

        ?>
        
    </body>
</html>