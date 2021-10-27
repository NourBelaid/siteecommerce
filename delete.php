<?php
  $user='root';
  $pass='';


 try {
    $conn = new PDO('mysql:host=localhost;dbname=clothes', $user, $pass);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    $sql = "DELETE FROM product WHERE idproduct='" . $_GET["idproduct"] . "'";


    $conn->exec($sql);
    header('location:add.php');
    
 }catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }
?>