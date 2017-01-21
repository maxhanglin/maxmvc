<?php

class movies {
	
	function index() {
		$movies = Movie::getMovies();
		View::render("movies/index", ["movies" => $movies]);
	}
}