<?php include 'top.php';
include 'admin/function/function.php';?>
<div class="pagewidth" id="reg_memeber">
    <div class="row">
        <ul class="col-lg-4 col-md-4">
            <li class="member_type">
                <p><input name="account_type" type="radio" value="1"></p>
                <p>买家用户</p>
                <p><span class="glyphicon glyphicon-gift"></span></p>
                <p class="about">买家是用钱买别人的商品或服务，付出的是金钱，得到的是商品或服务。</p>
            </li>
        </ul>
        <ul class="col-lg-4 col-md-4">
            <li class="member_type">
                <p><input name="account_type" type="radio" value="2"></p>
                <p>商家用户</p>
                <p><span class="glyphicon glyphicon-leaf"></span></p>
                <p class="about">买家是用钱买别人的商品或服务，付出的是金钱，得到的是商品或服务。</p>
            </li>
        </ul>
        <ul class="col-lg-4 col-md-4">
            <li class="member_type">
                <p><input name="account_type" type="radio" value="3"></p>
                <p>专家用户</p>
                <p><span class="glyphicon glyphicon-screenshot"></span></p>
                <p class="about">买家是用钱买别人的商品或服务，付出的是金钱，得到的是商品或服务。</p>
            </li>
        </ul>
        <ul class="next col-lg-12 col-md-12">
            <button class="btn btn-info" id="next-btn">下一步</button>
        </ul>
       
    </div>
</div>

<?php include 'end.php';?>
<script src="js/reg_member.js"></script>
</body>
</html>