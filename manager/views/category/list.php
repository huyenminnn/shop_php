<?php 
	require_once('views/header.php');
 ?>
 <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">CATEGORIES</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Tables</a>
                </li>
                <li class="breadcrumb-item active">Categories
                </li>
              </ol>
            </div>
          </div>
        </div>
    <div class="container-fluid">
  
  <hr>
  <a href="?mod=category&act=add" class="btn btn-primary">Add new category</a>
  <?php 
  if (isset($_COOKIE['msg'])) {
    ?>
    <div class="alert alert-success">
      <strong>Success!</strong> <?php echo $_COOKIE['msg']; ?>
    </div>
    <?php        
  }
  if (isset($_COOKIE['msg_fail'])) {
    ?>
    <div class="alert alert-danger">
      <strong>Danger!</strong> <?php echo $_COOKIE['msg_fail']; ?>
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
            <th>Name</th>
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
              <td  style="text-align: center;">

                
                <a href="?mod=category&act=edit&code=<?php echo $row['code']; ?>" class="btn btn-warning">Update</a>  
                <a href="?mod=category&act=delete&code=<?php echo $row['code']; ?>" class="btn btn-danger delete">Delete</a>

              </td>
            </tr>
            
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.delete').on('click',function(e){
      e.preventDefault();
      var url = $(this).attr('href')
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = url;
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    })
  })

</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#tablekhach').DataTable();
  } );
</script>
<?php 
	require_once('views/footer.php');
 ?>list.php