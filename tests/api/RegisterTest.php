<?php


namespace unit\api;


class RegisterTest extends AbstractApiTest
{
    private string $login = 'registerTest';
    private string $loginToShort = 'a';

    /**
     * Check a successful user creation
     */
    public function testCreateUser()
    {
        $registerData = [
            'login' => $this->login,
            'password' => 'abcdef23',
            'password2' => 'abcdef23'
        ];

        $this->post('/register', $registerData)
            ->getBody($response);

        $this->assertArrayHasKey('bearer_token', $response);
        $this->assertEquals($this->login, $response['username']);
    }

    /**
     * Check if two password's are identical
     */
    public function testErrorDifferentPassword()
    {
        $registerData = [
            'login' => $this->login,
            'password' => 'abcdef',
            'password2' => 'abcdef23'
        ];

        $this->post('/register', $registerData)
            ->assertApiError(400, 'REG-001');
    }

    /**
     * Check if password are strong enough (at least 5 characters)
     */
    public function testErrorStrengthPassword()
    {
        $registerData = [
            'login' => $this->login,
            'password' => $this->loginToShort,
            'password2' => $this->loginToShort
        ];

        $this->post('/register', $registerData)
            ->assertApiError(400, 'REG-002');
        ;
    }

    /**
     * Check if login are not already used by a another user.
     */
    public function testErrorLoginAlreadyUsed()
    {
        $registerData = [
            'login' => 'ruben',
            'password' => 'abcdef23',
            'password2' => 'abcdef23'
        ];

        $this->post('/register', $registerData)
            ->assertApiError(400, 'REG-005');
        ;
    }
}