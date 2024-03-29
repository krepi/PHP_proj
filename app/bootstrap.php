<?php
//Load Cofig file
require_once 'config/config.php';

// Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';


//Autoloader for libraries files

spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
