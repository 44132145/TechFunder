<?php
namespace app\widgets\Lock;
use yii\base\Widget;
use Yii;

class LockWidget extends Widget
{
    public function run()
    {
        return $this->render('lockMSG');
    }
}
?>