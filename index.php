<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$GLOBALS["config"] = array(
	"addName" => "maxmvc website",
	"domain" => "maxmvc.dev",
	"path" => array(
		"app" => "app/",
		"core" => "framework/",
		"index" => "index.php"
	),
	"defaults" => array(
		"controller" => "home",
		"action" => "index"
	),
	"routes" => array(),
	"database" => array(
		"host" => "localhost",
		"username" => "",
		"password" => "",
		"dbname" => ""
	)
);

require_once $GLOBALS["config"]["path"]["core"]."autoload.php";
parse_str($_SERVER["QUERY_STRING"], $qsOutput);
new Router($qsOutput["url"]);