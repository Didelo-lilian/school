<?php

	$personnages = file("gallery.csv",FILE_IGNORE_NEW_LINES);

	function info( $id, $personnages )
	{
		$info = [];
		foreach ( $personnages as $personnage )
		{
			$personnage = explode(",",$personnage);
			if ( $personnage[0] === $id )
				break;
		}
		$info["nom"] = $personnage[2];
		$info["prenom"] = $personnage[3];
		$info["sexe"] = $personnage[4];
		$info["age"] = $personnage[5];
		$info["activite"] = $personnage[6];
		return json_encode($info);
	}
	
	echo info( $_GET[ "id" ], $personnages );
