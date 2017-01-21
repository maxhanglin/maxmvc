<?php

$GLOBALS["config"] = array(
	"appName" => "My Top Movies",
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
		"username" => "root",
		"password" => "root",
		"dbname" => "movies"
	)
);
