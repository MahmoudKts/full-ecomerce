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
$table = "achat";
try {
     $db=new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_pwd);
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
     $sql ="CREATE table $table(
     id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
     id_usr int( 11 ) NOT NULL, 
     pPic VARCHAR( 300 ) NOT NULL,
     pPrice int(5) NOT NULL,
	 pQte int(3) NOT NULL,
	
    FOREIGN KEY (id_usr)
        REFERENCES usrs(id)
        ON DELETE CASCADE
	 );" ;
     $db->exec($sql);
     print("Created $table Table.\n");

} catch(PDOException $e) {
    /*echo $e->getMessage();//Remove or change message in production code*/
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Shoes Shop</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- end menu -->
	<script src="js/store.js" async></script>

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
	<div class="main">
		<div class="wrap">
			<div class="content-bottom">
				<div class="box1">
					<div class="col_1_of_3 span_1_of_3">
						<a href="single.php">
							<div class="view view-fifth">
								<div class="top_box">
									<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
									<p class="m_2">Lorem ipsum</p>
									<div class="grid_img">
										<div class="css3">
											<img id="im1" src="images/pic.jpg" alt="" />
										</div>
										<div class="mask">
											<div onclick="localStorage.setItem('img',document.getElementById('im1').src);" class="info">Quick View</div>
										</div>
									</div>
									<div class="price" id="p1">400 DT</div>
								</div>
							</div>
						</a>
						<ul class="list">
							<li><a href="#">
									<img src="images/plus.png" onclick="storeObject(document.getElementById('im1').src,document.getElementById('p1').innerText);" /></a>
								<ul class="icon1 sub-icon1 profile_img">
									<li><a class="active-icon c1" href="#" onclick="storeObject(document.getElementById('im1').src,document.getElementById('p1').innerText);">Add To Bag </a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="col_1_of_3 span_1_of_3">
						<a href="single.php">
							<div class="view view-fifth">
								<div class="top_box">
									<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
									<p class="m_2">Lorem ipsum</p>
									<div class="grid_img">
										<div class="css3">
											<img id="im2" src="images/pic1.jpg" alt="" />
										</div>
										<div class="mask">
											<div onclick="localStorage.setItem('img',document.getElementById('im2').src);"
												class="info">Quick View</div>
										</div>
									</div>
									<div class="price" id="p2">300 DT</div>
								</div>
							</div>
							</span>
						</a>
						<ul class="list">
							<li><a href="#">
									<img src="images/plus.png" onclick="storeObject(document.getElementById('im2').src,document.getElementById('p2').innerText);" /></a>
								<ul class="icon1 sub-icon1 profile_img">
									<li><a class="active-icon c1" href="#" onclick="storeObject(document.getElementById('im2').src,document.getElementById('p2').innerText);">Add To Bag </a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="col_1_of_3 span_1_of_3"><a href="single.php">
							<div class="view view-fifth">
								<div class="top_box">
									<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
									<p class="m_2">Lorem ipsum</p>
									<div class="grid_img">
										<div class="css3"><img id="im3" src="images/pic2.jpg" alt="" /></div>
										<div class="mask">
											<div onclick="localStorage.setItem('img',document.getElementById('im3').src);"
												class="info">Quick View</div>
										</div>
									</div>
									<div class="price" id="p3">350 DT</div>
								</div>
							</div>
							</span>
						</a>
						<ul class="list">
							<li><a href="#">
									<img src="images/plus.png" onclick="storeObject(document.getElementById('im3').src,document.getElementById('p3').innerText);" /></a>
								<ul class="icon1 sub-icon1 profile_img">
									<li><a class="active-icon c1" onclick="storeObject(document.getElementById('im3').src,document.getElementById('p3').innerText);" href="#">Add To Bag </a>

									</li>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="box1">
					<div class="col_1_of_3 span_1_of_3"><a href="single.php">
							<div class="view view-fifth">
								<div class="top_box">
									<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
									<p class="m_2">Lorem ipsum</p>
									<div class="grid_img">
										<div class="css3"><img id="im4" src="images/pic3.jpg" alt="" /></div>
										<div class="mask">
											<div onclick="localStorage.setItem('img',document.getElementById('im4').src);"
												class="info">Quick View</div>
										</div>
									</div>
									<div class="price" id="p4">270 DT</div>
								</div>
							</div>
							</span>
						</a>
						<ul class="list">
							<li><a href="#">
									<img src="images/plus.png" onclick="storeObject(document.getElementById('im4').src,document.getElementById('p4').innerText);" /></a>
								<ul class="icon1 sub-icon1 profile_img">
									<li><a class="active-icon c1" onclick="storeObject(document.getElementById('im4').src,document.getElementById('4').innerText);" href="#">Add To Bag </a>

									</li>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="col_1_of_3 span_1_of_3"><a href="single.php">
							<div class="view view-fifth">
								<div class="top_box">
									<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
									<p class="m_2">Lorem ipsum</p>
									<div class="grid_img">
										<div class="css3"><img id="im5" src="images/pic4.jpg" alt="" /></div>
										<div class="mask">
											<div onclick="localStorage.setItem('img',document.getElementById('im5').src);"
												class="info">Quick View</div>
										</div>
									</div>
									<div class="price" id="p5">320 DT</div>
								</div>
							</div>
							</span>
						</a>
						<ul class="list">
							<li><a href="#">
									<img src="images/plus.png" onclick="storeObject(document.getElementById('im5').src,document.getElementById('p5').innerText);" /></a>
								<ul class="icon1 sub-icon1 profile_img">
									<li><a class="active-icon c1" onclick="storeObject(document.getElementById('im5').src,document.getElementById('p5').innerText);" href="#">Add To Bag </a>

									</li>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="col_1_of_3 span_1_of_3"><a href="single.php">
							<div class="view view-fifth">
								<div class="top_box">
									<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
									<p class="m_2">Lorem ipsum</p>
									<div class="grid_img">
										<div class="css3"><img id="im6" src="images/pic5.jpg" alt="" /></div>
										<div class="mask">
											<div onclick="localStorage.setItem('img',document.getElementById('im6').src);"
												class="info">Quick View</div>
										</div>
									</div>
									<div class="price" id="p6">500 DT</div>
								</div>
							</div>
							</span>
						</a>
						<ul class="list">
							<li><a href="#">
									<img src="images/plus.png" onclick="storeObject(document.getElementById('im6').src,document.getElementById('p6').innerText);" /></a>
								<ul class="icon1 sub-icon1 profile_img">
									<li><a class="active-icon c1" onclick="storeObject(document.getElementById('im6').src,document.getElementById('p6').innerText);" href="#">Add To Bag </a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="copy">
			<div class="wrap">
				<p>© All rights reserved </p>
			</div>
		</div>
	</div>
	</script>
</body>

</html>