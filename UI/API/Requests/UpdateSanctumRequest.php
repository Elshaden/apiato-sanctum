<?php

namespace App\Containers\Vendor\Sanctum\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Support\Facades\Config;
use Vinkla\Hashids\Facades\Hashids;

class UpdateSanctumRequest extends ParentRequest
{

    public function IsUser(){
        $autoAccessRoles = Config::get('apiato.requests.allow-roles-to-access-all-routes');
        // there are some roles if defined  will automatically grant access
        if (!empty($autoAccessRoles)) {
            $hasAutoAccessByRole = $this->user()->hasAnyRole($autoAccessRoles);
            if ($hasAutoAccessByRole ) {
                return true;
            }
        }else{
            if($this->user()->hasAnyRole(['admin'])) return true;
        }
        // if not in parameters, take from the request object {$this}
        return $this->user()->id == $this->user_id;
    }
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'user_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'user_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
           'user_id' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess','IsUser'
        ]);
    }
}
