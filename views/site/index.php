<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<?php
use yii\widgets\ActiveForm;
use app\models\ScheduleForm;

$model = new ScheduleForm();

$form = ActiveForm::begin();
echo $form->field($model, 'schedule')->widget(\app\widgets\ScheduleInputWidget\ScheduleInputWidget::class, [
    'attribute' => 'schedule',
    'model' => $model,
    'name' => 'schedule',
    'enableTimeZone' => true,
    'enableSpecialTime' => true,
    'enableProductionCalendar' => false,
    'allowMultipleItems' => true,
]);

ActiveForm::end();