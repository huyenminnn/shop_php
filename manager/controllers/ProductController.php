<?php 
	require_once('models/Product.php');
	require_once('models/Category.php');

	class ProductController
	{	
		var $model;

		function __construct(){
			$this->model = new Product();
			$this->cate = new Category();

		}
		function list(){
			$data = $this->model->All();
			require_once('views/product/list.php');
		}

		function detail(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/product/detail.php');
		}

		function add(){
			$data = $this->cate->All();
			require_once('views/product/add.php');
		}

		function store(){
			$data = $_POST;
			unset($data['submit']);
			
			$uploads = $this->file_upload("public/images","image",50000000);
	        if(gettype($uploads) == "array"){
	            print_r($uploads); // Trả về mảng lỗi nếu ko upload được
	        }else{
	            $data['image'] = $uploads;   
	        }


			$status = $this->model->insert($data);

			if ($status==true) {
				setcookie('msg','Thêm mới thành công',time()+1);
				header('location: index.php?mod=product&act=list');
			} else {
				setcookie('msg','Thêm mới thất bại.',time()+1);
				header('location: index.php?mod=product&act=add');
			}
		}

		function file_upload($target_dir,$input_name,$max_size){
		$target_file = $target_dir."/" . basename($_FILES[$input_name]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$error_arr =array();
		
		// Check if file already exists
		
		// Check file size
		if ($_FILES[$input_name]["size"] > $max_size) {
		    $error_arr[] = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    $error_arr[] = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {

		    if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $target_file)) {
		    	$a = move_uploaded_file($_FILES[$input_name]["tmp_name"], "../sale/public/images/".basename($_FILES[$input_name]["name"]));
		        return $target_file;
		    } else {
		        $error_arr[] = "Sorry, there was an error uploading your file.";
		    }
		}
		return $error_arr;
	}
		function edit(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			$category = $this->cate->All();
			require_once('views/product/edit.php');
		}

		function update(){
			$data = $_POST;
			$uploads = $this->file_upload("public/images","image",50000000);
	        if(gettype($uploads) == "array"){
	            print_r($uploads); // Trả về mảng lỗi nếu ko upload được
	        }else{
	            $data['image'] = $uploads;   
	        }
			$status = $this->model->update($data);

			if ($status==true) {
				setcookie('msg','Cập nhật thành công',time()+1);
				header('location: index.php?mod=product&act=list');
			} else {
				setcookie('msg_fail','Cập nhật thất bại.',time()+1);
				header('location: index.php?mod=product&act=edit');
			}
		}

		function delete(){
			$code = $_GET['code'];
			$status = $this->model->delete($code);

			if ($status==true) {
				setcookie('msg','Xoá thành công',time()+1);
				
			} else {
				setcookie('msg_fail','Xoá thất bại.',time()+1);
				
			}
			header('location: index.php?mod=product&act=list');
		}
	}
 ?>