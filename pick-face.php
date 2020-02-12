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
    <h2>Choose wisely</h2>
    <div class ="row">
        <div class="col-md-10 mx-auto">
            <a href="full-geek.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go full geek</a>
            <a href="" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Stay classic</a>
        </div>                
    </div>        
</div>

<?php include("includes/footer.php");?>

</body>

</html>