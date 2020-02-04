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
    <h2>Add item to database</h2>
    <div class ="row">
        <div class="col-md-10 mx-auto">
            <form name="mkp-input" action="actions/add-item.php" method="post">
                
              <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="itemName">Item name</label>
                        <input type="text" class="form-control" id="itemName" name="itemName" placeholder="example : Match Stix">
                    </div>
                    <div class="col-sm-4">
                        <label for="shade">Item shade</label>
                        <input type="text" class="form-control" id="shade" name="shadeName" placeholder="example : Ivory">
                    </div>
                    <div class="col-sm-4">
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
              </div>
              
              <div class="form-group row">
                <div class="col-sm-4">
                    <label for="type">Select type</label>        
                    <select class="form-control" id="type" name="type" >
                        <?php
                        $types = getTypes();
                        echo "<option value=".""."selected>Please select</option>";
                        foreach($types as $type) { 
                        echo "<option value=".$type['idType'].">".$type['typ_name']." </option>";
                        }
                      ?>
                    </select>
              </div>
              <div class="col-sm-4">
                <label for="presentation">Select presentation</label>
                <select class="form-control" id="presentation" name="presentation" >
                    <?php
                    $presentations = getPresentations();
                    echo "<option value=".""."selected>Please select</option>";
                    foreach($presentations as $presentation) { 
                    echo "<option value=".$presentation['idPresentation'].">".$presentation['pre_name']." </option>";
                    }
                  ?>
                </select>
              </div>      
              <div class="col-sm-4" >
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
              </div>
                <div class="form-group">
                <label for="state">Select state</label>        
                <select class="form-control" id="state" name="state" >
                    <?php
                    $states = getStates();
                    echo "<option value=".""."selected>Please select</option>";
                    foreach($states as $state) { 
                    echo "<option value=".$state['idState'].">".$state['sta_name']." </option>";
                    }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>                
    </div>        
</div>

<?php include("includes/footer.php");?>

</body>
</html>