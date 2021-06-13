<?php
$db_server = "localhost";
$db_username = "root";
$db_pwd = "";


$conn = new mysqli('localhost', 'root', '');
$db_name ='projet';

if (empty(mysqli_fetch_array(mysqli_query($conn, "SHOW DATABASES LIKE '$db_name'")))) {
    echo "DB not exist<br>";
    $sql = "CREATE DATABASE $db_name";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
}
$conn->close();
$table = "usrs";
try {
     $db=new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_pwd);
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
     $sql ="CREATE table $table(
     id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
     firstName VARCHAR( 30 ) NOT NULL, 
     lastName VARCHAR( 30 ) NOT NULL,
     email VARCHAR( 150 ) NOT NULL,
	 passwordd VARCHAR( 30 ) NOT NULL,
	 addresss VARCHAR( 150 ),
	 city VARCHAR( 30 ));" ;
     $db->exec($sql);
     print("Created $table Table.\n");

} catch(PDOException $e) {
   // echo $e->getMessage();//Remove or change message in production code
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Shoes Shop Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	</script>
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
   
       <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Create an Account</h4>
    		   <form method="POST"> 
    			 <div class="col_1_of_2 span_1_of_2">
		   			 <div><input name="nom" type="text" placeholder="first name" required ></div>
		    			<div><input name="prenom" type="text" placeholder="last name" required></div>
		    			<div><input name="email" type="text" placeholder="E-Mail" required></div>
		    			<div><input name="mdp" type="password" placeholder="password" required style="font-size: 0.8125em;
								color: #999; padding: 8px; outline: none;	margin: 10px 0;	width: 95%;	font-family: 'Open Sans', sans-serif;
								border:1px solid #f0f0f0;">
						</div>
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">	
		    		<div><input name="adresss" type="text" placeholder="Address" ></div>
		    				        
		          <div><input name="city" type="text" placeholder="City" ></div>
		          <input class="grey" type="submit" value="sauvegarder" name="save" style="background: #555; color: #FFF; padding: 8px 20px;
					border-bottom: 4px solid #1D1C1C; transition: 0.5s all;	-webkit-transition: 0.5s all;	-moz-transition: 0.5s all;
					-o-transition: 0.5s all;	display: inline-block;	font-family: 'Open Sans', sans-serif;	cursor: pointer;
					outline: none;	text-transform: uppercase;	border-right: none;	border-left: none;	border-top: none;" >   
		          <!--</div><button class="grey">Submit</button>-->
				  <br>
		         <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		         <div class="clear"></div>
		    </form>
			<?php
        if(isset($_POST['save'])){
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
			$email=$_POST['email'];
			$mdp=$_POST['mdp'];
            $adresss=$_POST['adresss'];
			$city=$_POST['city'];
            $req=$db->prepare("insert into $table (firstName,lastName,email,passwordd,addresss,city) value(?,?,?,?,?,?)");
            $req->execute(array($nom,$prenom,$email,$mdp,$adresss,$city));
			echo "user added";
        }
    ?>



    	  </div> 
        </div>
        <div class="footer">
			<div class="copy">
				<div class="wrap">
					<p>© All rights reserved </p>
				</div>
			</div>
		</div>
</body>
</html>