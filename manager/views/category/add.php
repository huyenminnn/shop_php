<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add category</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">ADD A NEW CATEGORY</h3>
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
        <form action="?mod=category&act=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Category ID</label>
                <input type="text" class="form-control" id="" placeholder="ID" name="code" required="">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" name="name" required="">
            </div>  
            <button type="submit" class="btn btn-primary" name="submit">ADD</button>
        </form>
    </div>
</body>
</html>