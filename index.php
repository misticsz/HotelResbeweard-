<?php

$URL = $_SERVER['REQUEST_URI'];

/*
 * MAPPING
 */
 
define('FULL_URL', 'http://192.168.0.6/');
define('TWITCH','http://pt-br.twitch.tv/alexich');

define('APP_URL', 'app/');
define('CTR_URL', APP_URL.'controllers/');
define('DAO_URL', APP_URL.'DAO/');
define('MOD_URL', APP_URL.'Models/');
define('VIEW_URL', APP_URL.'View/');
 
define('SYS_URL', 'sys/');

define('WEB_URL', FULL_URL.'webcontent/');
define('CSS_URL', WEB_URL.'css/');
define('JS_URL', WEB_URL.'js/');
define('IMG_URL', WEB_URL.'img/');

define('APP_NAME', ':3 ');
define('APP_VERSION', ' 1.0');

/*
 * STARTING
 */

include_once SYS_URL."Controller.php";
include_once SYS_URL."DBConnection.php";
include_once SYS_URL."Class.php";


Controller::RedirectPage($URL);

?>