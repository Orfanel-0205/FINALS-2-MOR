<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',           'Vote::index', ['filter'=>'auth']);
$routes->post('vote/(:num)','Vote::cast/$1', ['filter'=>'auth']);
$routes->get('vote/result/(:num)','Vote::result/$1', ['filter'=>'auth']);

$routes->get('auth/login',  'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout', ['filter'=>'auth']);

$routes->group('admin', ['namespace'=>'App\Controllers\Admin','filter'=>'auth:admin'], function($r) {
    $r->get('elections',      'Election::index');
    $r->match(['get','post'],'elections/create','Election::create');
    // similarly candidates…
});

