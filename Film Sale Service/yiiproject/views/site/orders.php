<?php

 ?>

<tbody>

<tr>
<td>1</td>
 <td><?= $model->movie->movie_name; ?></td>
  <td><?= '<img src="'.Yii::$app->request->baseUrl.'/images/'.$model->movie->movie_avatar.'" class="img-responsive" style="width:50px; height: 50px" > '?></td>
  <td>paid</td>
</tr>

</tbody>