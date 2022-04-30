<?php

namespace App\Containers\Vendor\Sanctum\Actions;

use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Containers\Vendor\Sanctum\Tasks\DeleteSanctumTask;
use App\Containers\Vendor\Sanctum\UI\API\Requests\DeleteSanctumRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSanctumAction extends ParentAction
{
    /**
     * @param DeleteSanctumRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSanctumRequest $request): int
    {
        $data = $request->sanitizeInput([
            'user_id'
        ]);
        $user = app(FindUserByIdTask::class)->run($data['user_id']);
        return $user->tokens->first()->delete();
    }
}
