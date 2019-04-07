<?php

// M: Define DB Params
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "Mihai1234!@#$");
define("DB_NAME", "fishing_store");

// M: Define URL;
define("ROOT_PATH", "SiteArticolePescuit/");
define("ROOT_URL", "http://localhost/".ROOT_PATH);
define("ASSETS_URL", ROOT_URL."/assets/");
define("SIDE_BAR", "views/sideNavBar.php");
define("PRODUCTS_IMAGES", ASSETS_URL."images/products/");
define("LOGO_IMAGES", ASSETS_URL."images/logo/");

// M: Define the paths to the models, controllers and views folders;
define("controllers", "controllers/");
define("models", "models/");
define("views", "views/");

// M: Define variables that are being used multiple times in order to manage them more easy;
define ("webPageTitle", "Pescaru'");
