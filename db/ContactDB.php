<?php

namespace app\db;

use app\models\Contact;

/**
 * Class ContactDB
 * @package app\db
 */
class ContactDB
{
    /**
     * Retrieve contact by id
     *
     * @param $id
     * @return Contact|false
     */
    public static function getActiveContactById($id)
    {
        $params = [':id' => $id, ':status' => 10];
        try {
            $contactData = \Yii::$app->db->createCommand('SELECT * FROM contacts WHERE id=:id AND status=:status')
                ->bindValues($params)
                ->queryOne();

            if ($contactData) {
                return new Contact($contactData);
            }
        } catch (\yii\db\Exception $e) {
            return null;
        }
    }
}