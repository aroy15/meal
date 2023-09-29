<?php
global $section_id;
$meal_section_meta = get_post_meta($section_id, 'meal-section-chef', true);

$meal_section = get_post($section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_description = $meal_section->post_content;
?>
<div class="section bg-white" data-aos="fade-up">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 section-heading text-center">
                <h2 class="heading mb-5"><?php echo esc_html($meal_section_title);?></h2>
            </div>
        </div>
        <?php
        $meal_section_chefs = $meal_section_meta['chef'];
        if($meal_section_chefs):
        ?>
        <div class="row">
            <?php            
            foreach($meal_section_chefs as $meal_section_chef){
                $meal_chef_img = wp_get_attachment_image_url($meal_section_chef['image'], 'medium');
                $meal_chef_name = $meal_section_chef['name'];
                $meal_chef_designation = $meal_section_chef['designation'];
                $meal_chef_dsc = $meal_section_chef['description'];
                $meal_chef_fb = $meal_section_chef['facebook'];
                $meal_chef_tw = $meal_section_chef['twitter'];
                $meal_chef_ins = $meal_section_chef['instagram'];
                ?>
                <div class="col-md-6 pr-md-5 text-center mb-5">
                    <div class="ftco-38">
                        <div class="ftco-38-img">
                            <div class="ftco-38-header">
                                <img src="<?php echo esc_url($meal_chef_img);?>" alt="<?php echo esc_attr($meal_chef_name);?>">
                                <h3 class="ftco-38-heading"><?php echo esc_html($meal_chef_name);?></h3>
                                <p class="ftco-38-subheading"><?php echo esc_html($meal_chef_designation);?></p>
                            </div>
                            <div class="ftco-38-body">
                                <?php
                                echo apply_filters('the_content', $meal_chef_dsc);
                                ?>
                                <p>
                                    <a href="<?php echo esc_url($meal_chef_fb);?>" class="p-2"><span class="fa fa-facebook"></span></a>
                                    <a href="<?php echo esc_url($meal_chef_tw);?>" class="p-2"><span class="fa fa-twitter"></span></a>
                                    <a href="<?php echo esc_url($meal_chef_ins);?>" class="p-2"><span class="fa fa-instagram"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            
        </div>
        <?php
        endif;
        ?>
    </div>
</div> <!-- .section -->