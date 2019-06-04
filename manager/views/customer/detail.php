<?php 
// $res = '<div class="row"><div class="col-md-4"><img src="http://placehold.it/120x120" class="img-responsive" alt="a"></div><div class="col-md-8"><label>Customer ID</label><p>C123</p></div></div>';
//  
// $res = "<p>huyen</p>";
$res = '<table class="table table-responsive"><tr><td>Customer Id</td><td>'.$data['code'].'</td></tr><tr><td>Name</td><td>'.$data['name'].'</td></tr><tr><td>Email</td><td>'.$data['email'].'</td></tr><tr><td>Number phone</td><td>'.$data['numphone'].'</td></tr><tr><td>Address</td><td>'.$data['address'].'</td></tr></table>';
echo $res;
?>

