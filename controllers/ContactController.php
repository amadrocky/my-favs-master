<?php


namespace app\controllers;


use yii\filters\auth\HttpBearerAuth;

/**
 * Class ContactController
 * @package app\controllers
 */
class ContactController extends WSController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];
        return $behaviors;
    }

    public function actionAdd() {

    }
}