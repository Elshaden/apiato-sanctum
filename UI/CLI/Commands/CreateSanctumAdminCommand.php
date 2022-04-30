<?php

namespace App\Containers\Vendor\Sanctum\UI\CLI\Commands;

use App\Containers\AppSection\User\Actions\CreateAdminAction;
use App\Ship\Parents\Commands\ConsoleCommand as ParentConsoleCommand;

class CreateSanctumAdminCommand extends ParentConsoleCommand
{
    protected $signature = 'apiato:create:sanctum-admin';

    protected $description = 'Create a new User with the ADMIN role With Token';

    public function handle(): void
    {
        $username = $this->ask('Enter the username for this user');
        $email = $this->ask('Enter the email address of this user');
        $password = $this->secret('Enter the password for this user');
        $password_confirmation = $this->secret('Please confirm the password');

        if ($password !== $password_confirmation) {
            $this->error('Passwords do not match - exiting!');

            return;
        }

        $data = [
            'name' => $username,
            'email' => $email,
            'password' => $password,
        ];

    $user =     app(CreateAdminAction::class)->run($data);
        $token = $user->createToken($username,[] );
        $token= explode('|', $token->plainTextToken) ;
        //return ['token' => $token[1], 'token_id'=>$token[0]];
        $this->info('Admin ' . $email . ' was successfully created Token : ' . $token[1] . ' Token ID : ' . $token[0]);
    }
}
