<!doctype html>
<html>
<head>
<title>首页</title>
<meta charset="gb2312" />
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<!--	test-->
	
<div id="wrap">
<!--	头部-->
  <header id="mainheader">
    <h1>书屋 <span>PSR</span></h1>
    <p class="description">欢迎来到PSR基地</p>
  </header>
<!--	导航-->
  <nav id="topnav">
    <ul>
      <li class="active"><a href="index.php">首页</a></li>
      <li><a href="rege.php">注册</a></li>
      <li ><a href="login.php">登录</a></li>
      <li><a href="usercenter.php">用户中心</a></li>
      <li><a href="of.php">网站相关</a></li>
		
    </ul>
  </nav>
<!--	内容-->
  <div id="maincontent">
    <section id="leftcontent">
<!--	网站欢迎词	-->
      <header id="pageheader">
        <h1>PSR书屋  致你：</h1>
        <h2 id="introduction"> <span>欢迎 到此，</span>欢迎探索该网站，希望它能为你提供你想要的信息。
			<p>对制作此基础模板的设计者感兴趣可前往网站相关界面。在此感谢Roshan大佬~</p>
<!--			<p>网站相关界面</p>-->
			<p>对该网站功能有建议可联系站主。</p></h2>
      </header>
		
		<section id="leftcontents">
        <header id="mainheading">
          <h2>笔记摘抄</h2>
        </header>
			<div id="contentwrap">
          
			<!--		显示留言板-->
		<!--		键入PHP语句-->
			<?php
		session_start();
		header("content-type:text/html,chartset:gb2312");
	#连接服务器
		$conn=mysqli_connect("localhost","root","rootroot","psr_2303") or die("数据库服务器连接错误".mysqli_error());//连接到MySQL服务器
    	mysqli_query($conn,"set names gb2312");//设置编码格式
		#显示数据库的记录
//					页码	
//		$sql2=mysqli_query($conn,"select * from tb_leave order by time desc limit 0,5");#连接的服务器+数据库，查询语句（读取） desc降序根据时间
//		$info=mysqli_fetch_array($sql2);#assoc()
		
				
		$sql3=mysqli_query($conn,"select count(*) as count from tb_leave"); //返回计数结果
		$info1=mysqli_fetch_array($sql3);
		$pagen=5;//页码每页5
		$count=$info1['count'];//获取计数值
		if($count==0)
	   {
	     echo "施工中，欢迎在此添加笔记为更多人提供新思路";
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
		   $sql4=mysqli_query($conn,"select * from tb_leave order by time desc limit $offset,$pagen"); 
		   $info=mysqli_fetch_array($sql4);
		   $next=($page==$k)?0:($page+1);#下一页
		   
		   //尾页则为k
		   
		   
		    
	   }
		
		if($info==false){#无记录
			echo "本站暂无记录";
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

<!--		class="current" 选中该页css<h3></h3>-->
		<div class="wp-pagenavi"> <a href="index.php">1</a>
			
			<?php
		   if($count>$pagen){
		    for($i=2;$i<=$k;$i++){
		  ?>
        <a href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
//			   
		   for($i=2;$i<=8;$i++){	 
		  ?>
        <a href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
			<?php }?>
			<a href="index.php?page=<?php echo $next;?>">下页 &raquo;</a><span class="extend">...</span><a href="index.php?page={$k}">尾页 &raquo;</a></div>
		</div>
      </section>
    </section>
	
    <section id="sidebar">
<!--		喜欢的作者-->
      <h2>经典语录</h2>
      <div class="sb-c">
        <p class="testimonial"> 所谓觉悟，就是在漆黑的荒野上开辟出一条理当前进的光明大道。 <span>荒木飞吕彦 《JOJO的奇妙冒险》</span></p>
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
      </div>
    </section>
    <div class="clear"></div>
  </div>
</div>

<footer>
  <p>2021 &copy; PSR书屋| 20120300746 彭燕君</p>
</footer>
<!-- END PAGE SOURCE -->
</body>
</html>
