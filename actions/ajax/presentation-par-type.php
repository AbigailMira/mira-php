<?php

/* 
 * Script PHP pour selectionner les valeurs Présentation associée à chaque Type dans le formulaire input-form
 */

require_once("../../db_connect.php");

    global $conn;
try {   	
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
// select les id et les noms de Présentation pour un Type sélectionné
    $idType = $_GET['idType'];
    $presentationParType = $conn->query("SELECT idPresentation, pre_name 
                                            FROM `presentation`
                                            JOIN type_presentation
                                            ON presentation.idPresentation = type_presentation.fk_presentation_t
                                            WHERE type_presentation.fk_type_p = $idType")->fetchAll();
    echo json_encode($presentationParType);    
}
catch(PDOException $e)
{
}
$conn = null;

?>
    
