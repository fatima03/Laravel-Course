## Env. Setup

- install php (XAMPP for Windows)
- install mysql (XAMPP for Windows)
- install composer


## Setting up Laravel

`composer create-project --prefer-dist laravel/laravel app_name`


## Start Server

`php artisan serve`


## Installing dependencies

`composer install`


## Controllers

app->Http->Controllers <br>
`php artisan make:controller NameController`


## Models

`php artisan make:model Name`<br>
For model with migration:<br>
`php artisan make:model Name -m `


### List of data to be stored

1. Create model
2. Create Class in it with no extend
3. Create protected list of data
4. Create all() and get() methods


## Facades

in cofig files, aliases


## Routes

routes->web.php

1. Get - read only
2. Post - adding
3. Patch - updating
4. Delete - deleting

`Route::get('/clients/new', 'nameController@fuctionName')->name('new_client');`<br>
`Route::post('/clients/new', 'nameController@functionName')->name('create_client');`


### Passing Parameters to Controllers:

`Route::get('/clients/{var1}/{var2}', 'ClientController@show')->name('show_client');`<br>
In controller simply collect variables in {}<br>
`public function show($var1, $var2)`


## Views

In controller:<br>
`return view(controller_name/function_name)`<br>
In the folder:<br>
resources->views->controller_name->function_name.blade.php


### Layouts

resources->views->layouts->app.blade.php<br>
In layout file, where specific content will come:<br>
	`@yield('section_name')`<br>
Also all the CSS and JS sheets will have URL enclosed in asset():<br>
	`href="{{ asset('css/app.css') }}"`<br>
In the specific file:<br>
	`@extends('layouts.app')`<br>
	`@section('section_name')`<br>
		` .... `<br>
	`@endsection`


### Passing Data to view 

In cotroller:<br>
	`$data = [];`<br>
	`$data['key'] = value;`<br>
	`return view('view_name', $data);`<br>
In View:<br>
	` {{$key}} `


### Looping in blade

`@foreach($vars as $var)`<br>
	` {{$var->value}} `<br>
	` href="{{ route('show', ['value2' => $var->value2] ) }} `<br>
`@endforeach`	


## Debugging

`dd(message)`


## Form 

In controller:<br>
	`function add( Request $request ){`<br>
	`	$data['name'] = $request->input('name');`<br>
	`}`

### Check form Submit:

`if( $request->isMethod('post') )`

### Input validation:

<input type="file" name="image_upload">
<small class="error">{{$errors->first('image_upload')}}</small>


## DB setup

`mysql -u root -proot`<br>
`CREATE DATABASE db_name;`<br>
`CREATE USER 'virtual_shops'@'localhost' IDENTIFIED BY 'something';`<br>
`GRANT ALL ON virtual_shops.* TO 'virtual_shops'@'localhost';`<br>

In .env:<br>
	DB_HOST = localhost<br>
	DB_DATABASE = db_name<br>
	DB_USERNAME = user_name<br>
	DB_PASSWORD = password<br>

Fix laravel bug, in AppServiceProvider add:<br>
	`use Illuminate\Support\Facades\Schema;`<br>
	`public function boot()`<br>
	`{`<br>
	`    Schema::defaultStringLength(191);`<br>
	`}`


## DB migration

For DB table and column consistancy:<br>
` php artisan make:migration create_room_table --create=rooms `<br>

database->migrations-><br>

In the up() method define columns:<br>
` $table->integer(client_id)->unassigned; `<br>
` $table->foreign('client_id')->references('id')->on('client'); `<br>

run:<br>
` php artisan migrate `<br>

For reflecting changes in migration file:<br>
`php artisan migrate:refresh`


## Eloquent 

`php artisan tinker`


## Relations

In Client model:<br>
`public function reservation(){`<br>
`	return $this->hasMany('App\Reservations');`<br>
`}`<br>
8
For getting reservations of client:<br>
` $client->reservation()->get(); `


## Test Driven Development (TDD)

1. Write the test
2. Show the test works
3. Write code to pass the test

Function name must prefix "test"<br>
`./vendor/phpunit/phpunit/phpunit`

1. Unit Tests: tests->Unit->
2. Functional Tests: tests->Features->	


## Session

Put values in session: <br>
	`$request->session()->put('var_name', $client_data->name);`<br>
Get values from session: <br>
	`$var_name = $request->session()->has('var_name') ? $request->session()->pull('var_name') : 'none';`		


## CSRF token error in Form

Workaround: <br>
	`VerifyCsrfToken.php => except [ * ]`<br>
In all forms paste:<br>
	`{{ csrf_field() }}` or<br>
	`@csrf`


## Authentication

`php artisan make:auth` -> no <br>

Add the middleware in the web.php <br>
	`Route::middleware('auth')->group( function(){
		All routes...
	});`


## Export Files

Force download:<br>
`header(('Content-Disposition: attachement; filename=export.xls'));`


## Upload Files

In the view:<br>
	`<form method="post" enctype="multipart/form-data">`<br>
In the controller:<br>


## Seeders

`php artisan make:seeder UserTableSeeder`<br>
database->seeds <br>
Run seeders: <br>
	`php artisan migrate:refresh --seed`


## Socialite

Run: <br>
`composer require laravel/socialite`<br>

In cofig->app.php:<br>
	In Providers:<br>
		`Laravel\Socialite\SocialiteServiceProvider::class,`<br>
	In Alias:<br>
		`'Socialite' => Laravel\Socialite\Facades\Socialite::class,`<br>

In config->services.php: <br>
	`'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'),
    ],`<br>

In the .env file: <br>
	GOOGLE_CLIENT_ID=...<br>
	GOOGLE_CLIENT_SECRET=...<br>
	GOOGLE_REDIRECT=http://localhost:8000/login/google/callback<br>

