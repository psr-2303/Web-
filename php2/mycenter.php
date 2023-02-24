<?PHP
session_start();
header( "content-type:text/html;charset=gb2312" );
include( "conn.php" );
//判定用户是否登录
if ( $_SESSION[ username ] == "" ) {
  echo "<script>alert('请登录');window.location.href('login.php');</script>";
}
?>

<!doctype html>
<html>
<head>
<title>用户中心-个人笔记</title>
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
          <h2>个人摘抄
            <?php  echo $_SESSION['username'];?>
          </h2>
        </header>
        <!--        自定义模块-->
        <section id="relo">
        <div class="bg2"> 
          
          <!--			用户中心-->
          
          <div id="contentwrap"> 
            <!--		键入PHP语句-->
            <?php
		session_start();
		header("content-type:text/html,chartset:gb2312");
	#连接服务器
		include("conn.php");
		
				
		$sql1=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");
		$info1=mysqli_fetch_array($sql1);
		$userid=$info1['id'];
		$sql3=mysqli_query($conn,"select count(*) as count from tb_leave where userid='".$userid."'"); #选取该ID下的摘抄
		$info2=mysqli_fetch_array($sql3);
		$pagen=5;//页码每页5
		$count=$info2['count'];//获取计数值
		if($count==0)
	   {
	     echo " ";
		
	   }
	   else
		  {
		   
		   $k=ceil($count/$pagen);//页码总数，向上取整函数，ceil
		   $page=isset($_GET['page'])?$k:1;//判断页数在不在，不在设定为1
//		   if($page==0) {
//			   echo "未获取页码";
//		   }else{
//			   echo "页码为$page";
//		   }
		   
		   $offset=($page-1)*$pagen; //长度，因page默认为1，需从下标0开始设定
		   $sql4=mysqli_query($conn,"select * from tb_leave where userid='".$userid."' limit $offset,$pagen"); 
		   $info=mysqli_fetch_array($sql4);
		   $next=($page==$k)?0:($page+1);#下一页
		   
		   //尾页则为k
		   
		   
		    
	   }
		
		if($info==false){#无记录
			echo "施工中，欢迎在此<a href='usercenter.php'>添加笔记</a>为更多人提供新思路";
		}else{
			do{
				?>

      
		
        <section class="postinfo">
            <p class="postdata postdate">
              <?php  echo $info['time'];?></time>
            </p>
            <P class="postdata"> <?php echo $info['username']; ?></P>
          </section>
          <article class="postpre">
            <header>
              <h3><?php  echo $info['title'];?></h3>  
            </header>
            <p class="testimonial"> <?php  echo $info['content'];?></p>
			  <br>
			  <p style="text-indent:25px"><?php  echo $info['user_con'];?></p>
			  <br>
			  
			  <td align="center" valign="middle">书名：
		  		《<?php  echo $info['bookname'];?>》</td>
				<td align="center" valign="middle">作者：
		  		<?php  echo $info['author'];?></td>
      			
			  <br>
      <td align="center" valign="middle"> ISBN:
		  <?php  echo $info['isbn'];?></td>
			  <br>
      <td align="center" valign="middle"> 出版社：
		  <?php  echo $info['press'];?></td>
      <td align="center" valign="middle">出版年月：
		  <?php  echo $info['press_time'];?></td>
          </article>
          <div class="postbtm"></div>
		<?php
			}       
		while($info=mysqli_fetch_array($sql4));
		}  
	?>

			<?php
		  
		   if($count>=1){
		   
		  ?>
			<div class="wp-pagenavi">
			<a href="mycenter.php">1</a>
				<?php
		   }
				if($count>=2){
		   
		  ?>
			<a href="mycenter.php?page={$next};?>">2</a>
			
		<?php
		   }
		   if($k>=2){
		    for($i=1;$i<=$pagecount;$i++){
				
		  ?>
			 <a href="mycenter.php?page={$i};?>
            "><?php echo $i;?></a>
			
            <?php }?>
				<a href="mycenter.php?page={$next}">下页 &raquo;</a><span class="extend">...</span><a href="mycenter.php?page={$k}">尾页 &raquo;</a></div>
			<?php }?>
            
			
          </section>
          
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
          <li class="fanse"><a href="mycenter.php">个人摘抄</a></li>
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
