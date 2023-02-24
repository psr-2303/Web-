<?PHP
session_start();
header("content-type:text/html;charset=gb2312");
include("conn.php");
?>

<!doctype html>
<html>
<head>
<title>登录</title>
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
      <li class="active"><a href="login.php">登录</a></li>
      <li><a href="usercenter.php">用户中心</a></li>
      <li><a href="of.php">网站相关</a></li>
    </ul>
  </nav>
  <div id="maincontent">
    <section id="leftcontent" class="normalpage">
      <section id="leftcontents">
        <header id="mainheading">
          <h2>登录</h2>
        </header>
<!--        自定义模块-->
       <section id="relo">
		  <div class="bg1">
			  <?PHP
		   if ( $_SESSION[ username ] != "" ) {
  echo "<script>alert('登录状态下');</script>";}
			   ?>

<!--			登录-->
			  <form id="form" name="form"  method="post" action="juage01.php">
  <table align="center" >
    <tbody>
      <tr>
        <td width="35%" align="right"><p>用户名：</p></td>
        <td width="65%"><input type="text" name="username" id="username"></td>
      </tr>
<!--	<div class="line"></div>-->
      <tr>
        <td  align="right">密码：</td>
        <td><input type="text" name="pwd" id="pwd"></td>
      </tr>
<!--		<div class="line"></div>-->
      <tr>
        <td height="15" align="right"><input type="submit" name="submit2" id="submit2"  value="提交" ></td>
        <td align="left"><input type="reset" name="reset2" id="reset2" value="重置"></td>
      </tr>
    </tbody>
  </table>
		   </div>
		  </section>
            
         
        
      </section>
    </section>
  <section id="sidebar">
<!--		喜欢的作者-->
      <h2>语录分享</h2>
      <div class="sb-c">
        <p class="testimonial"> 所谓觉悟，就是在漆黑的荒野上开辟出一条理当前进的光明大道。 <span>荒木飞吕彦 《JOJO的奇妙冒险》</span> </p>
      </div>
      <h2>站长推荐</h2>
      <div class="sb-c">
        <ul>
          <li><a href="#">毛泽东选集（1~4卷）</a></li>
          <li><a href="#">古墓局中局</a></li>
          <li><a href="#">数学之美</a></li>
          <li><a href="#">基督山伯爵</a></li>
          <li><a href="#">思考，快与慢</a></li>
		  <li><a href="#">无限恐怖</a></li>
          <li><a href="#">从一到无穷大</a></li>
		  <li><a href="#">禅与摩托车维修艺术</a></li>
          <li><a href="#">海德格尔文集：同一与差异</a></li>
		  <li><a href="#">龙族3：黑月之潮</a></li>
		  <li><a href="#">雪中悍刀行</a></li>
		  <li><a href="#">罗杰疑案</a></li>
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
