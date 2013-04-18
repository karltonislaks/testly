<?php
/**
 * Created by JetBrains PhpStorm.
 * User: karl-tonis.laks
 * Date: 15.04.13
 * Time: 12:50
 * To change this template use File | Settings | File Templates.
 */

class Request
{

	public $controller = DEFAULT_CONTROLLER;
	public $action = 'index';
	public $params = array();

	public function __construct()
	{
		if (isset($_SERVER['PATH_INFO'])) {
			if ($path_info = explode("/", $_SERVER['PATH_INFO'])) {

				// beacause its empty!
				array_shift($path_info);
				$this->controller = isset($path_info[0]) ? array_shift($path_info) : 'welcome';

				// Kontrollitakse, kas pathinfo 1.liige on olemas ja(&&) ei ole(!) tühi,siis antud classi actioni v22rtuseks
				// saab alles j22nud pathinfo 1.liige,(mis samas ka eemaldatakse pathinfost). Juhul kui, pathinfos pole seda
				// esimest liiget pannakse antud classi actioni omaduse v22rtuseks 'index'.
				$this->action = isset($path_info[0]) && ! empty($path_info[0]) ? array_shift($path_info) : 'index';

				// Kontrollib, kas pathinfo 1.liige on olemas, siis antud classi parameetriteks saab pathinfo massiivi kogu
				// alles j22nud liikmed
				$this->params = isset($path_info[0]) ? $path_info : NULL;
			}
		}
	}

	// Funktsioon ymbersuunamiseks. Parameetriks on $destination, mis saab oma v22rtuse sel hetkel kui funktsioon
	// v2lja kutsutakse. NT! $request->redirect('auth'); kus string auth omistatakse $destinationi v22rtuseks.
	public function redirect($destination){
		header('Location: '.BASE_URL.$destination);
	}
}
$request = new Request;


