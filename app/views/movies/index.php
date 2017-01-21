<div class="row">
	<div class="col-md-8"><h1>My Favorite Movies</h1></div>
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
			<th style="width: 20%;">Title</th>
			<th style="width: 35%;">Synopsis</th>
			<th style="width: 15%;">Director</th>
			<th style="width: 20%;">Starring</th>
			<th class="text-right" style="min-width: 100px; width: 10%;">Actions</th>
		</tr>
	</thead>
	<tbody>
		<? $i = 0; ?>
		<? foreach ($movies as $movie): ?>
		<? $i++; ?>
		<tr>
			<th scope="row"><?=$i?></th>
			<td><?=$movie->title?></td>
			<td class="text-justify"><?=$movie->synopsis?></td>
			<td><?=$movie->director?></td>
			<td><?=$movie->stars?></td>
			<td class="text-right">
				<a href="/movies/edit/<?=$movie->id?>" class="btn btn-primary btn-xs" role="button">Edit</a>
				<a data-id="<?=$movie->id?>" data-title="<?=$movie->title?>" class="btn btn-danger btn-xs delete" role="button">Delete</a>
			</td>
		</tr>
		<? endforeach; ?>
	</tbody>
</table>

<script type="text/javascript">

	$('document').ready(function() {
		$('.delete').click(function() {
			confirmDelete($(this).data('id'), $(this).data('title'));
		});
	});
	
	function confirmDelete(movieID, movieTitle) {
		$.confirm({
			title: 'Are you sure?',
			content: 'Please confirm you want to delete ' + movieTitle,
			buttons: {
				confirm: function () {
					$.post("movies/delete/"+movieID, function(output) {
						$("#main-container").html(output);
					});
				},
				cancel: function () {}
			}
		});
	}

</script>