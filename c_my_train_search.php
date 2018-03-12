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
            <a href="c_my_train.php"  >已参加培训</a>
            <a href="c_my_train_active.php" >已关注</a>
            <a href="c_my_train_search.php" class="backgroundmenu">全站搜索培训</a>
            <div class="clear"></div>
        </div>
        <div class="neirong">
            <div class="biaodan">
                <input type="text" placeholder='输入关键字进行搜索'><input type="button" value="搜索">
            </div>
            <div class="menu_biao">
                <ul>培训类别</ul>
                <ul>培训主题</ul>
                <ul></ul>
                <ul>&nbsp;</ul>
                <ul>操作</ul>
                <div class='clear'></div>
            </div>
            <!---->
            <div class="xiang">
                <ul class="xiang_zhong">
                    <li>【药代】</li>
                    <li>上海公司的培训计划开始</li>
                    <li></li>
                    <li>&nbsp;</li>
                    <li><a href="list.php"><input type="button" value="查看"></a>  
                    <div class='clear'></div>   
                </ul>
            </div>

       
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