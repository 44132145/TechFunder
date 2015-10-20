<?php
namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use app\models\questionnaire;
use yii\db\Connection;

class user_questionnaire extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_questionnaire';
    }

    public static function primaryKey()
    {
        return ['id_Q','user_id'];
    }

    public function SaveData($DataOBJ)
    {
        $user_id = Yii::$app->session->get('user');
        $data = $DataOBJ->getAttributes();
        $qObj = questionnaire::find()->select(['id']);
        //$NoErrors = true;

        $dbRq = Yii::$app->db->createCommand('INSERT INTO '. self::tableName() . ' (user_id, id_Q, user_response)
        values ('.$user_id.', :id_QV, :user_responseV)');

        if (intval($user_id) > 0){
            foreach ($data as $atrName => $atrVal)
            {
                $dbRq->bindValues([
                    ':id_QV' => current($qObj->where(['post_index' => $atrName])->asArray()->one()),
                    ':user_responseV' => $atrVal,
                ])->execute();
                /*
                // --- bad not work
                // --- $this->id_Q = current($qObj->where(['post_index' => $atrName])->asArray()->one());
                // --- $this->user_response = $atrVal;
                // --- $NoErrors = (($this->save()) && ($NoErrors === true))? true: false;

                // its work label_1
                $NoErrors = (($this->SeveOne(id_Q, current($qObj->where(['post_index' => $atrName])->asArray()->one()), $atrVal))
                        && ($NoErrors === true))? true: false;
                */
            }
            //return $NoErrors;
            return true;
        }
        else
            return false;
    }
    /**  not used now, use with label_1
    private function SeveOne($uid, $idQ, $row)
    {
        $ob = new user_questionnaire();
        $ob->user_id = $uid;
        $ob->id_Q = $idQ;
        $ob->user_response = $row;

        return $ob->save();
    }
     */
}
?>