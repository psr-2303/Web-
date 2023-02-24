<?PHP
session_start();
header( "content-type:text/html;charset=gb2312" );
include( "conn.php" );
//判定用户是否登录
if ( $_SESSION[username] == "" ) {
  echo "<script>alert('请登录');window.location.href('login.php');</script>";
}
?>

<!doctype html>
<html >
<head>
<title>用户中心-修改用户密码</title>
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
          <h2>修改用户密码
            <?php  echo $_SESSION['username'];?>
          </h2>
        </header>
        <!--        自定义模块-->
        <section id="relo">
        <div class="bg1"> 
          
          <!--			用户中心-->
          
          
          <form id="form1" name="form1" method="post" action="saveuppwd.php" onSubmit="return chkinput1(this)">
            <table width="80%" border="0">
              <tbody>
				  
                <tr>
                  <td align="right">旧密码：</td>
                  <td align="left"><input type="password" name="p1" id="textfield"></td>
                </tr>
                <tr>
                  <td align="right">新密码：</td>
                  <td align="left"><input type="password" name="p2" id="textfield2"></td>
                </tr>
                <tr>
                  <td align="right">确认新密码：</td>
                  <td align="left"><input type="password" name="p3" id="textfield3"></td>
                </tr>
                <tr>
                  <td align="right"><input type="submit" name="submit" id="submit" value="提交"></td>
                  <td align="left"><input type="reset" name="reset" id="reset" value="重置"></td>
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
      <!--		喜欢的作者-->
      
      <h2>用户中心</h2>
      <div class="sb-c">
        <ul>
          <li ><a href="usercenter.php">笔记摘抄</a></li>
          <li ><a href="mycenter.php">个人摘抄</a></li>
          <li ><a href="updmes.php">修改用户信息</a></li>
          <li class="fanse"> <a href="uppwd.php">修改用户密码</a></li>
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
