<?php
/* 
 * Script PHP pour enregistrer en db les données du formulaire input-form
 */

require_once("../db_connect.php");
   
    //Insert Query of SQL
    
    global $conn;
try {   	
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
// insert new shade value into shade table, then select id
        $shadeName = $_POST['shadeName'];

        $stmt = $conn->prepare("INSERT INTO shade (sha_name) VALUES (:shadeName)");
        $stmt->bindParam(':shadeName', $shadeName);

        $stmt->execute();

        $lastShadeId = $conn->query("SELECT idShade FROM shade where sha_name = '$shadeName'")->fetch();
    
// insert item info into item table
// prepare sql and bind parameters    
    $itemName = $_POST['itemName'];
    $idShade = $lastShadeId[0];
    $idBrand = $_POST['brand'];
    
    $stmt = $conn->prepare("INSERT INTO item (ite_name, fk_shade, fk_brand) VALUES (:itemName, :idShade, :idBrand)");
    
    $stmt->bindParam(':itemName', $itemName);
    $stmt->bindParam(':idShade', $idShade);
    $stmt->bindParam(':idBrand', $idBrand);

// insert a row
    
    $stmt->execute();

// select last inserted id
    $lastItemId = $conn->query("SELECT LAST_INSERT_ID() FROM item")->fetch();
	
// boucle pour insérer une ligne item_style pour chaque $style
    
    foreach ($_POST['styles'] as $style) {
        $idItem = $lastItemId[0];
        $idStyle = $style;
        
        $stmt = $conn->prepare("INSERT INTO item_style (fk_item, fk_style) VALUES (:idItem, :idStyle)");
        $stmt->bindParam(':idItem', $idItem);
        $stmt->bindParam(':idStyle', $idStyle);


        $stmt->execute();
    }

    echo "New records created successfully";
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>