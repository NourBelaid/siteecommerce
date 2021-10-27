<?php
include 'db.class.php';
$idproduct=$_GET['updateid'];
if(isset($_POST['submit'])) {
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$type = $_POST['type'];
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	
	$sql = "UPDATE `product` SET  name=$name,price=$price, type=$type, image=$image  WHERE idproduct=$idproduct";
	$pdo_statement = $conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array(':idproduct'=>$_POST['idproduct'], ':name'=>$_POST['name'], ':price'=>$_POST['price'],
	':type'=>$_POST['type'], ':image'=>$_POST['image'] ) );
	
	if (!empty($result) ){
	  header('location:add.php');
	}
	
}

?>




<!-- ---------------------------------------- -->





<!-- form start -->


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
		                <button value="submit" name="submit" class="button-one submit-button mt-15" data-text="place order" type="submit">Edit</button>			
                </div>
			</div>
		</div>
	</form>											
</div>



<!-- form end -->



<!-- ----------------------------------------------------- -->





