(function() {
    var menu_status=true;
    if(menu_status){
      $("#menu_btn").hover(function(){
          $("#type_list").show();
      },function(){
          $("#type_list").hide();
      });
    }


})();
