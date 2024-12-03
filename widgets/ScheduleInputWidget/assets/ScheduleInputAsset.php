<?php

namespace app\widgets\ScheduleInputWidget\assets;

use yii\web\AssetBundle;

class ScheduleInputAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/ScheduleInputWidget/assets';
    public $css = [
        'css/schedule-input1.css',
    ];
    public $js = [
        'js/schedule-input.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];  
}