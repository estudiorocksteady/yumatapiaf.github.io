$(document).ready(function(){
	$("#sweb").click(function(){
	    $(".web").fadeIn("slow");
	    $(".prog").fadeOut("slow");
	    if ($(".web").is(":hidden")){
	    	$(".web").fadeIn("slow");
	    }
	    
	    
	});
	$("#progs").click(function(){
	    if ($(".prog").is(":hidden")){
	    	$(".prog").fadeIn("slow");
	    }
	});

	$("#fcontacto").submit(function( event ){
		event.preventDefault();
		$.ajax({
			type:"post",
			url:"send.php",
			data:$(this).serialize(),
			success: function(data){
				$("respuesta").slideDown();
				$("#respuesta").html(data);
			}
		});

		return false;
	});

var image = '<img src="assets/img/pr.png">';
		$('#popover').popover({placement: 'bottom', content: image, html: true});


$("body").append("<div class='scrollup'></div>");
  $(window).scroll(function(){
    if ($(this).scrollTop() > 120) $('.scrollup').fadeIn();
	else $('.scrollup').fadeOut();
	});
    $(document).on("click",".scrollup",function(e){
      e.preventDefault();
      $("html, body").stop().animate({ scrollTop: 0 }, "slow");
    });






});
