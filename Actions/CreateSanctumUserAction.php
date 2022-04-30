<?php

namespace App\Containers\Vendor\Sanctum\Actions;

use App\Containers\AppSection\Authentication\Notifications\Welcome;
use App\Containers\AppSection\Authentication\Tasks\CreateUserByCredentialsTask;
use App\Containers\AppSection\Authentication\Tasks\SendVerificationEmailTask;
use App\Containers\AppSection\User\Models\User;

use App\Containers\Vendor\Sanctum\Notifications\SanctumUserWelcome;
use App\Containers\Vendor\Sanctum\UI\API\Requests\CreateSanctumUserRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Str;

class CreateSanctumUserAction extends ParentAction
{

    public function run(CreateSanctumUserRequest $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'email',
            'password',
            'name',
            'gender',
            'birth',

        ]);

        $user = app(CreateUserByCredentialsTask::class)->run($sanitizedData);
        $token = $user->createToken(Str::slug(strtolower($user->name)) );
        $token= explode('|', $token->plainTextToken) ;
        $user->token = $token[1];
        $user->token_id = $token[0];

        $user->notify(new SanctumUserWelcome($token[1]));


        app(SendVerificationEmailTask::class)->run($user, $request->verification_url);

        return $user;
    }

}
