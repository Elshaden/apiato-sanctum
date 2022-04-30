# [Apiato](https://github.com/apiato/apiato) [Sanctum](https://laravel.com/docs/9.x/sanctum)

### Implementation of Laravel Sanctum in Apiato.

#### This Container is used to make use of Laravel Sanctum Authentication

#### Note: This container is not fully tested, use with caution.

### Installation
Only Works in Existing Apiato Application   <br>
Read more about the Apiato container installer in the [docs](http://apiato.io/docs/miscellaneous/container-installer)!

<br>

### Note
#### using Sanctum will limit the use of existing Laravel Passport in Apiato, I have not tested it with both but  you should not use both at the same time.


<br>
<br>

#### Steps to Install

> You should have fully installed working Apiato including Passport.

> composer require elshaden/apiato-sanctum

> You need To Change the  ***use HasApiTokens***  in the ***App\Ship\Parents\Models\UserModel*** to ***use Sanctum Trait***
>
> ````
> use Laravel\Sanctum\HasApiTokens;

> php artisan migrate ***this will create the sanctum_personal_access_token*** table

> and you are ready to go

> Check sanctum config file in Configs Dir for any changes

> You can have a look at the routes to understand how to use the Sanctum in Apiato

> To use the Sanctum middleware you need to change the middleware in your routes to 
>````
>     ->middleware(['auth:sanctum'])

````



<br>

#### Use of Sanctum abilities has not been implemented yet. You can add abilities to Sanctum and use in Apiato. You will need to see the Sanctum [docs](https://laravel.com/docs/9.x/sanctum) for more info.

#### I personally prefer using the existing permissions' system in Apiato with Sanctum.

#### Sanctum will work with existing Permissions and Roles as you would expect with Passport.

## Thanks for using Apiato-Sanctum

#### I welcome any feedback, questions or suggestions.
