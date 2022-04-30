<?php

/**
 * @apiGroup           Sanctum
 * @apiName            CreateSanctumUser
 *
 * @api                {POST} /v1/sanctum/user Create User With Sanctum Token
 * @apiDescription     Creates a User and Issue a new Sanctum Token
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiBody           {String} email
 * @apiBody           {String} password min: 8
 *
 * at least one character of the following:
 *
 * upper case letter
 *
 * lower case letter
 *
 * number
 *
 * special character
 *
 * @apiParam           {String} [name] min:2|max:50
 * @apiParam           {String="male","female","unspecified"} [gender]
 * @apiParam           {Date} [birth] format: Y-m-d / e.g. 2015-10-15
 * @apiParam           {String} [verification_url] requireIf:email_verification_required|url|in:allowed-verify-email-urls
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\Vendor\Sanctum\UI\API\Controllers\CreateSanctumUserController;
use Illuminate\Support\Facades\Route;

Route::post('sanctum/user', [CreateSanctumUserController::class, 'createSanctumUser']);
   // ->middleware(['auth:sanctum']);

