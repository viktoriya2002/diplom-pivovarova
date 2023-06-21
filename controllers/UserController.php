<?php

namespace app\controllers;
use Yii;

use app\models\User;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\RegForm;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function beforeAction($action)
    {
        if (((Yii::$app->user->isGuest) || (Yii::$app->user->identity->admin==0)) && $action->id=='index'){
            $this->redirect(['site/login']);
            return false;
            };

                if ((Yii::$app->user->isGuest) && ($action->id=='update')){
                    $this->redirect(['site/login']);
                    return false;
                    };

                if ((Yii::$app->user->isGuest) && ($action->id=='delete')){
                    $this->redirect(['site/login']);
                    return false;
                    };

                if ((!Yii::$app->user->isGuest) && ($action->id=='create')){
                     $this->redirect(['site/index']);
                    return false;
                    };

                if ((Yii::$app->user->isGuest) && ($action->id=='view')){
                    $this->redirect(['site/login']);
                    return false;
                    } else return true;
            
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate() { 
    $model = new RegForm(); 
    if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post()))      { 
        
        \Yii::$app->response->format = Response::FORMAT_JSON;          
        return ActiveForm::validate($model);  
    }  
    if ($this->request->isPost) {          
        if ($model->load($this->request->post()) && $model->validate()) { 
            $user = new User();             
            $user->fio = $model->fio; 
            $user->email = $model->email;             
            $user->phone = $model->phone; 
            $user->adress = $model->adress; 
            $user->place = $model->place;
            $user->post = $model->post;
            $user->login = $model->login;
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);  
            if ($user->save()) {   
                $model->id = $user->id;              
                \Yii::$app->user->login($user); 
                return $this->redirect(['view', 'id' => $model->id]);             
            } 
        }  

    } else {  
        $model->loadDefaultValues();  
    } 

    return $this->render('create', [  
        'model' => $model,      ]);  
}
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
