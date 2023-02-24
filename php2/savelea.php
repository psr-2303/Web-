
<?php
session_start();
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn.php");
$title=$_POST['title'];
$content=$_POST['content'];
$user_con=$_POST['user_con'];
$time=date("Y-m-j");
$bookname=$_POST['bookname'];
$author=$_POST['author'];
$isbn=$_POST['isbn'];
$press=$_POST['press'];
$press_time=$_POST['press_time'];

//获取用户id
$sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");

$info=mysqli_fetch_array($sql);
$userid=$info['id'];
$username=$info['name'];

mysqli_query($conn,"insert into tb_leave(userid,username,title,content,user_con,time,bookname,author,isbn,press,press_time) values('$userid','$username','$title','$content','$user_con','$time','$bookname','$author','$isbn','$press','$press_time')");
//$info1=mysqli_fetch_array($sql1);
//判断
//if ($info1==true){
echo "<script>alert('摘抄成功');window.location='usercenter.php';</script>";
//	header("127.0.0.1:index.php");
//}



?>

