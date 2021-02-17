
<?php

$number =201;


for($count =1; $count <$number; $count++){

    echo "pin  $count: &nbsp;";
    
    $i=1;
    $pin_number =12;
    while($i <=$pin_number){
        $random_pin = rand(0,9);?>
        <strong><?php echo " $random_pin"; ?></strong>
       <?php $i++;
        
    }


    echo "<br>";
    
}

?>