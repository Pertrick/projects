
<html>
<head>
<title>Simple Calculator </title>

<style>

*{
    margin:0;
    padding:0;
    
}

h1{
    color:green;

}
.text-center{
    text-align:center;
}

.container{
   
    margin: 5% auto;
}

.wrapper{
    border: 2px solid green;
    border-radius:2%;
    width:30%;
    margin:3% auto;
    padding:2%;
}

.btn{
    color:white;
    border:none;
    width:35%;
}

.btn-plus{
    background-color: red;

}

.btn-minus{
    background-color:green;

}

.btn-divide{
    background-color: brown;

}

.btn-mul{
    background-color:skyblue;
    
}

input{
    font-style:italic;
    padding:2%;
    margin:2%;
    font-weight:bold;
    font-size:1.2rem;
    border-radius:2%;
    text-align:center;
    color:green;
}



</style>
</head>
<body>


<?php 

if(isset($_POST['submit'])){

    $num1 = $_POST['n1'];
    $num2 = $_POST['n2'];
    $operation = $_POST['submit'];

    $ans='';

    if($operation =="+"){
        $ans =$num1 + $num2;
    }

    else if($operation =="-"){
        $ans =$num1 - $num2;
    }

    else if($operation =="x"){
        $ans =$num1 * $num2;
    }

    else if($operation =="/"){
        $ans =$num1/ $num2;
    }

}

else{
    $ans ='';
    $num1='';
    $num2='';
}


?>

<div class="container ">
<h1 class="text-center"> Simple Calculator</h1>

<div class="wrapper">

<form action="" method="POST" class="text-center">

First Number: <input name="n1" value="<?php echo $num1; ?>"><br>
Second Number: <input name="n2" value="<?php echo $num2; ?>"><br>

 <input  type="submit" name="submit" value="+" class="btn btn-plus">
 <input  type="submit" name="submit" value="-" class="btn btn-minus">
 <input  type="submit" name="submit" value="x" class="btn btn-mul">
 <input  type="submit" name="submit" value="/" class="btn btn-divide"><br>

 RESULT : <input readonly ="readonly" name="ans" value="<?php echo $ans; ?>"><br>

</div>

</form>

</div>




</body>
</html>