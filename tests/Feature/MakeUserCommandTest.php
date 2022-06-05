<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MakeUserCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_gets_successfully_created()
    {
        $this
            ->artisan('make:user')
            ->expectsQuestion('Name of the user:', 'Gela')
            ->expectsQuestion('Email of the user:', 'gela@redberry.ge')
            ->expectsQuestion('Password of the user:', 'password')
            ->expectsOutput('The user successfully created!');
    }

    public function test_user_needs_name_with_more_than_2_symbols()
    {
        $this
            ->artisan('make:user')
            ->expectsQuestion('Name of the user:', 'Le')
            ->expectsOutput('The user name needs to have at least 3 symbols!');
    }

    public function test_email_should_have_correct_structure()
    {

        $this
            ->artisan('make:user')
            ->expectsQuestion('Name of the user:', 'Gela')
            ->expectsQuestion('Email of the user:', 'gelaredberry.ge')
            ->expectsOutput('Please provide correct email.');
    }

    public function test_email_should_be_unique()
    {
        User::factory()->create(['email' => 'gela@redberry.ge']);

        $this
            ->artisan('make:user')
            ->expectsQuestion('Name of the user:', 'Gela')
            ->expectsQuestion('Email of the user:', 'gela@redberry.ge')
            ->expectsOutput('This email has already taken!');
    }

    public function test_password_should_have_at_least_3_symbols()
    {
        $this
            ->artisan('make:user')
            ->expectsQuestion('Name of the user:', 'Gela')
            ->expectsQuestion('Email of the user:', 'gela@redberry.ge')
            ->expectsQuestion('Password of the user:', 'ps')
            ->expectsOutput('Password should be at least 3 symbols long.');
    }
}
