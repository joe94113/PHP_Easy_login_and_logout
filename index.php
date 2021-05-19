<?php 
header('Content-type:text/html; charset=utf-8');
// 開啟Session
session_start();
 
// 首先判斷Cookie是否有記住了使用者資訊
if (isset($_COOKIE['username'])) {
# 若記住了使用者資訊,則直接傳給Session
$_SESSION['username'] = $_COOKIE['username'];
$_SESSION['islogin'] = 1;
}
if (isset($_SESSION['islogin'])) {
// 若已經登入
echo "你好! ".$_SESSION['username'].' ,歡迎來到個人中心!<br>';
echo "<a href='logout.php'>登出</a>";
} else {
// 若沒有登入
echo "您還沒有登入,請<a href='login.html'>登入</a>";
}
 ?>