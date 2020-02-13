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
    
// insert new line value into line table, then select id
    $lineName = $_POST['line'];    
    $stmt = $conn->prepare("SELECT idLine FROM line where lin_name = :lineName");
    $stmt->execute(['lineName'=>$lineName]);
    $lineId = $stmt->fetch();         
    if ($lineId == ""){
       $stmt = $conn->prepare("INSERT INTO line (lin_name) VALUES (:lineName)");
       $stmt->bindParam(':lineName', $lineName);
       $stmt->execute();
       $lastLineId = $conn->query("SELECT LAST_INSERT_ID() FROM line")->fetch(); 
    }
    else {
       $lastLineId = $lineId;
    }      	
// insert new shade value into shade table, then select id
    $shadeName = $_POST['shade'];     
    $stmt = $conn->prepare("SELECT idShade FROM shade where sha_name = :shadeName");
    $stmt->execute(['shadeName'=>$shadeName]);
    $shadeId = $stmt->fetch();     
    if ($shadeId == ""){
       $stmt = $conn->prepare("INSERT INTO shade (sha_name) VALUES (:shadeName)");
       $stmt->bindParam(':shadeName', $shadeName);
       $stmt->execute();
       $lastShadeId = $conn->query("SELECT LAST_INSERT_ID() FROM shade")->fetch(); 
    }
    else {
       $lastShadeId = $shadeId;
    }       
// insert new brand value into brand table, then select id
    $brandName = $_POST['brand'];
    $brandId = $conn->query("SELECT idBrand FROM brand where bra_name = '$brandName'")->fetch();
    if ($brandId == ""){
       $stmt = $conn->prepare("INSERT INTO brand (bra_name) VALUES (:brandName)");
       $stmt->bindParam(':brandName', $brandName);
       $stmt->execute();
       $lastbrandId = $conn->query("SELECT LAST_INSERT_ID() FROM brand")->fetch(); 
    }    
// get id for Type, Presentation, Packaging, State
    $idType = $_POST['type'];
    $idPresentation = $_POST['presentation'];
    $idPackaging = $_POST['packaging'];
    $idState = $_POST['state'];
    
    $stmt = $conn->prepare("INSERT INTO item (fk_line, fk_shade, fk_brand, fk_type, fk_presentation,fk_packaging, fk_state) 
                            VALUES (:idLine, :idShade, :idBrand, :idType, :idPresentation, :idPackaging, :idState)");
    
    $stmt->bindParam(':idLine', $lastLineId[0]);
    $stmt->bindParam(':idShade', $lastShadeId[0]);
    $stmt->bindParam(':idBrand', $lastbrandId[0]);
    $stmt->bindParam(':idType', $idType);
    $stmt->bindParam(':idPresentation', $idPresentation);
    $stmt->bindParam(':idPackaging', $idPackaging);
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
     */
     header("Location: http://localhost:8000/mira/mira-php/input-form.php");  
     
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