<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username = $this->ask('Username?');
        $email = $this->ask('Email?');
        $password = $this->secret('Password?');

        $validator = Validator::make([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ], [
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/u'],
        ]);

        if ($validator->fails()) {
            $this->info('User not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        User::create([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('User successfully created!');

        return 0;
    }
}
