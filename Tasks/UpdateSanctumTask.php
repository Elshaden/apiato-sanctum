<?php

namespace App\Containers\Vendor\Sanctum\Tasks;

use App\Containers\Vendor\Sanctum\Data\Repositories\SanctumRepository;
use App\Containers\Vendor\Sanctum\Models\Sanctum;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSanctumTask extends ParentTask
{
    public function __construct(
        protected SanctumRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Sanctum
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
