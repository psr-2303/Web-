<?PHP
session_start();
header("content-type:text/html;charset=gb2312");
include("conn.php");
?>

<!doctype html>
<html>
<head>
<title>��¼</title>
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
      <li class="active"><a href="login.php">��¼</a></li>
      <li><a href="usercenter.php">�û�����</a></li>
      <li><a href="of.php">��վ���</a></li>
    </ul>
  </nav>
  <div id="maincontent">
    <section id="leftcontent" class="normalpage">
      <section id="leftcontents">
        <header id="mainheading">
          <h2>��¼</h2>
        </header>
<!--        �Զ���ģ��-->
       <section id="relo">
		  <div class="bg1">
			  <?PHP
		   if ( $_SESSION[ username ] != "" ) {
  echo "<script>alert('��¼״̬��');</script>";}
			   ?>

<!--			��¼-->
			  <form id="form" name="form"  method="post" action="juage01.php">
  <table align="center" >
    <tbody>
      <tr>
        <td width="35%" align="right"><p>�û�����</p></td>
        <td width="65%"><input type="text" name="username" id="username"></td>
      </tr>
<!--	<div class="line"></div>-->
      <tr>
        <td  align="right">���룺</td>
        <td><input type="text" name="pwd" id="pwd"></td>
      </tr>
<!--		<div class="line"></div>-->
      <tr>
        <td height="15" align="right"><input type="submit" name="submit2" id="submit2"  value="�ύ" ></td>
        <td align="left"><input type="reset" name="reset2" id="reset2" value="����"></td>
      </tr>
    </tbody>
  </table>
		   </div>
		  </section>
            
         
        
      </section>
    </section>
  <section id="sidebar">
<!--		ϲ��������-->
      <h2>��¼����</h2>
      <div class="sb-c">
        <p class="testimonial"> ��ν���򣬾�������ڵĻ�Ұ�Ͽ��ٳ�һ����ǰ���Ĺ�������� <span>��ľ������ ��JOJO������ð�ա�</span> </p>
      </div>
      <h2>վ���Ƽ�</h2>
      <div class="sb-c">
        <ul>
          <li><a href="#">ë��ѡ����1~4��</a></li>
          <li><a href="#">��Ĺ���о�</a></li>
          <li><a href="#">��ѧ֮��</a></li>
          <li><a href="#">����ɽ����</a></li>
          <li><a href="#">˼����������</a></li>
		  <li><a href="#">���޿ֲ�</a></li>
          <li><a href="#">��һ�������</a></li>
		  <li><a href="#">����Ħ�г�ά������</a></li>
          <li><a href="#">���¸���ļ���ͬһ�����</a></li>
		  <li><a href="#">����3������֮��</a></li>
		  <li><a href="#">ѩ�к�����</a></li>
		  <li><a href="#">�޽��ɰ�</a></li>
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
