(function() {
    var menu_status=false;
    $("#type_list").show();
    if(menu_status){
      $("#menu_btn").hover(function(){
          $("#type_list").show();
      },function(){
          $("#type_list").hide();
      });
    }

    $(".item a").click(function(event) {
    	window.location.href="list.php";
    });


})();
