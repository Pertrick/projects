<?php require('constants.php'); ?>

<style>

.text-center{
    text-align:center;
}
</style>

<?php


if(isset($_GET['id'])){

    //get id
    $id = $_GET['id'];

            //delete from the database 
            $sql= "DELETE FROM guest WHERE id = $id LIMIT 1";

            $res = mysqli_query($conn, $sql);

            if($res){

                
                //query Executed succesfully and admin deleted
                //create session variable to display message
                $_SESSION['delete'] = "<div class='success text-center'>Guest Deleted Sucessfully</div>";

                //Redirect to manage Admin Page
                header('location:http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php');
            }

            

}


else{

    //query  not Executed succesfully and admin deleted
   //create session variable to display message
   $_SESSION['delete'] = "<div class='failed'>Delete Failed!</div>";;

  //Redirect to manage Admin Page
  header('location:http://localhost/Bincom/test/Guest%20Book%20App/guestbook.php');
}
