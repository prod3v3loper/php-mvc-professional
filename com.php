<?php

define('DEBUG', true); // Activate debug
if (DEBUG) {
    // Overwrite ini settings debug
    ini_set('html_errors', 1);
    ini_set('error_reporting', -1); // E_ALL
    ini_set('display_errors', 1); // On
    error_reporting(-1); // Report all
}

session_start();

// Load core functions we need
foreach (glob('./core/func' . DIRECTORY_SEPARATOR . '*.php') as $core_func_file) {
    require_once $core_func_file;
}

// Load files we need
require_once './root.php';
require_once './settings.php';
require_once './autoload/src/Loader.php';

// Instance autoloader with project document root path
new Aautoloder\Loader(array(PROJECT_DOCUMENT_ROOT));

// Set db as global for use and updates
$GLOBALS['DBM_PDO_INST'] = core\classes\db\DBM::getInstance();

// After db for db inserts
new core\classes\error\ErrorPHP();