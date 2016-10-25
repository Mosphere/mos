<?php 

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', __DIR__ . DS);
define('ASSETS','/mos/statics/');
require 'sys/start.php';
core\App::run();