
 <?php include ('constants.php'); ?>

</!DOCTYPE html>
<html>
  <head>
	<title>Login</title>
    <style>

    *{margin:0;
        padding: 0;
    }

   body{
        font-family: Georgia, arial, sans-serif;
        background-color:#a2a3a4;
      }

      a{
        text-decoration: none;
      }

      a:hover{
        text-decoration: underline;
      }

        h2{
        margin-top: 10%;
        font-size:1.9rem;
        letter-spacing:1.2;
        color:#495c70;
        word-spacing: 1;
        line-height:1;
       }


        .text-center{
            text-align:center;
        }
        
        .success{
            color:green;
        }

        .failed{
            color:red;
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


        .wrapper input[type="text"], .wrapper input[type="password"], input[type="email"]{
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


        .wrapper input[type="text"]:focus, .wrapper input[type="password"]:focus, input[type="email"]:focus{
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



    </style>
  </head>
  <body>

  <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        ?>

    <h2 class="text-center">Register</h2><br>

    <div class="wrapper">
            

        <form method="POST" action="" class="text-center">

        <input type="text" name="username" placeholder="Enter username" required/><br>

         <input type="email" name="email" placeholder="Enter e-mail" required/><br>

        <input type="password" name="password" placeholder="Enter Password" required/><br>

        <input type="submit" name="submit"  value="Sign up" />
        <p> Already Signed up?<a href="http://localhost/SideHustle/Authentication_System/login.php">Log in</a></p>

        </form>

        </div>
        
        
    </body>
</html>


 <?php

        if(isset($_POST['submit'])){

            //storing user details
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                
              if(!empty($username) && !empty($password) && !empty($email)) {
                
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['login'] = "<div class='success text-center'>Registration Successful!</div>";
                header('location:http://localhost/SideHustle/Authentication_System/login.php');
                
                
               }

               else{
                    $_SESSION['login'] = "<div class='failed text-center'>Enter all required fields</div>";
                 header('location:http://localhost/SideHustle/Authentication_System/register.php');

            }

        }

        else{
             //
        }
    ?>

