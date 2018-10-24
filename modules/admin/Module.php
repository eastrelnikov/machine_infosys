<?php

namespace app\modules\admin;

use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout;
    /**
     * @inheritdoc
     */
    public function init()
    {
        if(Yii::$app->user->can('adminAccess'))
        {
            $this->layout = '@app/views/layouts/admin';
        }
        parent::init();

        // custom initialization code goes here
    }
}
