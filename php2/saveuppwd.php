
<?php
session_start();
$p1=trim($_POST['p1']);
$p2=trim($_POST['p2']);

$name=$_SESSION['username'];
class chkchange
   {
	   var $name;
	   var $p1;
	   var $p2;
	   function chkchange($x,$y,$z)
	    {
		  $this->name=$x;
		  $this->p1=$y;
		  $this->p2=$z;
		
		}
	   function changepwd()
	   {include("conn.php");
	    $sql=mysqli_query($conn,"select * from tb_user where name='".$this->name."'");
	    $info=mysqli_fetch_array($sql);
		if($info['pwd']!=$this->p1)
		 {
		   echo "<script>alert('旧密码输入错误');history.back();</script>";
		   exit;
		 }
		 else
		 {
		   mysqli_query($conn,"update tb_user set pwd='".$this->p2."' ,pwd1='$this->p2' where name='$this->name'");
		   echo "<script>alert('修改成功');window.location='usercenter.php';</script>";
		   exit;
		 }
	   }
  }
 $obj=new chkchange($name,$p1,$p2); 
 $obj->changepwd() 
?>