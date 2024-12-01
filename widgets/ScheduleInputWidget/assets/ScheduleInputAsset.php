<?php

namespace app\widgets\assets;

use yii\web\AssetBundle;

class ScheduleInputAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/assets'; // Путь к ресурсам
    public $css = [
        'css/schedule-input.css',
    ];
    public $js = [
        'js/schedule-input.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}