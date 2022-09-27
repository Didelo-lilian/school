<?php
    $array = glob("puzzle/*");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>TP 2 - Exo 4</title>
		<meta name="author" content="Marc Gaetano">
		<link type="text/css" rel="stylesheet" href="../css/tp2.css" />
    <link type="text/css" rel="stylesheet" href="puzzle.css" />
  </head>

<body>
	<h1>TP 2 - Exo 4</h1>
	<hr>

	<h2>Choisissez votre puzzle !</h2>

<?php
	foreach ( $array as $puzzle ) {
?>
	<div class="small">
		<a href="puzzle.php?puzzle=<?= basename($puzzle) ?>">
			<img src="<?= "$puzzle/image.jpeg" ?>" alt="Image" />
		</a>
		<h3><?= file_get_contents("$puzzle/title.txt") ?></h3>
	</div>	
	
<?php } ?>

</body>
</html>
