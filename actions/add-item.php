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
    $shadeId = $conn->query("SELECT idShade FROM shade where sha_name = '$shadeName'")->fetch();
    if ($shadeId == ""){
       $stmt = $conn->prepare("INSERT INTO shade (sha_name) VALUES (:shadeName)");
       $stmt->bindParam(':shadeName', $shadeName);
       $stmt->execute();
       $lastShadeId = $conn->query("SELECT idShade FROM shade where sha_name = '$shadeName'")->fetch(); 
    }
    else {
       $lastShadeId = $shadeId;
    }  
    
// insert item info into item table
// prepare sql and bind parameters    
    $itemName = $_POST['itemName'];
    $idShade = $lastShadeId[0];
    $idBrand = $_POST['brand'];
    $idType = $_POST['type'];
    $idPresentation = $_POST['presentation'];
    $idState = $_POST['state'];
    
    $stmt = $conn->prepare("INSERT INTO item (ite_name, fk_shade, fk_brand, fk_type, fk_presentation, fk_state) 
                            VALUES (:itemName, :idShade, :idBrand, :idType, :idPresentation, :idState)");
    
    $stmt->bindParam(':itemName', $itemName);
    $stmt->bindParam(':idShade', $idShade);
    $stmt->bindParam(':idBrand', $idBrand);
    $stmt->bindParam(':idType', $idType);
    $stmt->bindParam(':idPresentation', $idPresentation);
    $stmt->bindParam(':idState', $idState);


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
    
    /* Redirect browser
     * see "Post/Redirect/Get"
     * header("Location: http://localhost:8000/mira/mira-php/public/index.php");  
     */
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
    
    /* Redirect browser
     * header("Location: http://localhost:8000/mira/mira-php/input-form.php");   
     */

}
$conn = null;

?>