<div class="activeForm">

    <div id="stepNumber"><?=$InfoData['Step']?></div>

    <div id="InfoLine"><?=$InfoData['Info']?></div>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\dateSelect\DateSelect;

$this->registerCssFile(Yii::$app->request->baseUrl.'/css/FormWindow.css');
$this->registerJS("$('body').on('beforeSubmit', 'form#".$form['id']."',
                    function () {
                        data = {};
                        $('form#".$form['id']."').find('input').not(\"[type='submit']\").each(function() {
                            data[this.name] = this.value;
                        });
                        data['ajax'] =  $('form#".$form['id']."').attr('id');

                        $.ajax({
                                url: $('form#".$form['id']."').attr('action'),
                                type: 'POST',
                                data: data ,
                                success: (function(data) {
                                                        $('#form_block').html(data)
                                }),
                        });
                    return false;
                    })",  yii\web\View::POS_END);

$form = ActiveForm::begin([
    'validationUrl' => $form['validateUrl'],
    'id' => $form['id'],
    'action' => $form['action'],
    'enableAjaxValidation' => true,
    'validateOnSubmit' => true,
    'options' => ['class' => ''],
    'layout' => 'horizontal',
]);

if (!empty($formItems))
    for($i = 0; $i < count($formItems); $i++)
        if ($formItems[$i]['type'] == 'date')
            print $form->field($model, $formItems[$i]['post_index'])->widget(DateSelect::className(),['form' => $form]);
         else
            print $form->field($model, $formItems[$i]['post_index'])->label($formItems[$i]['title']);
?>
    <div id="submit_button">
        <?= Html::submitButton('SAVE', ['class' => '']) ?>
    </div>
<? ActiveForm::end();?>
</div>
