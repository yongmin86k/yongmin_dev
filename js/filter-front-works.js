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
                let date_start, date_end, date_parsed, title,
                    url, roles, tag__main, tag__sub;


                date_start = data.cmb2.work_details.date_start.slice(0,7).replace('-', '. ');
                date_end = data.cmb2.work_details.date_end.slice(0,7).replace('-', '. ');
                date_parsed = date_start === date_end ? date_start : `${date_start} - ${date_end}`;
                title = data.title.rendered;

                url = data.cmb2.work_details.work_url;

                console.log( data.cmb2 );

                $('#contents-front-page-works').append(`
                    <article id="ymk-works-${index}" class="article-works">
                        <div class="article-meta">
                            <p class="work-date">${date_parsed}</p>
                            <h3 class="work-title">${title}</h3>
                            <a class="work-link" href="${url}">
                                Read more <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                        
                    </article>
               `);
            });

        });

    }

})(jQuery);
