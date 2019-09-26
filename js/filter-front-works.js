(function($) {

    let workTaxonomies = [];
    appendWorkTaxonomies();

    // document ready
    $(function(){

        if ( $('.filter-txt').length > 0 ){
            let $obj = $('.filter-txt');

        // Custom styling for input[t=radio] -> $works
            activateFilterStyles($obj);

            $obj.on('click', 'label', function(){
                activateFilterStyles($obj, $(this));
            });



            fetchWordPressData();

            $obj.on('click', 'input', function(){
                fetchWordPressData( $(this) );
                // console.log( $(this) );
             });

        }

    }); // end document ready

    // Add 'active' class to input[t=radio] -> checked
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

    // Retrieve names of work_taxonomies
    function appendWorkTaxonomies(){
        let taxonomies = 'work_taxonomies';
        $.ajax({
            method: 'get',
            url: `${ymk_api_works.rest_url}wp/v2/${taxonomies}`,
        }).always(function () {

        }).fail(function () {

        }).done(function (result) {
            workTaxonomies = result;
            workTaxonomies.sort( (a, b) => {
                return a.parent - b.parent
            });
        })
    }

    function fetchWordPressData($input){
        let strURI, filterByID,
            post_type = 'work_posts';

        if ( $input === undefined || $input.val() === 'all' ) {
            strURI = `${ymk_api_works.rest_url}wp/v2/${post_type}`;
        } else {
            filterByID = $input.val();
            strURI = `${ymk_api_works.rest_url}wp/v2/${post_type}?work_taxonomies=${filterByID}`;
        }

        $.ajax({
            method: 'get',
            url: strURI,

        }).always( function(){
            $('#contents-front-page-works').html('');
        }).fail(function(){

        }).done(function(result){
            const arr_data = result;

            arr_data.forEach( function(data, index){
                console.log(data.cmb2.work_details );

                $('#contents-front-page-works').append(`
                    <article id="ymk-works-${index}">
                        <h3>${data.title.rendered}</h3>
                    </article>
               `);
            });

        });

    }

})(jQuery);
