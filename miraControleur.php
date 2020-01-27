<?php

/* 
 * Requete pour sélectrionner l'ensemble des marques (brand) enregistrées dans la db
 */

require_once("db_connect.php");

function getBrands() 
{
    global $conn;
    try 
    {
        $brands = $conn->query("SELECT * 
                                  FROM brand
                                  ORDER BY bra_name ASC")->fetchAll();
        return $brands;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}