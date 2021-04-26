<?php


namespace app\controllers;

use app\models\User;

/**
 * Class AuthController
 * @package app\controllers
 */
class AuthController extends WSController
{
    /**
     * PUT /login
     * logs in user
     *
     * @param $login string username
     * @param $password string password
     *
     * @return void
     */
    public function actionLogin()
    {
        $login = \Yii::$app->request->post('login');
        $password = \Yii::$app->request->post('password');

        if (empty($login) || empty($password)) {
            return $this->sendError('AUTH-001', 'missing parameter');
        }

        $user = User::findByUsername($login);

        if (!$user) {
            return $this->sendError('AUTH-002', "user $login not found");
        }

        if ($user->validatePassword($password)) {
            \Yii::$app->user->login($user);
            return $this->response->data = ["bearer_token" => $user->access_token];
        } else {
            return $this->sendError('AUTH-002', "user $login not found");
        }
    }

    /**
     * PUT /logout
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        $this->response->data = true;
    }
}