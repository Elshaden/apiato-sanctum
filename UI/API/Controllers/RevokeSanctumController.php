<?php

namespace App\Containers\Vendor\Sanctum\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\Vendor\Sanctum\Actions\DeleteSanctumAction;
use App\Containers\Vendor\Sanctum\Actions\UpdateSanctumAction;
use App\Containers\Vendor\Sanctum\UI\API\Requests\DeleteSanctumRequest;
use App\Containers\Vendor\Sanctum\UI\API\Requests\UpdateSanctumRequest;
use App\Containers\Vendor\Sanctum\UI\API\Transformers\SanctumUserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class RevokeSanctumController extends ApiController
{
    /**
     * @param UpdateSanctumRequest $request
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateSanctum(DeleteSanctumRequest $request)
    {
        $sanctum = app(DeleteSanctumAction::class)->run($request);

        return $this->noContent();
    }


}
