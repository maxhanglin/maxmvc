<?php

class Load {
	
	static function view($view, $vars = array()) {

		// Create variables from the vars array
		foreach ($vars as $key => $value) {
			$$key = $value;
		}

		// Check filename extension
		$extensionCheck = explode(".", $view);
		if (!isset($extensionCheck[1])) {
			$view .= ".php";
		}

		require_once $GLOBALS["config"]["path"]["app"]."views/{$view}";
	}
}