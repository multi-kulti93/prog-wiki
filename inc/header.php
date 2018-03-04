<?php require_once "inc/bootstrap.php"; ?>

<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
	<!-- Reset -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- Boostrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<!-- Prism -->
	<link rel="stylesheet" type="text/css" href="css/prism.css">
	<!-- Font Awesome -->
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Set Tab Icon -->
	<link rel="icon" href="img/logo_tab.png">
	
	<title>
		<?php echo (empty($page_title)) ? "prog-wiki" : "porg-wiki: " . escape($page_title); ?>
	</title>
</head>

<body>