<?php

/* 
 * Script PHP pour autocompleter le champ Marque du formulaire input-form
 */

require_once("../../db_connect.php");

    global $conn;
try {   	
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
// select l'ensemble des valeurs correspondant à des noms de marque
    $value = $_GET['value'];
    $brands = $conn->query("SELECT bra_name FROM brand where bra_name like '%".$value."%'")->fetchAll();
    echo json_encode($brands);    
}
catch(PDOException $e)
{
}
$conn = null;

?>
    
