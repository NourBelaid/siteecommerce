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
<?php
	$db_username = 'root';
	$db_password = '';
	$conn = new PDO( 'mysql:host=localhost;dbname=clothes', $db_username, $db_password );
	if(isset($_GET['delete'])){
		$idproduct=$_GET['delete'];
        $mysqli->query("DELETE FROM product WHERE idproduct=$idproduct") or die($mysqli->error());
	}
?>