<?php

//photo deletion script
//drop this file in the folder you want to clean up

// config 
$db_table = "photos";


//get all of the files in the current directory
$files = glob('./*.jpg');
// usort($files, function($a, $b) {
// /*     return filemtime($a) < filemtime($b); */
//     return filemtime($a) > filemtime($b);
// });

MySQLConnction('open'); // don't want to be opening and closing this in the foreach block

foreach($files as $file){

	$filename = basename($file);

	//find the file in the database
	$q = "SELECT id from ". $db_table . " where path = '" . $filename . "'";
	$result = mysql_query($q);
	echo "---------------------------------------------------------------------------------------------------------------------------\n";
	echo "query: ". $q . "\n";
	if(mysql_num_rows($result) == 0){
		//delete the file, it's not in the database
		echo "deleting ". $filename . "\n";
		
		// UNCOMMENT THIS LINE TO USE!
		// unlink($filename);
	}
}

MySQLConnction('close');



function MySQLConnction($task) {
	
	if($task == "open" || $task == ""){
		$host = "127.0.0.1";
		$user = "root";
		$pass = "";
		$db = "community_board_dev";
	
		$connection = mysql_connect($host, $user, $pass) or die ("<span class='error'>Unable to connect!</span>");
			
		/*socket connection*/
		/*
		$connection = mysql_connect('localhost:/Applications/MAMP/tmp/mysql/mysql.sock', $user, $pass) 
			or die ("<span class='error'>Unable to connect!</span>");
		*/
		
		mysql_select_db($db) or die ("<span class='error'>Unable to select database!</span>"); 
	}
	
	if($task == "close") {
		if(isset($connection)){
			mysql_close($connection);
		}
	}
}