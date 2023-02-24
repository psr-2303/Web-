<?PHP
session_start();
header("content-type:text/html;charset=gb2312");
include("conn.php");
//判定用户是否登录
if($_SESSION[username]==""){
	echo "<script>alert('请登录');window.location.href=('login.php');</script>";
}
?>

<!doctype html>
<html >
<head>
<title>用户中心</title>
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
    <h1>书屋 <span>PSR</span></h1>
  </header>
  </header>
  <nav id="topnav">
    <ul>
      <li ><a href="index.php">首页</a></li>
      <li><a href="rege.php">注册</a></li>
      <li ><a href="login.php">登录</a></li>
      <li class="active"><a href="usercenter.php">用户中心</a></li>
      <li><a href="of.php">网站相关</a></li>
		
    </ul>
  </nav>
  <div id="maincontent">
    <section id="leftcontent" class="normalpage">
      <section id="leftcontents">
        <header id="mainheading">
<!--			此处笔记摘抄-->
          <h2>笔记摘抄</h2> 
        </header>
<!--        自定义模块-->
       <section id="relo">
		  <div class="bg1">
		   
<!--			用户中心-->
			  <form id="form" name="form" method="post" action="savelea.php">
  <table  class="use1" width="60%" border="1" align="center">
    <tbody >
      <tr>
        <td width="100" align="right" >标题：<span style="text-align: right"></span></td>
        <td align="left"><p>
          <input type="text" name="title" id="textfield">
        </p></td>
      </tr>
      <tr>
        <td width="100" align="right" >内容摘抄：<span style="text-align: right"></span></td>
        <td align="left"><textarea name="content" cols="45" rows="5" id="textarea"></textarea></td>
      </tr>
	  <tr>
        <td width="100" align="right" >留言想法：<span style="text-align: right"></span></td>
        <td align="left"><textarea name="user_con" cols="45" rows="5" id="textarea"></textarea></td>
      </tr>
	  <tr>
	    <td width="100" align="right" >书籍名称：<span style="text-align: right"></span></td>
	    <td align="left"><p>
	      <input type="text" name="bookname" id="textfield">
	    </p></td>
      </tr>
      <tr>
        <td width="100" align="right">作者：</td>
        <td align="left"><input type="text" name="author" id="textfield"></td>
      </tr>
      <tr>
        <td width="100" align="right"> ISBN： </td>
        <td align="left"><input type="text" name="isbn" id="textfield"></td>
      </tr>
      <tr>
        <td width="100" align="right">出版社：</td>
        <td align="left"><input type="text" name="press" id="textfield"></td>
      </tr>
      <tr>
        <td width="100" align="right">出版年月：</td>
        <td align="left"><input type="text" name="press_time" id="textfield"></td>
      </tr>
<!--
		<tr>
        <td align="right">页码：</td>
        <td align="left"><input type="text" name="pages" ></td>
      </tr>
-->
      <tr>
        <td width="100" align="right"><input type="submit" name="submit" id="submit" value="提交"></td>
        <td align="left"><input type="reset" name="reset2" id="reset2" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>
			 </div>
         </section>
        
      </section>
    </section>
  <section id="sidebar">
<!--		喜欢的作者-->
      
      <h2>用户中心</h2>
      <div class="sb-c">
        <ul>
		<li class="fanse"><a href="usercenter.php">笔记摘抄</a></li>
			<li><a href="mycenter.php">个人摘抄</a></li>
          <li><a href="updmes.php">修改用户信息</a></li>
          <li><a href="uppwd.php">修改用户密码</a></li>
			<li><a href="exit.php">退出登录</a></li>
        </ul>
        </ul>
      </div>
    </section>
    <div class="clear"></div>
  </div>
</div>

<footer> <p>2021 &copy; PSR书屋| 20120300746 彭燕君</p>
</footer>
<!-- END PAGE SOURCE -->
</body>
</html>
