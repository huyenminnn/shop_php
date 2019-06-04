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
        <form action="?mod=product&act=update" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product ID</label>
                <input type="text" class="form-control" id="" name="code" value="<?= $data['code']?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" name="name" value="<?= $data['name']?>">
            </div>  
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" class="form-control" id="" name="quantity" value="<?= $data['quantity']?>">
            </div>
            <div class="form-group">
                <label for="">Brand</label>
                <input type="text" class="form-control" id="" name="brand" value="<?= $data['brand']?>">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" id="" name="price" value="<?= $data['price']?>">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category">
                    <?php 
                        foreach ($category as $row) { ?>
                            <option value="<?=$row['code'] ?>" <?php if($row['code']==$data['category']) echo "selected" ?>><?=$row['name'] ?></option>
                    <?php    }
                     ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Images</label>
                <input type="file" class="form-control" id="" name="image" >
            </div>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            
        </form>
    </div>
</body>
</html>