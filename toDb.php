<?php
		if(empty($_COOKIE)){
			echo"empty";
		}else{
        	//echo"**********************************\n";
			session_start();
			if(!isset($_SESSION['idCCUser'])){
				echo"Must login first";
				echo "<a href='login.php'>to login page</a>";
			}else{
				echo"user num:";
				var_dump(intval ($_SESSION['idCCUser']));
        		//var_dump ($_COOKIE['panier']);  
				//echo"**********************************\n";
        		$string = $_COOKIE['panier'];
        		$string = explode(",",$string);
        		//var_dump($string);
				if(strcmp("",$string[0])==0){
					echo"panier vide !";
					echo "<a href='index.php'>to main page</a>";
				}else{
					//echo"**********************************\n";//idCurrentUser,imgUrl,Prix,Quantite
        			$pan=array(array(intval ($_SESSION['idCCUser']),$string[0],intval (str_replace(" DT","",$string[1])),1));
                for ($i=2; $i < count($string); $i+=2){
                    $j=$i+1;
                    array_push($pan,array(intval($_SESSION['idCCUser']),$string[$i],intval (str_replace(" DT","",$string[$j])),1));
                }
                var_dump($pan);

				$db_server = "localhost";
				$db_username = "root";
				$db_pwd = "";
				$db_name ='projet';
				$table = "achat";
				$db=new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_pwd);
     			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

				for($i=0;$i<count($pan);$i++){
					$idUser=$pan[$i][0];
            		$pic=$pan[$i][1];
					$prix=$pan[$i][2];
					$qte=$pan[$i][3];

					$req=$db->prepare("insert into $table (id_usr,pPic,pPrice,pQte) value(?,?,?,?)");
            		$req->execute(array($pan[$i][0],$pan[$i][1],$pan[$i][2],$pan[$i][3]));
					var_dump($pan[$i]);
					echo"element added \n";
					header("Location: checkoutDb.php");
				}
				}
				//unset($pan[0]);	
				
			}
		}
	?>