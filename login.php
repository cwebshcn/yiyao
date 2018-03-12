<?php include 'top.php';
include 'admin/function/function.php';?>


<?php  



@$act=$_GET["act"];

if($act=="out"){
        session_destroy();
        alert("成功退出");
        go("index.php");
    }

if($act=="login"){
    
    $username=$_POST["username"];
    $password=$_POST["password"];
    $yzmcode=$_POST["yzmcode"];
    $tenautologin=$_POST["tenautologin"];

    if(strtolower($_SESSION["yzm"])!=strtolower($yzmcode)){
        alert("验证码不正确，请检查！");
        go("login.php");
        exit;
    }
    //alert($password."|".$username);
    if(!emailCheck($username))
    {
    
         if(!mobileCheck($username)){
            alert("用户名格式不正确，请检查！");
            go("login.php");
            exit;
        }
    }

    
    $TRecord=$lnk -> query("select * from user where password='".md5($password)."' and username='".$username."'");
    $error=true;
    while($rs=mysqli_fetch_assoc($TRecord))
    {
        $error=false;   
        if ($rs["pass"]>0){
                    alert("该账号已被冻结，请与管理员联系！");
                    go("index.php");
                    exit;
        }
        $_SESSION['account_web']=$rs["account_type"]+0;    #设置ses  1,买  2 商家  3专家
        //用户是否合法
        switch ($_SESSION['account_web']) {
            case 1:
                $loginpage="business_center.php";
                break;
            case 2:
                $loginpage="business_center.php";
                break;
            case 3:
                $loginpage="business_center.php";
                break;
            
            default:
                alert("系统繁忙，请稍候再试！");
                exit();
                break;
        }
        $_SESSION['uname_web']=$username;
        $_SESSION['pswd_web']=$password;    #设置session
        
        
        if($tenautologin){
            //$_SESSION['userinfo']=array('uname_web'=>$username,'pswd_web'=>$password);  #设置自动登录信息
            setcookie(session_name(),session_id(),time()+10*24*3600);  #十天自动登录
            
        }

        //exit();
        echo "<script language='javascript'>";
        echo "location.href='$loginpage';";
        echo "</script>";
    }
        
    if($error){
            echo "<script language='javascript'>";
            echo "alert('您的用户名密码有误，您的权限不能操作！');";
            echo "location.href='javascript:history.go(-1)';";
            echo "</script>";
    }
}

?>






<div class="pagewidth" style="position:relative;">
   
    <div style="position:absolute; border:#CCC 1px solid;min-height:270px; max-width:385px; background:#FFF; top:80px; right:0px">
        <ul style="margin:33px">
        <ul class="login_2" style="font-size:20px; margin-bottom:10px">会员登录</ul>  
       <form class="uk-from login-form" name="myform" action="login.php?act=login" method="post">
          <div class="form-group">
            <input type="email" class="form-control border_2" id="username" placeholder="邮箱" name="username" value="<?php echo @$_COOKIE["uname_web"]?>">
          </div>
          <div class="form-group" style="margin-top:-15px">
            <input type="password" class="form-control border_3" id="password" placeholder="密码" name="password" value="<?php echo @$_COOKIE["pswd_web"]?>">
          </div>
          <div class="row empty">
              <div class="form-group col-xs-7 empty" style="margin-top:0;">
                <input type="text" class="form-control border_3" id="yzmcode" placeholder="验证码" name="yzmcode" style="height:36px"> 
              </div>
              <div class="col-xs-5 empty"><img  title="点击刷新" src="yzmcode.php" align="absbottom" onClick="this.src='yzmcode.php?'+Math.random();" class="img-responsive center-block" id="message_input_yzm"></div>
          </div>
   
          <div class="checkbox">
            <label><input type="checkbox" name="tenautologin" value="1"> 十天内免登陆</label>
            <div class="text-right floatright"><a href="forget.php">无法登陆？</a></div>
            <div class="clear"></div>
          </div>
          
          <button type="submit" class="btn btn-default" style="width:121px; height:33px; background-color:#44b549; border-radius:5px; color:#fff; text-align:center; float:left;">登录</button>
            <a href="reg_member.php"><ul style="width:121px; height:32px; line-height:32px; background-color:#d9534f; border-radius:5px; color:#fff; text-align:center; float:left; margin-left:10px">注册</ul><ul class="clear"></ul></a>
        </form>
        </ul>
    </div>
     
</div>
<div><img src="img/reg_imgbk.jpg" style="width:100%;height:505px"></div>



    

<?php include 'end.php';?>
<script src="js/reg_info.js"></script>
</body>
</html>