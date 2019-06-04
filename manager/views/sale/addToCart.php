<?php 
	require_once('views/header.php');
 ?>
 <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">SALE</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?mod=dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Sale</a>
                </li>
                
              </ol>
            </div>
          </div>
        </div>
    <div class="container-fluid ">
  
  <hr>
  <div class="row">
  	<div class="card-body col-md-6">
       <h2>PRODUCTS</h2>

    	<div class="table-responsive">
      <table class="table table-bordered" id="tablekhach" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Quantity</th>
            <th>Price</th>
            <th style="text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($products as $row) {
            ?>
            <tr>
              <td><?php echo $row['code']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['brand']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo number_format($row['price']); ?></td>
              <td  style="text-align: center;">
                <a href="?mod=sale&act=addToCart&code=<?php echo $row['code']; ?>" class="btn btn-success"><i class="fas fa-cart-plus"></i></a> 
              </td>
            </tr>
            
          <?php } ?>
        </tbody>
      </table>
    	</div>
    
  	</div>
  	<div class="card-body col-md-6">
  		<?php 
  			$customer = $_SESSION['customer'];
  		 ?>
  		 <h2>CUSTOMER INFORMATION</h2>
   <p><b>ID</b>: <?=$customer['code']?> </p>
   <p><b>Name</b>: <?=$customer['name']?> </p>
   <p><b>Email</b>: <?=$customer['email']?> </p>
   <p><b>Number phone</b>: <?=$customer['numphone']?> </p>
   <p><b>Address</b>: <?=$customer['address']?> </p>
    
    <div class="table-responsive">
      <table class="table table-bordered" id="tablekhach" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th style="text-align: center;">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sum = 0;
          foreach ($cart as $row) {
            $sum += $row['price']*$row['quantity'];
            ?>
            <tr>
              <td><?php echo $row['code']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['brand']; ?></td>
              <td>
                <a href="?mod=sale&act=addToCart&code=<?php echo $row['code']; ?>">+</a>
                <?php echo $row['quantity']; ?>
                <a href="?mod=sale&act=minus&code=<?php echo $row['code']; ?>">-</a>
              </td>
              <td><?php echo number_format($row['price']); ?></td>
              <td><?php echo number_format($row['price']*$row['quantity']); ?></td>
              <td  style="text-align: center;">
                <a href="?mod=sale&act=delete&code=<?php echo $row['code']; ?>" class="btn btn-danger"><i class="fas fa-times"></i></a> 
              </td>
            </tr>
            
          <?php } ?>
        </tbody>
      </table>
      </div>
      <h4 class="text-danger">Total: <?= number_format($sum) ?> VND</h4>
      <a href="?mod=sale&act=payment" class="btn btn-success">PAY</a>
  	</div>
  </div>
  
</div>

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#tablekhach').DataTable();
  } );
</script>
<?php 
	require_once('views/footer.php');
 ?>