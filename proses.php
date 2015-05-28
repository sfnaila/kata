<?php
	
	include 'anagram.php';

	$input=$_POST['text'];
	
	if($input!=NULL)
	{
		include("index.php");
		$anagram=new Anagram();
		$anagram->Main($input);
	}

?>
