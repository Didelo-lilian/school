<?php
	$proverbes = file( "exemple-1.txt", FILE_IGNORE_NEW_LINES );
	echo $proverbes[ rand(0,count($proverbes) - 1) ];
?>
