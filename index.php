<?php

require 'config.php';
require 'classes/Request.php';
require 'classes/user.php';
require 'classes/database.php';

// 1.V6tan $request objekti controlleri v22ruse 2.Liidan saadud v22rtuse kahe stringiga(controllers/.php)
// 3.Kontrollime, kas selline fail eksisteerib.
if(file_exists('controllers/'.$request->controller.'.php')){

	// V6tab selle controlleri sisu lasitisee
	require 'controllers/'.$request->controller.'.php';

	// Teeme uue objekti $controller
	$controller = new $request->controller;

	// Kui atribuut requires_auth
	// TODO: Henno,seleta!
	if(isset($controller->requires_auth)){

		// Kysib autentimist
		$_user->require_auth();
	}

	// Antud controllerile omistame $request-ist saadud actioni.
$controller->{$request->action}();
}

// Kui seda tahetud controllerit ei leitud, siis kuvab veateate.
else{
	echo "The page '{$request->controller}' does not exist.";
}
