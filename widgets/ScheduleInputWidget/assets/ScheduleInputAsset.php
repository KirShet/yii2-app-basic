<?php

namespace app\widgets\ScheduleInputWidget\assets;

use yii\web\AssetBundle;

class ScheduleInputAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';
    public $css = [
        'css/schedule-input.css',
    ];
    public $js = [
        'js/schedule-input.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];  
    public $publishOptions = ['forceCopy' => true];
}