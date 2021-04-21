<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;

Class RbacController extends Controller{

	public function actionInit(){
		$auth = Yii::$app->authManager;
		$auth->removeAll();

		//add "createPost "
	}
}