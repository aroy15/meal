<?php
global $section_id;
$meal_section_meta = get_post_meta($section_id, 'meal-section-services', true);

$meal_section = get_post($section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_description = $meal_section->post_content;
?>

<div class="section bg-white services-section" data-aos="fade-up">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php echo esc_html($meal_section_title);?></h2>
                <p class="sub-heading mb-5"><?php echo esc_html($meal_section_description);?></p>
            </div>
        </div>
        <?php 
        if($meal_section_meta){
            $meal_services = $meal_section_meta['services'];
            ?>
            <div class="row">
                <?php
                foreach($meal_services as $meal_service):
                ?>
                <div class="col-m mb-5d-6 col-lg-4" data-aos="fade-up">
                    <div class="media feature-icon d-block text-center">
                        <div class="icon">
                            <span class="<?php echo esc_attr($meal_service['icon']);?>"></span>
                        </div>
                        <div class="media-body">
                            <h3><?php echo esc_html($meal_service['name']);?></h3>
                            <p><?php echo esc_html($meal_service['description']);?></p>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            <?php
        }
        ?>
        
    </div>
</div> <!-- .section -->