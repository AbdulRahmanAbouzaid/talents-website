<?php 

$router->get('', 'PagesController@home');
$router->get('home', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->get('login', 'AuthController@showLoginForm');
$router->get('register', 'AuthController@showRegisterForm');
$router->post('login', 'AuthController@login');
$router->post('register', 'AuthController@register');
$router->get('logout', 'AuthController@logout');

$router->get('profile', 'UsersController@index');

$router->post('add-material', 'TalentedController@addMaterial');

