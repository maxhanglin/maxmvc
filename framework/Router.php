<?php

class Router {

	private $routes;

	function __construct($inputURL) {
		$this->routes = $GLOBALS["config"]["routes"];
		$route = $this->findRoute($inputURL);

		if (class_exists($route["controller"])) {
			$controller = new $route["controller"]();
			if (method_exists($controller, $route["action"])) {
				$controller->$route["action"]();
			} else {
				Error::show(404);
			}
		} else {
			Error::show(404);
		}
	}

	private function getRouteParts($route) {
		if (is_array($route)) {
			$route = $route["url"];
		}
		$parts = explode("/", $route);
		return $parts;
	}

	static function getUriPart($url, $part) {
		$parts = explode("/", $url);
		return (isset($parts[$part])) ? $parts[$part] : "";
	}

	private function findRoute($inputURL) {

		// loop through all the routes specified in the configuration
		foreach ($this->routes as $route) {

			// obtain the route "parts"
			$parts = $this->getRouteParts($route);
			$allMatch = true;

			// check if the input URL matches the route
			foreach ($parts as $index => $part) {
				if ($part != "*") {
					if (Router::getUriPart($inputURL, $index) != $part) {
						$allMatch = false;
					}
				}
			}
			if ($allMatch) {
				// if all the parts match, end the search and return the route
				return $route;
			}
		}

		// if we don't have a match between the defined routes
		// we either return the default controller-action pair
		// or the default action for the specified controller
		$uri_1 = Router::getUriPart($inputURL, 0);
		$uri_2 = Router::getUriPart($inputURL, 1);
		if ($uri_1 == "") {
			$uri_1 = $GLOBALS["config"]["defaults"]["controller"];
		}
		if ($uri_2 == "") {
			$uri_2 = $GLOBALS["config"]["defaults"]["action"];
		}
		$route = array(
			"controller" => $uri_1,
			"action" => $uri_2
		);
		return $route;
	}
}