<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
                <?php
                use app\widgets\ScheduleInputWidget\ScheduleInputWidget;

                echo ScheduleInputWidget::widget([
                    'name' => 'schedule',
                    'enableTimeZone' => true,
                    'enableSpecialTime' => false,
                    'enableProductionCalendar' => true,
                    'allowMultipleItems' => true,
                ]);
