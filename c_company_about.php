<?php include 'top.php';
include 'admin/function/function.php';?>
<!--UE-->
<script type="text/javascript" charset="utf-8" src="admin/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="admin/js/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="admin/js/ueditor/lang/zh-cn/zh-cn.js"></script>
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
            <a href="c_company_info.php" >企业基本信息</a>
            <a href="c_company_cret.php" class="backgroundmenu">企业资质</a>
            <a href="c_company_about.php" >企业介绍</a>
            <div class="clear"></div>
        </div>
        <div class="neirong">
            <!---->

            <div class="zizhi">
               
                <ul>
                    <textarea name='about'  id='about'  style='width:100%;height:300px;' value="请在这里编辑介绍"></textarea><script> var data_about = UE.getEditor('about');</script>
                    
                </ul>
                <button>保存</button>
            </div>

            <!--分页-->
        </div>
    </div>
</div>
<?php include 'end.php';?>

</body>
</html>