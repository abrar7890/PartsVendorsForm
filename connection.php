<?php

	function ConnectToDatabase()
	{

		$connectionString = 'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\\xampp\\htdocs\\conestoga\\web2\\form\\assignment4.mdb';

		$connection = new PDO($connectionString);
		$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $connection;

	}

?>



