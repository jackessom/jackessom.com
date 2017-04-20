$( document ).ready(function() {

    if (!$('body').hasClass('home') && $("html, body").scrollTop() < $('header').height()) {
        var scrollAmount = $('header').height() - 200;
        $('html,body').animate({scrollTop: scrollAmount}, 500, "swing");
    }

    $(window).scroll(function() {
        parralaxHero();
    });

    $(".instagram a, .standard-block, .hero .background, .bio").lazyload({
        effect : "fadeIn",
        threshold: 200
    });


	var $container = $('#packery-container');

	$container.isotope({ 
		itemSelector: '.standard-block',
		layoutMode: 'packery',
        packery: {
            "gutter": ".gutter-sizer", 
            "itemSelector": ".standard-block", 
            "columnWidth": ".grid-sizer",
            "isResizeBound": true,
            "isOriginTop": true
        },
	})

    //filtering

    $(".filter-link").click(function() {
        var filter = $(this).attr('id');
        if (filter == "all") {
            $container.isotope({ filter: '*' });
        } else {
            $container.isotope({ filter: '.'+filter });
        }
        $(".filter-link").removeClass('active');
        $(this).addClass('active')
    });

    

    //directional aware sliding
    $('.standard-block').each( function() { 
        if ($('body').width() > 500) {
            $(this).hoverdir(); 
        }
    } );

    $('.flickr-wrap').slick({
        lazyLoad: 'ondemand',
        arrows: true,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 7000,
        fade: true
    });


});

function parralaxHero() {
    var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    
    $('.hero .background').css({
        "margin-top" : (scrollTop * 0.2) + 'px'
    });

    $('.hero .inner').css({
        "margin-top" : -(scrollTop * 0.5) + 'px',
        "opacity" : 1 - ($(window).scrollTop()/200)
    });

    var newHeight = 600 - ($(window).scrollTop()/3);
    $('.hero').css({
        "height" : newHeight
    });
};

var page = 2;
function load_posts(url, posts_per_page, totalPages, category, tag) {

    $.ajax({
        type: "GET",
        url: url,
        dataType: 'html',
        data: ({ action: 'load_more', numPosts : posts_per_page, pageNumber: page, cat: category, tag: tag }),
        beforeSend: function() {
            $(".load-more-square .inner").text("loading...");
        },
        success: function(data){
            var item = $(data);
            $(item).each(function() {
                if ($(this).hasClass('standard-block')) {
                    $(this).addClass('new');
                }
            });
            $('#packery-container').append( item );
            $('#packery-container').isotope( 'appended', item );
            $(".load-more-square .inner").text("load more");

            $('.standard-block.new').each( function() { 
                $(this).hoverdir(); 
                $(this).lazyload({ effect : "fadeIn" });
                $(this).removeClass('new');
            } );

            page++;
            if (page > totalPages) {
                $(".load-more-square .inner").text("no more");
            };
        }
    });

};

