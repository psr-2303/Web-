<!doctype html>
<html>
<head>
<title>��ҳ</title>
<meta charset="gb2312" />
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<!--	test-->
	
<div id="wrap">
<!--	ͷ��-->
  <header id="mainheader">
    <h1>���� <span>PSR</span></h1>
    <p class="description">��ӭ����PSR����</p>
  </header>
<!--	����-->
  <nav id="topnav">
    <ul>
      <li class="active"><a href="index.php">��ҳ</a></li>
      <li><a href="rege.php">ע��</a></li>
      <li ><a href="login.php">��¼</a></li>
      <li><a href="usercenter.php">�û�����</a></li>
      <li><a href="of.php">��վ���</a></li>
		
    </ul>
  </nav>
<!--	����-->
  <div id="maincontent">
    <section id="leftcontent">
<!--	��վ��ӭ��	-->
      <header id="pageheader">
        <h1>PSR����  ���㣺</h1>
        <h2 id="introduction"> <span>��ӭ ���ˣ�</span>��ӭ̽������վ��ϣ������Ϊ���ṩ����Ҫ����Ϣ��
			<p>�������˻���ģ�������߸���Ȥ��ǰ����վ��ؽ��档�ڴ˸�лRoshan����~</p>
<!--			<p>��վ��ؽ���</p>-->
			<p>�Ը���վ�����н������ϵվ����</p></h2>
      </header>
		
		<section id="leftcontents">
        <header id="mainheading">
          <h2>�ʼ�ժ��</h2>
        </header>
			<div id="contentwrap">
          
			<!--		��ʾ���԰�-->
		<!--		����PHP���-->
			<?php
		session_start();
		header("content-type:text/html,chartset:gb2312");
	#���ӷ�����
		$conn=mysqli_connect("localhost","root","rootroot","psr_2303") or die("���ݿ���������Ӵ���".mysqli_error());//���ӵ�MySQL������
    	mysqli_query($conn,"set names gb2312");//���ñ����ʽ
		#��ʾ���ݿ�ļ�¼
//					ҳ��	
//		$sql2=mysqli_query($conn,"select * from tb_leave order by time desc limit 0,5");#���ӵķ�����+���ݿ⣬��ѯ��䣨��ȡ�� desc�������ʱ��
//		$info=mysqli_fetch_array($sql2);#assoc()
		
				
		$sql3=mysqli_query($conn,"select count(*) as count from tb_leave"); //���ؼ������
		$info1=mysqli_fetch_array($sql3);
		$pagen=5;//ҳ��ÿҳ5
		$count=$info1['count'];//��ȡ����ֵ
		if($count==0)
	   {
	     echo "ʩ���У���ӭ�ڴ���ӱʼ�Ϊ�������ṩ��˼·";
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
		   $sql4=mysqli_query($conn,"select * from tb_leave order by time desc limit $offset,$pagen"); 
		   $info=mysqli_fetch_array($sql4);
		   $next=($page==$k)?0:($page+1);#��һҳ
		   
		   //βҳ��Ϊk
		   
		   
		    
	   }
		
		if($info==false){#�޼�¼
			echo "��վ���޼�¼";
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

<!--		class="current" ѡ�и�ҳcss<h3></h3>-->
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
			<a href="index.php?page=<?php echo $next;?>">��ҳ &raquo;</a><span class="extend">...</span><a href="index.php?page={$k}">βҳ &raquo;</a></div>
		</div>
      </section>
    </section>
	
    <section id="sidebar">
<!--		ϲ��������-->
      <h2>������¼</h2>
      <div class="sb-c">
        <p class="testimonial"> ��ν���򣬾�������ڵĻ�Ұ�Ͽ��ٳ�һ����ǰ���Ĺ�������� <span>��ľ������ ��JOJO������ð�ա�</span></p>
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
      </div>
    </section>
    <div class="clear"></div>
  </div>
</div>

<footer>
  <p>2021 &copy; PSR����| 20120300746 �����</p>
</footer>
<!-- END PAGE SOURCE -->
</body>
</html>
