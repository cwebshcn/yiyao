<?php include 'top.php';
include 'admin/function/function.php';?>
<link href="css/list.css" rel="stylesheet">
<div id="list">
    <div id="list_banner" style="background-image:url(img/tmp_banner.jpg)"></div>
    <div id="nav_text">
        <div class="pagewidth">您的位置：首页 <span class="glyphicon glyphicon-menu-right"></span> 临床前研究 <span class="glyphicon glyphicon-menu-right"></span>  紫外红外检测</div>
    </div>
</div>

<div class="pagewidth row">
    <div class="col-md-4 empty list_img">
        <img src="img/pro_img.png">
    </div>
    <div class='col-md-5 empty pro_jie'>
        <h1>紫外红外线检测</h1>
        <ul class="biaoti">已成交<b>1342</b></ul>
        <span>价格:面议</span>
        <b></b>
        <p>项目介绍：</p>
        <ul class="jieshao">现有实验场地大2700平方米。。。。。。。。。。</ul>
         <?php if (!@$_SESSION['account_web']){?><button type="button" class="btn btn-danger" onclick="window.location.href='login.php'">登录查看</button>
         <?php }?>

         <?php if (@$_SESSION['account_web'] == 1 or @$_SESSION['account_web']==3){?><a href='c_business_deal.php'><button type="button" class="btn btn-danger">立即购买</button></a>
         <a href='c_business_cart.php'><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span>加入购物车</button></a>
         <?php }?>


          <?php if (@$_SESSION['account_web'] == 2){?><a href='c_business_deal.php'><button type="button" class="btn btn-danger">我有意向咨询买家</button></a>
         
         <?php }?>
    </div>
    <div class="col-md-3 empty pro_gongsi">
        <div>
            <p>上海张江智能医疗有限公司</p>
            <ul class="pingjia row">
                <li class="col-md-4 empty">
                    <h5>37</h5>
                    <div>服务数</div>
                </li>
                <li class="col-md-4 empty">
                    <h5>99%</h5>
                    <div>好评率</div>
                </li>
                <li class="col-md-4 empty">
                    <h5>37</h5>
                    <div>成交量</div>
                </li>
            </ul>
           <ul class="lunbo">
            <span class="glyphicon glyphicon-chevron-left">
                <img src="img/pro_img.png">
                <img src="img/pro_img.png">
            <span class="glyphicon glyphicon-chevron-right">
           </ul>
           <ul class="an_btn">商户客服</ul>
           <div></div>
           <ul class="jinru row">
                <li class="col-md-6 empty">
                    <span class="glyphicon glyphicon-home"></span>进入主页
                </li>
                <li class="col-md-6 empty">
                    <span class="glyphicon glyphicon-star"></span>收藏本页
                </li>
            </ul>
        </div>
    </div>  
</div>

<div class="pagewidth pro_mid" style="background:#ffffff">
    <div class="col-md-3 empty pro_mid_left">
        <h4>项目搜索</h4>
        <span>关键字：</span> <input type="text" class="f" placeholder="">
        <ul class="duoxuan">
            <input type="radio" name="sex" value="n" />公司
            <input type="radio" name="sex" value="v" />项目
        </ul>
        <button type="button" class="btn btn-default">搜索</button>
        <h4 style="height:9px;margin-top: 20px"></h4>
        <ul class="fenlei">
            <li>项目类别</li>
            <li><span class="glyphicon glyphicon-plus"></span>项目类别</li>
            <li><span class="glyphicon glyphicon-plus"></span>项目类别</li>
            <li><span class="glyphicon glyphicon-minus"></span>项目类别</li>
            <li><span class="glyphicon glyphicon-minus"></span>项目类别</li>
        </ul>
        <ul class="lei_img"><img src="img/pro_img.png"></ul>
    </div>
    <div class="col-md-9 empty pro_mid_right">
        <ul class="biaoti_right"><span class="active">项目介绍</span><span>服务评价</span><span>相关资料</span></ul>
        <ul class="biaoti_nei"></ul>
    </div>  
</div>
<div class="clear"></div>
<!-- 列表 -->
<div class="pagewidth dibu_liebiao ">
    <p><span>项目推荐</span><span>更多</span></p>
    <div class="clear"></div>
    <div style="height:1px;background:#c62d28"></div>
    <div class='row liebiaodi_img'>
    <ul class="col-md-3 empty">
        <img src="img/pro_img.png" class="center-block img-responsive">
        <p>高分辨质谱检测</p>
        <h5>鉴别/检测</h5>
        <li>300-2000元/件</li>
    </ul>
     <ul class="col-md-3 empty">
        <img src="img/pro_img.png"class="center-block img-responsive">
        <p>高分辨质谱检测</p>
        <h5>鉴别/检测</h5>
        <li>300-2000元/件</li>
    </ul>
     <ul class="col-md-3 empty">
        <img src="img/pro_img.png"class="center-block img-responsive">
        <p>高分辨质谱检测</p>
        <h5>鉴别/检测</h5>
        <li>300-2000元/件</li>
    </ul>
     <ul class="col-md-3 empty">
        <img src="img/pro_img.png"class="center-block img-responsive">
        <p>高分辨质谱检测</p>
        <h5>鉴别/检测</h5>
        <li>300-2000元/件</li>
    </ul>
    </div>
</div>
<div>&nbsp;<br><br></div>

<?php include 'end.php';?>
<script src="js/list.js"></script>
<script src="../config/rem.js"></script>
</body>
</html>