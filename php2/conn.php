
<?php

    $conn=mysqli_connect("localhost","root","rootroot","psr_2303") or die("数据库服务器连接错误".mysqli_error());//连接到MySQL服务器
    mysqli_query($conn,"set names gb2312");//设置编码格式
?>