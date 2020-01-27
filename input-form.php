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
        
    <form name="mkp-input">
      <div class="form-group">
        <label for="itemName">Item name</label>
        <input type="text" class="form-control" id="itemName" placeholder="example : Crash course concealing">
      </div>
      <div class="form-group">
        <label for="brand">Select brand</label>
        
        <select class="form-control" id="brand">
            <?php
            $brands = getBrands();
            foreach($brands as $brand) { 
            echo "<option value=".$brand['bra_name'].">".$brand['bra_name']." </option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Example multiple select</label>
        <select multiple class="form-control" id="exampleFormControlSelect2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    </form>
        
</div>

<?php include("includes/footer.php");?>

</body>
</html>