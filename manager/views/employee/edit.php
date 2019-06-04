<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">UPDATE INFORMATION</h3>
    <?php 
        if (isset($_COOKIE['msg'])) {
    ?>
    <div class="alert alert-danger">
  <strong>Danger!</strong> <?php echo $_COOKIE['msg']; ?>
</div>
    <?php        
        }
     ?>
    <hr>
        <form action="?mod=employee&act=update" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Employee ID</label>
                <input type="text" class="form-control" id="" name="code" value="<?= $data['code']?>" readonly >
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" name="name" value="<?= $data['name']?>">
            </div>  
            <div class="form-group">
                <label for="">Number Phone</label>
                <input type="number" class="form-control" id="" name="numphone" value="<?= $data['numphone']?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" name="email" value="<?= $data['email']?>">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" id="" name="address"  value="<?= $data['address']?>">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
        </form>
    </div>
</body>
</html>