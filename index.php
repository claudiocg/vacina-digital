<?php

session_start();

require "vendor/autoload.php";

$app = new Framework\Application;

$app->run();

return $app;