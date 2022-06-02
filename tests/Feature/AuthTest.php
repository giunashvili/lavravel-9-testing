<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertSee('Laravel Testing');
        $response->assertViewIs('login');
    }

    public function test_auth_should_give_us_errors_if_input_is_not_provided()
    {
        $response = $this->post('/login');
        $response->assertSessionHasErrors(
            [
                'email',
                'password',
            ]
        );
    }

    public function test_auth_should_give_us_email_error_if_we_wont_provide_email_input()
    {
        $response = $this->post('/login', [
            'password' => 'my-so-secret-password',
        ]);

        $response->assertSessionHasErrors(
            [
                'email',
            ]
        );
        $response->assertSessionDoesntHaveErrors(['password']);
    }

   public function test_auth_should_give_us_password_error_if_we_wont_provide_password_input()
   {
       $response = $this->post('/login', [
           'email' => 'gela@redberry.ge',
       ]);

       $response->assertSessionHasErrors(
           [
               'password',
           ]
       );
       $response->assertSessionDoesntHaveErrors(['email']);
   }

    public function test_auth_should_give_us_email_error_when_email_field_is_not_correct()
    {
        $response = $this->post('/login', [
            'email' => 'gelaredberry.ge',
        ]);

        $response->assertSessionHasErrors(
            [
                'email',
            ]
        );
    }

    public function test_auth_should_give_us_incorrect_credentials_error_when_such_user_does_not_exists()
    {
        $response = $this->post('/login', [
            'email' => 'giuna@redberry.ge',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Please provide correct credentials.',
        ]);
    }

    public function test_auth_should_redirect_to_companies_page_after_successful_login()
    {
        $email = 'giuna@redberry.ge';
        $password = 'password';

        User::factory()->create(
            [
                'email' => $email,
                'password' => bcrypt($password),
            ]
        );

       $response = $this->post('/login', [
           'email' => $email,
           'password' => $password,
       ]);

       $response->assertRedirect('/company');
    }
}
