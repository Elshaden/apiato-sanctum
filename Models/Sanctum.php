<?php

namespace App\Containers\Vendor\Sanctum\Models;

use Laravel\Sanctum\PersonalAccessToken;

class Sanctum extends PersonalAccessToken
{
    protected $table='sanctum_personal_access_tokens' ;



    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Sanctum';
}
