// main.js is located at header
(function($) {
    let curPositionTop;

    // EVENT:: scroll and resize
    $(window).on('scroll resize', function(){
        initNavStyles();
    });

    // EVENT:: document ready
    $(function(){
        initNavStyles();
    });


    function initNavStyles(){
        curPositionTop = $(window).scrollTop();

        if ( curPositionTop > 0 ){
            $('#site-navigation').addClass('scrolled');
        } else {
            $('#site-navigation').removeClass('scrolled');
        }
    }

})(jQuery);
