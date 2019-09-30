(function($) {
    const animationTime = 700;
    let workTaxonomies = [],
        workRoles = [];
        appendWorkTaxonomies();
        appendRoleTaxonomies();

    // document ready
    $(function(){

        if ( $('.filter-txt').length > 0 ){
            let $obj = $('.filter-txt');

        // Custom styling for input[t=radio] -> $works
        activateFilterStyles($obj);
        $obj.on('click', 'label', function(){
            activateFilterStyles($obj, $(this));
        });

        // Fetch localized rest wp-api
        fetchWordPressData();
        $obj.on('click', 'input', function(){
            fetchWordPressData( $(this) );
        });

        }

    }); // end document ready

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

    // Retrieve names of work_roles
    function appendRoleTaxonomies(){
        let taxonomies = 'work_roles';
        $.ajax({
            method: 'get',
            url: `${ymk_api_works.rest_url}wp/v2/${taxonomies}`,
        }).always(function () {

        }).fail(function () {

        }).done(function (result) {
            workRoles = result;
        });

    }

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

    // Retrieve and add feature images of latest works
    function getFeaturedImage(imgID, index, url){
        $.ajax({
            method: 'get',
            url: `${ymk_api_works.rest_url}wp/v2/media/${imgID}`,
        }).always(function () {

        }).fail(function (err) {
            console.log(err);
        }).done(function (result) {
            let imgSrc = result.source_url;

            $(`#${index}`).find('.article-feat-img').append(`
                <a href="${url}">
                    <img class="work-feat-img" src="${imgSrc}">
                </a>
            `);

            $(`#${index}`).find('.work-feat-img').fadeIn(animationTime);

        });
    }

    // Fetch work-post data with localized wp-api
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
        }).fail(function(err){
            console.log(err);

        }).done(function(result){
            const arr_data = result;

            // Sort work_taxonomies in ASC order
            arr_data.forEach( function(data) {
               data.work_taxonomies.sort((a, b) => {
                    return a - b
               });
            });

            // Sort work_roles in ASC order
            arr_data.forEach( function(data){
               data.work_roles.sort((a, b) => {
                 return a - b
               });
            });

            $('#contents-front-page-works').html('');

            arr_data.forEach( function(data, index){
                let date_start, date_end, date_parsed, imgID, title, url;

                date_start = data.cmb2.work_details.date_start.slice(0,7).replace('-', '. ');
                date_end = data.cmb2.work_details.date_end.slice(0,7).replace('-', '. ');
                date_parsed = date_start === date_end ? date_start : `${date_start} - ${date_end}`;
                imgID = data.featured_media;
                title = data.title.rendered;

                url = data.cmb2.work_details.work_url;

                // Create general info of each latest work
                $('#contents-front-page-works').append(`
                    <article id="ymk-works-${index}" class="article-works">
                        <div class="article-feat-img"></div>
                        <div class="article-contents">
                            <div class="article-meta">
                                <p class="work-date">${date_parsed}</p>
                                <h3 class="work-title">${title}</h3>
                                <a class="work-link" href="${url}">
                                    Read more
                                </a>
                            </div>
                            <div class="role-meta">
                                <p class="role-meta-title">Roles</p>
                                <div class="role-container"></div>
                            </div>
                            <div class="tag-meta"></div>
                        </div>
                    </article>
               `); // end $('#contents-front-page-works').append()

                $(`#ymk-works-${index}`).fadeIn(animationTime);

                // Create roles of each latest work

                if (data.work_roles.length > 0) {

                    data.work_roles.forEach(function (value) {
                        let checkValue, $thisID, $thisLink, $thisName;

                        if (workRoles.length > 0) {

                            checkValue = workRoles.find(function(workRole){
                                if (workRole.id){
                                    return workRole.id === value
                                }
                            });

                            $thisID = checkValue.id;
                            $thisLink = checkValue.link;
                            $thisName = checkValue.name;

                            $(`#ymk-works-${index}`).find('.role-container').append(`
                                <p class="role-element role-tag-id-${$thisID}">
                                    <a class="role-link" href="${$thisLink}">
                                        ${$thisName}
                                    </a>
                                </p>                        
                            `); // end append()

                        } else {
                            appendRoleTaxonomies();
                        } // endif(workRoles.length)

                    }); // endforEach(data.work_roles)
                } // endif(data.work_roles)

                // Create tags of each latest work
                if (data.work_taxonomies.length > 0) {

                    data.work_taxonomies.forEach(function (value) {
                        let checkValue, $thisID, $thisParentID, $thisLink, $thisName;

                        if ( workTaxonomies.length > 0) {
                            checkValue = workTaxonomies.find(function(workTaxonomy){
                                if (workTaxonomy.id){
                                    return workTaxonomy.id === value;
                                }
                            });

                            $thisID = checkValue.id;
                            $thisLink = checkValue.link;
                            $thisName = checkValue.name;

                            if ( checkValue.parent === 0 ){
                            // Create tag container and add the first tag
                                $(`#ymk-works-${index}`).find('.tag-meta').append(`
                                    <div class='tag-container parent-tag-id-${$thisID}'>
                                        <p class="tag-element child-tag-id-${$thisID}">
                                            <a class="tag-link" href="${$thisLink}">
                                                ${$thisName}
                                            </a>
                                        </p>
                                    </div>
                                `);
                            } else {
                            // Add a tag relevant to its parent tag
                                $thisParentID = checkValue.parent;
                                $(`#ymk-works-${index}`).find(`.parent-tag-id-${$thisParentID}`).append(`
                                    <p class="tag-element child-tag-id-${$thisID}">
                                        <a class="tag-link" href="${$thisLink}">
                                            ${$thisName}
                                        </a>
                                    </p>
                                `);
                            } // endif(checkValue.parent)

                        } else {
                            appendWorkTaxonomies();
                        } // endif(workTaxonomies.length)

                    }); // endforEach(data.work_taxonomies)
                } // endif(data.work_taxonomies.length)

                if ( imgID ){
                    getFeaturedImage(imgID, `ymk-works-${index}`, url);
                }

            }); // end arr_data.forEach()
        }); //end $.ajax

    } // end function fetchWordPressData

})(jQuery);
