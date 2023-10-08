<?php get_header();?>
<?php
        $meal_section_id = 17;
        get_template_part('section-templates/banner');
        ?>
    <div class="main-wrap " id="section-home">
        <div <?php post_class('single-post');?>>
            <section>
                <div class="container">
                    <div class="row post-body">
                        <div class="col-md-12">
                            <div id="posts-container">
                                <?php
                                while(have_posts()){
                                    the_post();
                                    ?>
                                    <div <?php post_class();?>>
                                        <h2>
                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </h2>
                                        <div class="post-content">
                                            <?php the_excerpt();?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5 d-flex justify-content-center">
                            <a href="<?php next_posts(get_max_page_number());?>" id="loadmore" class="btn btn-danger">
                                    <?php _e('Load More', 'meal'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

<?php get_footer();?>