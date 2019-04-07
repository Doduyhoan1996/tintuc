<?php
include('database.php');

class M_user extends database
{
	function dangki($name,$email,$password){
		$sql = "INSERT INTO users(Name,Email,Password) VALUES(?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($name,$email,$password));
		if($result){
			return $this->getLastId();
		}
		else{
			return false;
		}

	}
	function dangnhap($email,$password){
		$sql = "SELECT * FROM users WHERE Email = '$email' and Password = '$password'";
		$this->setQuery($sql);
		return $this->loadRow(array($email,$password));
	}
}
?>