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
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="example : Fenty Beauty">
                        <ul id="brand-result"></ul>    
<!--                        <select class="form-control" id="brand" name="brand" >
                            //<?php
//                            $brands = getBrands();
//                            echo "<option value=".""."selected>Please select</option>";
//                            foreach($brands as $brand) { 
//                            echo "<option value=".$brand['idBrand'].">".$brand['bra_name']." </option>";
//                            }
//                          ?>
                        </select>-->
                        
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
            <div class="col-sm-4">
                <label for="packaging">Select packaging</label>
                <select class="form-control" id="packaging" name="packaging" >
                    <?php
                    $packagings = getPackagings();
                    echo "<option value=".""."selected>Please select</option>";
                    foreach($packagings as $packaging) { 
                    echo "<option value=".$packaging['idPackaging'].">".$packaging['pac_name']." </option>";
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

<script type="text/javascript">
//    $("#brand").keyup(function(){
//        var search = $(this).val()
//        $("#brand-result").empty();
//        $("#brand-result").hide();
//        if(search != ''){
//            $.ajax({
//                url: "actions/ajax/marque-search.php",
//                method: "GET",
//                data: {"value":search},
//                success: function(data){
//                    var result = JSON.parse(data);                    
//                    for(var i=0; i<result.length; i++){
//                        var brand_name = result[i]["bra_name"];
//                        $("#brand-result").append("<li>"+brand_name+"</li>");
//                    }
//                    $("#brand-result").show();
//                    $("#brand-result li").on('click', function(){
//                        var selected_brand = $(this).text();
//                        $("#brand").val(selected_brand);
//                        $("#brand-result").empty();
//                        $("#brand-result").hide();
//                    })
//                }
//            })
//        }
//    })

$("#brand").autocomplete({
    minLength: 1,
    source: function(request, response){
        $.ajax({
            url: "actions/ajax/marque-search.php",
            method: "GET",
            data: {"value":request.term},
            success: function(data){
                var formated_result = [];
                var result = JSON.parse(data);                    
                for(var i=0; i<result.length; i++){
                    var brand_name = result[i]["bra_name"];
                    formated_result.push(brand_name);
                }
                response(formated_result);
            }
        });
    },
    select: function(event, ui){        
    }    
});

$("#type").change(function() {
    $.ajax({
        type: "GET",
        data:{"idType":$("#type").val()},
        url: "actions/ajax/presentation-par-type.php",
        dataType: "json",
        success: function(presentationParType){
            $("#presentation").empty();
            $.each(presentationParType, function(){
                $("#presentation").append($("<option></option>").val(this['idPresentation']).html(this['pre_name']));
            });
        }
    });
});

$("#presentation").change(function() {
    $.ajax({
        type: "GET",
        data:{"idPresentation":$("#presentation").val()},
        url: "actions/ajax/packaging-par-presentation.php",
        dataType: "json",
        success: function(packagingParPresentation){
            $("#packaging").empty();
            $.each(packagingParPresentation, function(){
                $("#packaging").append($("<option></option>").val(this['idPackaging']).html(this['pac_name']));
            });
        }
    });
});
</script>
</html>