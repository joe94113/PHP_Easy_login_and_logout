<?php 
header('Content-type:text/html; charset=utf-8');
// 登出後的操作
session_start();
// 清除Session
$username = $_SESSION['username'];  //用於後面的提示資訊
$_SESSION = array();
session_destroy();
 
// 清除Cookie
setcookie('username', '', time()-99);
setcookie('code', '', time()-99);
 
// 提示資訊
echo "歡迎下次光臨, ".$username.'<br>';
echo "<a href='login.html'>重新登入</a>";
 
 ?>