<?php include 'top.php';
include 'admin/function/function.php';?>
<div id="list">
    <div id="list_banner" style="background-image:url(img/tmp_banner.jpg)"></div>
</div>
<div class="my_top"><a name="top"></a>
  <div class="pagewidth">
     <div class="trtext"><?php 
        switch ($_SESSION['account_web']) {
            case 1:
                $userType="买家会员中心";
                break;
            case 2:
                $userType="商家会员中心";
                break;
            case 3:
                $userType="专家会员中心";
                break;
            
            default:
                alert("登录已超时！");
                go("login.php");
                exit();
                break;
        }
        echo $userType;
     ?></div>
  </div>
</div>
<!-- 目录 -->
<div class="pagewidth row">
   <?php include 'member_menu.php';?>

    <div class="col-md-10 empty">
        <div class="nei_menu">
            <a href="c_company_info.php" class="backgroundmenu">企业基本信息</a>
            <a href="c_company_cret.php">企业资质</a>
            <a href="c_company_about.php" >企业介绍</a>
            <div class="clear"></div>
        </div>
         <div class="neirong">
            <!---->

            <form class="inforform">
                <div>单位名称：<span>桑迪亚</span></div>
                <div>&nbsp;用 户 名：<span>lala</span></div>
                <div>手机号码：<span>12333333333</span> <span>修改</span> <span>向新手机号码发送短信验证</span></div>
                <div>电子邮箱：<span>44@qq.com</span> <span>修改</span> <span>向新电子邮箱发送短信验证</span></div>
                <div>&nbsp;负 责 人：<input type="" name=""></div>
                <div>单位地址：<input type="" name=""></div>
            </form>

            <!--分页-->
        </div>
    </div>
</div>
<?php include 'end.php';?>

</body>
</html>