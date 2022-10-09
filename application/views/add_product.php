<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Product</title>
    </head>
    <body>
        <div class="container">
            <br>
            <h1>Add Product</h1>  
            <br>
            <form id="myform" name="myform" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Price</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Product price" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Desccription</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product_desccription" id="product_desccription" placeholder="Product Desccription" required>
                    </div>
                </div>
                
                <!-- <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile">
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-sm-4">
                        <input class="" type="file" id="fileToUpload" name="fileToUpload[]" multiple="multiple">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Add Product">
                    </div>
                </div>
            </form>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#myform").submit(function(e){
                e.preventDefault();
                var name = $("#product_name").val();
                var price = $("#product_price").val();
                var desc = $("#product_desccription").val();
                if (name == "") {
                    alert("Enter the product name");
                    $("#product_name").focus();
                    return false;
                }
                if (price == "") {
                    alert("Enter the product price");
                    $("#product_price").focus();
                    return false;
                }
                if (!price.match(/^\d+$/)) {
                    alert("Enter price only");
                    $("#product_price").focus();
                    return false;
                }
                if (desc == "") {
                    alert("Enter the product desccription");
                    $("#product_desccription").focus();
                    return false;
                }
                
                $.ajax({

                    url: '<?php echo base_url('user/add_product'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    contentType:false,
                    processData:false,
                    catche:false,
                    data: new FormData(this),
                    success:function(res){
                        if (res.status == 1) {
                            alert("Product added successfully");
                            window.location.href = '<?php echo base_url(); ?>';
                        }

                    }
                });
            })
        });
    </script>

    </body>
</html>