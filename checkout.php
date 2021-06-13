
<!DOCTYPE HTML>
<html>
<head>
<title>Shoes Shop chekout</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- start menu -->     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
		<h2 class="section-header">CART</h2>
		<div class="cart-row">
			<span class="cart-item cart-header cart-column">ITEM</span>
			<span class="cart-price cart-header cart-column">PRICE</span>
			<span class="cart-quantity cart-header cart-column">QUANTITY</span>
		</div>
		<div class="cart-items">
		</div>
		<div class="cart-total">
			<strong class="cart-total-title">Total</strong>
			<span class="cart-total-price">0 DT</span>
		</div>
		<a href="toDb.php">
			<button class="btn btn-primary btn-purchase"style="width:auto;padding:1%"  type="button"onclick="window.localStorage.clear();" >PURCHASE</button>
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
		<script >
			var pan=[];
			if(localStorage.getItem("objj")===null){
			}else{
				for(let i=0;i<JSON.parse(JSON.parse(localStorage.getItem("objj")).length);i++){
					addItemToCart(JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).name, JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).price, JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).picture)
					pan.push([JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).picture,JSON.parse(JSON.parse(localStorage.getItem("objj"))[i]).price]);
				}
			}
			/*console.log("******************");*/
			sessionStorage.setItem('pan', pan);
			// Function to create the cookie
			function createCookie(name, value, days) {
				var expires;
				if (days) {
					var date = new Date();
					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
					expires = "; expires=" + date.toGMTString();
				}else {
					expires = "";
				}
				document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
			}
			/*console.log(pan);*/
			$(document).ready(function (){createCookie("panier", pan, "10");});
			//console.log(document.cookie);
			/*console.log(document.cookie.split('; ').find(row => row.startsWith('panier=')).split('=')[1]);*/
		</script>  
		 <?php
		if(empty($_COOKIE)){
			echo"empty";
		}else{
        	//echo"**********************************\n";
			session_start();
			if(!isset($_SESSION['idCCUser'])){
				echo"Must login first";
			}else{
				//var_dump(intval ($_SESSION['idCCUser']));
        		//var_dump ($_COOKIE['panier']);  
				//echo"**********************************\n";
        		$string = $_COOKIE['panier'];
        		$string = explode(",",$string);
        		//var_dump($string);
				if(strcmp("",$string[0])==0){
					//echo"panier vide !";
				}else{
					//echo"**********************************\n";//idCurrentUser,imgUrl,Prix,Quantite
        			$pan=array(array(intval ($_SESSION['idCCUser']),$string[0],intval (str_replace(" DT","",$string[1])),1));
                for ($i=2; $i < count($string); $i+=2){
                    $j=$i+1;
                    array_push($pan,array(intval($_SESSION['idCCUser']),$string[$i],intval (str_replace(" DT","",$string[$j])),1));
                }
                //var_dump($pan);
				}
				//unset($pan[0]);
			}
		}
	?>
</body>
</html>