<?php

/* test routes */
$router->map('GET', '/testdb', 'Acme\controllers\PageController@getTestDB', 'testdb');
// prueba de slugify
// $router->map('GET', '/slug', function(){
//     $slug = new Cocur\Slugify\Slugify();
//     echo $slug->slugify('About Acme');
// });

// $router->map('GET', '/test', function(){
//     $user = Acme\models\User::find(1);
//     $testimonials = $user->testimonials()->get();
//     echo $user->first_name;
//     echo "<br>";
//     print_r($testimonials);
// });

/* register routes */
$router->map('GET', '/registerform', 'Acme\controllers\RegisterController@registerform', 'registerform');
$router->map('POST', '/register', 'Acme\controllers\RegisterController@register', 'register');

/* login/logout routes */
$router->map('GET', '/login', 'Acme\Controllers\AuthenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\Controllers\AuthenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\Controllers\AuthenticationController@getLogout', 'logout');
$router->map('GET', '/testuser', 'Acme\Controllers\AuthenticationController@getTestUser', 'testuser');
// $router->map('GET', '/login', 'Acme\controllers\RegisterController@getShowLoginPage', 'login');

/* page routes */
$router->map('GET', '/', 'Acme\controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/home', 'Acme\controllers\PageController@getShowHomePage', 'home2');
$router->map('GET', '/page-not-found', 'Acme\controllers\PageController@getShow404', '404');
// $router->map('GET', '/page-not-found',
//     function() {
//         die("page not found :D");
//     }
// );
$router->map('GET', '/[*]', 'Acme\controllers\PageController@getShowPage', 'generic_page');