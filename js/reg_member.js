(function() {
    var menu_status=true;
    if(menu_status){
      $("#menu_btn").hover(function(){
          $("#type_list").show();
      },function(){
          $("#type_list").hide();
      });
    }
    $(".member_type").click(function(event){
      $(this).find("input").prop("checked",true);
    })

    $("#next-btn").click(function(event) {
      var v=$("input[name=account_type]:checked").val();
      window.location="reg_info.php?v="+v;
    });


})();
