<?PHP
session_start();
header( "content-type:text/html;charset=gb2312" );
include( "conn.php" );
//�ж��û��Ƿ��¼
if ( $_SESSION[ username ] == "" ) {
  echo "<script>alert('���¼');window.location.href('login.php');</script>";
}
?>

<!doctype html>
<html >
<head>
<title>�û�����-�޸��û���Ϣ</title>
<meta charset="gb2312" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]>
<script type="text/ecmascript" src="js/html5.js"></script>
<![endif]-->
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="wrap">
  <header id="mainheader">
    <header id="mainheader">
      <h1>���� <span>PSR</span></h1>
    </header>
  </header>
  <nav id="topnav">
    <ul>
      <li ><a href="index.php">��ҳ</a></li>
      <li><a href="rege.php">ע��</a></li>
      <li ><a href="login.php">��¼</a></li>
      <li class="active"><a href="usercenter.php">�û�����</a></li>
      <li><a href="of.php">��վ���</a></li>
    </ul>
  </nav>
  <div id="maincontent">
    <section id="leftcontent" class="normalpage">
      <section id="leftcontents">
        <header id="mainheading"> 
          <!--			�˴��ʼ�ժ��-->
          <h2>�޸��û���Ϣ
            <?php  echo $_SESSION['username'];?>
          </h2>
        </header>
        <!--        �Զ���ģ��-->
        <section id="relo">
        <div class="bg1"> 
          
          <!--			�û�����-->
          
          
          <form id="form1" name="form1" method="post" action="saveupmes.php">
			  <?php
			  $id=$_SESSION['select @@IDENTITY'];
		include('conn.php');
		$sql=mysqli_query($conn,"select * from tb_user where name='$id'");
		$info=mysqli_fetch_array($sql);
			  ?>
            <table width="80%" border="0">
              <tbody>
<!--				  ����-->
<!--
				  <tr>
                  <td align="right">�û�id��</td>
                  <td align="left"><div></div></td>
                </tr>
-->
                <tr>
                  <td align="right">�û�����</td>
                  <td align="left"><div><?php echo $_SESSION['username'];?></div></td>
                </tr>
                <tr>
                  <td align="right">���䣺</td>
                  <td align="left"><input type="text" name="email" id="textfield2"></td>
                </tr>
                <tr>
                  <td align="right"><input type="submit" name="submit" id="submit" value="�ύ"></td>
                  <td align="left"><input type="reset" name="reset" id="reset" value="����"></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </section>
    </section>
    </section>
    </section>
    <section id="sidebar"> 
      <!--		ϲ��������-->
      
      <h2>�û�����</h2>
      <div class="sb-c">
        <ul>
          <li ><a href="usercenter.php">�ʼ�ժ��</a></li>
          <li ><a href="mycenter.php">����ժ��</a></li>
          <li class="fanse"><a href="updmes.php">�޸��û���Ϣ</a></li>
          <li> <a href="uppwd.php">�޸��û�����</a></li>
			<li><a href="exit.php">�˳���¼</a></li>
        </ul>
        </ul>
      </div>
    </section>
    <div class="clear"></div>
  </div>
</div>
<footer> <p>2021 &copy; PSR����| 20120300746 �����</p>
</footer>
<!-- END PAGE SOURCE -->
</body>
</html>
