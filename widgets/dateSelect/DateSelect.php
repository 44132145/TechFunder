<?php
namespace app\widgets\dateSelect;
use yii\base\Widget;
use Yii;

class DateSelect extends Widget
{
    public $date = null;
    public $name;
    public $model;
    public $attribute;
    public $form;

    private $dtObj = null;
    private $minYear = 1980;
    private $maxYear = 2999;

    public function run()
    {
        $this->SetDate();

        $Step = Yii::$app->session->get('step');

        return $this->render('select', ['model'     => $this->model,
                                        'attribute' => $this->attribute,
                                        'form'      => $this->form,
                                        'date'      => $this->dtObj,
                                        'SelectOptions' => [
                                            'Y' => $this->InitSelectOptions(
                                                (($Step == 1)? $this->minYear: date('Y', strtotime('+1 year'))),
                                                (($Step == 1)? date('Y'): $this->maxYear), 'Y'
                                            ),
                                            'm' => $this->InitSelectOptions(1, 12, 'm'),
                                            'd' => $this->InitSelectOptions(1, date("t", strtotime($this->dtObj->format('Y-m-d'))), 'd'),
                                        ],
        ]);
    }

    private function SetDate()
    {
        $this->dtObj = new \DateTime(($this->date !== null)? $this->date: date('Y-m-d'));

        if (!is_object($this->dtObj))
            $this->dtObj = new \DateTime();
    }

    private function InitSelectOptions($start, $end,  $typeD)
    {
        $return = '';

        for ($i = intval($start); $i <= intval($end); $i++)
        {
            $return .= '<option '.(($i == intval($this->dtObj->format($typeD)))? 'selected': '').'>';
            $return .= sprintf("%'.0".(($typeD !== 'Y')? '2': '4')."d\n", $i).'</option>';
        }

        return $return;
    }
}
?>