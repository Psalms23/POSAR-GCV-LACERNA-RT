<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Reorder | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
 <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-warning" href="home4.php">Back</a>
              <a class="btn btn-lg btn-info" href="request.php">View Reorder Request</a>
            </h1>
            <ol class="breadcrumb">Request Purchase
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Product</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
      
                  <div class="box-header">
                    <h3 class="box-title">Reorder Cart</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="reorder-cart" class="table table-striped">
                      <thead>
                        <tr>
                        
                          <th>Product Code</th>
                          <th>Product Name</th>
                          <th>Brand</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>           
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th><a id="update-reorder" class="btn btn-primary">Reorder Products</a></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div><!-- /.box-body -->
   
              </div>
            </div>
            <!-- /.col -->
            </div>
            <div class="row">
	            
            
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Reorder List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="reorder" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      
                        <th>Product Code</th>
                        <th>Product Name</th>
						            <th>Brand</th>
                        <th>Model</th>
                        <th>Qty</th>
                			<th>Price</th>
                			<th>Category</th>
                			<th>Reorder</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                		
                		$query=mysqli_query($con,"select * from product natural join brand natural join category where branch_id='$branch' order by prod_name")or die(mysqli_error());
                		while($row=mysqli_fetch_array($query)){
                		
                ?>
                      <tr>
                        <td><?php echo $row['prod_id'];?></td>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['brandn'];?></td>
                        <td><?php echo $row['brandm'];?></td>
                        <td><?php echo $row['prod_qty'];?></td>
                        <td><?php echo number_format($row['prod_price'],2);?></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td><?php echo $row['reorder'];?></td>

                        <td>
                  				<a href="#updateordinance<?php echo $row['prod_id'];?>" data-target="#updateordinance<?php echo $row['prod_id'];?>" data-toggle="modal" class="btn btn-primary">Request Purchase</a>
            						</td>
                      </tr>
                      <div id="updateordinance<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content" style="height:auto">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Request Purchase</h4>
                            </div>
                            <div class="modal-body">
                            
                              <div class="form-group">
                                <label class="control-label col-lg-3" for="serial<?php echo $row['prod_id'];?>">Product Code</label>
                                <div class="col-lg-9">
                                  <input type="text" class="form-control" id="serial<?php echo $row['prod_id'];?>" name="serial" value="<?php echo $row['prod_id'];?>" readonly>  
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-lg-3" for="prod_name<?php echo $row['prod_id'];?>">Product Name</label>
                                <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['prod_id'];?>" required>  
                                  <input type="text" class="form-control" id="prod_name<?php echo $row['prod_id'];?>" name="prod_name" value="<?php echo $row['prod_name'];?>" readonly>  
                                </div>
                              </div> 

                              <div class="form-group">
                                <label class="control-label col-lg-3" for="brand<?php echo $row['prod_id'];?>">Brand</label>
                                <div class="col-lg-9">
                              <input type="text" class="form-control" id="brand<?php echo $row['prod_id'];?>" name="brand<?php echo $row['prod_id'];?>" value="<?php echo $row['brandn'];?>" readonly>  
                                </div>
                              </div> 

                              <div class="form-group">
                                <label class="control-label col-lg-3" for="price<?php echo $row['prod_id'];?>">Price</label>
                                <div class="col-lg-9">
                                  <input type="text" class="form-control" id="price<?php echo $row['prod_id'];?>" name="prod_price<?php echo $row['prod_id'];?>" value="<?php echo $row['prod_price'];?>" readonly>  
                                </div>
                              </div>


                              <div class="form-group">
                                <label class="control-label col-lg-3" for="qty<?php echo $row['prod_id'];?>">Quantity</label>
                                <div class="col-lg-9">
                                  <input type="number" class="form-control" id="qty<?php echo $row['prod_id'];?>" name="qty<?php echo $row['prod_id'];?>">  
                                </div>
                              </div>

                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary reorder-to-cart" data-id="<?php  echo $row['prod_id']?>">Save changes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>

                          </div><!--end of modal-dialog-->
                        </div>
                      </div>
                     <!--end of modal-->                    
                    <?php }?>					  
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->


    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        var cart = $('#reorder-cart').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "columnDefs": [
            { "name": "serial",   "targets": 0 },
            { "name": "prod_name",  "targets": 1 },
            { "name": "brand", "targets": 2 },
            { "name": "price",  "targets": 3 },
            { "name": "qty",    "targets": 4 },
            { "name": "action", "orderable": "false", "targets":5}
          ],
          "aoColumnDefs":[
            {
                "aTargets": [5],
                "mRender": function(data, type, row) {
                    return "<a class='remove pull-left' href='javascript:void(0)'>x</a>";
                }
            }
          ]
        });
        $('#reorder').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        // add to cart
        $('.reorder-to-cart').on('click', function(e){
          e.preventDefault();
          var id = $(e.target).data('id');
          if($('#qty'+id).val() <= 0){
            alert("Invalid Quantity!");
          }else{
             var serial = $('#serial'+id).val();
             var prod_name = $('#prod_name'+id).val();
             var brand = $('#brand'+id).val();
             var price = $('#price'+id).val();
             var qty = $('#qty'+id).val();

             cart.row.add( [serial, prod_name, brand, price, qty] ).draw( false );
             $('#updateordinance'+id).modal("hide")
          }
          

        });

        // remove from cart
       $('#reorder-cart').on( 'click', 'tr a.remove', function () {
            var row = this.closest('tr');
            var row_data = cart.row( row ).data();
            cart.row( row ).remove().draw();
        } );


       // store reorders to database
       $('#update-reorder').on('click', function(e){
        e.preventDefault();
        var tdata = cart.rows().data();
        if(tdata.length != 0) {
          var counter = 0;
          for (var i = tdata.length -1; i >= 0; i--) {
              tdata[i][5] = "<?php echo $_SESSION['branch'] ?>";
              $.ajax({
                type: "POST",
                url: "purchase_add.php",
                data: {data:tdata[i]},
                dataType:"json",
                success: function(data){
                  counter++;
                  console.log(data.message, counter)
                  alert("Successfully added new purchase request!");
                }
              });
              document.location='request.php';
            }
          
        }else{
          alert("Reorder cart is empty!")
        }  
       })


        
      });
    </script>
  </body>
 
</html>
