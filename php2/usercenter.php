<?PHP
session_start();
header("content-type:text/html;charset=gb2312");
include("conn.php");
//�ж��û��Ƿ��¼
if($_SESSION[username]==""){
	echo "<script>alert('���¼');window.location.href=('login.php');</script>";
}
?>

<!doctype html>
<html >
<head>
<title>�û�����</title>
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
          <h2>�ʼ�ժ��</h2> 
        </header>
<!--        �Զ���ģ��-->
       <section id="relo">
		  <div class="bg1">
		   
<!--			�û�����-->
			  <form id="form" name="form" method="post" action="savelea.php">
  <table  class="use1" width="60%" border="1" align="center">
    <tbody >
      <tr>
        <td width="100" align="right" >���⣺<span style="text-align: right"></span></td>
        <td align="left"><p>
          <input type="text" name="title" id="textfield">
        </p></td>
      </tr>
      <tr>
        <td width="100" align="right" >����ժ����<span style="text-align: right"></span></td>
        <td align="left"><textarea name="content" cols="45" rows="5" id="textarea"></textarea></td>
      </tr>
	  <tr>
        <td width="100" align="right" >�����뷨��<span style="text-align: right"></span></td>
        <td align="left"><textarea name="user_con" cols="45" rows="5" id="textarea"></textarea></td>
      </tr>
	  <tr>
	    <td width="100" align="right" >�鼮���ƣ�<span style="text-align: right"></span></td>
	    <td align="left"><p>
	      <input type="text" name="bookname" id="textfield">
	    </p></td>
      </tr>
      <tr>
        <td width="100" align="right">���ߣ�</td>
        <td align="left"><input type="text" name="author" id="textfield"></td>
      </tr>
      <tr>
        <td width="100" align="right"> ISBN�� </td>
        <td align="left"><input type="text" name="isbn" id="textfield"></td>
      </tr>
      <tr>
        <td width="100" align="right">�����磺</td>
        <td align="left"><input type="text" name="press" id="textfield"></td>
      </tr>
      <tr>
        <td width="100" align="right">�������£�</td>
        <td align="left"><input type="text" name="press_time" id="textfield"></td>
      </tr>
<!--
		<tr>
        <td align="right">ҳ�룺</td>
        <td align="left"><input type="text" name="pages" ></td>
      </tr>
-->
      <tr>
        <td width="100" align="right"><input type="submit" name="submit" id="submit" value="�ύ"></td>
        <td align="left"><input type="reset" name="reset2" id="reset2" value="����"></td>
      </tr>
    </tbody>
  </table>
</form>
			 </div>
         </section>
        
      </section>
    </section>
  <section id="sidebar">
<!--		ϲ��������-->
      
      <h2>�û�����</h2>
      <div class="sb-c">
        <ul>
		<li class="fanse"><a href="usercenter.php">�ʼ�ժ��</a></li>
			<li><a href="mycenter.php">����ժ��</a></li>
          <li><a href="updmes.php">�޸��û���Ϣ</a></li>
          <li><a href="uppwd.php">�޸��û�����</a></li>
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
