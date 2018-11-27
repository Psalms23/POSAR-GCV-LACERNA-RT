<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
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
              <a class="btn btn-lg btn-warning" href="home.php">Back</a>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Product</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Stockin Products</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  
  
                  <div class="form-group">
                    <label for="date">Order ID</label>
                    <div class="input-group col-md-12">
                      <select id="pr_id" class="form-control select2" name="pr_id" required>
                        <?php
			 include('../dist/includes/dbcon.php');
				$query2=mysqli_query($con,"select * from purchase_request a inner join product b on a.prod_id=b.prod_id where a.branch_id='$branch' and a.purchase_status='pending' order by pr_id")or die(mysqli_error());
				  while($row=mysqli_fetch_array($query2)){
		      ?>
                        <option value="<?php echo $row['pr_id'];?>"><?php echo $row['pr_id'].' - '.$row['prod_name'].' ('.$row['prod_desc'].' '.$row['qtypr'].'pcs)';?></option>
                        <?php } ?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                
     
		   <div class="form-group">
                    <label for="date">Deliver Receipt</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="dr" name="dr" placeholder="Delivery Receipt" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Quantity</label>
                    <div class="input-group col-md-12">
                      <input type="number" class="form-control pull-right" id="qty" name="qty" placeholder="Quantity" value="0" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
               
                
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-primary" id="add-to-cart" name="">
                        Save
                      </button>
					  <button class="btn" id="clear-stockin">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-8">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Product Stock In cart</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="cart" class="table table-striped">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Delivery Receipt</th>
                        <th>Product name</th>
                        <th>Qty Order</th>
                        <th>Qty Received</th>
                        <th>Date Delivered</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a class="btn btn-primary pull-right add-to-stockin"> <i class="glyphicon glyphicon-save"></i> 
                    Add To Stocks</a></td>
                       </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->

          <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Product Stockin List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="stock_list" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Delivery Receipt</th>
                         <th>Product name</th>
                        <th>Qty Order</th>
                        <th>Qty Received</th>
                <th>Date Delivered</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $branch=$_SESSION['branch'];
                          $query=mysqli_query($con,"select * from stockin a inner join purchase_request b on a.prod_id=b.pr_id inner join product c on c.prod_id=b.prod_id where a.branch_id='$branch' order by date desc")or die(mysqli_error());
                          while($row=mysqli_fetch_array($query)){
                          
                      ?>
                      <tr>
                        <td><?php echo $row['pr_id'];?></td>
                        <td><?php echo $row['dr'];?></td>
                         <td><?php echo $row['prod_name'];?></td>
                         <td><?php echo $row['qtypr'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['status'];?></td>
                      </tr>
                   
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
    <script src="../plugins/select2/select2.full.min.js"></script>
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
        //initialize tables
        $('#stock_list').DataTable();
        var table_data = [];
        var table = $('#cart').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "select": true,
          "columnDefs": [
            { "name": "pr_id",   "targets": 0 },
            { "name": "dr",  "targets": 1 },
            { "name": "prod_name", "targets": 2 },
            { "name": "qtypr",  "targets": 3 },
            { "name": "qty",    "targets": 4 },
            { "name": "date",    "targets": 5 }
          ],
          "aoColumnDefs":[
            {
                "aTargets": [6],
                "mRender": function(data, type, row) {
                    return "<a class='remove' href='javascript:void(0)'>x</a>";
                }
            }
          ]
        });

        //clear stock in field list
        $('#clear-stockin').on('click', function(e){
          e.preventDefault();
          $('#dr').val("");
          $('#qty').val(0);
        });
        //add to stock in cart
        $('#add-to-cart').on('click', function(e){
          e.preventDefault();
          var dr = $('#dr').val();
          var qty = $('#qty').val();
          if(dr == "" || qty <= 0){
            alert('Invalid Data for stock in!')
          }else{
            var jqxhr = $.ajax({
               type: "POST",
               url: "stockin-fetch.php",
               data: { 
                "branch": <?php echo  $_SESSION['branch'];?>,
                "pr_id":$('#pr_id').val(),
                "dr":dr,
                "qty":qty,
                 },
                dataType:"json",
               success: function(data){
                table.row.add( [data.pr_id, data.dr, data.prod_name, data.qtypr, data.qty, data.date] ).draw( false );
               }
            });
          }
        });


        //Add to stocks
        $('.add-to-stockin').on('click', function(e){
          e.preventDefault();
          var tdata = table.rows().data();
          for (var i = tdata.length -1; i >= 0; i--) {
            tdata[i][6] = "<?php echo $_SESSION['branch']; ?>";
            tdata[i][7] = "<?php  echo $_SESSION['id']; ?>";
            $.ajax({
              type: "POST",
              url: "stockin_add.php",
              data: {data:tdata[i]},
              dataType:"json",
              success: function(data){
                      alert(data.message)
                    }
            });
          }
          document.location='stockin.php';
        })

        // remove from cart
       $('#cart').on( 'click', 'tr a.remove', function () {
            var row = this.closest('tr');
            var row_data = table.row( row ).data();
            table.row( row ).remove().draw();
        } );

      });
    </script>
     <script>

      $(function () {
        
        //Initialize Select2 Elements
        $(".select2").select2();

        
      });
    </script>
  </body>
</html>
