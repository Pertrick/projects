<?php require('constants.php'); ?>

<html>
<head>
<title>GuestBookApp |  guest</title>

<style>

body{
    font-family: Georgia, arial, sans-serif;
    background:url('bg1.jpg');
        background-repeat: none;
        background-position: 

}

h1{
    margin-top: 5%;
    letter-spacing:2;
    line-height:1;
    color:#fff;
}

a{
    text-decoration: none;
    color:white;
    padding:3%;
}

a:hover{
    text-decoration: underline;
}

a.delete{
    background-color:red;
}


a.edit{
    background-color:green;
}

.failed{

    color:red;
}

.success{

color:green;
}


.btn{
    background-color:green;
    padding:1%;
    color:white;
}


.text-center{
    text-align:center;
}

.wrapper{
    margin:1% auto;
    width:90%;
}

table{
    border:1px solid black;
    border-collapse: collapse;
    width:80%;
    margin:4% auto;
    text-align:left;
}
tr:nth-child(even){
    background-color: #f2f2f2;
}

tr th{
    padding:1%;
    border-bottom:1px solid black; 
}


td,th{
    padding:1%;
    border: 1px solid #dddddd;
}

</style>

</head>
<body>


<h1 class="text-center">List of Guests</h1>
    <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['edit'])){
            echo $_SESSION['edit'];
            unset($_SESSION['edit']);
        }

        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }


    ?>

   <div class="wrapper">

    <form method="POST" action="" class="text-center">

       
        <table>
          <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date</th>
            <th colspan="2">Action</th>

          </tr>

          <?php

            $sql = "SELECT * FROM guest ORDER BY first_name ASC";

            $res = mysqli_query($conn, $sql);
            $sn =1;

            if($res){
                
                $count = mysqli_num_rows($res);

                if($count >0){

                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $firstname = $row['first_name'];
                        $lastname = $row['last_name'];
                        $date = $row['date'];
                        ?>
               
            <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $lastname; ?></td>

            <td><?php echo $date; ?></td>

            <td><a href="http://localhost/Bincom/test/Guest%20Book%20App/delete.php?id=<?php echo $id; ?>" class="delete">Delete</a>

             <a href="http://localhost/Bincom/test/Guest%20Book%20App/edit.php?id=<?php echo $id; ?>" class="edit">Edit</a></td>



            </tr>

            <?php

                    }

                }

                else{
                   
                    ?>

                    <tr>
                       <td colspan="6"><div class="failed text-center">No Category Added</div></td>

                    </tr>

                    <?php
                }

            }

            ?>
            
           


        </table>

        <a class="btn" href="http://localhost/Bincom/test/Guest%20Book%20App/entry.php">Add more Guests</a>

    </form>

   

    
</div>



</body>
</html>