<?php
namespace app\widgets\paginator;
ini_set('memory_limit','-1');

use yii\base\Widget;
use Yii;
use app\models\testPaagination;

class PaginatorM extends Widget
{
    public $category = null;
    public $ccNum = 0;
    public $end = 1;

    private $interval = 10;

    public function run()
    {
        $this->category = ($this->category !== null)? $this->category: 3;
        $this->end = (($page = Yii::$app->request->get('page')) !== null)? $page: $this->end;

        $this->ccNum = testPaagination::find()->where(['market_cat' => $this->category])->count();

        $cats = testPaagination::find()->select('market_cat')->asArray()->addGroupBy('market_cat')->all();

        $data = testPaagination::find()->where(['market_cat'=>$this->category])->asArray()
                ->limit($this->interval)->offset(($this->end * $this->interval - $this->interval))->all();

        return $this->render(   'paginView', ['data' => $data,
                                'categor' => $cats,
                                'cNum' => $this->ccNum,
                                'category' => $this->category]
                    );
    }

}
?>