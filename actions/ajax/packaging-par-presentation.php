<?php

/* 
 * Script PHP pour selectionner les valeurs Packaging associée à chaque Présentation dans le formulaire input-form
 */

require_once("../../db_connect.php");

    global $conn;
try {   	
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
// select les id et les noms de Packaging pour une Présentation sélectionnée
    $idPresentation = $_GET['idPresentation'];
    $packagingParPresentation = $conn->query("SELECT idPackaging, pac_name
                                                FROM packaging
                                                JOIN presentation_packaging
                                                ON packaging.idPackaging = presentation_packaging.fk_packaging_p
                                                WHERE presentation_packaging.fk_presentation_p =  $idPresentation")->fetchAll();
    echo json_encode($packagingParPresentation);    
}
catch(PDOException $e)
{
}
$conn = null;

?>
    
