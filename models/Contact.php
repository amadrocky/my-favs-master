<?php


namespace app\models;

use app\db\ContactDB;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Contact model
 *
 * @property integer $id
 * @property string $username
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Contact extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    /**
     * Table name in database
     *
     * return string
     */
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    /**
     * retrieve behaviors
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * retrieve rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * retrieve contact by id
     *
     * @param $id
     * @return Contact
     */
    public static function findIdentity($id)
    {
        return ContactDB::getActiveContactById($id);
    }

    /**
     * Finds contact by username
     *
     * @param string $username
     * @return Contact
     */
    public static function findByUsername($username)
    {
        return UserDB::getActiveContactByUsername($username);
    }

    /**
     * retrieve contact id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}