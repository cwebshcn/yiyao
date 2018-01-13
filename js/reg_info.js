(function() {
    var menu_status=true;
    if(menu_status){
      $("#menu_btn").hover(function(){
          $("#type_list").show();
      },function(){
          $("#type_list").hide();
      });
    }
   
    var error=false;
    //发送短信验证手机
    $('#yzmcodesms').click(function () {
        var email=$('#username').val();
        var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!reg.test(email)){
            alert("您填写的邮箱有误!");
            return ;
            }        
        swal({title:"已发送成功",text:"请注意查收,如果您没有收到邮件，请60秒后重试！",type:"success"});
        var url="reg_info.php?act=sendEmail&mail="+email;
        $.ajax({
            url:url,
            type:"POST",
            dataType:"json",
            success:function(msg){
                if(msg.code==0){
                    console.log(msg.data);
                }else{
                    console.log(msg.data);
                }
            },
            error:function(msg){
                console.log(msg);
            }
            
        });
        

        
        var count = 6;
        var countdown = setInterval(CountDown, 1000);
        
        function CountDown() {
            $("#yzmcodesms").attr("disabled", true);
            $("#yzmcodesms").html(" " + count + " 秒");
            if (count == 0) {
                $("#yzmcodesms").html("重新获取");
                $("#yzmcodesms").removeAttr("disabled");
                clearInterval(countdown);
            }
            count--;
        }
    });
    //邮箱验证
    $('#username').blur(function(){
        var email=$('#username').val();
        var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!reg.test(email)){
            alert("您填写的邮箱有误!");
            error=true;
            }
        url="reg_info.php?act=usercheck&mail="+email;
        $.ajax({
            url:url,
            type:"POST",
            dataType:"json",
            success:function(msg){
                if(msg.code==0){
                    console.log(msg.data);
                }else{
                    alert("用户已存在！");
                    $('#username').val("");
                    return;
                }
            },
            error:function(msg){
                console.log(msg);
            }
            
        });

    });
    $("#pswd1").blur(function(){
        pswd1();
    });
                            
    $("#pswd2").blur(function(){
        pswd2();
    });
                            
    function pswd1(){
        var pswd1=$("#pswd1").val();
        var pswd2=$("#pswd2").val();
        if(pswd1.length<6){alert("请输入不小于6位的密码！"); error=true;};
    }
    function pswd2(){
        var pswd1=$("#pswd1").val();
        var pswd2=$("#pswd2").val();
        if(pswd1!=pswd2){alert("两次输入密码不同！"); error=true;};
    }
    
    //提交验证
    $("#message_input_submit").click(function(){
        //邮箱
        var email=$('#username').val();
        var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!reg.test(email)){
            //$("#error_text").html("*您填写的邮箱有误!");
            alert("*您填写的邮箱有误!");
            return;
        }
        //验证码
        var message_input_yzm=$("#message_input_yzm").val();
        if(message_input_yzm.length<4){
            $("#error_text").html("*请正确填写验证码!");
            return;
        }
        //验证码
        var emailcode=$("#emailcode").val();
        if(emailcode.length<4){
            $("#error_text").html("*请正确填写邮箱验证码!");
            return;
        }
        $("#message").submit();

        
    })
    




})();
