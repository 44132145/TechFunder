<?php
namespace app\models;

use yii\db\ActiveRecord;

class questionnaire extends ActiveRecord
{
    public static function tableName()
    {
        return 'questionnaire';
    }
}
?>