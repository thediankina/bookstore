<?php

namespace app\models;

use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

class User implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return new self();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException(__METHOD__ . ' is not supported.');
    }

    public function getId()
    {
        return 1;
    }

    public function getAuthKey()
    {
        return 'auth_key';
    }

    public function validateAuthKey($authKey)
    {
        return $authKey === $this->getAuthKey();
    }
}
