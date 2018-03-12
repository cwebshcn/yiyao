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
            <a href="c_my_expert.php" class="backgroundmenu">我的专家咨询</a>
            <div class="clear"></div>
        </div>
        <div class="neirong">
            <div class="biaodan">
                <input type="text" placeholder='输入订单编号或服务项目进行搜索'><input type="button" value="搜索">
            </div>
            <!---->

            <table border="0" width="960" class="peixunTitle">
                <tr>
                    <th width="50%">咨询主题</th>
                    <th width="25%">回复专家</th>
                    <th width="25%">操作</th>
                </tr>
            </table>
            <table border="0" width="960" class="peixun">
                <tr>
                    <td width="50%"><span>[财经]</span> “医药股”哈哈哈哈哈哈</td>
                    <td width="25%">哈哈</td>
                    <td width="25%"><a href="#">查看回复</a></td>
                </tr>
                <tr>
                    <td width="50%"><span>[财经]</span> “医药股”哈哈哈哈哈哈</td>
                    <td width="25%">哈哈</td>
                    <td width="25%"><a href="#">查看回复</a></td>
                </tr>
                <tr>
                    <td width="50%"><span>[财经]</span> “医药股”哈哈哈哈哈哈</td>
                    <td width="25%">哈哈</td>
                    <td width="25%"><a href="#">查看回复</a></td>
                </tr>
                <tr>
                    <td width="50%"><span>[财经]</span> “医药股”哈哈哈哈哈哈</td>
                    <td width="25%">哈哈</td>
                    <td width="25%"><a href="#">查看回复</a></td>
                </tr>
                <tr>
                    <td width="50%"><span>[财经]</span> “医药股”哈哈哈哈哈哈</td>
                    <td width="25%">哈哈</td>
                    <td width="25%"><a href="#">查看回复</a></td>
                </tr>
                <tr>
                    <td width="50%"><span>[财经]</span> “医药股”哈哈哈哈哈哈</td>
                    <td width="25%">哈哈</td>
                    <td width="25%"><a href="#">查看回复</a></td>
                </tr>
                <tr>
                    <td width="50%"><span>[财经]</span> “医药股”哈哈哈哈哈哈</td>
                    <td width="25%">哈哈</td>
                    <td width="25%"><a href="#">查看回复</a></td>
                </tr>
            </table>

            <!--分页-->
            <div class="page">
                <ul>
                <a href="#">第一页</a>
                <a href="#">上一页</a>
                <a href="#" class="page_xuan">1</a>
                <a href="#">2</a>
                <a href="#">下一页</a>
                <a href="#">尾页</a>
                <span>共6页，共34个</span>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'end.php';?>

</body>
</html>