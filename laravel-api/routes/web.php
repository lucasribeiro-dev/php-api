<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/**       
 * +----------------------------------+
 * |               USER               |
 * +----------------------------------+ 
 */

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('/', "UserController@getUser");
    $router->post('/', "UserController@insertUser");
    $router->put('/{id}', "UserController@updateUser");
    $router->delete('/{id}', "UserController@deleteUser");
});

/**       
 * +----------------------------------+
 * |            ADDRESS               |
 * +----------------------------------+ 
 */
$router->group(['prefix' => 'address'], function () use ($router) {
    $router->get('/', "AddressController@getAddresses");
    $router->get('/{id}', "AddressController@getAddressById");
});
/**       
 * +----------------------------------+
 * |              STATE               |
 * +----------------------------------+ 
 */
$router->group(['prefix' => 'state'], function () use ($router) {
    $router->get('/', "StateController@getStates");
    $router->get('/total-users', "StateController@getTotalUsersOfState");
    $router->get('/{id}', "StateController@getStateById");
});

/**       
 * +----------------------------------+
 * |               CITY               |
 * +----------------------------------+ 
 */
$router->group(['prefix' => 'city'], function () use ($router) {
    $router->get('/', "CityController@getCitys");
    $router->get('/total-users', "CityController@getTotalUsersOfCity");
    $router->get('/{id}', "CityController@getCityById");
});
