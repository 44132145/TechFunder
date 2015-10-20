<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

use app\models\FormUser;
use app\models\FormAncet;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ValidateController extends Controller
{
    public function actionIndex()
    {
        return $this->goHome();
    }

    public function actionFirstform()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $FormUser = new FormUser();
            $FormUser->load(Yii::$app->request->post());

            die(print json_encode(ActiveForm::validate($FormUser)));
        }
        else
            return $this->goHome();
    }

    public function actionSecondform()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $FormUser = new FormAncet();
            $FormUser->load(Yii::$app->request->post());

            die(print json_encode(ActiveForm::validate($FormUser)));
        }
        else
            return $this->goHome();
    }
}
?>