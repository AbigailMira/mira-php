<?php include("config/config.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/header.php");?>
<!--    Dans balek on trouve ici navigation-list-->
<?php include("includes/navigation.php");?>
<?php require("miraControleur.php");?>



<div class="container" id="main-content">
    <h2>Input form for makeup</h2>
        
    <form name="mkp-input" action="actions/add-item.php" method="post">
      <div class="form-group">
        <label for="itemName">Item name</label>
        <input type="text" class="form-control" id="itemName" name="itemName" placeholder="example : Match Stix">
      </div>
      <div class="form-group">
        <label for="shade">Item shade</label>
        <input type="text" class="form-control" id="shade" name="shadeName" placeholder="example : Ivory">
      </div>
      <div class="form-group">
        <label for="brand">Select brand</label>
        
        <select class="form-control" id="brand" name="brand" >
            <?php
            $brands = getBrands();
            echo "<option value=".""."selected>Please select</option>";
            foreach($brands as $brand) { 
            echo "<option value=".$brand['idBrand'].">".$brand['bra_name']." </option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group" >
        <label for="styles">Select style</label>
        <select multiple class="form-control" id="styles" name="styles[]" >
          <?php
            $styles = getstyles();
            foreach($styles as $style) { 
            echo "<option value=".$style['idStyle'].">".$style['sty_name']." </option>";
            }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
        
</div>

<?php include("includes/footer.php");?>

</body>
</html>