
<!DOCTYPE HTML>
<html>
<head>
<title>Shoes Shop chekout</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script src="js/store.js" ></script>
<!-- end menu -->
<!-- top scrolling -->
</head>
<body>
	<div class="header-top">
		<div class="wrap">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			<div class="cssmenu">
				<ul>
					<li class="active"><a href="register.php">Sign up</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="checkout.php">CheckOut</a></li>
				</ul>
			</div>
			<br><br>
		</div>
	</div>
	<div class="header-bottom">
		<div class="wrap">
			<!-- start header menu -->
			<ul class="megamenu skyblue">
				<li><a class="color1" href="index.php">Home</a></li>
				<li class="grid"><a class="color2" href="shop.php">Men</a></li>
				<li class="active grid"><a class="color4" href="shop.php">Women</a></li>
				<li><a class="color5" href="shop.php">Kids</a></li>
			</ul>
		</div>
	</div>
	<section class="container content-section">
		<h2 class="section-header" style="text-align:left">CART</h2>
		<div class="cart-row">
			<span class="cart-item cart-header cart-column">ITEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRICE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QUANTITY</span>
		</div>
		<div class="cart-items">
		</div>
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
		}
		catch(PDOException $e){
    		echo $e->getMessage();
		}
		$req = $pdo -> prepare("select pPic,Pprice,Pqte from $table where id_usr=$iduser");
		$req->setFetchMode(PDO::FETCH_ASSOC);
		$req->execute();
		$tab=$req->fetchAll();
		for($i=0;$i<count($tab);$i++){
			$srcc=$tab[$i]["pPic"];
			//echo"$srcc";
			$prixx=intval($tab[$i]["Pprice"]);
			//echo"<hr>";
			echo"<div class='cart-item cart-column'>
		<img class='cart-item-image' src='$srcc' >
		<span class='cart-item-title'>Shoes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	
	<span class='cart-price '>$prixx</span>
	<input class='cart-quantity-input' type='number' value='1'>
		<button class='btn btn-danger' type='button'>REMOVE</button>
	</div>";
		}
		
		//var_dump($tab);
		?>
		<a href="rm.php">
		<button  class="btn btn-primary btn-purchase"style="width:auto;padding:1%"  type="button"onclick="window.localStorage.clear();" >PURCHASE</button>
		</a>
	</section>
	

	<div class="login">
		<div class="wrap" style="text-align: center;">
			<p class="cart">Click<a href="shop.php"> here</a> to continue shopping</p>
    	</div>
	</div>
    <div class="footer">
		<div class="copy">
			<div class="wrap">
				<p>© All rights reserved </p>
			</div>
		</div>
	</div> 
	<script>
		/*for(let i=0;i<JSON.parse(JSON.parse(localStorage.getItem("objj")).length);i++){
			addItemToCart(JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).name, JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).price, JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).picture)
		}*/
	</script>   
</body>
</html>