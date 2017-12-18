$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade"
  });
 
});
 
 


$(document).ready(function(){
	
	$('.owl-carousel').owlCarousel({
		loop: true,
		autoplay: false,
		responsiveClass: true,
		responsive: {
		  0: {
			items: 1,
			nav: true,
		  },
		  480: {
			items: 1,
			nav: true,
		  },
		  
		  640: {
			items: 1,
			nav: true,
		  },
		  768: {
			items: 4,
			nav: true,
		  },
		  1000: {
			items: 4,
			nav: true,
			loop: true,
		  }
		}
	});
});

//toggle function

$(document).ready(function(){
	$('.toggle').click(function(){
		$('.nav').toggleClass('active');
		$(this).toggleClass('aactive');
	});
	
	$('.smoothscroll').smoothScroll();
});


//plus mines button
 $(".incr-btn").on("click", function (e) {
        var $button = $(this);
        var oldValue = $button.parent().find('.quantity').val();
        $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
        if ($button.data('action') == "increase") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below 1
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
                $button.addClass('inactive');
            }
        }
        $button.parent().find('.quantity').val(newVal);
        e.preventDefault();
    });	
	

	