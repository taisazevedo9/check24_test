<?php 
require './vendor/autoload.php';
use Core\ConfigController as Home;

$url = new Home();
$url->loadConfig();