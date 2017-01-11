<?php

namespace app\controllers;
use app\models\Temp;
use Yii;
use yii\web\Controller;
class TempController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreate()
    {
        $model = new Temp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('form', [
                'model' => $model,
            ]);
        }
    }

}
