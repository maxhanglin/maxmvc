<?php

spl_autoload_register(function($class) {
	
	$corePath = $GLOBALS["config"]["path"]["core"];
	$appPath = $GLOBALS["config"]["path"]["app"];

	if (file_exists("{$corePath}/{$class}.php")) {
		require_once "{$corePath}/{$class}.php";
	} else if (file_exists("{$appPath}/controllers/{$class}.php")) {
		require_once "{$appPath}/controllers/{$class}.php";
	} else if (file_exists("{$appPath}/models/{$class}.php")) {
		require_once "{$appPath}/models/{$class}.php";
	}
	
});