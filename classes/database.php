<?php

// Loome mysql serveriga yhenduse.Annan parameetrid, mis andsin config.php konstantis, kui yhendust
// ei anna luua siis annab mysql errori.
mysql_connect(DATABASE_HOSTNAME, DATABASE_USERNAME) or mysql_error();

// Valin tehtud andmebaasi v6i annan errori.
mysql_select_db(DATABASE_DATABASE) or mysql_error();

// P2ringud, mille saadan serverisse on utf8 kodeeringuga.
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER 'utf8'");

function get_all($sql){
	$q = mysql_query($sql) or exit (mysql_error());
	while (($result[] = mysql_fetch_assoc($q)) || array_pop($result)){
			;
	}
	return $result;
}
// Meetod get_one kutsutakse v2lja n2iteks auth.php, kui antakse talle parameeter $sql(p2ring)
function get_one($sql, $debug = FALSE){

	// Kui debugi v22rtus on TRUE, siis ta l2bib seda if-i sisu, muidu laseb yle.
	if($debug){
		print "<pre>$sql</pre>";
	}

	// Loome muutuja $q, mille v22rtuseks on kas p2ring($sql) v6i viskab v2lja funktsioonist ja annab veateate.
	$q = mysql_query($sql) or exit (mysql_error());

	// Juhul kui mysql_num_rows($q) tagastab v22rtuse false siis viskab funktsioonist (exit) v2lja.
	if(mysql_num_rows($q) === FALSE){
		exit($sql);
	}

	// Loome muutuja $result, millesse salvestab oma p2ringutulemuse masiivina.
	$result = mysql_fetch_row($q);

	// Kontrollib, kas $result on massiiv ja kas on rohkem elemente kui null, siis
	// tagastame $result esimese elemendi. Vastasel juhul tagastame nulli.
	return is_array($result) && count($result) > 0 ? $result[0] : NULL;

}