<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" >
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<title>MVC</title>
</head>
<body>
    <?php $app = new Core\App();
	      require_once SITE_URL . '/templates/header.php';
          echo '<main id="site-main">';
          require_once $app->View();
		  echo '</main>';
          require_once SITE_URL . '/templates/footer.php'; ?>
</body>
</html>