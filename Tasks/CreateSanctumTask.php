<?php

namespace App\Containers\Vendor\Sanctum\Tasks;

use App\Containers\Vendor\Sanctum\Data\Repositories\SanctumRepository;
use App\Containers\Vendor\Sanctum\Models\Sanctum;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateSanctumTask extends ParentTask
{
    public function __construct(
        protected SanctumRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Sanctum
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
