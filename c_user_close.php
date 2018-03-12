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
       <div class="nei_menu">
            <a href="c_user_list.php" >子账户列表</a>
            <a href="c_user_close.php" class="backgroundmenu">已解冻</a>
            <div class="clear"></div>
        </div>

        <div class="neirong">
            <!---->

            <div class="inforform">
                <div>单位名称：<span>桑迪亚</span></div>
                <div>&nbsp;用 户 名：<span>lala</span></div>
                <div>手机号码：<span>12333333333</span></div>
                <div>电子邮箱：<span>44@qq.com</span></div>
            </div>
            <table width="900" class="zizhanghu" border="0">
                <tr>
                    <td width="10%"><input type="checkbox" aria-label="..."></td>
                    <td width="10%">序号</td>
                    <td width="20%">用户名</td>
                    <td width="20%">姓名</td>
                    <td width="20%">手机</td>
                    <td width="10%">状态</td>
                    <td width="10%">操作</td>
                </tr>
                <tr>
                    <td></td>
                    <td>1</td>
                    <td>张飞@qq.com</td>
                    <td>张飞</td>
                    <td>13444444444</td>
                    <td class="dongjie">冻结</td>
                    <td><button>解冻</button></td>
                </tr>
                <tr>
                    <td></td>
                    <td>1</td>
                    <td>张飞@qq.com</td>
                    <td>张飞</td>
                    <td>13444444444</td>
                    <td class="zhengchang">正常</td>
                    <td><button>冻结</button></td>
                </tr>
            </table> 


            <!--分页-->
        </div>
</div>
<?php include 'end.php';?>

</body>
</html>