<?php
session_start();
include('model/m_user.php');
/**
* 
*/
class C_user
{
	
	function dangkiTK($name,$email,$password){
		$m_user = new M_user();
		$id_user = $m_user->dangki($name,$email,$password);
		if($id_user>0){
			$_SESSION['success'] = "Đăng Kí Thành Công";
			header('location:index.php');
			if(isset($_SESSION['error'])){
				unset($_SESSION['error']);
			}
		}
		else{
			$_SESSION['error'] = "Đăng Kí Không Thành Công";
			header('location:dangkitk.php');
		}
	}
	function dangnhapTK($email,$password){
		$m_user = new M_user();
		$user = $m_user->dangnhap($email,$password);
		if($user==true){
			$_SESSION['user_name'] = $user->Name;
			$_SESSION['id_user'] = $user->Id;
			header('location:index.php');
			if(isset($_SESSION['user_error'])){
				unset($_SESSION['user_error']);
			}
			if(isset($_SESSION['chua_dnhap'])){
				unset($_SESSION['chua_dnhap']);
			}
		}
		else{
			$_SESSION['user_error'] = "Sai Thông Tin Đăng Nhập";
			header('location:dangnhap.php');
	}
	}
	function dangxuatTK(){
		session_destroy();
		header('location:index.php');
	}
}
?>