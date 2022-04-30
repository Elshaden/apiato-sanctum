<?php

/**
 * @apiGroup           Sanctum
 * @apiName            Issue Sanctum Token
 *
 * @api                {PATCH} /v1/sancta/:id Update Sanctum
 * @apiDescription     Issue New Token To Existing user or Reissue Token
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => ''] | Resource Owner
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} user_id user id
 *

 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\Vendor\Sanctum\UI\API\Controllers\UpdateSanctumController;
use Illuminate\Support\Facades\Route;

Route::patch('sanctum/reissue/{user_id}', [UpdateSanctumController::class, 'updateSanctum'])
 ->middleware(['auth:sanctum']);

