
<html>
<head>
	
	<title>Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="bg0 p-t-75 p-b-85" style="margin-top: 30px;">
		
<div class="container">
  <hr>
  <div class="row">
  	<div class="card-body col-md-4">
      <h2 style="padding: 50px;">MINSHOP</h2>
      <p><b>Addr: </b>600 Giai Phong, Hoang Mai, Ha Noi</p>
      <p><b>Num: </b>0963326470</p>
    </div>
    <div class="col-md-3"></div>
    <div class="card-body col-md-5">
      <h2   style="padding: 50px;">BILL DETAIL</h2>
      <p><b>Bill ID: </b><span class="text-danger"><?=$code?></span></p>
      <p><b>Date: </b><?=$bill['timestamp']?></p>
      <p><b>Customer ID: </b><?=$customer['code']?></p>
      <p><b>Name: </b><?=$customer['name']?></p>
      <p><b>Number Phone: </b><?=$customer['numphone']?></p>
      <p><b>Email: </b><?=$customer['email']?></p>
      <p><b>Address: </b><?=$customer['address']?></p>
    </div>
  </div>
  
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
            <td><?php echo number_format($row['total']); ?></td>
          </tr>

        <?php } ?>
        
      </tbody>
    </table>
    <div class="row">
      <div class="col-md-9">
        <h2 style="color: red;">Total: <?= number_format($total1) ?> VND </h2>
        <span>(included fee)</span>
      </div>
      
    </div>
    
    

    
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
</body>
</html>