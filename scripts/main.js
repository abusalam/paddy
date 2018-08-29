$(document).ready(function(){

	$("a.mobile").click(function(){
		$(".sidebar").slideDown('fast');
	});

	$("a.menuclose").click(function(){
		$(".sidebar").slideUp('fast');
	});

		
	

	window.onresize = function(event){
		if($(window).width() > 730){
			$(".sidebar").show();
		}
	};

	function mhweb_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#mhwebhold').offset().top;
    if (window_top > div_top) {
        $('#hold').addClass('glue');
        $('#mhwebhold').height($('#hold').outerHeight());

        

    } else {
        $('#hold').removeClass('glue');
        $('#mhwebhold').height(0);
    }
}

$(function() {
    $(window).scroll(mhweb_relocate);
    mhweb_relocate();

});

	$(".btn-kcc").on("click", function(){

		//alert($(this).data("appid"));
		//$(this).data("appid")
		//$(this).removeClass('active');
		//return false;
		updatePaddy($(this).data("appid"),$(this).hasClass('active'),'KCC');
	});

	$(".btn-pmfby").on("click", function(){

		//alert($(this).data("appid"));
		//$(this).data("appid")
		//$(this).removeClass('active');
		//return false;
		updatePaddy($(this).data("appid"),$(this).hasClass('active'),'PMFBY');
	});

var updatePaddy = function (AppID, Value,Scheme) {

	$.ajax({
    type: 'POST',
    url: '/ajax/',
    dataType: 'html',
    xhrFields: {
      withCredentials: true
    },
    data: {
      'id' : AppID,
      'val' :  Value,
      'scheme' : Scheme
    }
  }).done(function (data) {
    try {
      //alert("Done:" + AppID + data);
    }
    catch (e) {
      alert('Error:' + AppID + e);
    }
  }).fail(function (FailMsg) {
    alert('Fail:' + AppID + FailMsg.statusText);
  });
};

});

