<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>����ע��</title>
</head>

<body>
	
<?PHP
	header ( "Content-type: text/html; charset=gb2312" );
	session_start();//����
	include("conn.php");
	$username=$_POST['username'];
	$pwd1=$_POST['pwd'];
	$pwd=$_POST['pwd'];
	$email=$_POST['email'];
	$walup=$_POST['walup'];
	
	$sql=mysqli_query($conn,"select * from tb_user where name='".$username."'");#����˳��
	$info=mysqli_fetch_array($sql);
	if($info==true)
	{
   		echo "<script>alert('���ǳ��Ѿ�����!');history.back();</script>";
   		exit;
 	}
 	else
 	{  
    	mysqli_query($conn,"insert into tb_user (name,pwd,email,walup) values ('$username','$pwd','$email','$walup')");//��ͬ
    	echo "<script>alert('��ϲ��ע��ɹ�!');window.location='usercenter.php';</script>";
 }
	?>

</body>
</html>