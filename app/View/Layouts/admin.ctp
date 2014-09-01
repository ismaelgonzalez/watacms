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

	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('sb-admin');

	echo $this->HTML->script('jquery-1.11.0');
	echo $this->HTML->script('bootstrap.min');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
	<link href="/css/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
	<!-- Navication -->
	<?php echo $this->element('admin_navbar'); ?>
	<!-- Navication -->

	<div id="page-wrapper" style="min-height: 765px;">
	<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<?php echo $pageHeader; ?> <small><?php echo $sectionTitle; ?></small>
			</h1>
		</div>
	</div>
	<!-- /.row -->

	<div class="row"> <!-- show alerts -->
		<div class="col-lg-12">
			<?php echo $this->Session->flash(); ?>
		</div>
	</div>
	<!-- /.row -->

	<?php
		echo $this->fetch('content');
	?>

	</div>
</div>
</body>
</html>
