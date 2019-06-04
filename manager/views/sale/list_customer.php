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
    <div class="container-fluid">
  
  <hr>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="tablekhach" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Number Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th style="text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $row) {
            ?>
            <tr>
              <td><?php echo $row['code']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['numphone']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td  style="text-align: center;">
                <a href="?mod=sale&act=purchase&code=<?php echo $row['code']; ?>" class="btn btn-warning delete">Create bill</a>

              </td>
            </tr>
            
          <?php } ?>
        </tbody>
      </table>
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