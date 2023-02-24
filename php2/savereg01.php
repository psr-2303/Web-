<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>保存注册</title>
</head>

<body>
	
<?PHP
	header ( "Content-type: text/html; charset=gb2312" );
	session_start();//启动
	include("conn.php");
	$username=$_POST['username'];
	$pwd1=$_POST['pwd'];
	$pwd=$_POST['pwd'];
	$email=$_POST['email'];
	$walup=$_POST['walup'];
	
	$sql=mysqli_query($conn,"select * from tb_user where name='".$username."'");#更换顺序
	$info=mysqli_fetch_array($sql);
	if($info==true)
	{
   		echo "<script>alert('该昵称已经存在!');history.back();</script>";
   		exit;
 	}
 	else
 	{  
    	mysqli_query($conn,"insert into tb_user (name,pwd,email,walup) values ('$username','$pwd','$email','$walup')");//不同
    	echo "<script>alert('恭喜，注册成功!');window.location='usercenter.php';</script>";
 }
	?>

</body>
</html>