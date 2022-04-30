<?php

namespace App\Containers\Vendor\Sanctum\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SanctumRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
