<?php

/**
 * @apiGroup           Sanctum
 * @apiName            RevokeSanctumToken
 *
 * @api                {PATCH} /v1/sanctum/revoke/:user_id Revoke Sanctum Token
 * @apiDescription     Revokes a Sanctum Token
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => ''] | Resource Owner | Admin
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} user_id here...
 *
 */

use App\Containers\Vendor\Sanctum\UI\API\Controllers\UpdateSanctumController;
use Illuminate\Support\Facades\Route;

Route::delete('sanctum/revoke/{user_id}', [UpdateSanctumController::class, 'updateSanctum'])
 ->middleware(['auth:sanctum']);

