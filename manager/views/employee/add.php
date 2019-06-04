<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add employee</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">ADD A NEW EMPLOYEE</h3>
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
        <form action="?mod=employee&act=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Employee ID</label>
                <input type="text" class="form-control" id="" placeholder="ID" name="code" required="">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" name="name" required="">
            </div>  
            <div class="form-group">
                <label for="">Number phone</label>
                <input type="number" class="form-control" id="" name="numphone" required="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" name="email" required="">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" id="" name="address" required="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" id="" name="password" value="000000" placeholder="Default: 000000" 
                required="">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">ADD</button>
        </form>
    </div>
</body>
</html>