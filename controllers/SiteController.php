<?php

namespace app\controllers;

use app\models\SignupForm as Signup;
use app\models\Workers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm as Login;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }

    public function actionSignup()
    {
        $model = new Signup();
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signup()) {
                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            if(Yii::$app->user->can('adminAccess'))
            {
                return $this->redirect('/admin/machines/');
            }
            else return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
}
