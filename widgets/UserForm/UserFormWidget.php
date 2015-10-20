<?php
namespace app\widgets\UserForm;

use yii\base\Widget;
use Yii;
use yii\helpers\Url;

use app\models\FormUser;
use app\models\FormAncet;
use app\models\questionnaire;

class UserFormWidget extends Widget
{
    public $data = null;
    private $formName = 'form';

    public function run()
    {
        $Step = Yii::$app->session->get('step');

        if ($Step == 1)
            $model =  new FormUser();
        elseif ($Step == 2)
                $model =  new FormAncet();
            else
                $model = null;

        if ($model !== null )
            return $this->render('form1', [
                                     'model'     => $model,
                                     'formItems' => $this->getItems($this->formName.$Step),
                                     'InfoData'  => $this->PrepareInfoData($Step),
                                     'form'      => $this->PrepareFormConf($Step),
                ]
            );
        else
            return false;# hear can bee view of error
    }

    private function getItems($formName)
    {
        $Items = questionnaire::find()->select(['type', 'title', 'post_index']);
        return $Items->where(['formName' => $formName])->asArray()->all();
    }

    private function PrepareInfoData($step)
    {
        return [
                'Step' =>(($step == 1)? 'Step One': 'Step Two'),
                'Info' =>(($step == 1)? 'Start by giving as all your personal data':
                                        'Take this survay so we can learn about you'),
        ];
    }

    private function PrepareFormConf($step)
    {
        return [
                    'id'          => (($step == 1)? 'firstform': 'secondform'),
                    //'action'      => Url::toRoute('site/'.(($step == 1)? 'firstform': 'secondform').'save'),
                    'action'      => Url::toRoute('site/datasave'),
                    'validateUrl' => Url::toRoute('validate/'.(($step == 1)? 'firstform': 'secondform')),
        ];
    }
}
?>