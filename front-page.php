<?php
/**
 * The main template file.
 *
 * @package ymk_dev_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php the_post(); ?>

        <section class="canvas-isometric">
            <video class="bg_video" playsinline="" autoplay="" loop="" muted="" preload="none" src="<?php echo get_template_directory_uri();?>/images/video_main.mp4">
                Your browser does not support Video.
            </video>

            <div class="obj-loading"></div>
            <div class="overlay-dim"></div>
            <div class="container-contents">
                <h2 class="greeting-main">
                    <span>Hi, I am</span>
                    <span>Yongmin</span>
                </h2>
                <div class="greeting-careers">
                    <p>Full stack developer</p>
                    <p>UX/UI designer</p>
                    <p>and digital lover</p>
                </div>
            </div>
            <div class="container-scroll-indicator">
                <div class="ic_mouse">
                    <div class="ic_mouse_body">
                        <div class="ic_mouse_node"></div>
                    </div>
                    <svg class="ic_chevron_down" width="17px" height="10px" viewBox="0 0 17 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <polyline stroke="#FFFFFF" stroke-width="3" fill="none" fill-rule="evenodd" points="1.23672111 1 8.1102256 7.8735045 14.9837301 1"></polyline>
                    </svg>
                    <svg class="ic_chevron_down" width="17px" height="10px" viewBox="0 0 17 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <polyline stroke="#FFFFFF" stroke-width="3" fill="none" fill-rule="evenodd" points="1.23672111 1 8.1102256 7.8735045 14.9837301 1"></polyline>
                    </svg>
                </div>
                <p>Scroll Down</p>
            </div>

        </section>

        <section>
            <?php the_content(); ?>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>