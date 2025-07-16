<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// -------------------
// Public Voting Routes
// -------------------
$routes->get('/',                     'Vote::index', ['filter' => 'auth']);
$routes->post('vote/(:num)',         'Vote::cast/$1', ['filter' => 'auth']);
$routes->get('vote/result/(:num)',   'Vote::result/$1', ['filter' => 'auth']);

// -------------------
// Authentication Routes
// -------------------
$routes->get('login',                'Auth::login');
$routes->post('login',               'Auth::login');
$routes->get('logout',               'Auth::logout', ['filter' => 'auth']);

// -------------------
// Admin Grouped Routes
// -------------------
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth:admin'], function ($routes) {

    // --- Elections Management ---
    $routes->get('elections',                     'Election::index');
    $routes->match(['get', 'post'], 'elections/create',      'Election::create');
    $routes->get('elections/edit/(:num)',         'Election::edit/$1');
    $routes->post('elections/update/(:num)',      'Election::update/$1');
    $routes->get('elections/delete/(:num)',       'Election::delete/$1');

    // --- Candidates Management ---
    $routes->get('candidates/(:num)',                     'Candidate::index/$1'); // List candidates in election
    $routes->match(['get', 'post'], 'candidates/create/(:num)', 'Candidate::create/$1');
    $routes->get('candidates/edit/(:num)',                'Candidate::edit/$1');
    $routes->post('candidates/update/(:num)',             'Candidate::update/$1');
    $routes->get('candidates/delete/(:num)',              'Candidate::delete/$1');
});

// -------------------
// 404 Override
// -------------------
$routes->set404Override();
