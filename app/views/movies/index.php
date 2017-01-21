<div class="row">
	<div class="col-md-8"><h1>My 10 Favorite Movies</h1></div>
	<div class="col-md-4">
		<p class="text-right" style="margin-top: 25px;">
			<a href="/movies/add" class="btn btn-primary" role="button">Add New</a>
		</p>
	</div>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th style="width: 17%;">Title</th>
			<th style="width: 35%;">Synopsis</th>
			<th style="width: 15%;">Director</th>
			<th style="width: 20%;">Starring</th>
			<th style="min-width: 150px; width: 13%;">Actions</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($movies as $movie): ?>
		<tr>
			<th scope="row"><?=$movie->id?></th>
			<td><?=$movie->title?></td>
			<td class="text-justify"><?=$movie->synopsis?></td>
			<td><?=$movie->director?></td>
			<td><?=$movie->stars?></td>
			<td>
				<a href="/movies/view/<?=$movie->id?>" class="btn btn-primary btn-xs" role="button">View</a>
				<a href="/movies/edit/<?=$movie->id?>" class="btn btn-primary btn-xs" role="button">Edit</a>
				<a href="/movies/delete/<?=$movie->id?>" class="btn btn-danger btn-xs" role="button">Delete</a>
			</td>
		</tr>
		<? endforeach; ?>
	</tbody>
</table>