<?php

namespace app\controllers;
use Yii;

use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
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

                if (((Yii::$app->user->isGuest) || (Yii::$app->user->identity->admin==0)) && $action->id=='delete'){
                    $this->redirect(['site/login']);
                    return false;
                    };

                if (((Yii::$app->user->isGuest) || (Yii::$app->user->identity->admin==0)) && $action->id=='create'){
                    $this->redirect(['site/login']);
                    return false;
                    };    

                if (((Yii::$app->user->isGuest) || (Yii::$app->user->identity->admin==0)) && $action->id=='view'){
                    $this->redirect(['site/login']);
                    return false;
                    } else return true;
            
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->photo=UploadedFile::getInstance($model,'photo');
            $file_name='/image/' . \Yii::$app->getSecurity()->generateRandomString(50). '.' . $model->photo->extension;
            $model->photo->saveAs(\Yii::$app->basePath . $file_name);
            $model->photo=$file_name;
            if ($model->save(false)) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->photo=UploadedFile::getInstance($model,'photo');
            $file_name='/image/' . \Yii::$app->getSecurity()->generateRandomString(50). '.' . $model->photo->extension;
            $model->photo->saveAs(\Yii::$app->basePath . $file_name);
            $model->photo=$file_name;
            if ($model->save(false)) {
                return $this->redirect(['index']);
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionNews()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('news', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }
}
