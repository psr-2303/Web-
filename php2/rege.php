<?PHP
session_start();
header("content-type:text/html;charset=gb2312");
include("conn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>注册登录</title>
</head>
	<link rel="stylesheet" type="text/css" href="css/rege01.css" />
<script type="text/javascript">
	
	
	function getWalup(){
		alert("邀请码是psr_2303");
	}
	function check(){
		var username = document.getElementById("username").value;
		var pwd = document.getElementById("pwd1").value;
		if(pwd == ""){
			alert("密码不能为空");
			return false;
			}
			if(pwd.length < 6){
				alert("密码的长度太短，应大于6");
				return false;
				}
			if(pwd.length > 12){
				alert("密码的长度太长，应该小于12");
				return false;
				}
			var pwd2  = document.getElementById("pwd1").value;
			if(pwd != pwd2){
				alert("两次输入的密码不一样，请重新输入");
				return false;
				}
			var walup =document.getElementById("walup").value;
			if(walup !="psr_2303"){
				alert("邀请码填写错误，请点击获取邀请码");
				return	false;
			}
			return true;
		}
	
	</script>
<!doctype html>
<html lang="en-US">
<head>
<title>注册</title>
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
    <h1>书屋 <span>PSR</span></h1>
  </header>
  </header>
  <nav id="topnav">
    <ul>
      <li ><a href="index.php">首页</a></li>
      <li class="active"><a href="rege.php">注册</a></li>
      <li ><a href="login.php">登录</a></li>
      <li><a href="usercenter.php">用户中心</a></li>
      <li><a href="of.php">网站相关</a></li>
    </ul>
  </nav>
  <div id="maincontent">
    <section id="leftcontent" class="normalpage">
      <section id="leftcontents">
        <header id="mainheading">
          <h2>注册</h2>
        </header>
<!--   自定义模块     -->
            <section id="relo">
		 
		  <div class="bg1">
				<form id="form1"  name="form1" method="post" action="savereg01.php">
				  <table width="296" >
				    <tbody>
				      <tr>
				        <td width="116" align="right"><p>用户名：</p></td>
				        <td width="164"><input type="text" name="username" id="username"></td>
			          </tr>
				      <tr>
				        <td align="right">密码：</td>
				        <td><input type="text" name="pwd" id="pwd"></td>
			          </tr>
				      <tr>
				        <td align="right">确认密码：</td>
				        <td><input type="text" name="pwd1" id="pwd1"></td>
			          </tr>
				      <tr>
				        <td align="right">邮箱：</td>
				        <td><input type="text" name="email" id="email"></td>
			          </tr>
				      <tr>
				        <td align="right" valign="baseline">邀请码：</td>
				        <td valign="baseline"><p>
				          <input type="text" name="walup" id="walup">
				          </p>
				          <p>还没有邀请码？
				            <input type="button" value="点击此处获取" onClick="getWalup()">
			              </p></td>
			          </tr>
				      <tr>
				        <td align="right"><input type="submit" name="submit" id="submit" 
				onClick="check()" value="提交"></td>
				        <td align="left"><input type="reset" name="reset" id="reset" value="重置"></td>
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
