<?php


  function displayArray($Matric){

      for($row = 0; $row<4; $row++){
        
          echo "<b>Row number $row</b>";
          echo "<ul>";
            for($col = 0; $col<4; $col++){
            
            echo "<li>".$Matric[$row][$col]. "</li>";
              
              }
          
        }
    }



      function rowandcol($Matric){
       
            for($row = 0; $row<4; $row++){

                for($col = 0; $col<4; $col++){
                            
                  if($Matric[$row][$col] ==0){
                   
                        for($i=0; $i < 4; $i++){
                           
                           $Matric[$i][$col]= 0;
                           $Matric[$row][$col] =0;
                           
                        }
                       
                      
                  } 

          }

        }
    
      displayArray($Matric);
        return $Matric;

    }



    //Test
    $matrix = array(
      array(1,2,3,4), 
      array(5,6,7,8), 
      array(9,10,0,11), 
      array(12,13,14,15)
    );

    print_r(rowandcol($matrix));



  
  

?>