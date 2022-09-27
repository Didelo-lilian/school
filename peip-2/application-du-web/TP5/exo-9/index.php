<?php
$array1 = glob("images/animals/*.png");
$array2 = glob("images/animals/*.png");
$array = array_merge($array1, $array2);
shuffle($array);
?>
<!DOCTYPE html>
<html>

<head>
	<title>TP 2 - Exo 9</title>

	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="../css/tp2.css" />
	<link type="text/css" rel="stylesheet" href="memory.css" />
	<script type="text/javascript" src="memory.js"></script>
</head>

<body>
	<h1>TP 2 - Exo 9</h1>
	<hr>

	<div id="grid">
		<div>
			<?php
			for ($i = 0; $i < count($array); $i++) {
				if ($i > 0 && $i % 4 == 0) {
			?>
		</div>
		<div>
		<?php
				}
		?>
		<img src="images/question-mark.png" onclick="click_image(<?= $i ?>)" name="<?= $array[$i] ?>" />
	<?php
			}
	?>
		</div>
	</div>

	<div id="result"></div>

</body>

</html>