<?php


use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    public function test_that_user_can_login(): void
    {
        $response = $this->post('/login', [
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'birth_date' => '2001-02-22',
            'gender' => 'male',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
    }
    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'birth_date' => '2001-02-22',
            'gender' => 'male',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

}
