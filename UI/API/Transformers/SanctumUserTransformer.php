<?php

namespace App\Containers\Vendor\Sanctum\UI\API\Transformers;

use App\Containers\AppSection\User\Models\User;
use App\Containers\Vendor\Sanctum\Models\Sanctum;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use Vinkla\Hashids\Facades\Hashids;

class SanctumUserTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(User $user): array
    {
        $response = [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'gender' => $user->gender,
            'birth' => $user->birth,

            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,

        ];
        if($user->token){
            $response['token'] = $user->token;
            $response['token_id'] = Hashids::encode($user->token_id);
        }

        return $this->ifAdmin([
            'real_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
            // 'deleted_at' => $user->deleted_at,
        ], $response);
    }
}
