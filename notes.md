## Env. Setup
- install php (XAMPP for Windows)
- install mysql (XAMPP for Windows)
- install composer


## Setting up Laravel
`{composer create-project --prefer-dist laravel/laravel app_name}`


## Start Server
`{php artisan serve}`


## Installing dependencies
`{composer install}`


## Controllers
app->Http->Controllers 
`{php artisan make:controller NameController}`


## Models
`{php artisan make:model Name}`
For model with migration:
`{php artisan make:model Name -m }`


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

`{Route::get('/clients/new', 'nameController@fuctionName')->name('new_client');}`
`{Route::post('/clients/new', 'nameController@functionName')->name('create_client');}`

### Passing Parameters to Controllers:
`{Route::get('/clients/{var1}/{var2}', 'ClientController@show')->name('show_client');}`
In controller simply collect variables in {}
`{public function show($var1, $var2)}`


## Views
In controller:
`{return view(controller_name/function_name)}`
In the folder:
resources->views->controller_name->function_name.blade.php

### Layouts
resources->views->layouts->app.blade.php
In layout file, where specific content will come:
`{@yield('section_name')}`
Also all the CSS and JS sheets will have URL enclosed in asset():
`{href="{{ asset('css/app.css') }}"}`
In the specific file:
`{@extends('layouts.app')}`
`{@section('section_name')}`
	`{ .... }`
`{@endsection}`

### Passing Data to view 
In cotroller:
`{$data = [];}`
`{$data['key'] = value;}`
`{return view('view_name', $data);}`
In View:
`{ {{$key}} }`


### Looping in blade
`{@foreach($vars as $var)}`
	`{ {{$var->value}} }`
	`{ href="{{ route('show', ['value2' => $var->value2] ) }} }`
`{@endforeach}`	


## Debugging
`{dd(message)}`


## CSRF token error in Form
VerifyCsrfToken.php => except [ * ]


## Form input
In controller:
`{function add( Request $request ){}`
`{	$data['name'] = $request->input('name');}`
`{}}`


## DB setup
In .env:
DB_HOST = localhost
DB_DATABASE = ...
DB_USERNAME = ...
DB_PASSWORD = ...

Fix laravel bug, in AppServiceProvider add:
`{use Illuminate\Support\Facades\Schema;}`
`{public function boot()}`
`{{}`
`{    Schema::defaultStringLength(191);}`
`{}}`


## DB migration
For DB table and column consistancy
`{ php artisan make:migration create_room_table --create=rooms }`

database->migrations->
In the up() method define columns:
`{ $table->integer(client_id)->unassigned; }`
`{ $table->foreign('client_id')->references('id')->on('client'); }`

run:
`{ php artisan migrate }`


## Eloquent 
`{php artisan tinker}`

## Relations
In Client model:
`{public function reservation(){}`
`{	return $this->hasMany('App\Reservations');}`
`{}}`
For getting reservations of client:
`{ $client->reservation()->get(); }`