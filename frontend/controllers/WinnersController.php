<?php

namespace frontend\controllers;

use Yii;
use backend\models\Winners;
use frontend\models\WinnersSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class WinnersController extends Controller
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
        $model = Winners::find()->select(['id', 'user_id', 'tender_id', 'max(sum) as sum'])
            ->groupBy('tender_id')
            ->having(['user_id' => Yii::$app->user->id])
            ->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Winners();
        $model->sum = Yii::$app->request->get('sum');
        $model->tender_id = Yii::$app->request->get('tender');
        $model->user_id = Yii::$app->request->get('user');
        $model->save();
        return $this->redirect(['/tender/index']);
    }

    protected function findModel($id)
    {
        if (($model = Winners::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
