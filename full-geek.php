<?php include("config/config.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/header.php");?>
<?php include("includes/navigation-list.php");?>
<?php require("miraControleur.php");?>



<div class="container" id="main-content">
    <h2>Full geek selection</h2>
    <div class ="row">
        <div class="col">
            <?php
            $types = getTypes();
            foreach ($types as $t){
                $geeky = getRandomByTypeAndStyle($t['idType'], 6);
                if ($geeky['typ_name'] != ""){
                    echo "<ul>
                        <li>".$geeky['typ_name']." : ".$geeky['sha_name'];
                        echo "</li>
                    </ul>";
                }
            }
            ?>
        </div> 
    </div>        
</div>

<?php include("includes/footer.php");?>

</body>

</html>