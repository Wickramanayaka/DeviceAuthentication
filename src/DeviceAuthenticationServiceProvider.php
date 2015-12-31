<?php


namespace Chamal\DeviceAuthentication;


use Illuminate\Support\ServiceProvider;

class DeviceAuthenticationServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('chamal.deviceauthentication.authentication', function () {
			return $this->app->make('Chamal\DeviceAuthentication\Auth\DeviceAuthentication');
		});
    }
}