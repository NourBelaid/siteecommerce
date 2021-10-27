<?php 
require 'db.class.php';
require 'panier.php';
$DB = new DB();
$panier = new panier($DB);
$json = array('error' => true);

if(isset($_GET['id'])){
		$product = $DB->query('SELECT idproduct FROM product WHERE idproduct=:idproduct', array('idproduct' => $_GET['id']));
		if(empty($product)){
			$json['message'] = "this product does not exist.";
		}
		$panier->add($product[0]->idproduct);
		$json['error'] = false;
		$json['total'] = number_format($panier->total(),2,',','');
		$json['count'] = $panier->count();
		$json['message'] = 'product added to your cart !';
}else{
	$json['message'] = "No product chosen";
}

echo json_encode($json);