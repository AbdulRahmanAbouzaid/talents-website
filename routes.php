<?php 

$router->get('', 'PagesController@home');
$router->get('home', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('chat', 'PagesController@chat');

$router->get('login', 'AuthController@showLoginForm');
$router->get('register', 'AuthController@showRegisterForm');
$router->post('login', 'AuthController@login');
$router->post('register', 'AuthController@register');
$router->get('logout', 'AuthController@logout');

$router->get('profile', 'UsersController@index');
$router->get('user/update-profile', 'UsersController@showUpdateForm');
$router->post('user/update-profile', 'UsersController@updateProfile');
$router->get('user/delete', 'UsersController@deleteAccount');
$router->post('talented/update-profile', 'TalentedController@updateProfile');
$router->post('organization/update-profile', 'OrganizationsController@updateProfile');


$router->post('add-event', 'OrganizationsController@addEvent');
$router->get('event/delete', 'EventController@delete');
$router->post('event/update', 'EventController@update');


$router->get('talented', 'TalentedController@getTalentedOf');
$router->get('organizations', 'OrganizationsController@getEventsOf');

$router->post('change-picture', 'UsersController@changeProfileImage');

$router->post('add-material', 'TalentedController@addMaterial');
$router->post('material/like', 'MaterialController@like');
$router->get('material/unlike', 'MaterialController@unlike');
$router->post('material/add-comment', 'MaterialController@addComment');
$router->get('material/delete-comment', 'MaterialController@deleteComment');
$router->get('material/delete', 'MaterialController@deleteMaterial');
$router->post('material/update', 'MaterialController@updateMaterial');


// admin panel routes
$router->get('admin/login', 'AdminController@viewLogin');
$router->post('admin/login', 'AdminController@login');
$router->get('admin/logout', 'AdminController@logout');
$router->get('admin/home', 'AdminController@viewAllUsers');
$router->get('admin/users', 'AdminController@viewAllUsers');
$router->post('admin/users/create', 'AdminController@createUser');
$router->post('admin/users/update', 'AdminController@updateUser');
$router->get('admin/users/delete', 'AdminController@deleteUser');
$router->get('admin/users/talented', 'AdminController@viewTalented');
$router->get('admin/users/organizations', 'AdminController@viewOrganizations');
$router->get('admin/users/visitors', 'AdminController@viewVisitors');
$router->get('admin/users/admins', 'AdminController@viewAdmins');
$router->get('admin/materials', 'AdminController@viewMaterials');
$router->get('admin/materials/delete', 'AdminController@deleteMaterial');
$router->get('admin/materials/comments', 'AdminController@viewMaterialComments');
$router->get('admin/comments/delete', 'AdminController@deleteComment');
$router->get('admin/events', 'AdminController@viewEvents');
$router->get('admin/events/delete', 'AdminController@deleteEvent');
$router->get('admin/talents', 'AdminController@viewTalents');
$router->post('admin/talents/update', 'AdminController@updateTalent');
$router->get('admin/talents/delete', 'AdminController@deleteTalent');
$router->post('admin/talents/create', 'AdminController@createTalent');
$router->get('admin/notifications', 'AdminController@viewNotificationForm');