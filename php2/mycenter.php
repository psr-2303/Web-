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
<html>
<head>
<title>�û�����-���˱ʼ�</title>
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
          <h2>����ժ��
            <?php  echo $_SESSION['username'];?>
          </h2>
        </header>
        <!--        �Զ���ģ��-->
        <section id="relo">
        <div class="bg2"> 
          
          <!--			�û�����-->
          
          <div id="contentwrap"> 
            <!--		����PHP���-->
            <?php
		session_start();
		header("content-type:text/html,chartset:gb2312");
	#���ӷ�����
		include("conn.php");
		
				
		$sql1=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");
		$info1=mysqli_fetch_array($sql1);
		$userid=$info1['id'];
		$sql3=mysqli_query($conn,"select count(*) as count from tb_leave where userid='".$userid."'"); #ѡȡ��ID�µ�ժ��
		$info2=mysqli_fetch_array($sql3);
		$pagen=5;//ҳ��ÿҳ5
		$count=$info2['count'];//��ȡ����ֵ
		if($count==0)
	   {
	     echo " ";
		
	   }
	   else
		  {
		   
		   $k=ceil($count/$pagen);//ҳ������������ȡ��������ceil
		   $page=isset($_GET['page'])?$k:1;//�ж�ҳ���ڲ��ڣ������趨Ϊ1
//		   if($page==0) {
//			   echo "δ��ȡҳ��";
//		   }else{
//			   echo "ҳ��Ϊ$page";
//		   }
		   
		   $offset=($page-1)*$pagen; //���ȣ���pageĬ��Ϊ1������±�0��ʼ�趨
		   $sql4=mysqli_query($conn,"select * from tb_leave where userid='".$userid."' limit $offset,$pagen"); 
		   $info=mysqli_fetch_array($sql4);
		   $next=($page==$k)?0:($page+1);#��һҳ
		   
		   //βҳ��Ϊk
		   
		   
		    
	   }
		
		if($info==false){#�޼�¼
			echo "ʩ���У���ӭ�ڴ�<a href='usercenter.php'>��ӱʼ�</a>Ϊ�������ṩ��˼·";
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
			  
			  <td align="center" valign="middle">������
		  		��<?php  echo $info['bookname'];?>��</td>
				<td align="center" valign="middle">���ߣ�
		  		<?php  echo $info['author'];?></td>
      			
			  <br>
      <td align="center" valign="middle"> ISBN:
		  <?php  echo $info['isbn'];?></td>
			  <br>
      <td align="center" valign="middle"> �����磺
		  <?php  echo $info['press'];?></td>
      <td align="center" valign="middle">�������£�
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
				<a href="mycenter.php?page={$next}">��ҳ &raquo;</a><span class="extend">...</span><a href="mycenter.php?page={$k}">βҳ &raquo;</a></div>
			<?php }?>
            
			
          </section>
          
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
          <li class="fanse"><a href="mycenter.php">����ժ��</a></li>
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
