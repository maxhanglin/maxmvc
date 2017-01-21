<div class="row">
	<div class="col-md-8">
		<h1>Add New Movie</h1>
	</div>
	<div class="col-md-4">
		<p class="text-right" style="margin-top: 25px;">
			<a href="/movies" class="btn btn-primary" role="button">Back</a>
		</p>
	</div>
</div>

<form id="formNewMovie" action="/movies/add" method="POST">
  <div class="form-group">
    <label for="inputMovieTitle">Title</label>
    <input type="text" class="form-control" id="inputMovieTitle" name="title" placeholder="Title">
  </div>
  <div class="form-group">
  	<label for="inputMovieSynopsis">Synopsis</label>
  	<textarea class="form-control" id="inputMovieSynopsis" name="synopsis" placeholder="Synopsis" rows="6"></textarea>
  </div>
  <div class="form-group">
    <label for="inputMovieDirector">Director</label>
    <input type="text" class="form-control" id="inputMovieDirector" name="director" placeholder="Director">
  </div>
  <div class="form-group">
    <label for="inputMovieStars">Starring</label>
    <input type="text" class="form-control" id="inputMovieStars" name="stars" placeholder="Starring (Actors)">
  </div>
  <button type="submit" class="btn btn-success">Save</button>
</form>