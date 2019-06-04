<?php 
	require_once('views/header.php');
 ?>
 
 <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">BILLS</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Tables</a>
                </li>
                <li class="breadcrumb-item active">Bills
                </li>
              </ol>
            </div>
          </div>
        </div>
    <div class="container-fluid">
  
  <hr>
  <?php 
        if (isset($_COOKIE['msg'])) {
    ?>
    <div class="alert alert-danger">
  <strong>Danger!</strong> <?php echo $_COOKIE['msg']; ?>
</div>
    <?php        
        }
     ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="tablekhach" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>Customer ID</th>
            <th>Time</th>
            <th>Money</th>
            <th>Status</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $row) {
            ?>
            <tr>
              <td><?php echo $row['code']; ?></td>
              <td><?php echo $row['id_employee']; ?></td>
              <td><?php echo $row['id_customer']; ?></td>
              <td><?php echo $row['timestamp']; ?></td>
              <td><?php echo number_format($row['money']); ?></td>
              <td  style="text-align: center;">

                <?php 
                  if ($row['status']) {
                ?>
                  <a href="#" class="btn btn-success disabled">Confirmed!</a>
                <?php
                  }else { ?>
                    <a href="?mod=billOl&act=update&code=<?= $row['code'];?>" class="btn btn-warning">Not yet confirmed!</a>
                <?php
                  }
                ?>
                  
                
                

              </td>
              <td style="text-align: center;">
                <?php 
                  if ($row['id_employee']!='') {
                ?>
                <a class="btn btn-warning" href="?mod=sale&act=detail&code=<?= $row['code'];?>"><i class="far fa-eye"></i></a>
                <?php
                  } else{
                 ?>
                <a class="btn btn-warning" href="?mod=sale&act=detail_online&code=<?= $row['code'];?>"><i class="far fa-eye"></i></a>
                <?php 
                  }
                  if (!$row['status']) {
                ?>
                <a class="btn btn-danger" href="?mod=bill&act=delete&code=<?= $row['code'];?>"><i class="fas fa-times"></i></a>
                <?php  
                  }
                 ?>
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