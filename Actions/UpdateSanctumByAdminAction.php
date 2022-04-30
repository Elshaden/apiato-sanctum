<?php

namespace App\Containers\Vendor\Sanctum\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Containers\Vendor\Sanctum\Models\Sanctum;
use App\Containers\Vendor\Sanctum\Notifications\ReIssueuserToken;
use App\Containers\Vendor\Sanctum\Notifications\SanctumUserWelcome;
use App\Containers\Vendor\Sanctum\Tasks\UpdateSanctumTask;
use App\Containers\Vendor\Sanctum\UI\API\Requests\UpdateSanctumByAdminRequest;
use App\Containers\Vendor\Sanctum\UI\API\Requests\UpdateSanctumRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateSanctumByAdminAction extends ParentAction
{
    /**
     * @param UpdateSanctumRequest $request
     * @return User
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSanctumByAdminRequest $request): User
    {
        $data = $request->sanitizeInput([
            'user_id'
        ]);
      $Request = new UpdateSanctumRequest($data);
      return app(UpdateSanctumAction::class)->run($Request);
    }
}
