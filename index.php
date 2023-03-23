<?php

require 'config.php';
require 'Core/App.php';

$app = new MVC\Core\App();

require $app->Controller();

error_reporting(E_ALL & ~E_NOTICE); // ALL EXCEPT NOTICES
ini_set("log_errors", 1); // SAVE ERROR TO LOG FILE
ini_set("error_log", __DIR__ . DIRECTORY_SEPARATOR . "error.log");
// (C) DISPLAY ERROR MESSAGES
ini_set("display_errors", 1);