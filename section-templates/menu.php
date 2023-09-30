<?php
global $section_id;
$meal_section = get_post($section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_description = $meal_section->post_content;
?>

<div class="section bg-light" id="section-menu" data-aos="fade-up">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php echo esc_html($meal_section_title);?></h2>
                <?php 
                echo apply_filters('the_content',$meal_section_description);
                ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav site-tab-nav" id="pills-tab" role="tablist">
                    <?php
                    $meal_counter = 0;
                    $meal_feat_categories =  get_terms(array(
                        'taxonomy' => 'category',
                        'meta_key' => 'meal-tax-featured',
                        'meta_value' => 'a:1:{s:8:"featured";b:1;}'
                    ));
                    if($meal_feat_categories):
                        foreach($meal_feat_categories as $meal_feat_category):
                            $meal_counter++
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $meal_counter == 1 ? 'active' : ''; ?>" id="pills-<?php echo esc_attr($meal_feat_category->name);?>-tab" data-toggle="pill" href="#pills-<?php echo esc_attr($meal_feat_category->name);?>" role="tab" aria-controls="pills-<?php echo esc_attr($meal_feat_category->name);?>" aria-selected="<?php echo $meal_counter == 1 ? 'true' : 'false'; ?>">
                                <?php echo esc_html($meal_feat_category->name);?>
                            </a>
                        </li> 
                        <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <?php
                    $meal_counter = 0;
                    foreach($meal_feat_categories as $meal_feat_category):
                        $meal_counter++
                    ?>
                    <div class="tab-pane fade <?php echo $meal_counter == 1 ? 'show active' : ''; ?>" id="pills-<?php echo esc_attr($meal_feat_category->name);?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr($meal_feat_category->name);?>-tab">
                        <?php
                        $meal_cat_args = array(
                            'post_type' => 'recipe',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                    array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => $meal_feat_category->slug,
                                    ),
                                ),
                            );
                        $meal_featured_recipes = new WP_Query($meal_cat_args);
                        if($meal_featured_recipes->have_posts()):
                        while($meal_featured_recipes->have_posts()){
                            $meal_featured_recipes->the_post();
                            ?>
                             <div class="d-block d-md-flex menu-food-item">                            
                                <div class="text order-1 mb-3">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url());?>" alt="<?php the_title();?>">
                                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    <?php the_excerpt();?>
                                </div>
                                <div class="price order-2">
                                    <strong>
                                        $<?php 
                                        $meal_recipe_meta = get_post_meta( get_the_ID(), 'meal-recipe', true );
                                        if($meal_recipe_meta){
                                            echo $meal_recipe_meta['type'];
                                        }
                                        ?>
                                    </strong>
                                </div>
                            </div> <!-- .menu-food-item -->
                            <?php
                        }
                        wp_reset_query();
                        endif;
                        ?>                       
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>

        </div>
    </div>
</div> <!-- .section -->