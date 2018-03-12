<?php include 'top.php';
include 'admin/function/function.php';?>
<div id="list">
    <div id="list_banner" style="background-image:url(img/tmp_banner.jpg)"></div>
</div>
<div class="my_top">
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
     
        <div class="neirong">
            <div class="nei_menu">
            <a href="#" class="backgroundmenu">密码更新</a>
            <div class="clear"></div>
        </div>

            <!---->

            <form class="mimaform">
                <div>当前密码：<input type="" name=""></div>
                <div><span>新密码：</span><input type="" name=""></div>
                <div>确认密码：<input type="" name=""></div>
                <div><button type="" name="">确认修改</button></div>
            </form>

            <!--分页-->
  
    </div>
    
</div>
<?php include 'end.php';?>

</body>
</html>