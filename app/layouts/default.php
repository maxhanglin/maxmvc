<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MaxMVC</title>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
	<script type="text/javascript" src="../public/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?=$GLOBALS['config']['appName']?></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<li <?if(Router::getCurrentController() == "home") echo "class=\"active\""?>><a href="/">Home</a></li>
					<li <?if(Router::getCurrentController() == "movies") echo "class=\"active\""?>><a href="/movies">Movies</a></li>
					<li <?if(Router::getCurrentController() == "about") echo "class=\"active\""?>><a href="/about">About</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">

		<div class="starter-template">
			<?=View::getContent()?>
		</div>

	</div><!-- /.container -->
</body>
</html>