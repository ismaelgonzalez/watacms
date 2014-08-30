<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		WataCMS:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->meta('icon');

	//echo $this->Html->css('cake.generic');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
	<nav>Show navbar here</nav>
	<aside>
		sidebar?
	</aside>
	<section>
		main content
	</section>
	<article>
		<header>
			<h1>All About Flour<h1>
					<p class="byline">by Jane Doe</p>
		</header>
		<section>
			<h2>The Two Types of Wheat</h2>
			<p>There … to rise.</p>
			<p>Where … with less protein.</p>
		</section>
		<aside>
			If you use organic flour you very often get better bread
		</aside>
	</article>
	<footer>
		footer
	</footer>
</div>
</body>
</html>
