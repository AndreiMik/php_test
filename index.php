<?php
require "system/Routing.php";
$url = $_SERVER['REQUEST_URI'];

$r = new Router();
$r->addRoute("/", "main.php");
$r->addRoute("/about", "pages/about.php");;
$r->route($url);
