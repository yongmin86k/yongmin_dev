<div class="header-meta">
    <h3 class="section-title">
        <a href="<?php echo esc_url( home_url( '/works' ) ) ;?>">
            Latest Works
        </a>
    </h3>

    <div id="ajax-front-page-works" class="filter-works">
        <!-- Filtering works with ajax	-->
            <div class="filter-txt">
                <input id="filter-works-all" type="radio" name="filter-works" value="all" checked>
                <label for="filter-works-all">All</label>
            </div>
	    <?php
            $taxonomies = get_terms( array(
                'taxonomy' => 'work_taxonomies',
                'hide_empty' => false,
                'parent' => 0,
                'order' => 'DESC'
            ));

            foreach( $taxonomies as $value ):
                $name =  $value  -> name;
                $slug =  $value  -> slug;
                $taxonomy_id = $value -> term_taxonomy_id;
        ?>
            <div class="filter-txt">
                <input id="filter-works-<?php echo $slug ;?>" type="radio" name="filter-works" value="<?php echo $taxonomy_id ;?>">
                <label for="filter-works-<?php echo $slug ;?>"><?php echo $name ;?></label>
            </div>
        <?php
            endforeach;
            wp_reset_postdata();
        ?>
    </div>

</div> <!-- end .header-meta -->

<section id="contents-front-page-works" class="visible">
    <!-- Fetch data with ajax -->
</section>

<div class="read-more-container">
    <a class="read-more-link" href="<?php echo esc_url( home_url( '/works' ) ) ;?>">
        See all works —>
    </a>
</div>