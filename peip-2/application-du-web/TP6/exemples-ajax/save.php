<?php

	$list = json_decode( $_POST[ "list" ] );
	$content = array();
	foreach ( $list as $obj ) {
		$content[] = $obj->gender . ":" . $obj->name . "\n";
	}
	file_put_contents("database/participants.txt", $content);
	file_put_contents("database/date.txt", $_POST[ "date" ]);

?>