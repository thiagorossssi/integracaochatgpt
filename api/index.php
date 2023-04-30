<?php
use \Core\Core;
use \Core\Model;

session_start();
require 'config.php';
require 'vendor/autoload.php';
new Model();

$core = new Core();
$core->run();
