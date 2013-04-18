<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Karl
 * Date: 16.04.13
 * Time: 13:03
 * To change this template use File | Settings | File Templates.
 */

// Uus objektityyp nimega user
class user {

	// atribuut nimega $logged_in, mis on vaikev22rtusega false
	public $logged_in = FALSE;

	// Funktsioon, mis k2ivitatakse iga kord kui selle objektityybiga objekt luuakse
	function __construct(){

		// Alustab sessiooni(server hoiab $_SESSION massiivis andmeid alles korduvate p2ringutega)
		session_start();

		// Kui $_SESSION-is on user_id antud, siis selle classi atribuut logged_in omistatakse.
		if(isset($_SESSION['user_id'])){
			$this->logged_in = TRUE;
		}
	}

	/**
	 * Kontrollib, kas kasutaja on sisselogitud, kui ei ole, siis suunab auth lehele.
	 */
	public function require_auth(){

		// Annab ligip22su Request objektile
		global $request;

		// Kontrollib, kas pole sisselogitud.
		if ($this->logged_in !== TRUE){

			// Kontrollib, kas p'ring tuli ajaxiga v6i otse.
			// Kas p2ring on tulnud l2bi ajaxi? NB! GOOGELda ajax!
			// Kas sellel on v22rtus XMLHttpRequest ?
			if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
			&& $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){

				// Vastuses brauserile lisatakse http error code 'HTTP/1.0 401 Unauthorized'(mida javascript kontrollib)
				header('HTTP/1.0 401 Unauthorized');
				exit(json_encode(array('data' => 'session_expired')));
			}
			else {
				$_SESSION['session_expired'] = TRUE;
				$request->redirect('auth');
			}
		}
	}
}

// Uus objekt minu classist
$_user = new user;