<?php include 'top.php';
include 'admin/function/function.php';?>
<div id="list">
    <div id="list_banner" style="background-image:url(img/tmp_banner.jpg)"></div>
</div>
<link href="css/user_member.css" rel="stylesheet">
<div class="my_top">
  <div class="pagewidth">
  	 <div class="trtext">买家管理</div>
  </div>
</div>
<!-- 目录 -->
<div class="pagewidth row">
    <div class="col-md-2  my_menu">
    	<p>我的交易</p>
    	<ul><a href="#">已发布信息</a></ul>
    	<ul><a href="#">已成交信息</a></ul>
    	<ul><a href="#">草稿箱</a></ul>
    	<ul><a href="#">交易聊天记录</a></ul>
    	<ul><a href="#">购物车</a></ul>
    	<p>账号信息</p>
    	<ul><a href="#">企业基本信息</a></ul>
    	<ul><a href="#">子账户管理</a></ul>
    	<ul><a href="#">密码更新</a></ul>
    	<p>我的文献</p>
    	<ul><a href="#">已下载</a></ul>
    	<ul><a href="#">已求助</a></ul>
    	<p>我的专家咨询</p>
    	<p>我的积分</p>
    	<p>我的等级</p>
    	<p>我的培训</p>
    	<p>站内信息	</p>
    </div>

    <div class="col-md-10 empty">
    	<div class="nei_menu">
    		<a href="#" class="backgroundmenu">已成交信息</a>
    		<a href="#">已发布信息</a>
    		<a href="#">草稿箱</a>
    		<a href="#">交易聊天记录</a>
    		<div class="clear"></div>
    	</div>
    	<div class="neirong">
    		<div class="biaodan">
    			<input type="text" placeholder='输入订单编号或服务项目进行搜索'><input type="button" value="搜索">
    			<input type="button" value="导出EXCEL表格">
    		</div>
    		<div class="menu_biao">
    			<ul>项目服务名称</ul>
    			<ul>单位信息</ul>
    			<ul>价格</ul>
    			<ul>服务状态</ul>
    			<ul>操作</ul>
    			<div class='clear'></div>
    		</div>
    		<!---->
    		<div class="xiang">
    			<ul class="xiang_tou">
    				<span>订单编号：QW-S-2222222222222</span>
    			    <span>下单日期：2033-90-90 12:33</span>
    			    <input type="button" value="查看聊天记录">
    			    <div class='clear'></div>
    			</ul>
    			<ul class="xiang_zhong">
    				<li>药代动力学（体内）</li>
    			    <li>上海默默默默默默默默公司</li>
    			    <li>8000元</li>
    			    <li>确认完成</li>
    			    <li><input type="button" value="查看明细"><input type="button" value="物流信息"></li>	 
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
<script src="../config/rem.js"></script>
</body>
</html>