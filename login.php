<?php
$db_server="localhost";
$db_username="root";
$db_pwd="";
$db_name="projet";
$table = "usrs";
try{
    $pdo=new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_pwd);
}
catch(PDOException $e){
    echo $e->getMessage();
}
function myfunction($value,$key)
{
echo "[$key]=$value<br>";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Shoes Shop Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

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
       <div class="login">
          <div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">New Customers</h4>
					<h5 class="sub_title">Register Account</h5>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
					<div class="button1">
					   <a href="register.php"><input type="submit" name="Submit" value="Continue"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				  <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					 <div class="comments-area">
						<form method="POST">
							<p>
								<label>E-mail</label>
								<span>*</span>
								<input type="email" name="email" required style="padding: 10px 15px;	width: 97%;	color:#000;
									font-size: 0.8125em;	border:1px solid #f0f0f0;	background:#fff;	outline: none;
										display: block;	font-family: 'Open Sans', sans-serif;">
							</p>
							<p>
								<label>Password</label>
								<span>*</span>
								<input type="password" name="mdp" required>
							</p>
							 <p>
								<input type="submit" name="save" value="Login">
							</p>
						</form>
						<?php
						if(isset($_POST['save'])){
							$email=$_POST['email'];
							$mdp=$_POST['mdp'];
							$req=$pdo->prepare("select id from $table where email like '$email' and passwordd like '$mdp' ");
							$req->execute();
							$tab=$req->fetchAll();
							if($tab){
								session_start();
								$_SESSION['idCCUser']=$tab[0]["id"];
								//array_walk_recursive($tab,"myfunction");
								header("Location: index.php");
								//echo $_SESSION['idCCUser'];
							}else{
								echo"Utilisateur n'existe pas";
							}
        				}
    					?>
					</div>
			      </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
        <div class="footer" class="wrap" >
			<div class="copy">
				<div >
					<p>© All rights reserved </p>
				</div>
			</div>
		</div>
</body>
</html>