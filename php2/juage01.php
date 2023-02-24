<?php
include("conn.php");
header ( "Content-type: text/html; charset=gb2312" ); 
$username=$_POST['username'];
$pwd=$_POST['pwd'];

$sql=mysqli_query($conn,"select * from tb_user where name='".$username."'");#更换顺序
	$info=mysqli_fetch_array($sql);
	if($info!=true)
	{
   		echo "<script>alert('The user does not exist.');history.back();</script>";
   		exit;
 	}
	else{
		if($info[pwd]!=$pwd){
			echo "<script>alert('Inconsistent passwords');history.back();</script>";
		} #判断密码是否一致
		else{
			echo "<script>alert('password error');history.back();</script>";
			session_start();
			$_SESSION['username']=$info['name'];
			header("location:usercenter.php");
		}
		
		}
?>