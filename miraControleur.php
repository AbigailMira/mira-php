<?php

/* 
 * Requete pour sélectionner l'ensemble des marques (brand) enregistrées dans la db
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
/* 
 * Requete pour sélectionner l'ensemble des styles d'item enregistrés dans la db
 */

require_once("db_connect.php");

function getStyles() 
{
    global $conn;
    try 
    {
        $styles = $conn->query("SELECT * 
                                  FROM style
                                  ORDER BY sty_name ASC")->fetchAll();
        return $styles;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}