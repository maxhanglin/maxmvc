<div class="row">
	<div class="col-md-8">
		<h1>Edit Movie: <?=$movie->title?></h1>
	</div>
	<div class="col-md-4">
		<p class="text-right" style="margin-top: 25px;">
			<a href="/movies" class="btn btn-primary" role="button">Back</a>
		</p>
	</div>
</div>

<form id="formNewMovie" action="/movies/edit" method="POST">
  <input type="hidden" name="id" value="<?=$movie->id?>">
  <div class="form-group">
    <label for="inputMovieTitle">Title</label>
    <input type="text" class="form-control" id="inputMovieTitle" name="title" placeholder="Title" value="<?=$movie->title?>">
  </div>
  <div class="form-group">
  	<label for="inputMovieSynopsis">Synopsis</label>
  	<textarea class="form-control" id="inputMovieSynopsis" name="synopsis" placeholder="Synopsis" rows="6"><?=$movie->synopsis?></textarea>
  </div>
  <div class="form-group">
    <label for="inputMovieDirector">Director</label>
    <input type="text" class="form-control" id="inputMovieDirector" name="director" placeholder="Director" value="<?=$movie->director?>">
  </div>
  <div class="form-group">
    <label for="inputMovieStars">Starring</label>
    <input type="text" class="form-control" id="inputMovieStars" name="stars" placeholder="Starring (Actors)" value="<?=$movie->stars?>">
  </div>
  <button type="submit" class="btn btn-success">Save</button>
</form>