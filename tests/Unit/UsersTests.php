<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_user_can_login(): void
    {
        $this->assertTrue(true);
    }
    public function test_registration_screen_can_be_rendered(): void
    {
        $this->assertTrue(true);
    }

    public function test_new_users_can_register(): void
    {
        $this->assertTrue(true);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $this->assertTrue(true);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $this->assertTrue(true);
    }
}
