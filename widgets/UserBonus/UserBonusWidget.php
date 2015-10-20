<?php
namespace app\widgets\UserBonus;

use yii\base\Widget;
use Yii;

class UserBonusWidget extends Widget
{
    public $data = null;

    public function run()
    {
        return $this->render('bonus', ['picture' => $this->GetPicture()]);
    }

    private function GetPicture()
    {
       $outSite = file_get_contents('http://www.gifbin.com/random');
       require __DIR__."/phpQuery/phpQuery.php";
       $document = \phpQuery::newDocument($outSite);
       $hentry = $document->find('#gif');
       unset($outSite, $document);

       return $hentry;
    }
}
?>