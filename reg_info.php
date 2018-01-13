<?php include 'top.php';?>


<?php    
@$act=$_GET["act"];
if($act){

#弹出对话框
function alert($message){echo ("<script>alert('". $message ."')</script>");}
#返回上一页
function GoBack(){echo("<script>history.back()</script>");}
#重定向另外的连接
function Go($url){echo ("<script>location.href='" . $url . "';</script>");}
}
if($act=="usercheck"){
    @$emailto=$_GET["mail"];
    $rsreset=$lnk -> query("select * from user where username='$emailto'");
        while($rs=mysqli_fetch_assoc($rsreset))
        {
            $msg=array("code"=>-1,"data"=> '邮箱已被注册 ！');
            echo json_encode($msg);
            exit;
        }
            $msg=array("code"=>0,"data"=> '邮箱可以注册 ！');
            echo json_encode($msg);
            exit;   
}

if($act=="sendEmail"){
@$emailto=$_GET["mail"];
        $rsreset=$lnk -> query("select * from user where username='$emailto'");
        while($rs=mysqli_fetch_assoc($rsreset))
        {
            $msg=array("code"=>-1,"data"=> '邮箱已被注册 ！');
            echo json_encode($msg);
            exit;
        }

#验证码获取
$code=rand(100000,999999);
$message_date=date("Y-m-d h:i:s");
$body="您好：<br>感谢您使用药研站网！<br>您注册新用户的验证码是：$code<br><br>如有任何问题，可以与我们联系，我们将尽快为你解答。 <br>Email：service@xxxx.com，电话：021-510xx580<br><br><div style='padding-left:200px;'>上海xxxxxxxx有限公司<br>$message_date</div>";
require 'phpmailer/class.phpmailer.php';
 try {
            $mail = new PHPMailer(true); //New instance, with exceptions enabled
            $mail->IsSMTP();                           // tell the class to use SMTP
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Port       = 25;                    // set the SMTP server port
            $mail->Host       = "smtp.exmail.qq.com"; // SMTP server
            $mail->Username   = "yzm@021px.com";     // SMTP server username
            $mail->Password   = "Yzm2017";            // SMTP server password
            $mail->From       = "yzm@021px.com";
            $mail->FromName   = "pardi";
            $to = $emailto;
            $mail->AddAddress($to);
           // $mail->AddBCC('325381@qq.com','victang');   //密送
            //$mail->AddBCC('1515052886@qq.com','victang');   //密送
            $mail->Subject  = "上海企业培训网注册验证码（系统自动邮件,请勿答复） ";
            $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
            $mail->WordWrap   = 80; // set word wrap
            $mail->MsgHTML($body);
            $mail->IsHTML(true); // send as HTML
            $mail->Send();
            $msg=array("code"=>0,"data"=> '留言成功 ！');
            echo json_encode($msg);

            $rsreset=$lnk -> query("select * from data_yzm where mobile='$emailto'");
            while($rs=mysqli_fetch_assoc($rsreset))
            {
                $lnk -> query("update data_yzm set yzmcode='$code' where mobile='$emailto'");
                exit;   
            }
            $lnk -> query("insert into data_yzm (mobile,yzmcode,date) values('$emailto','$code','".date("Y-m-d H:i:s")."')");
        } catch (phpmailerException $e) {
            $errorm = $e->errorMessage();
            $msg=array("code"=>0,"data"=> '邮箱验证失败：邮箱发送失败:原因:'.$errorm);
            echo json_encode($msg);
            exit;
        }
       
        #0为成功，如果成功写入数据
    
    exit;

}

if($act=="reg"){
    $yzmcode=$_POST["yzmcode"]; //图形验证码
    if(strtolower($yzmcode)!=strtolower($_SESSION["yzm"])){
         echo '<script>'.strip_tags('alert("图形验证码错误 ！");history.back();').'</script>';
         goback();
         exit();
    }
    $emailcode=@$_POST["emailcode"]; //手机短信验证码
    $email=@$_POST["username"];  //手机号
    
    $pswd1=@strtolower($_POST["pswd1"]);
    $pswd2=@strtolower($_POST["pswd2"]);
    
    if($pswd1!=$pswd2){
        alert("两次输入的密码不正确！");
        goback();
        exit;
        }
    
    if(!$pswd1 or !$email){
        alert("页面超时！");
        go("index.php");
        exit;
    }
    if(strlen($emailcode)<4){
        echo '<script>'.strip_tags('alert("邮箱验证码错误 ！");history.back();').'</script>';
         goback();
         exit;
    }

    //验证数据库
    $result=$lnk -> query("select yzmcode from data_yzm where mobile='$email'"); 
    while ($kind=mysqli_fetch_assoc($result)){  $data_yzmcode= $kind['yzmcode'];}
        
    if(strtolower($data_yzmcode)!=strtolower($emailcode)){
         echo '<script>'.strip_tags('alert("邮箱验证码错误 ！");history.back();').'</script>';
        // exit();
         goback();
         exit;
    }


    $_SESSION["temp_phone"]=$email;

    $olduser=false;
    
    $rsreset=$lnk -> query("select * from user where username='$email'");
        while($rs=mysqli_fetch_assoc($rsreset))
        {
            //$lnk -> query("update user  set password='".md5($pswd1)."' where username='$message_input_mtel'");
            if ($rs["pass"]==1){
                    alert("该账号已被冻结，请与管理员联系！");
                    go("index.php");
                    exit;
                }
            
            $olduser=true;
        }
        if(!$olduser)
        $lnk -> query("insert into user (username,password,niname,adddate) values('$email','".md5($pswd1)."','$email','".date("Y-m-d H:i:s")."')");
    
    alert("注册成功！");
    go("login.php");
    exit;
}

?>






<div class="pagewidth" style="position:relative;">
   
    <div style="position:absolute; border:#CCC 1px solid;min-height:270px; max-width:385px; background:#FFF; top:0px; right:0px">
        <ul style="margin:33px">
        <ul class="login_2" style="font-size:20px; margin-bottom:10px">注册新会员</ul>  
        <form class="uk-from login-form" name="myform" action="reg_member.php?act=reg" method="post">
          <div class="form-group">
            <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>邮箱地址</span></label>
            <input type="email" class="form-control " id="username" placeholder="请输入E-mail" name="username">
          </div>
           <div class="form-group">
            <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>密码</span></label>
            <input type="password" class="form-control " id="pswd1" placeholder="请输入密码" name="pswd1">
          </div>
           <div class="form-group">
            <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>确认密码</span></label>
            <input type="password" class="form-control " id="pswd2" placeholder="请再次输入密码" name="pswd2">
          </div>
          <div class="row empty">
              <div class="form-group col-xs-7 empty">
                <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>图形验证码</span></label>
                <input type="test" class="form-control" id="yzmcode" placeholder="请输入图形验证码" name="yzmcode">
              </div>
              <div class="col-xs-5 empty" style="margin-top:20px"><img  title="点击刷新" src="yzmcode.php" align="absbottom" onClick="this.src='yzmcode.php?'+Math.random();" class="img-responsive center-block" id="message_input_yzm"></div>
          </div>
          <div class="row empty" style="margin-top:10px; margin-bottom:10px">
              <div class="form-group col-xs-7 empty">
                <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>邮箱验证</span></label>
                <input type="text" class="form-control" id="emailcode" placeholder="请输入您的激活码" name="emailcode"> 
              </div>
              <div class="col-xs-5 empty" style="margin-top:20px"><button type="button" class="btn btn-info" style=" background-color:#ff3300; border-radius:0; height:36px; max-width:100px; margin-left:15px" name="yzmcodesms" id="yzmcodesms">发送至邮箱</button></div>
          </div>
   

          
          
            <button type="submit" class="btn btn-default">注册新用户</button>
        </form>
        </ul>
    </div>
     
</div>
<div><img src="img/reg_imgbk.jpg" style="width:100%;height:505px"></div>



    

<?php include 'end.php';?>
<script src="js/reg_info.js"></script>
</body>
</html>