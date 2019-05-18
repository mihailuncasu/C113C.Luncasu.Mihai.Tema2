<?php 

// M: Define DB Params
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "Mihai1234!@#$");
define("DB_NAME", "fishing_store");

// M: Define the domain for further usage with ngrok;
define("DOMAIN", "http://localhost/");

// M: Define URL;
define("ROOT_PATH", "SiteArticolePescuit/");
define("ROOT_URL", DOMAIN . ROOT_PATH);
define("ASSETS_URL", ROOT_URL . 'assets/');

// M: Define the paths to the models, controllers and views folders;
define("RESOURCES_BACKEND", $_SERVER['DOCUMENT_ROOT'] . '/' . ROOT_PATH . 'app/');
define("WEB_RESOURCES", $_SERVER['DOCUMENT_ROOT'] . '/' . ROOT_PATH);

define("__PATH_MODELS__", RESOURCES_BACKEND . 'models/');
define("__PATH_CONTROLLERS__", RESOURCES_BACKEND . 'controllers/');
define("__PATH_VIEWS__", WEB_RESOURCES . 'views/');
define("SIDE_BAR", __PATH_VIEWS__ . "sideNavBar.php");
define("PRODUCTS_IMAGES", ASSETS_URL."images/products/");
define("LOGO_IMAGES", ASSETS_URL."images/logo/");


// M: Define variables that are being used multiple times in order to manage them more easy;
define ("webPageTitle", "Pescaru'");
