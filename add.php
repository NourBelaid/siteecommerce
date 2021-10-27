<?php
require 'db.class.php';
require 'panier.php';
$DB = new DB();
$panier = new panier($DB);

?>
<?php


if(!empty($_POST["add_product"])) {
	require_once("db.php");

	$name = $_POST['name'];
	$price = $_POST['price'];
	$type = $_POST['type'];
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	
	$sql = "INSERT INTO product ( name, price, type, image ) 
	VALUES ( :name, :price, :type, :image )";
	$pdo_statement = $conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array( ':name'=>$_POST['name'], ':price'=>$_POST['price'],
	':type'=>$_POST['type'], ':image'=>$_POST['image'] ) );

	
	if (!empty($result) ){
	  header('location:add.php');
	}
	
}
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Add Product || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		<!-- Place favicon.ico in the root directory -->
		
		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- jquery-ui.min css -->
		<link rel="stylesheet" href="css/jquery-ui.min.css">
		<!-- meanmenu css -->
		<link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- nivo-slider css -->
		<link rel="stylesheet" href="lib/css/nivo-slider.css">
		<link rel="stylesheet" href="lib/css/preview.css">
		<!-- slick css -->
		<link rel="stylesheet" href="css/slick.css">
		<!-- lightbox css -->
		<link rel="stylesheet" href="css/lightbox.min.css">
		<!-- material-design-iconic-font css -->
		<link rel="stylesheet" href="css/material-design-iconic-font.css">
		<!-- All common css of theme -->
		<link rel="stylesheet" href="css/default.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
        <!-- shortcode css -->
        <link rel="stylesheet" href="css/shortcode.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr css -->
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	</head>
	<body>	
		<!-- WRAPPER START -->
		<div class="wrapper bg-dark-white">

			<!-- HEADER-AREA START -->
			<header id="sticky-menu" class="header header-2">
				<div class="header-area">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4 col-xs-7">
								<div class="logo text-center">
									<a href="index-2.php"><img src="img/logo/logo.png" alt="" /></a>
								</div>
							</div>
							<div class="col-sm-4 col-xs-5">
								<div class="mini-cart text-right">
									<ul>
									<li>
								 <a class="btn btn-danger" href="logout.php">logout</a>
									</li>
										<li>
											<a class="cart-icon" href="p.php">
												<i class="zmdi zmdi-shopping-cart"></i>
												<span id="count"><?= $panier->count(); ?></span>
											</a>
											<div class="mini-cart-brief text-left">
												<div class="cart-items">
													<p class="mb-0">You have <span id="count"><?= $panier->count(); ?> item(s)</span> in your shopping bag</p>
												</div>
												
												<div class="cart-totals">
													<h5 class="mb-0">Total <span class="floatright"><span id="total">$<?= number_format($panier->total(),2,',',''); ?></span></span></h5>
												</div>
												<div class="cart-bottom  clearfix">
													<a href="p.php" class="button-one floatleft text-uppercase" data-text="View cart">View cart</a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- MAIN-MENU START -->
				<div class="menu-toggle menu-toggle-2 hamburger hamburger--emphatic hidden-xs">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
				<div class="main-menu  hidden-xs">
					<nav>
						<ul>
							<li><a href="index-2.php">home</a>	</li>
								
						
							<li><a href="shop.php">products</a>
								<div class="mega-menu menu-scroll">
									<div class="table">
										<div class="table-cell">
											<div class="half-width">
												<ul>
													<li class="menu-title">best brands</li>
													<li><a href="#">Rhude</a></li>
													<li><a href="#">Stüssy</a></li>
													<li><a href="#">Aimé Leon Dore</a></li>
													<li><a href="#">Fear of God</a></li>
													<li><a href="#">Denim</a></li>
													<li><a href="#">Nike</a></li>
													<li><a href="#">Louis Vuitton</a></li>
													<li><a href="#">Don chadwick</a></li>
												</ul>
											</div>
											<div class="half-width">
												<ul>
													<li class="menu-title">popular brands</li>
													<li><a href="#">akiko kuwahata</a></li>
													<li><a href="#">barbro berlin</a></li>
													<li><a href="#">cecilia hall</a></li>
													<li><a href="#">don chadwick</a></li>
													<li><a href="#">henning koppel</a></li>
													<li><a href="#">jehs + Laub</a></li>
													<li><a href="#">vicke lindstrand</a></li>
													<li><a href="#">don chadwick</a></li>
												</ul>
											</div>
											<div class="full-width">
												<div class="mega-menu-img">
													<a href="single-product.html"><img src="img/megamenu/1.jpg" alt="" /></a>
												</div>
											</div>
											<div class="pb-80"></div>
										</div>
									</div>
								</div>
							</li>
                          		
							</li>
							<li><a href="about.php">about us</a></li>
							<li><a href="add-product.php">Add Product</a></li>

						</ul>
					</nav>
				</div>
				<!-- MAIN-MENU END -->
			</header>
			<!-- HEADER-AREA END -->
			
			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>Add Products</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="index-2.php">Home</a></li>
										<li>Add Products</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>




<!-- ----------------------------------------------------- -->






<!-- add product start -->
<div class="tab-pane" id="check-out">
	<form method='post' action=''>
		<div class="shop-cart-table check-out-wrap">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="demo-form-row">
	  	                <label>Name: </label><br>
	 	                    <input type="text" name="name" class="demo-form-field" required />
 		            </div>
  											
		                <div class="demo-form-row">
	  	                    <label>Price: </label><br>
	  	                    <input type="text" name="price" class="demo-form-field" required />
  		                </div>
  											
		                <div class="demo-form-row">
	  	                    <label>Type: </label><br>
	 	                    <input type="text" name="type" class="demo-form-field" required />
  		                </div>
  											
		                <div class="demo-form-row">
	  	                    <label>Image: </label><br> <br>
	  	                    <input type="file" name='image'  class="demo-form-field" required />
 		                </div><br>						
		                <button value="add_product" name="add_product" class="button-one submit-button mt-15" data-text="place order" type="submit">Add Product</button>			
                </div>
			</div>
		</div>
	</form>											
</div>
<!-- add product end -->


<!-- show product start -->
<div id="container">
    			 					
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th style="text-align:center">𝐍𝐚𝐦𝐞</th>
                    <th style="text-align:center">𝐏𝐫𝐢𝐜𝐞</th>
                    <th style="text-align:center">𝐓𝐲𝐩𝐞</th>
					<th style="text-align:center">𝐏𝐢𝐜𝐭𝐮𝐫𝐞</th>
					<th colspan="2" style="text-align:center">action</th>
              	</tr>
            </thead>
              	<tbody>
					<?php $products = $DB->query('SELECT * FROM product'); ?>
                	<?php foreach( $products as $product ): ?>
                   		<tr>
                            <td style="text-align:center"><?= $product->name; ?></td>
                            <td style="text-align:center"><?= $product->price; ?></td>
                            <td style="text-align:center"><?= $product->type; ?></td>
							<td style="text-align:center"><img src="uploads/<?= $product->image;?>" width="100px" height="120px"></td>
							<td style="text-align:center"><a class="add addPanier" href="addpanier.php?id=<?= $product->idproduct; ?>">
							    </a>
								
								<a class="btn btn-info" href="edit.php?updateid=<?= $product->idproduct; ?>" >Edit</a>
								<a class="btn btn-danger" href="delete.php?idproduct=<?= $product->idproduct; ?>" >Delete</a>
						    </td>
                       	</tr>
                   	<?php endforeach ?>
               	</tbody>
        </table>
</div>
<!-- show product end -->








  

<!-- ----------------------------------------------------- -->













<!-- Footer-area start -->
<footer>
				
				<div class="footer-area footer-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">Contact Us</h3>
									<ul class="footer-contact">
										<li><span>Address :</span>14 Rue Salah Kaouech , <br>Kef, Tunisie</li>
										<li><span>Cell-Phone :</span>55492948</li>
										<li><span>Email :</span>nour@belaid.org</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">accounts</h3>
									<ul class="footer-menu">
									
								
										<li><a href="p.php"><i class="zmdi zmdi-dot-circle"></i>My Cart</a></li>
										<li><a href="registration.php"><i class="zmdi zmdi-dot-circle"></i>Sign In</a></li>
										<li><a href="login.php"><i class="zmdi zmdi-dot-circle"></i>Log In</a></li>
									
									
									</ul>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
				<!-- Footer-area end -->
				<!-- Copyright-area start -->
				<div class="copyright-area copyright-2">
					<div class="container">
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<div class="copyright">
									<p class="mb-0">&copy; Nourbelaid  2021. All Rights Reserved.</p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- Copyright-area start -->
			</footer>
			<!-- FOOTER END -->
			
			
		</div>
		<!-- WRAPPER END -->

		<!-- all js here -->
		<!-- jquery latest version -->
		<script src="js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- jquery.meanmenu js -->
		<script src="js/jquery.meanmenu.js"></script>
		<!-- slick.min js -->
		<script src="js/slick.min.js"></script>
		<!-- jquery.treeview js -->
		<script src="js/jquery.treeview.js"></script>
		<!-- lightbox.min js -->
		<script src="js/lightbox.min.js"></script>
		<!-- jquery-ui js -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- jquery.nivo.slider js -->
		<script src="lib/js/jquery.nivo.slider.js"></script>
		<script src="lib/home.js"></script>
		<!-- jquery.nicescroll.min js -->
		<script src="js/jquery.nicescroll.min.js"></script>
		<!-- countdon.min js -->
		<script src="js/countdon.min.js"></script>
		<!-- wow js -->
		<script src="js/wow.min.js"></script>
		<!-- plugins js -->
		<script src="js/plugins.js"></script>
		<!-- main js -->
		<script src="js/main.js"></script>
	</body>
</html>