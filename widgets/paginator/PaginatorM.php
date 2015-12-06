<?php
namespace app\widgets\paginator;
ini_set('memory_limit','-1');

use yii\base\Widget;
use Yii;
use yii\helpers\Url;

//-- 4 example
use app\models\testPaagination;


class PaginatorM extends Widget
{
    public $category = null;
    public $ccNum = 0;
    public $end = 1;

    private $interval = 10;
    private $maxNButt = 5;

    public function run()
    {
        $this->category = ($this->category !== null)? $this->category: 3;
        $this->ccNum = testPaagination::find()->where(['market_cat' => $this->category])->count();
        $this->end = (($page = Yii::$app->request->get('page')) !== null)?
            (($page == 'S')? 1:(($page == 'E')? ceil($this->ccNum/$this->interval):$page))
            : $this->end;


        //--- just 4 test ---
        $cats = testPaagination::find()->select('market_cat')->asArray()->addGroupBy('market_cat')->all();
        //print "<pre>"; var_dump($cats); die();
        //-------------------

        $data = testPaagination::find()->where(['market_cat'=>$this->category])->asArray()
                ->limit($this->interval)->offset($this->calcOffsets())->all();

        return $this->render(   'paginView', ['data' => $data,
                                'category' => $this->category,
                                'pButton' => $this->PaginButtons(),

                                //-- 4 example ---
                                'categoryesAll' => $cats,
                                ]
                    );
    }

    private function PaginButtons()
    {
        $bNum = ceil($this->ccNum/$this->interval);

        if ($bNum > 1){
            $rLine = "<button onclick='location.href =\"".Url::to('/site/test/' . $this->category.'?page=S')."\"'>&lt;&lt;</button>";
            print $bNum;

            $too =  ($this->end + $this->maxNButt);

            for ($j = $this->end; $j <= $too; $j++)
            {
                $rLine .= "<button onclick='location.href =\"".Url::to('/site/test/' . $this->category .'?page='.$j)."\"'>{$j}</button>";
            }

            $rLine .= "<button onclick='location.href =\"".Url::to('/site/test/' . $this->category.'?page=E')."\"'>&gt;&gt;</button>";
            return $rLine;
        }
        else
            return '';

    }

    private function calcOffsets()
    {
        return ($this->end * $this->interval - $this->interval);
    }
}
?>