<?php

namespace App\Containers\Vendor\Sanctum\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\Vendor\Sanctum\Actions\UpdateSanctumAction;
use App\Containers\Vendor\Sanctum\UI\API\Requests\UpdateSanctumRequest;
use App\Containers\Vendor\Sanctum\UI\API\Transformers\SanctumUserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateSanctumController extends ApiController
{
    /**
     * @param UpdateSanctumRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateSanctum(UpdateSanctumRequest $request): array
    {
        $sanctum = app(UpdateSanctumAction::class)->run($request);

        return $this->transform($sanctum, SanctumUserTransformer::class);
    }


}
