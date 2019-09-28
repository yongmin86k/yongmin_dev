<section id="contents-front-page-about-me" class="section-front-about-me visible">
	<div class="about-me-gradation-bg"></div>
	<div class="about-me-gradation-bg"></div>
	<div class="header-meta">
		<h3 class="section-title">
			<a href="<?php echo esc_url( home_url( '/about-me' ) ) ;?>">
				About me
			</a>
		</h3>
	</div>

    <div class="about-me-description">
        <p class="about-me-description-para">
            <span>I am enthusiastic </span>
            <span>about <em>imagining</em></span>
            <span><em>and creating</em></span>
            <span>digital products.</span>
        </p>
    </div>

    <div class="read-more-container">
        <a class="read-more-link" href="<?php echo esc_url( home_url( '/about-me' ) ) ;?>">
            More about me —>
        </a>
    </div>
    <?php
        $skills = get_post_meta( get_the_ID(), 'my_skill_sets', true );
        $skills_soft = array();
        $skills_dev = array();
        $skills_des = array();

        forEach($skills as $skill) {
            // var_dump( $skill['skill_cat'] );
            if ( $skill['skill_cat'] === 'skill_soft' ){
	            $skills_soft[] = array(
                    'name' => $skill['skill_name'],
                    'icon' => $skill['skill_icon'],
                );
            } else if ( $skill['skill_cat'] === 'skill_dev' ) {
	            $skills_dev[] = array(
		            'name' => $skill['skill_name'],
		            'icon' => $skill['skill_icon'],
	            );
            } else if ( $skill['skill_cat'] === 'skill_des' ) {
	            $skills_des[] = array(
		            'name' => $skill['skill_name'],
		            'icon' => $skill['skill_icon'],
	            );
            } // endif($skill)
        } // endforEach($skills)
    ?>
    <div class="container-skills skills-soft">
        <h4 class="sub-title">Soft Skills</h4>
        <div class="skills-set">
            <?php
                foreach($skills_soft as & $skill) :
                    $name = ucwords($skill['name']);
                    $icon = $skill['icon'];
            ?>
                <div class="skills-set-element">
                    <img class="skills-set-element-grid" src="<?php echo get_template_directory_uri().'/images/ic-grid.svg' ;?>">
                    <img class="skills-set-element-img" src="<?php echo $icon ;?>">
                    <p class="skills-set-element-title">
                        <?php echo $name ;?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container-skills skills-dev">
        <h4 class="sub-title">Develop Skills</h4>
        <div class="skills-set">
		    <?php
		        foreach($skills_dev as & $skill) :
                    $name = ucwords($skill['name']);
                    $icon = $skill['icon'];
            ?>
                <div class="skills-set-element">
                    <img class="skills-set-element-grid" src="<?php echo get_template_directory_uri().'/images/ic-grid.svg' ;?>">
                    <img class="skills-set-element-img" src="<?php echo $icon ;?>">
                    <p class="skills-set-element-title">
					    <?php echo $name ;?>
                    </p>
                </div>
		    <?php endforeach; ?>
        </div>
    </div>
    <div class="container-skills skills-des">
        <h4 class="sub-title">Design Skills</h4>
        <div class="skills-set">
		    <?php
                foreach($skills_des as & $skill) :
                    $name = ucwords($skill['name']);
                    $icon = $skill['icon'];
            ?>
                <div class="skills-set-element">
                    <img class="skills-set-element-grid" src="<?php echo get_template_directory_uri().'/images/ic-grid.svg' ;?>">
                    <img class="skills-set-element-img" src="<?php echo $icon ;?>">
                    <p class="skills-set-element-title">
					    <?php echo $name ;?>
                    </p>
                </div>
		    <?php endforeach; ?>
        </div>
    </div>

</section><!-- #contents-front-page-about-me -->