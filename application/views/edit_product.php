<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Update Product</title>
    </head>
    <body>
    <div class="container">
        <br>
        <h1>Update Product</h1>  
      
        <br>
        <form id="myform" name="myform" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $editData['id'];?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $editData['product_name'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Product Price</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="product_price" id="product_price" value="<?php echo $editData['product_price'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Product Desccription</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="product_desccription" id="product_desccription" value="<?php echo $editData['product_desccription'];?>">
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Image</label>
                <div class="col-sm-4">
                    <input class="" type="file" id="fileToUpload" name="fileToUpload[]" multiple="multiple">
                </div>
            </div>
            <?php //echo "<pre>";print_r($editData);die(); ?>
            <?php if (empty($editData['product_image']) || $editData['product_image'] == '[]' || $editData['product_image'] == 'null'){ ?>
            <?php }else{ ?>
                
            <div class="form-group row">
                <!-- <label class="col-sm-2 col-form-label">Product Desccription</label> -->
                <table id="table_id" class="table table-striped" style="width:50%" border="indextable" >
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i=1;
                        $allImages = json_decode($editData['product_image']); 
                        foreach ($allImages as $getImage) { ?>
                            
                        <tr id="tr_edit_<?php echo $getImage;?>">
                            <td><?php echo $i; ?></td>
                            <td><img src="<?php echo base_url() ?>assets/upload/product_images/<?php echo $getImage; ?>" height="40%" width="10%"></td>
                            <td>
                                <input class="btn btn-danger" value="Remove" type="button" name="delete" id="delete" onclick="deleteData('<?php echo $getImage; ?>','<?php echo $editData['id'];?>')">
                            </td>
                            
                        </tr>
                        <?php $i++;} ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Update Product">
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#myform").submit(function(e){
            e.preventDefault();
            var price = $("#product_price").val();
            if (!price.match(/^\d+$/)) {
                alert("Enter price only");
                $("#product_price").focus();
                return false;
            }
            $.ajax({
            url: '<?php echo base_url('user/update_product'); ?>',
            type: 'POST',
            dataType: 'json',
            contentType:false,
            processData:false,
            catche:false,
            data: new FormData(this),
            success:function(res){
              if (res.status == 1) {
                alert("Product details updated successfully");
                window.location.href = '<?php echo base_url(); ?>'
              }
            }
          });
        })
      });
    function deleteData(image_name,id) {
        //alert($id);
        var del = confirm("Are u sure, you want to delete this product Image?");
        if (del) {
            $.ajax({
                url: '<?php echo base_url('user/delete_images'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {id: id,image_name:image_name},
                success:function(res) {
                    if (res.status==1) {
                        alert('Product image delete successfully!!!');
                        window.location.reload();
                        
                    }
                }
            });
        }
    }
    </script>

  </body>
</html>