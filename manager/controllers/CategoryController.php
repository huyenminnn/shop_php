<?php 
	require_once('models/Category.php');
	class CategoryController
	{	
		var $model;

		function __construct(){
			$this->model = new Category();
		}
		function list(){
			$data = $this->model->All();
			require_once('views/category/list.php');
		}

		function detail(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/category/detail.php');
		}

		function add(){
			require_once('views/category/add.php');
		}

		function store(){
			$data = $_POST;
			unset($data['submit']);
			
			$status = $this->model->insert($data);
			if ($status==true) {
				setcookie('msg','Thêm mới thành công',time()+1);
				header('location: index.php?mod=category&act=list');
			} else {
				setcookie('msg','Thêm mới thất bại.',time()+1);
				header('location: index.php?mod=category&act=add');
			}
		}

		function edit(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/category/edit.php');
		}

		function update(){
			$data = $_POST;
			$status = $this->model->update($data);
			if ($status==true) {
				setcookie('msg','Sửa thành công',time()+1);
				header('location: index.php?mod=category&act=list');
			} else {
				setcookie('msg','Sửa thất bại.',time()+1);
				header('location: index.php?mod=category&act=edit');
			}
		}

		function delete(){
			$code = $_GET['code'];
			$status = $this->model->delete($code);
			if ($status==true) {
				setcookie('msg','Xoá thành công',time()+1);
				header('location: index.php?mod=category&act=list');
			} else {
				setcookie('msg','Xoá thất bại.',time()+1);
				header('location: index.php?mod=category&act=list');
			}
		}
	}
 ?>