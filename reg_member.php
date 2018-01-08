<?php include 'top.php';?>
<div class="pagewidth minh800 myform">
    <div><img src="images/hy_bk.jpg" class="img-responsive"></div>
    <div class="login_1" style="position:absolute; z-index:99; width:100%; background:#FFF; top:28%; right:10%">
        <ul class="margin33">
            <ul class="login_2">注册新会员</ul>  
            <form class="uk-from login-form" name="myform" action="reg_member.php?act=reg" method="post">
                <div class="form-group">
                    <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>邮箱地址</span></label>
                    <input type="email" class="form-control " id="username" placeholder="请输入E-mail" name="username">
                </div>
                <div class="form-group">
                    <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>密码</span></label>
                    <input type="password" class="form-control " id="pswd1" placeholder="请输入密码" name="pswd1">
                </div>
                <div class="form-group">
                    <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>确认密码</span></label>
                    <input type="password" class="form-control " id="pswd2" placeholder="请再次输入密码" name="pswd2">
                </div>
                <div class="row empty">
                    <div class="form-group col-xs-7 empty">
                    <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>图形验证码</span></label>
                    <input type="test" class="form-control" id="yzmcode" placeholder="请输入图形验证码" name="yzmcode">
                </div>
                <div class="col-xs-5 empty" style="margin-top:20px"><img  title="点击刷新" src="yzmcode.php" align="absbottom" onClick="this.src='yzmcode.php?'+Math.random();" class="img-responsive center-block" id="message_input_yzm"></div>
                </div>
                <div class="row empty" style="margin-top:10px; margin-bottom:10px">
                    <div class="form-group col-xs-7 empty">
                    <label class="uk-form-label empty" for="form-h-it"><span style="color:#C00">*</span> <span>邮箱验证</span></label>
                    <input type="text" class="form-control" id="emailcode" placeholder="请输入您的激活码" name="emailcode"> 
                    </div>
                    <div class="col-xs-5 empty" style="margin-top:20px"><button type="button" class="btn btn-info" style=" background-color:#ff3300; border-radius:0; height:36px; max-width:100px; margin-left:15px" name="yzmcodesms" id="yzmcodesms">发送至邮箱</button></div>
                </div>
                <button type="submit" class="btn btn-default">注册新用户</button>
            </form>
            </ul>
        </div>
    </div>

</div>

<?php include 'end.php';?>
<script src="js/list.js"></script>
</body>
</html>