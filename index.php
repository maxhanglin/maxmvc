<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/app/config/globals.php';
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/framework/autoload.php';
parse_str($_SERVER["QUERY_STRING"], $qsOutput);

// Start routing
if (!isset($qsOutput["url"])) {
	$qsOutput["url"] = "";
}
new Router($qsOutput["url"]);