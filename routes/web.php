<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

$router->get('*', function () {
    return response()->json([
        'message' => 'not found'
    ], 404);
});
// SWAGGER REDIRECT ROUTE
$router->get('/', function () {
    return response()->json([
        'message' => 'not found'
    ], 404);
});

// AUTH ROUTES
$router->group([
    'prefix' => 'api/v1/auth',
], function ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');
    $router->post('/logout', 'AuthController@logout');
    $router->post('/register-confirm', 'AuthController@registerConfirm');
});


// NORMAL ROUTES(No Token Required)
$router->group([
    'prefix' => 'api/v1/',
], function ($router) {
    $router->get('/auth/refresh-token', 'AuthController@refreshToken');
});

// TOKEN REQUIRED ROUTES
$router->group([
    'prefix' => 'api/v1/',
    'middleware' => ['jwt', 'role'],
    ], function($router){
        $router->get('/reservations', 'ReservationController@list');
        $router->get('/reservations/{reservationId}', 'ReservationController@show');
        $router->post('/reservations', 'ReservationController@create');
        $router->put('/reservations/{reservationId}', 'ReservationController@update');
        $router->delete('/reservations/{reservationId}', 'ReservationController@delete');
    }
);


$router->get('/deneme', function() {
    echo 'deneme';
});
