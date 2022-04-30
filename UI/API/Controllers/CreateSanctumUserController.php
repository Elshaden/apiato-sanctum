<?php

namespace App\Containers\Vendor\Sanctum\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authentication\UI\API\Requests\RegisterUserRequest;
use App\Containers\Vendor\Sanctum\Actions\CreateSanctumUserAction;
use App\Containers\Vendor\Sanctum\UI\API\Requests\CreateSanctumUserRequest;
use App\Containers\Vendor\Sanctum\UI\API\Transformers\SanctumUserTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateSanctumUserController extends ApiController
{
    /**
     * @param CreateSanctumUserRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createSanctumUser(CreateSanctumUserRequest $request): JsonResponse
    {
        $sanctum = app(CreateSanctumUserAction::class)->run($request);

        return $this->created($this->transform($sanctum, SanctumUserTransformer::class));
    }
}
