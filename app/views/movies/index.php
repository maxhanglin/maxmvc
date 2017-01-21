<h1>My 10 Favorite Movies</h1>
<h3><span style="color: green">Work in progress.</span></h3>

<? foreach ($movies as $movie): ?>
	<ul>
		<li><?=$movie->title?></li>
	</ul>
<? endforeach; ?>