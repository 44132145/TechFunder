<?php
//use app\widgets\Lock\LockWidget;
//use app\widgets\Lock\LockWidget;
/* @var $this yii\web\View */

$this->title = 'Fancy Survey';
?>
<div>
    <div id="infoBlock">
        <div id="steps-info">
            <span>
                <b>Getting your</b> AWESOME PRIZE is easy!
            </span>
            <ul>
                <li><div class="listCircle">1</div> Sign up and complete a survey</li>
                <li><div class="listCircle">2</div> Tell us more about yourself</li>
                <li><div class="listCircle">3</div> Get an awesome prize!</li>
            </ul>

        </div>
        <div id="timer">
            <span id="lable">Time remaining to complete your tasks</span>
            <br>
            <span id="SecondsNumber">000</span>
            <span>SECONDS</span>
        </div>
    </div>
    <div id="form_block">
        <?=$widget::widget()?>
    </div>
</div>
