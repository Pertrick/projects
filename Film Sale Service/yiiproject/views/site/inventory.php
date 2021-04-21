<?php


?>


<div>
  
  <table class="table">
    <thead>
      <tr>
        <th>Genre: Action</th>
        <th>Movies Purchased</th>
        <th>Customers age above 50</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          
      <?php foreach($model as $models){
    echo $models['movie_name'].'<br>';
    }?>
        </td>

         <td>
          
      <?= $model2;?>
  
        </td>


         <td>
          
       <?php foreach($model3 as $models){
    echo $models['username'].'<br>';
    }?>
        
  
        </td>




      </tr>
    </tbody>
    
  </table>
</div>