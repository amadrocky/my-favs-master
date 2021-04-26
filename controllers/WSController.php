<?php

namespace app\controllers;

use yii\rest\Controller;

/**
 * Class WSController
 * @package app\controllers
 */
class WSController extends Controller
{
    /**
     * Send message error
     *
     * @param $code
     * @param $message
     * @return array[]
     */
    public function sendError($code, $message)
    {
        \Yii::$app->response->statusCode = 400;
        return $this->response->data = [
            'error' => [
                'id' => $code,
                'message' => $message
            ]
        ];
    }
}