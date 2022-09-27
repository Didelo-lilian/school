<?php

	include("util.php");
	
	$langue = $_SESSION[ "lang" ];
	$content = get_content($langue,"index");
	
?>
<!DOCTYPE html>
<html lang="<?php echo $langue; ?>">
	<head>
		<meta charset="utf-8">
		<title><?php echo $content[ "title" ]; ?></title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/tp3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>TP 3 - Exo 5</h1>
		<hr>

		<div id="menu">
			<a href="index.php?lang=fr">fr</a>
			<a href="index.php?lang=en">en</a>
			<a href="index.php?lang=it">it</a>
		</div>
		<h2><?php echo $content[ "heading" ]; ?></h2>
		<p>
			<?php echo $content[ "paragraph" ]; ?>
		</p>
		<div id="link">
			<?php echo $content[ "linktext" ]; ?>
			<div>
				<a href="index.php"><?php echo $content[ "linkhome" ]; ?></a>
				<a href="products.php"><?php echo $content[ "linkproducts" ]; ?></a>
				<a href="contact.php"><?php echo $content[ "linkcontact" ]; ?></a>
			</div>
		</div>
		</div>
	</body>
</html>
