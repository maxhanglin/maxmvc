<?php

class movies {
	
	function index() {
		$movies = Movie::getMovies();
		View::render("movies/index", ["movies" => $movies]);
	}

	function add() {

		if (Router::isGET()) {
			View::render("movies/new");
		} else if (Router::isPOST()) {
			$movie = new Movie();
			$movie->title = $_POST["title"];
			$movie->synopsis = $_POST["synopsis"];
			$movie->director = $_POST["director"];
			$movie->stars = $_POST["stars"];

			if ($movie->save()) {
				Router::redirect("/movies");
			}
		}
	}

	function edit($id = null) {

		if (Router::isGET()) {
			if ($id != null) {
				$movie = new Movie();
				$movie->id = $id;
				$movie->get();
				View::render("movies/edit", ["movie" => $movie]);
			}
		} else if (Router::isPOST()) {
			$movie = new Movie();
			$movie->id = $_POST["id"];
			$movie->title = $_POST["title"];
			$movie->synopsis = $_POST["synopsis"];
			$movie->director = $_POST["director"];
			$movie->stars = $_POST["stars"];

			if ($movie->save()) {
				Router::redirect("/movies");
			}
		}
	}

	function delete($id = null) {
		if (Router::isPOST()) {
			if ($id != null) {
				if (Movie::delete($id)) {
					$movies = Movie::getMovies();
					View::renderNoLayout("movies/index", ["movies" => $movies]);
				}
			}
		}
	}
}