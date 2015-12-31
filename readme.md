# Device-Authentication Handling Package for Laravel

This adds device authentication handling capability on a laravel backend.

## How to Install

Add the private repository in your `composer.json` file, and run `composer update`

```
	"repositories": [
        {
            "type":"git",
            "url":"https://github.com/Wickramanayaka/DeviceAuthentication.git"
        }
    ]
```
Add the repository to the required list on composer.json
`composer require chamal/deviceauthentication`

In `config\app.php`, add the service provider and the Facade.
Add to the list of providers:
`Chamal\DeviceAuthentication\DeviceAuthenticationServiceProvider::class`

Add to the list of aliases:
`'DeviceAuthentication' => Chamal\DeviceAuthentication\Facades\DeviceAuthentication::class,`

### Migrations

Currently the tokens are stored in the database, you will need to run the migrations

`php artisan migrate --path=vendor/chamal/deviceauthentication/src/migrations`


## How to Run

After installation, you can get, set, validate and discard the token at any point of the application.

```
	Authentication::getToken($device_id);
    Authentication::setToken($device_id);
    Authentication::validateToken($token);
    Authentication::discardToken($device_id,$token=0);
```

Use device authentication to validate token as a middle-ware, add below line to kernel.php

`\Chamal\DeviceAuthentication\Middleware\DeviceAuth::class,`