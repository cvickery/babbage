//	request_processor.php
/*
 *	This is part of my implementation of the final project for CS 90.3
 *	Fall, 2007
 *
 *	The assignment is to receive a JSON-encoded object, use the information
 *  in that object to look something up in a database, and to send a reply
 *  as another JSON encoded object.
 */
<?php

//	class Datas
//	-------------------------------------------------------------------------
/*
 *		An instance of this class will be returned to the invoker.
 */
	class Datas
	{
		//	Only public members will get processed by json_encode()
		public $name, $email, $passwd;
		
		//	Constructor
		//	---------------------------------------------------------------------
		public function __construct($email, $passwd, $name = '')
		{
			$this->email = $email;
			$this->passwd = $passwd;
			$this->name = $name;
		}
	}

	//	In case magic_quotes_gpc is on ...
	require_once('../../../cs090.3/2007_09/Final/strip_quotes.php');

	//	Get the JSON string sent via the post method.
	if (isset($_SERVER) && array_key_exists('REQUEST_METHOD', $_SERVER) 
				&& $_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$infoStr = $_POST['info'];
			$infoObj = json_decode($infoStr);
			
			//	Look up the email and password in the XML database, and get the associated name.
			
			//	Create the object to return, and json-encode it.
			$replyObj = new Datas($infoObj->email, $infoObj->passwd, "Christopher Vickery");
			$replyStr = json_encode($replyObj);
			
			//	Return the JSON string.
			echo $replyStr;
		}
