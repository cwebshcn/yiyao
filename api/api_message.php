<?php
include '../admin/config/config.php';
header("Access-Control-Allow-Origin: *");
$list_id = $_POST["list_id"];   //目录类别
$sex = $_POST["sex"];           //性别
$name = $_POST["name"];         //联系人
$bm = $_POST["bm"];             //部门
$email = $_POST["email"];       //邮局
$qq = $_POST["qq"];             //qq号
$wx = $_POST["wx"];             //微信号
$postcode = $_POST["postcode"]; //邮编
$cname = $_POST["cname"];       //公司名称
$address = $_POST["address"];   //地址
$mtel = $_POST["mtel"];         //手机
$tel = $_POST["tel"];           //电话
$fax = $_POST["fax"];           //传真
$title = $_POST["title"];       //留言主题
$message = $_POST["message"];   //留言内容
$timea = date("Y-m-d H:i:s");   //写入时间

//定义错误
$error=0;
if(!$list_id>0){
	$error = "目录类别传入错误！";
	$code =  1001 ;
}

if(!$message){
	$error = "留言内容为必填项！";
	$code =  1002 ;
}

if($error){ 
	$msg = "出错了，留言失败！错误：$error";
}

if(!$error){
	$lnk -> query("insert into  message (list_id,sex,name,bm,email,qq,wx,postcode,cname,address,mtel,tel,fax,title,message,timea) values ('$list_id','$sex','$name','$bm','$email','$qq','$wx','$postcode','$cname','$address','$mtel','$tel','$fax','$title','$message','$timea')");
	$msg = "留言成功！谢谢您的支持！";
	$code = 0; 
}

echo json_encode( array("code"=>$code,"data"=>$msg) );
?>