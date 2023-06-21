<?php

namespace app\controllers;
use Yii;

use app\models\Child;
use app\models\ChildSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChildController implements the CRUD actions for Child model.
 */
class ChildController extends Controller
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
     * Lists all Child models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ChildSearch();
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

                if (((Yii::$app->user->isGuest) || (Yii::$app->user->identity->admin==0)) && $action->id=='update'){
                    $this->redirect(['site/login']);
                    return false;
                    };

                if ((Yii::$app->user->isGuest)  && ($action->id=='child')){
                    $this->redirect(['site/login']);
                    return false;
                    };

                if ((Yii::$app->user->isGuest)  && ($action->id=='delete')){
                    $this->redirect(['site/login']);
                    return false;
                    }; 

                if (((Yii::$app->user->isGuest) || (Yii::$app->user->identity->admin==0)) && $action->id=='view'){
                    $this->redirect(['site/login']);
                    return false;
                    } else return true;
            
    }

    /**
     * Displays a single Child model.
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
     * Creates a new Child model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Child();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['child']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Child model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Child model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->user_id==Yii::$app->user->identity->id){
            $model->delete();
            return $this->redirect(['user/view?id='.Yii::$app->user->identity->id]);
            } else 
            echo "<script>alert('Действие запрещено')</script>";
            
    }

    /**
     * Finds the Child model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Child the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Child::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChild()
    {
        $searchModel = new ChildSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('child', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
        if (Yii::$app->user->isGuest) {
            header('location: ../site/index');
            die();
        }
    }
}
