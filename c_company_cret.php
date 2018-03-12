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
            <a href="c_company_info.php" >企业基本信息</a>
            <a href="c_company_cret.php" class="backgroundmenu">企业资质</a>
            <a href="c_company_about.php" >企业介绍</a>
            <div class="clear"></div>
        </div>
        <div class="neirong">
            <!---->

            <div class="zizhi">
                <ul><span>上传资质</span> <button>上传</button> 点击上传资质（图片格式支持PNG/JPG/GIF/JPEG）</ul>
                <ul>
                    <img src="img/tmp_data_type_img2.jpg">
                    <img src="img/tmp_data_type_img2.jpg">
                    <img src="img/tmp_data_type_img2.jpg">
                    <img src="img/tmp_data_type_img2.jpg">
                    <img src="img/tmp_data_type_img2.jpg">
                    <img src="img/tmp_data_type_img2.jpg">
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