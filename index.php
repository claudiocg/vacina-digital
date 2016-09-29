<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require "vendor/autoload.php";

$app = new Framework\Application;

return $app;