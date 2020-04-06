<?php
/**
 * The main template file.
 *
 * @package ymk_dev_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

        <section id="contents-about-page-greeting" class="section-about-greeting">
            <h2 class="section-title">
                Hello, my name is <em>Yongmin Kim.</em>
            </h2>
            <p>I am a freelance UX/UI designer, passionate about imagining and shaping digital products. </p>
            <p>The followings are the principles of my design and short timeline of me.</p>
            <p class="page_date">Updated 10 June 2018</p>
        </section>

        <hr>

        <section id="contents-about-page-principles" class="section-about-principles">
            <div class="container-principles">
                <h3 class="">1. Listen and undesrtand the needs.</h3>
                <div class="principles-wrap">
                    <div class="principles-icon">
                        <div class="box_grid">
                            <img src="<?php echo get_template_directory_uri() .'/images/ic-grid.svg' ;?>">
                            <div class="box_icon">
                                <img src="<?php echo get_template_directory_uri() .'/images/ic-listen.svg' ;?>">
                            </div>
                        </div>
                    </div>
                    <div class="box_content">
                        <em>“Design is not for me, but for everyone.”</em>
                        <p>Core elements of my design are made up of <strong>theme, concept and purpose.</strong> To determine one of them, listening and understanding of people is inevitable process to go though.</p>
                        <p>As <?php echo date('Y') - 2014 ?> years of freelance developer and designer, I experienced and understood how different peoples are. To focus and to set the right direction of the goal people want, I share many conversations with them and do research until the meaning of ‘good’ is ‘good’ of people.</p>
                    </div>

                </div>
            </div>
            <div class="container-principles">
                <h3>2. <cite class="line-through">Simple</cite> Intuitive design</h3>
                <div class="principles-wrap">
                    <div class="principles-icon">
                        <img src="<?php echo get_template_directory_uri() .'/images/ic-grid.svg' ;?>">
                        <img src="<?php echo get_template_directory_uri() .'/images/ic-objects.svg' ;?>">
                    </div>
                    <div class="principles-content">
                        <p>I do not seek simple design, although it seems simple.</p>
                        <p>And, I would like to quote a sentence from the book of Donald Norman.</p>
                        <em class="em-quote">“Even the world is complex, and so are people.”</em>
                        <cite class="small"><em>“Living with Complexity”</em> by <em>Don Norman.</em></cite>
                        <p>I show high proficiency at <strong>comprehensible design</strong> and love to build <strong>with intuitive modules</strong> such as buttons, sliders, indicators or text fields that people already familiar with. Combining and mixing the modules is my favorite solution for complex works.</p>
                    </div>
                </div>
            </div>
            <div class="container-principles">
                <h3>3. It·er·ate and it-er-ate again. </h3>
                <div class="principles-wrap">
                    <div class="principles-icon">
                        <img src="<?php echo get_template_directory_uri() .'/images/ic-grid.svg' ;?>">
                        <img src="<?php echo get_template_directory_uri() .'/images/ic-iterate.svg' ;?>">
                    </div>
                    <div class="principles-content">
                        <cite class="small"><em>Inspired by UK Government design principles.</em></cite>
                        <p>I believe there are better and much more better ways to show something, better visualized designs; reusuable designs, shareable designs, and even looking fancy designs.</p>
                        <p>Therefore, I enjoy to <strong>examine and practice with many variables</strong> until meeting the pleasant outcome.</p>
                    </div>
                </div>
            </div>
        </section> <!-- #contents-about-page-greeting -->

        <hr>

        <section id="contents-about-page-timeline" class="section-about-timeline">
            <h3>Timeline</h3>

            <div class="container-timeline">

                <div class="timeline-line">
                    <div class="line-not-me"></div>
                    <div class="line-me"></div>
                </div>

                <div class="timeline-node">
                    <div id="obj-timeline-node" class="node"></div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box">
                        <div class="dashed"></div>
                    </div>
                    <div class="header-box">
                        <h3>I live in Seoul.</h3>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box"></div>
                    <div class="content-box">
                        <p>I have lived and studied in Canada for the high school and came back to Seoul, South Korea. And sharing my life with this fabulous city.</p>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box">
                        <div class="dashed"></div>
                    </div>
                    <div class="header-box">
                        <h3>I have business administration degree.</h3>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box"></div>
                    <div class="content-box">
                        <p>I majored in Hotel Management in Sejong University and started my career as a marketing consultant in KPC(Korea Productivity Center). </p>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box">
                        <div class="dashed"></div>
                    </div>
                    <div class="header-box">
                        <h3>I live in digital world.</h3>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box"></div>
                    <div class="content-box">
                        <p>I realized that my true love is hexadecimal numbers such as RGB and memory codes. So, I left the decimal world and accountings.</p>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box">
                        <div class="dashed"></div>
                    </div>
                    <div class="header-box">
                        <h3 id="txt_neko">I meet Team Manekineko.</h3>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box"></div>
                    <div class="content-box">
                        <p>Team Manekineko is a group of developers and designers. Team members and I share ideas and build plans for better digital world.</p>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box">
                        <div class="dashed"></div>
                    </div>
                    <div class="header-box">
                        <h3>I share and grow dream.</h3>
                    </div>
                </div>

                <div class="timeline-box">
                    <div class="hidden-box"></div>
                    <div class="content-box">
                        <p>My world changes rapidly, and I am trying to keep my skills up. Just 4 or 5 years ago, Web for destkop computers was dominant, and I had designed to suit them.</p>
                        <p>Recently, few people use the computer to access the information. The device has changed and so are the interface designs and the behavior of people. I need to adjust to the moving world, and need to preprare another era. It is because I love this change and looking forward to it.</p>
                    </div>
                </div>

            </div>
        </section> <!-- #contents-about-page-timeline -->

        <hr>

        <section id="contents-about-page-contact" class="section-about-contact">
            <div class="container-contact-icon">
                <img src="<?php echo get_template_directory_uri() .'/images/ic-info.svg' ;?>">
            </div>
            <div class="container-contact-content">
                <h3>Need more information of me?</h3>
                <p>If you are interested in any part of me, I love to share chats with you. Just give me an email, and I will be back to you.</p>
                <a href="mailto:yongmin86k@gmail.com" target="_blank">yongmin86k@gmail.com</a>
                <p>Thank you.</p>
                <button class="black" type="button">
                    <a href="mailto:yongmin86k@gmail.com" target="_blank">Email me</a>
                </button>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>