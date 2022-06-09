<?php

try{
	// localhost
	$db=new PDO('mysql:host=localhost;dbname=project_s2;charset=utf8','root','');
	
	// connexionbdd simplon
	// $db=new PDO('mysql:host=db5006773312.hosting-data.io;dbname=dbs5603904','dbu2407296','5Rc3y4Zg');
	return;
	
} catch(PDOException $e){
	die('Erreur:'.$e->getMessage());
}

?>	