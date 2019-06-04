<?php 
	require_once('views/header.php');
 ?>
 <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">CUSTOMERS</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Tables</a>
                </li>
                <li class="breadcrumb-item active">Customer
                </li>
              </ol>
            </div>
          </div>
        </div>
    <div class="container-fluid">
  
  <hr>
  <a href="?mod=customer&act=add" class="btn btn-primary">Add new customer</a>
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

                <a data-id="<?php echo $row['code']; ?>" class="btn btn-success detail">Detail</a>
                <a href="?mod=customer&act=edit&code=<?php echo $row['code']; ?>" class="btn btn-warning">Update</a>  
                <a href="?mod=customer&act=delete&code=<?php echo $row['code']; ?>" class="btn btn-danger delete">Delete</a>

              </td>
            </tr>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">

                    <h2 class="modal-title">INFORMATION</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body" id="detail">
                    
                    
                    <div class="modal-footer">

                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                    
                  </div>
                </div>

              </div>
            </div>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $(".detail").click(function(){
        
        var code = $(this).attr("data-id");
         $.ajax({
          type: "GET",
          url: "?mod=customer&act=detail&code="+code,
          data:{
            
          },
          
          success: function(response)
          { 
            $('#detail').html(response);
            $("#myModal").modal("show");
          },
          error: function (xhr, ajaxOptions, thrownError) {

          }
        });
       });
  })
</script>
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
 ?>