(function($) {

    // document ready
    $(function(){

    // Custom styling for input[t=radio] -> $works
        if ( $('.filter-txt').length > 0 ){
            let $obj = $('.filter-txt');

            activateFilterStyles($obj);

            $obj.on('click', 'label', function(){
                activateFilterStyles($obj, $(this));
            });
        }

    });

    function activateFilterStyles($obj, $this = null){
        $obj.removeClass('active');

        if ( $this ){
            // with 'click' event
            $this.parent().addClass('active');
        } else {
            // with 'ready' event
            $obj.filter( function(){
                let $input = $(this).children('input');
                if ( $input.prop('checked') ) {
                    $(this).addClass('active');
                }
            });
        }
    }

})(jQuery);
