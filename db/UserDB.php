<?php

namespace app\db;

use app\models\User;

/**
 * Class UserDB
 * @package app\db
 */
class UserDB
{
    /**
     * Retrieve user by id
     *
     * @param $id
     * @return User|false
     */
    public static function getActiveUserById($id)
    {
        $params = [':id' => $id, ':status' => 10];
        try {
            $userData = \Yii::$app->db->createCommand('SELECT * FROM users WHERE id=:id AND status=:status')
                ->bindValues($params)
                ->queryOne();

            if ($userData) {
                return new User($userData);
            }
        } catch (\yii\db\Exception $e) {
            return null;
        }
    }

    /**
     * Retrieve user by username
     *
     * @param $username
     * @return User|false
     */
    public static function getActiveUserByUsername($username)
    {
        $params = [':username' => $username, ':status' => 10];
        try {
            $userData = \Yii::$app->db->createCommand('SELECT * FROM users WHERE username=:username AND status=:status')
                ->bindValues($params)
                ->queryOne();

            if ($userData) {
                return new User($userData);
            }
        } catch (\yii\db\Exception $e) {
            return null;
        }
    }

    /**
     * Retrieve user by access token
     *
     * @param $token
     * @return User|false
     */
    public static function getActiveUserByAccessToken($token)
    {
        $params = [':token' => $token, ':status' => 10];
        try {
            $userData = \Yii::$app->db->createCommand('SELECT * FROM users WHERE access_token=:token AND status=:status')
                ->bindValues($params)
                ->queryOne();

            if ($userData) {
                return new User($userData);
            }
        } catch (\yii\db\Exception $e) {
            return null;
        }
    }
}