<?php
//class tests controlls all realated to my tests
class tests
{

// muudab auth muutuja väärtuse tõeseks
	public $requires_auth = TRUE;
//küsib kõik andmed, mida on vaja kuvada index lehel
	function index()
	{

		//lisab test.js kaasab vaates
		$this->scripts[] = 'tests.js';

		global $request;
		global $_user;
		//omistab test muutujale väärtuseks sql päringu
		$tests = get_all("SELECT * FROM test NATURAL JOIN user WHERE test.deleted=0");
		//save the session key of logged in user
		$id=$_SESSION['user_id'];
		//omistab status muutujale väärtuseks sql päringu
		$status = get_one("SELECT status FROM user WHERE user_id='$id'");
//kaasab master_view
		require 'views/master_view.php';
	}
	function remove()
	{
		global $request;

		$id = $request->params[0];
		$result = q("UPDATE test SET deleted=1 WHERE test_id='$id'");
		require 'views/master_view.php';
	}

	function edit()
	{
		global $request;
		//add tests.js included in the view
		$this->scripts[] = 'test_add_edit.js';
		//save parameters(test_id) from address line
		$id = $request->params[0];
		//valib testi, testi id järgi
		$test = get_all("SELECT * FROM test WHERE test_id = '$id'");

		$question=get_all("SELECT question_text FROM question WHERE test_id='$id'");
		//
		$test=$test[0];
		$question=isset($question[0])? $question[0]:array('question_text' => '');
		require 'views/master_view.php';
	}
	function add(){
		global $request;
		$this->scripts[] = 'test_add_edit.js';
		$test=array(
			'test_id'   =>'',
			'name'   =>'',
			'introduction'   =>'',
			'conclusion'   =>'',
			'passcode'   =>'',
			'question_text'   =>'',
		);
		require 'views/master_view.php';
	}
}