<?php

namespace frontend\controllers;

use Yii;
use backend\models\Tender;
use backend\models\TenderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TenderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Tender::find()->where(['date' => date('Y-m-d')])->orderBy(['id'=>SORT_DESC])->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Tender::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
