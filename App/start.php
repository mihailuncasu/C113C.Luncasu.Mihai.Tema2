<?php

// M: Including config file;
require 'config.php';

// M: Including the auxiliary classes;
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';
require 'classes/Mailer.php';

// M: Including the controllers;
require 'controllers/HomeController.php';
require 'controllers/UsersController.php';

// M: Including the models;
require 'models/MenuItemsModel.php';
require 'models/MainPageAdsModel.php';
require 'models/ProductsModel.php';
require 'models/UsersModel.php';

// M: Including PHPMailer class in order to send mails;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// M: Start the session for the login, shopping cart and more further usage;
// M: TODO: Don't forget to destroy the session vars when a user will sign out;
session_start();

// M: Initialize mailer class configuration;
Mailer::initialize();

// M: Still bugged;
require __DIR__ . '/../vendor/autoload.php';