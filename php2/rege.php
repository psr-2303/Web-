<?PHP
session_start();
header("content-type:text/html;charset=gb2312");
include("conn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>ע���¼</title>
</head>
	<link rel="stylesheet" type="text/css" href="css/rege01.css" />
<script type="text/javascript">
	
	
	function getWalup(){
		alert("��������psr_2303");
	}
	function check(){
		var username = document.getElementById("username").value;
		var pwd = document.getElementById("pwd1").value;
		if(pwd == ""){
			alert("���벻��Ϊ��");
			return false;
			}
			if(pwd.length < 6){
				alert("����ĳ���̫�̣�Ӧ����6");
				return false;
				}
			if(pwd.length > 12){
				alert("����ĳ���̫����Ӧ��С��12");
				return false;
				}
			var pwd2  = document.getElementById("pwd1").value;
			if(pwd != pwd2){
				alert("������������벻һ��������������");
				return false;
				}
			var walup =document.getElementById("walup").value;
			if(walup !="psr_2303"){
				alert("��������д����������ȡ������");
				return	false;
			}
			return true;
		}
	
	</script>
<!doctype html>
<html lang="en-US">
<head>
<title>ע��</title>
<meta charset="UTF-8" />
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
      <li class="active"><a href="rege.php">ע��</a></li>
      <li ><a href="login.php">��¼</a></li>
      <li><a href="usercenter.php">�û�����</a></li>
      <li><a href="of.php">��վ���</a></li>
    </ul>
  </nav>
  <div id="maincontent">
    <section id="leftcontent" class="normalpage">
      <section id="leftcontents">
        <header id="mainheading">
          <h2>ע��</h2>
        </header>
<!--   �Զ���ģ��     -->
            <section id="relo">
		 
		  <div class="bg1">
				<form id="form1"  name="form1" method="post" action="savereg01.php">
				  <table width="296" >
				    <tbody>
				      <tr>
				        <td width="116" align="right"><p>�û�����</p></td>
				        <td width="164"><input type="text" name="username" id="username"></td>
			          </tr>
				      <tr>
				        <td align="right">���룺</td>
				        <td><input type="text" name="pwd" id="pwd"></td>
			          </tr>
				      <tr>
				        <td align="right">ȷ�����룺</td>
				        <td><input type="text" name="pwd1" id="pwd1"></td>
			          </tr>
				      <tr>
				        <td align="right">���䣺</td>
				        <td><input type="text" name="email" id="email"></td>
			          </tr>
				      <tr>
				        <td align="right" valign="baseline">�����룺</td>
				        <td valign="baseline"><p>
				          <input type="text" name="walup" id="walup">
				          </p>
				          <p>��û�������룿
				            <input type="button" value="����˴���ȡ" onClick="getWalup()">
			              </p></td>
			          </tr>
				      <tr>
				        <td align="right"><input type="submit" name="submit" id="submit" 
				onClick="check()" value="�ύ"></td>
				        <td align="left"><input type="reset" name="reset" id="reset" value="����"></td>
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
