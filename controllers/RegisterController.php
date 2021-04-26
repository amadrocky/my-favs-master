<?php


namespace app\controllers;


use app\models\User;

/**
 * Class RegisterController
 * @package app\controllers
 */
class RegisterController extends WSController
{
    /**
     * POST /register
     * create user
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $login = \Yii::$app->request->post('login');
        $password = \Yii::$app->request->post('password');
        $password2 = \Yii::$app->request->post('password2');

        if ($password !== $password2) {
            return $this->sendError('REG-001', "Password are different.");
        }

        if (empty($password)) {
            return $this->sendError('REG-002', "Invalid password.");
        }

        $user = new User();
        $user->status = 10;
        $user->username = $login;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->generateAccessToken();
        $user->save();

        return $this->response->data = [
            'username' => $user->username,
            'bearer_token' => $user->access_token,
        ];
    }
}