<?php
define('APP_DEBUG','TRUE');
define('CSS_URL','/shop/Public/css/');
define('IMG_URL','/shop/Public/images/');
define('JS_URL','/shop/Public/js/');

define('ADMIN_CSS_URL','/shop/Admin/Public/css/');
define('ADMIN_IMG_URL','/shop/Admin/Public/images/');
define('ADMIN_JS_URL','/shop/Admin/Public/js/');
define('SITE_URL','http://localhost/shop');
function show_bugs($info){
    echo '<pre style="color: red">';
    var_dump($info);
    echo '</pre>';
}
require '../ThinkPHP/ThinkPHP.php';