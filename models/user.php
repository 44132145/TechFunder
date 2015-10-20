<?php
namespace app\models;

use yii\db\ActiveRecord;

class user extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function SaveData($dataObj)
    {
        $this->firstname    = $dataObj->firstname;
        $this->lastname     = $dataObj->lastname;
        $this->email        = $dataObj->email;
        $this->birthday     = $dataObj->birthday;
        $this->shoesize     = $dataObj->shoesize;

        return ($this->save())? true: false;
    }
}
?>