<?php

	$fichier = $_POST[ "def" ] . ".htm";
	$definition = fopen("definitions/$fichier","r");
	fpassthru($definition);

?>