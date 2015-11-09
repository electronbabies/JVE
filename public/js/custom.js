$(document).ready(function() {

  $('.scroll').click(function(e) {
    var off = -79;
    var target = this.hash;
    if(target) {
        if ($(target).offset().top == 0) {
            off = 0;
        }

        $('html,body').scrollTo(target, 800, {
            offset: off,
            easing: 'easeInOutExpo'
        });
        e.preventDefault();
        //  ---- dissapearing menu on click
        if ($('.navbar-collapse').hasClass('in')) {
            $('.navbar-collapse').removeClass('in').addClass('collapse');
        }
    }
  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 15) {
      $('nav').addClass("navMobile")
    } else {
      $('nav').removeClass("navMobile")
    }
  });
  if ($(window).width() < 769) {
    $('#nav').removeClass('navbar-default').addClass('navbar-inverse');
    $('.floated .with-border').removeClass('with-border');
  }




});

// Document ready
// Loading page complete
$(window).load(function()
{
	checkHero(); // Check hero height is correct
	animateWhenVisable(); // Activate animation when visable
});

// Page ready
$(document).ready(function()
{
	$('.hero').css('height', $(window).height()+'px'); // Set initial hero height
	$('#scroll-hero').click(function()
	{
		$('html,body').animate({scrollTop: $("#hero-wrap").height()}, 'slow');
	});
});

// Window resize
$(window).resize(function()
{
	$('.hero').css('height',getHeroHeight()+'px'); // Refresh hero height
});

// Get Hero Height
function getHeroHeight()
{
	var H = $(window).height(); // Window height

	if(H < heroBodyH) // If window height is less than content height
	{
		H = heroBodyH+100;
	}
	return H
}

// check hero height
function checkHero()
{
	P = parseInt($('.hero-nav').css('padding-top'))*2
	window.heroBodyH = $('.hero-nav').outerHeight()+P+$('.v-center').outerHeight()+50; // Set hero body height
	$('.hero').css('height', getHeroHeight() + 'px'); // Set hero to fill page height
}

// Scroll to target
function scrollToTarget(D)
{
	if(D == 1) // Top of page
	{
		D = 0;
	}
	else if(D == 2) // Bottom of page
	{
		D = $(document).height();
	}
	else // Specific wrap
	{
		D = $(D).offset().top;
	}

	$('html,body').animate({scrollTop:D}, 'slow');
}

// Initial tooltips
$(function()
{
 $('[data-toggle="tooltip"]').tooltip()
})


// Animate when visable
function animateWhenVisable()
{
	hideAll(); // Hide all animation elements
	inViewCheck(); // Initail check on page load

	$(window).scroll(function()
	{
		inViewCheck(); // Check object visability on page scroll
		scrollToTopView(); // ScrollToTop button visability toggle
	});
};

// Hide all animation elements
function hideAll()
{
	$('.animated').each(function(i)
	{
		if(!$(this).closest('.hero').length) // Dont hide hero object
		{
			$(this).removeClass('animated').addClass('hideMe');
		}
	});
}

// Check if object is inView
function inViewCheck()
{
	$($(".hideMe").get().reverse()).each(function(i)
	{
		var target = jQuery(this);

		a = target.offset().top + target.height();
		b = $(window).scrollTop() + $(window).height();

		if (a < b)
		{
			var objectClass = target.attr('class').replace('hideMe' , 'animated');
			target.css('visibility','hidden').removeAttr('class');
			setTimeout(function(){target.attr('class',objectClass).css('visibility','visable');},0.01);
		}
	});
};

// ScrollToTop button toggle
function scrollToTopView()
{
	if($(window).scrollTop() > $(window).height()/3)
	{
		if(!$('.scrollToTop').hasClass('showScrollTop'))
		{
			$('.scrollToTop').addClass('showScrollTop');
		}
	}
	else
	{
		$('.scrollToTop').removeClass('showScrollTop');
	}
};
