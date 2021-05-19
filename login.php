<?php 
header('Content-type:text/html; charset=utf-8');
// 開啟Session
session_start();
 
// 處理使用者登入資訊
if (isset($_POST['login'])) {
# 接收使用者的登入資訊
$username = trim($_POST['username']);
$password = trim($_POST['password']);
// 判斷提交的登入資訊
if (($username == '') || ($password == '')) {
// 若為空,視為未填寫,提示錯誤,並3秒後返回登入介面
header('refresh:3; url=login.html');
echo "使用者名稱或密碼不能為空,系統將在3秒後跳轉到登入介面,請重新填寫登入資訊!";
exit;
} elseif (($username != 'joe') || ($password != 'joe123')) {
# 使用者名稱或密碼錯誤,同空的處理方式
header('refresh:3; url=login.html');
echo "使用者名稱或密碼錯誤,系統將在3秒後跳轉到登入介面,請重新填寫登入資訊!";
exit;
} elseif (($username == 'joe') && ($password == 'joe123')) {
# 使用者名稱和密碼都正確,將使用者資訊存到Session中
$_SESSION['username'] = $username;
$_SESSION['islogin'] = 1;
// 若勾選7天內自動登入,則將其儲存到Cookie並設定保留7天
if ($_POST['remember'] == "yes") {
setcookie('username', $username, time()+7*24*60*60);
setcookie('code', md5($username.md5($password)), time()+7*24*60*60);
} else {
// 沒有勾選則刪除Cookie
setcookie('username', '', time()-999);
setcookie('code', '', time()-999);
}
// 處理完附加項後跳轉到登入成功的首頁
header('location:index.php');
}
}
 ?>