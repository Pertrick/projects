<?php

namespace app\controllers;

use Yii;
use app\models\Movies;
use app\models\MoviesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\data\ArrayDataProvider;


/**
 * MoviesController implements the CRUD actions for Movies model.
 */
class MoviesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
        		'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update','delete'],
                'rules' => [
                    [
                    'actions' =>['update', 'create', 'delete'],
                    'allow' => true,
                    'roles' =>['@']
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Movies models.
     * @return mixed
     */
    public function actionIndex()
    {


        $actionProvider = new ActiveDataProvider([
            'query' => Movies::find()->where(['genre_id' =>1])->limit(6),
            'pagination' => false,

            'sort' =>[
                'defaultOrder' =>[
                    'id' =>SORT_DESC,
                ],
            ],

            
        ]);


        $horrorProvider = new ActiveDataProvider([
            'query' => Movies::find()->where(['genre_id' =>2])->limit(6),
            'pagination' => false,
            'sort' =>[
                'defaultOrder' =>[
                    'id' =>SORT_DESC,
                ]
            ]
        ]);

         $comedyProvider = new ActiveDataProvider([
            'query' => Movies::find()->where(['genre_id' =>3])->limit(6),
            'pagination' => false,
            'sort' =>[
                'defaultOrder' =>[
                    'id' =>SORT_DESC,
                ]
            ]
            
        ]);

          $cartoonProvider = new ActiveDataProvider([
            'query' => Movies::find()->where(['genre_id' =>6])->limit(6),
            'pagination' => false,
            'sort' =>[
                'defaultOrder' =>[
                    'id' =>SORT_DESC,
                ]
            ]
            
        ]);


        $dramaProvider = new ActiveDataProvider([
            'query' => Movies::find()->where(['genre_id' =>4])->limit(6),
            'pagination' => false,
            'sort' =>[
                'defaultOrder' =>[
                    'id' =>SORT_DESC,
                ]
            ]

            
        ]);

    	$searchModel = new MoviesSearch();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider1' => $actionProvider,
            'dataProvider2' => $horrorProvider,
            'dataProvider3' => $comedyProvider,
            'dataProvider4' => $dramaProvider,
            'dataProvider6' => $cartoonProvider,
           
        ]);

        
    }

    /**
     * Displays a single Movies model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Movies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movies();

        if ($model->load(Yii::$app->request->post())) {
 

              $image =uploadedFile::getInstance($model, 'image');
             if(!is_null($image)){

                /* $oldfile = $model->movie_avatar;

                    if(!empty($oldfile) ){
                        unlink(Yii::$app->basePath. '/web/images/'. $model->avatar);
                    }
                  */
                    
                //save with image store the source file name
                $model->avatar_name = $image->name;
                $ext = (explode(".", $image->name));
                $ext = end($ext);

                //generate a unique file name to prevent duplication
                $model->movie_avatar = Yii::$app->security->generateRandomString().".{$ext}";
                //the path to save file, you can set an uploadPath
                //in Yii::$app->params
                Yii::$app->params['upload'] = Yii::$app->basePath. '/web/images/';
                $path = Yii::$app->params['upload']. $model->movie_avatar;
                
                //$model->user_id = Yii::$app->user->identity->id;

                $image->saveAs($path);
                if($model->save()){
                    Yii::$app->session->setFlash('success', "Movie Added successfully!");
                    return $this->redirect(['index', 'id' => $model->id]);
                     
                }else{
                    var_dump($model->getErrors());
                    die();
                }
            return $this->redirect(['view', 'id' => $model->id]);
        }

       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Movies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        	 $image =uploadedFile::getInstance($model, 'image');
             if(!is_null($image)){

                $oldfile = $model->movie_avatar;

                    if(!empty($oldfile) ){
                        unlink(Yii::$app->basePath. '/web/images/'. $model->movie_avatar);
                    }
                  
                    
                //save with image store the source file name
                $model->avatar_name = $image->name;
                $ext = (explode(".", $image->name));
                $ext = end($ext);

                //generate a unique file name to prevent duplication
                $model->movie_avatar = Yii::$app->security->generateRandomString().".{$ext}";
                //the path to save file, you can set an uploadPath
                //in Yii::$app->params
                Yii::$app->params['upload'] = Yii::$app->basePath. '/web/images/';
                $path = Yii::$app->params['upload']. $model->movie_avatar;
                
                //$model->user_id = Yii::$app->user->identity->id;

                $image->saveAs($path);
                if($model->save()){
                    Yii::$app->session->setFlash('success', "Movie updated successfully!");
                    return $this->redirect(['view', 'id' => $model->id]);
                     
                }else{
                    var_dump($model->getErrors());
                    die();
                }
          

       }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Movies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model =  $this->findModel($id);
        $this->findModel($id)->delete();
        $oldfile = $model->movie_avatar;

        if(!empty($oldfile) ){
         unlink(Yii::$app->basePath. '/web/images/'. $model->movie_avatar);
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the Movies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Movies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movies::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



   


   
}
