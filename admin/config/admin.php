<?php
include 'config/config.php';
include 'function/function.php';
$TRecord=$lnk->query("select * from manage where password='".md5($_SESSION['pswd'])."' and username='".$_SESSION['uname_admin']."'");
$RecordCount = $TRecord-> fetch_row();
if (!$RecordCount){
echo "<script language='javascript'>";
echo "alert('非法登录！');";
echo "location.href='login.php';";
echo "</script>";
}
?>