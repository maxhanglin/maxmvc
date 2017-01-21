<?php

class movies {
	
	function index() {
		$movies = Movie::getMovies();
		View::render("movies/index", ["movies" => $movies]);
	}

	function add() {

		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			View::render("movies/new");
		} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $_POST;
			$movie = new Movie();
			$movie->title = $data["title"];
			$movie->synopsis = $data["synopsis"];
			$movie->director = $data["director"];
			$movie->stars = $data["stars"];

			if ($movie->save()) {
				Router::redirect("/movies");
			}
		}
	}
}