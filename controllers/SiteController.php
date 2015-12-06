<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

use app\models\FormUser;
use app\models\FormAncet;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\user;
use app\models\user_questionnaire;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [ ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->session->get('lock') === NULL){
            if ((Yii::$app->session->get('step') == 1) || (Yii::$app->session->get('step') === NULL) || (Yii::$app->session->get('step') == 2)){
                if (Yii::$app->session->get('step') === NULL)
                    Yii::$app->session->set('step', 1);

                $widget = 'app\widgets\UserForm\UserFormWidget';
            }
            elseif (Yii::$app->session->get('step') == 3)
                    $widget = 'app\widgets\UserBonus\UserBonusWidget';
                else
                    $widget = 'app\widgets\Lock\LockWidget';
        }
        else
            $widget = 'app\widgets\Lock\LockWidget';

        return $this->render('index',['widget' => $widget]);
    }

    public function actionLock()
    {
        Yii::$app->session->set('lock', true);
        return \app\widgets\Lock\LockWidget::widget();
    }

    public function actionDatasave()
    {
        if (Yii::$app->request->isAjax) {
            $step = Yii::$app->session->get('step');
            $FormObj = ($step == 1)? new FormUser(): new FormAncet();
            $FormObj->load(Yii::$app->request->post());
            $e = ActiveForm::validate($FormObj);

            if (empty($e)){
                $dbObj = ($step ==1 )? new user(): new user_questionnaire();

                if ($dbObj->SaveData($FormObj) === true){
                    if ($step == 1)
                        Yii::$app->session->set('user', Yii::$app->db->getLastInsertID());

                    Yii::$app->session->set('step', $step+1);
                    return $this->renderAjax('widgetForm',['widget' => ((($step+1)!== 3)? 'app\widgets\UserForm\UserFormWidget'
                                                                                        : 'app\widgets\UserBonus\UserBonusWidget')]);
                }
                else{
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    die(print json_encode(['text' => 'error cant add'. (($step == 1)? ' user': ' data')]));
                }
            }
            else{
                Yii::$app->response->format = Response::FORMAT_JSON;
                die(print json_encode($e));
            }
        }
        else
            return $this->goHome();
    }

    public function actionTest($id = null)
    {
        return $this->render('test', ['cat' => $id]);
    }

}
