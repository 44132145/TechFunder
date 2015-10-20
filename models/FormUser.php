<?php
namespace app\models;

use Yii;
use yii\base\Model;

use yii\validators\DateValidator;
use yii\validators\RequiredValidato;
use yii\validators\EmailValidator;
use yii\validators\NumberValidator;
use app\models\user;

class FormUser extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $birthday;
    public $shoesize;

    public function rules()
    {
        return [
            ['birthday', 'date', 'format' =>  'yyyy-mm-dd', 'message' => 'error data format'],
            [['birthday', 'firstname', 'lastname', 'shoesize', 'email'], 'required', 'message' => 'must bee not empty'],
            ['email', 'email', 'message' => ' error email format'],
            ['shoesize', 'integer', 'min' => 10, 'max' => 50, 'message' => 'error must bee number'],
            ['firstname', 'checkUserInDB'],
            ['email', 'CheckEmailInBD'],
        ];
    }

    public function checkUserInDB($attribute)
    {
       $e = $this->getErrors();
       if (empty($e)){
           $userObj = user::find()->where(['firstname' => $this->$attribute, 'lastname' => $this->lastname])->one();
           if ($userObj !== null){
               $this->addError($attribute, 'user all ready exists');
               $this->addError('lastname', 'user all ready exists');
           }
       }
    }

    public function CheckEmailInBD($attribute)
    {
        $userObj = user::find()->where(['email' => $this->$attribute])->one();

        if ($userObj !== null)
            $this->addError($attribute, 'email all ready taken');
    }
}
?>