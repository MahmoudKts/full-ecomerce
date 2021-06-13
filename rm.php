<?php
		session_start();
		$db_server="localhost";
		$db_username="root";
		$db_pwd="";
		$db_name ='projet';
		$table = "achat";
		$iduser=intval ($_SESSION['idCCUser']);
		try{
    		$pdo=new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_pwd);
            $req = $pdo -> prepare("DELETE FROM $table where id_usr=$iduser");
		    $req->execute();
		}
		catch(PDOException $e){
    		echo $e->getMessage();
		}
        header("Location: checkoutDb.php");
		//var_dump($tab);
?>