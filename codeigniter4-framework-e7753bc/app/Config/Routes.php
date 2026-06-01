<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(false);

// ===============================
// TRACKWISE APP ROUTES
// ===============================
$routes->group('trackwise', static function ($routes) {
    $routes->get('/', 'Trackwise\Welcome::index');

    $routes->group('auth', static function ($routes) {
        $routes->get('login', 'Trackwise\Auth::login');
        $routes->post('loginProcess', 'Trackwise\Auth::loginProcess');
        $routes->get('register', 'Trackwise\Auth::register');
        $routes->post('store', 'Trackwise\Auth::store');
        $routes->get('forgot-password', 'Trackwise\Auth::forgotPassword');
        $routes->post('resetLink', 'Trackwise\Auth::resetLink');
        $routes->get('logout', 'Trackwise\Auth::logout');
    });

    $routes->get('dashboard', 'Trackwise\Dashboard::index');
    $routes->get('studylog', 'Trackwise\StudyLog::index');
    $routes->post('studylog/save', 'Trackwise\StudyLog::save');
    $routes->get('uploads/(:segment)', 'Trackwise\Uploads::image/$1');
    $routes->get('techniques', 'Trackwise\Techniques::index');
    $routes->get('planner', 'Trackwise\Planner::index');
    $routes->post('planner/toggle/(:num)', 'Trackwise\Planner::toggle/$1');
    $routes->get('goals', 'Trackwise\Goals::index');
    $routes->get('goals/create', 'Trackwise\Goals::create');
    $routes->post('goals/store', 'Trackwise\Goals::store');
    $routes->get('notifications', 'Trackwise\Notifications::index');
    $routes->get('profile', 'Trackwise\Profile::index');
    $routes->get('analytics', 'Trackwise\Analytics::index');

    $routes->get('security', 'Trackwise\Security::index');
    $routes->post('security/xss-test', 'Trackwise\Security::xssTest');
    $routes->post('security/csrf-demo', 'Trackwise\Security::csrfDemo');
});

$routes->get('/', 'Trackwise\Welcome::index');

$routes->get('login', 'Trackwise\Auth::login');
$routes->get('register', 'Trackwise\Auth::register');
$routes->get('logout', 'Trackwise\Auth::logout');
