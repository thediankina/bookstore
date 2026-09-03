<?php

namespace app\tests\unit;

use PHPUnit\Framework\TestCase;
use app\models\User;

class UserTest extends TestCase
{
    public function testValidateAuthKey(): void
    {
        $user = new User();

        $success = $user->validateAuthKey('auth_key');

        $this->assertTrue($success);
    }
}
