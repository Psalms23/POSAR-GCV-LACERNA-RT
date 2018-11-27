<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila"); 
?>
<?php
include('../dist/includes/dbcon.php');

$branch=$_SESSION['branch'];
$query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query);
           $branch_name=$row['branch_name'];
?>

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header" style="padding-left:20px">
              <a href="home.php" class="navbar-brand"><b><i class="glyphicon glyphicon-home"></i> <?php echo $branch_name;?> </b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
				  <li class="">
                
                    <a href="log.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-list-alt"></i>
                      History Log
                    </a>
                  </li>
                  <!-- Notifications Menu -->
                  <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-refresh text-red"></i> Notifications
                      <span class="label label-danger">
                      <?php 
                      date_default_timezone_set('Asia/Manila');
                      $date1= date("Y-m")."-1";
                      $date2 = date("Y-m")."-31";
                      $query=mysqli_query($con,"select COUNT(*) as count from product where prod_qty<=reorder and branch_id='$branch'")or die(mysqli_error());
                      $query_due = mysqli_query($con,"select COUNT(*) as due from customer a INNER JOIN sales b on a.cust_id=b.cust_id INNER JOIN sales_details c on b.sales_id=c.sales_id INNER JOIN term d on b.sales_id=d.sales_id INNER JOIN product e on c.prod_id=e.prod_id where a.balance!=0 and a.branch_id='$branch' and status!='paid' and d.due_date BETWEEN '$date1' and '$date2' group by a.cust_id")or die(mysqli_error());
                      $row1=mysqli_fetch_array($query_due);
                			$row=mysqli_fetch_array($query);
                			echo $row['count']+$row1['due'];
                			?>	
                      </span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">
                      <?php echo $row['count'];?> products that needs reorder
                      <br>
                      <?php if($row1['due'] != 0) { echo $row1['due']; }else{ echo '0';}?> due accounts as of <?php echo date("M, Y"); ?>
                      </li>
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        <?php
                        $queryprod=mysqli_query($con,"select prod_name from product where prod_qty<=reorder and branch_id='$branch'")or die(mysqli_error());
                  			  while($rowprod=mysqli_fetch_array($queryprod)){
                  			?>
                          <li><!-- start notification -->
                            <a href="reorder.php">
                              <i class="glyphicon glyphicon-refresh text-red"></i> <?php echo $rowprod['prod_name'];?>
                            </a>
                          </li><!-- end notification -->
                          <?php }?>

                        <?php
                        $query_due=mysqli_query($con,"select * from customer natural join sales natural join sales_details natural join term natural join product where balance!=0 and branch_id='$branch' and status!='paid' and due_date BETWEEN '$date1' and '$date2' order by cust_last desc")or die(mysqli_error());
                          while($row_due=mysqli_fetch_array($query_due)){
                        ?>
                          <li><!-- start notification -->
                            <a href="account_summary.php?cid=<?php echo $row_due['cust_id']; ?>">
                              <i class="glyphicon glyphicon-th-list text-red"></i> <?php echo $row_due['cust_last'];?>( Due Account )
                            </a>
                          </li><!-- end notification -->
                          <?php }?>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <!--
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-wrench"></i> Maintenance
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications --><!--
                        <ul class="menu">
						  <li><!-- start notification -->
                <!--            <a href="category.php">
                  <!--            <i class="glyphicon glyphicon-user text-green"></i> Category
                            </a>
                          </li><!-- end notification -->
						              <li><!-- start notification -->
                       <!--     <a href="customer.php">
                              <i class="glyphicon glyphicon-user text-green"></i> Customer
                            </a>
                          </li><!-- end notification -->
                        <!--  <li><!-- start notification -->
                          <!--  <a href="creditor.php">
                              <i class="glyphicon glyphicon-user text-green"></i> Credit Applicants
                            </a>
                          </li><!-- end notification -->
						<!--  <li><!-- start notification -->
                        <!--    <a href="product.php">
                              <i class="glyphicon glyphicon-cutlery text-green"></i> Product
                            </a>
                          </li><!-- end notification -->
						 <!--
						  <li><!-- start notification -->
                        <!--    <a href="supplier.php">
                              <i class="glyphicon glyphicon-send text-green"></i> Supplier
                            </a>
                          </li><!-- end notification -->
                         
				<!--		 
                        </ul>
                      </li>
                     
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <!-- Tasks Menu -->
                   <!--
				   <li class="dropdown notifications-menu">
                     Menu toggle button
                    <a href="stockin.php">
                      <i class="glyphicon glyphicon-list text-green"></i> Stockin -->
                      
                  <!--  </a>-->
                    <ul class="dropdown-menu">
                      <li>
                      </li>
                     
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-stats text-red"></i> Report
                     
                    </a>
                    <ul class="dropdown-menu">
                     <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        
                          <li><!-- start notification -->
                            <a href="inventory.php">
                              <i class="glyphicon glyphicon-ok text-green"></i>Inventory
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="reportstockonhand.php">
                              <i class="glyphicon glyphicon-ok text-green"></i>Stocks on hand
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="reportoutofstock.php">
                              <i class="glyphicon glyphicon-ok text-green"></i>Out of Stocks
                            </a>
                          </li><!-- end notification -->
    <li><!-- start notification -->
                            <a href="inventory.php">
                              <i class="glyphicon glyphicon-ok text-green"></i>Reorder Level
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="reportstockin.php">
                              <i class="glyphicon glyphicon-ok text-green"></i>Stock in
                            </a>
                          </li><!-- end notification -->
						            <li><!-- start notification -->
                         <a href="purchase_request.php">
                              <i class="glyphicon glyphicon-usd text-blue"></i>Purchase Request
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                         <a href="income.php">
                              <i class="glyphicon glyphicon-usd text-blue"></i>Income
                            </a>
                          </li><!-- end notification -->
					               <li><!-- start notification -->
                         <a href="receivables.php">
                              <i class="glyphicon glyphicon-th-list text-red"></i>Account Receivables
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                         <a href="overdue.php">
                              <i class="glyphicon glyphicon-th-list text-red"></i>Over Due Accounts
                            </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="profile.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-cog text-orange"></i>
                      <?php echo $_SESSION['lname'];?>
                    </a>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-off text-red"></i> Logout 
                      
                    </a>
                  </li>
                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>