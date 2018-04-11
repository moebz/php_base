<?php

// // register routes
// $router->map('GET', '/register', 'Acme\controllers\RegisterController@getShowRegisterPage', 'register');
// $router->map('POST', '/register', 'Acme\controllers\RegisterController@postShowRegisterPage', 'register_post');
// $router->map('GET', '/verify-account', 'Acme\controllers\RegisterController@getVerifyAccount', 'verify_account');

// // testimonial routes
// $router->map('GET', '/testimonials', 'Acme\controllers\TestimonialController@getShowTestimonials', 'testimonials');

// // logged in user routes
// if (Acme\auth\LoggedIn::user()) {
//     $router->map('GET', '/add-testimonial', 'Acme\controllers\TestimonialController@getShowAdd', 'add_testimonial');
//     $router->map('POST', '/add-testimonial', 'Acme\controllers\TestimonialController@postShowAdd', 'add_testimonial_post');
// }

// // login/logout routes
// $router->map('GET', '/login', 'Acme\controllers\AuthenticationController@getShowLoginPage', 'login');
// $router->map('POST', '/login', 'Acme\controllers\AuthenticationController@postShowLoginPage', 'login_post');
// $router->map('GET', '/logout', 'Acme\controllers\AuthenticationController@getLogout', 'logout');

// // admin routes
// if ((Acme\auth\LoggedIn::user()) && (Acme\auth\LoggedIn::user()->access_level == 2)) {
//     $router->map('POST', '/admin/page/edit', 'Acme\controllers\AdminController@postSavePage', 'save_page');
//     $router->map('GET', '/admin/page/add', 'Acme\controllers\AdminController@getAddPage', 'add_page');
// }

// // page routes
// $router->map('GET', '/', 'Acme\controllers\PageController@getShowHomePage', 'home');
// $router->map('GET', '/page-not-found', 'Acme\controllers\PageController@getShow404', '404');
// $router->map('GET', '/[*]', 'Acme\controllers\PageController@getShowPage', 'generic_page');

$router->map('GET', '/', 'Acme\controllers\PageController@getShowHomePage', 'home');

$router->map('GET', '/home', 'Acme\controllers\PageController@getShowHomePage', 'home2');

$router->map('GET', '/testdb', 'Acme\controllers\PageController@getTestDB', 'testdb');

$router->map('GET', '/registerform', 'Acme\controllers\RegisterController@registerform', 'registerform');

$router->map('GET', '/login', 'Acme\controllers\RegisterController@getShowLoginPage', 'login');

$router->map('POST', '/register', 'Acme\controllers\RegisterController@register', 'register');

// prueba de slugify
// $router->map('GET', '/slug', function(){
//     $slug = new Cocur\Slugify\Slugify();
//     echo $slug->slugify('About Acme');
// });

$router->map('GET', '/[*]', 'Acme\controllers\PageController@getShowPage', 'generic_page');

// $router->map('GET', '/test', function(){

//     $user = Acme\models\User::find(1);
//     $testimonials = $user->testimonials()->get();
    
//     echo $user->first_name;
//     echo "<br>";
//     print_r($testimonials);

// });