<?php
session_start();
include("conn.php");
header("Content-type:text/html;charset=gb2312");

$email=$_POST['email'];
//$name=$_POST['name'];
//$id=$_SESSION['select @@IDENTITY']; #获取id,需要近期使用过
echo $id;
//mysqli_query($conn,"update tb_user set email='$email',name='$name' where id='$id'");
mysqli_query($conn,"update tb_user set email='$email' where name='".$_SESSION['username']."'");
header("location:usercenter.php");
?>