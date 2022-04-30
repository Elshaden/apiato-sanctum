<?php

namespace App\Containers\Vendor\Sanctum\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Containers\Vendor\Sanctum\Models\Sanctum;
use App\Containers\Vendor\Sanctum\Notifications\ReIssueuserToken;
use App\Containers\Vendor\Sanctum\Notifications\SanctumUserWelcome;
use App\Containers\Vendor\Sanctum\Tasks\UpdateSanctumTask;
use App\Containers\Vendor\Sanctum\UI\API\Requests\UpdateSanctumRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateSanctumAction extends ParentAction
{
    /**
     * @param UpdateSanctumRequest $request
     * @return Sanctum
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSanctumRequest $request): User
    {
        $data = $request->sanitizeInput([
            'user_id'
        ]);
        $user = app(FindUserByIdTask::class)->run($data['user_id']);

        $User =DB::transaction(function () use ($user, $data) {
            if ($user->tokens->count()) {
                $user->tokens()->delete();
            }

            $token = $user->createToken(Str::slug(strtolower($user->name)));
            $token = explode('|', $token->plainTextToken);
            $user->token = $token[1];
            $user->token_id = $token[0];

            $user->notify(new ReIssueuserToken($token[1]));
            return $user;
        });


        return $User;
    }
}
