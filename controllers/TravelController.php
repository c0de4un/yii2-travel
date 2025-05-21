<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\UserBusinessTrip;
use app\models\BusinessTrip;
use app\models\search\BusinessTripSearch;
use yii\web\NotFoundHttpException;

class TravelController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BusinessTripSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new BusinessTrip();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = BusinessTrip::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
