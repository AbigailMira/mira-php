<?php

require_once("db_connect.php");

/* 
 * Requete pour sélectionner l'ensemble des marques (brand) enregistrées dans la db
 */
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
 * Requete pour sélectionner l'ensemble des marques (brand) enregistrées dans la db
 */
function getTypes() 
{
    global $conn;
    try 
    {
        $types = $conn->query("SELECT * 
                                  FROM type
                                  ORDER BY typ_name ASC")->fetchAll();
        return $types;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * Requete pour sélectionner l'ensemble des marques (brand) enregistrées dans la db
 */
function getPresentations() 
{
    global $conn;
    try 
    {
        $presentations = $conn->query("SELECT * 
                                  FROM presentation
                                  ORDER BY pre_name ASC")->fetchAll();
        return $presentations;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * Requete pour sélectionner l'ensemble des marques (brand) enregistrées dans la db
 */
function getPackagings() 
{
    global $conn;
    try 
    {
        $packagings = $conn->query("SELECT * 
                                  FROM packaging
                                  ORDER BY pac_name ASC")->fetchAll();
        return $packagings;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * Requete pour sélectionner l'ensemble des marques (brand) enregistrées dans la db
 */
function getStates() 
{
    global $conn;
    try 
    {
        $states = $conn->query("SELECT * 
                                  FROM state
                                  ORDER BY sta_name ASC")->fetchAll();
        return $states;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * Requete pour sélectionner l'ensemble des styles d'item enregistrés dans la db
 */
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
/* 
 * Requete pour sélectionner tous les blushs
 */
function getBlush() 
{
    global $conn;
    try 
    {
        $blushes = $conn->query("SELECT * 
                                    FROM item
                                    JOIN shade
                                    ON shade.idShade = item.fk_shade
                                    WHERE fk_type = 3")->fetchAll();
        return $blushes;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * Requete pour sélectionner un "random" blush
 */
function getRandomBlush() 
{
    global $conn;
    try 
    {
        $randomBlush = $conn->query("SELECT * 
                                        FROM item  
                                        JOIN shade
                                        JOIN item_style
                                        ON item.fk_shade = shade.idShade
                                        AND item.idItem = item_style.fk_item
                                        WHERE fk_type = 3 AND fk_style = 6
                                        ORDER BY rand()
                                        LIMIT 1")->fetch();
        return $randomBlush;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}

