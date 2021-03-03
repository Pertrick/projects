<?php require_once('authenticate.php'); ?>

</!DOCTYPE html>
<html>
  <head>
	<title>Homepage</title>
    <style>

    *{margin:0;
        padding: 0;
    }

   body{
        font-family: Georgia, arial, sans-serif;
        background-color:#a2a3a4;
      }

        h2{
        margin-top: 10%;
        font-size:2rem;
        letter-spacing:1.2;
        color:#495c70;
        word-spacing: 1;
        line-height:1;
       }


        .text-center{
            text-align:center;
        }

        a{
            
            color:white;
            text-decoration: none;
            
        }

        .btn{
            background-color: red;
            margin:3% auto;
            width:7%;
            padding:1%;
            border-radius: 1%;
            text-align: center;
        }

        span{
            color:red;
            text-transform: uppercase;
        }


        .success{
            color:green;
        }

        .failed{
            color:red;
        } 

    </style>
  </head>
  <body>
       

    <h2 class="text-center">Welcome <span><?php echo $_SESSION['username'];?></span> to your Homepage!</h2>
    <br>
       <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
                }

                ?>
                <br>
     <div class="btn">
      <a href="http://localhost/SideHustle/Authentication_System/logout.php">Logout</a>
      </div>
    
         


      
    </body>
</html>