<?php

$GLOBALS["config"] = array(

	/* General Information Section */
	"appName" => "My Top Movies",

	/* Common Paths Section */
	"path" => array(
		"app" => "app/",
		"core" => "framework/",
		"index" => "index.php"
	),

	/* Default Routes (Start Page) */
	"defaults" => array(
		"controller" => "home",
		"action" => "index"
	),

	/* Routes Definition Section */
	"routes" => array(
		array(
			"url" => "movies/new",
			"controller" => "movies",
			"action" => "add"
		),
		array(								// This route is not actually being used, but added
			"url" => "movies/modify/:id",	// to demonstrate how to add value parameters to the routed URL
			"controller" => "movies",
			"action" => "edit"
		)
	),

	/* Database Configuration Section */
	"database" => array(
		"host" => "localhost",
		"username" => "root",
		"password" => "root",
		"dbname" => "movies"
	)
);
