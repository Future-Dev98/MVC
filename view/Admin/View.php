<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" >
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<title>Dashboard</title>
</head>
<body>
    <?php $app = new Core\App(); ?>
    <main id="site-main">
		<div id="adminmenumain">
			<ul id="adminmenu">
				<li>
					<a href="<?= ROOT_URL.'admin/posts' ?>">Posts</a>
				</li>
				<li>
					<a href="<?= ROOT_URL.'admin/categories' ?>">Categories</a>
				</li>
			</ul>
		</div>
		<div id="content">
			<?php require_once $app->View(); ?>
		</div>
	</main>
</body>
</html>