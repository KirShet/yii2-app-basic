<?php

namespace app\widgets;

use yii\base\Widget;

class ScheduleInputWidget extends Widget
{

    public $name;
    public $enableTimeZone = true;
    public $enableSpecialTime = true;
    public $enableProductionCalendar = true;
    public $allowMultipleItems = true;

    /**
     * Метод запуска виджета
     * Рендерит представление с переданными параметрами.
     */
    public function run()
    {
        return $this->render('scheduleInputWidget', [
            'name' => $this->name,
            'enableTimeZone' => $this->enableTimeZone,
            'enableSpecialTime' => $this->enableSpecialTime,
            'enableProductionCalendar' => $this->enableProductionCalendar,
            'allowMultipleItems' => $this->allowMultipleItems,
        ]);
    }
}