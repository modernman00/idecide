<?php


use App\controller\Index as index;

$router = new AltoRouter;

$router->map('GET', '/about', 'App\controller\About@show', 'about us' );

$router->map('GET', '/', 'App\controller\Index@show', 'home');

$router->map('GET', '/decide', 'App\controller\Index@decide', 'decide');

$router->map('GET', '/decide2', 'App\controller\Index@main2', 'decide2');


$router->map('GET', '/main', 'App\controller\Index@main', 'homepage');

$router->map('POST', '/submit', 'App\controller\Score@show', 'Cal');

$router->map('GET', '/career', 'App\controller\Career@show', 'career page');

//var_dump($router);

// map homepage
// $router->map('GET', '/about', function () {
//     require __DIR__ . '/../resources/views/home.php';
// });
/* 
$match = $router->match();
var_dump($match);
//var_dump($match['target']);
echo "<br>";

print_r(explode('@', $match['target']));

if($match) {

    $index = new index;
    $index->homePage();

} else {
    header($_SERVER['SERVER_PROTOCOL'].'404 NOT FOUND');
    echo "PAGE NOT FOUND";
}
 */
