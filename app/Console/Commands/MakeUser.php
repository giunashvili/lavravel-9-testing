<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUser extends Command
{
    protected $signature = 'make:user';

    protected $description = 'Create user for the application.';

    public function handle()
    {
        $name = $this->ask('Name of the user:');

        if(strlen($name) < 3)
        {
            $this->info('The user name needs to have at least 3 symbols!');
            return 0;
        }

        $email = $this->ask('Email of the user:');

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->info('Please provide correct email.');
            return 0;
        }

        if(User::whereEmail($email)->exists())
        {
            $this->info('This email has already taken!');
            return 0;
        }

        $password = $this->secret('Password of the user:');

       if(strlen($password) < 3)
       {
           $this->info('Password should be at least 3 symbols long.');
           return 0;
       }

        User::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]
        );

        $this->info('The user successfully created!');
    }
}
