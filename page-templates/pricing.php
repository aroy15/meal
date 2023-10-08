<?php

/**
 * Template Name: Pricing Page
 */
?>

<?php
$meal_pricing_meta = get_post_meta(get_the_ID(), 'meal-pricing-options', true);
$meal_pricing_items = explode("\n", $meal_pricing_meta['items']);
$meal_pricing_one_items = explode("\n", $meal_pricing_meta['plan-one-items']);
$meal_pricing_two_items = explode("\n", $meal_pricing_meta['plan-two-items']);

get_header();

$meal_section_id = 17;
get_template_part("section-templates/banner");
the_post();
?>
<div class="main-wrap">
    <div class="section bg-white" data-aos="fade-up">
        <div class="container">
            <div class="row section-heading justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <h2 class="heading mb-3">Pricing Page</h2>
                    <p>Here is the pricing page</p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered price-plan">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"><?php echo esc_html($meal_pricing_meta['plan-one-title']);?></th>
                            <th scope="col"><?php echo esc_html($meal_pricing_meta['plan-two-title']);?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $meal_counter = 0;
                        foreach($meal_pricing_items as $meal_pricing_item): 
                            $meal_plan_one_data = apply_filters('meal_pricing_item', $meal_pricing_one_items[$meal_counter]);
                            $meal_plan_two_data = apply_filters('meal_pricing_item', $meal_pricing_two_items[$meal_counter]);
                        ?>
                        <tr>
                            <td><strong><?php echo esc_html($meal_pricing_item);?></strong></td>
                            <td>
                                <?php echo wp_kses_post($meal_plan_one_data);?>
                            </td>
                            <td>
                                <?php echo wp_kses_post($meal_plan_two_data);?>
                            </td>
                        </tr>
                        <?php 
                        $meal_counter++;
                        endforeach;
                        ?>
                       
                        <tr>
                            <td>
                                <strong><?php _e('Action', 'meal');?></strong>
                            </td>
                            <td>
                                <a href="<?php echo esc_url($meal_pricing_meta['plan-one-action']);?>" class="btn btn-danger">
                                    <?php _e('Get This Plan', 'meal'); ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo esc_url($meal_pricing_meta['plan-two-action']);?>" class="btn btn-danger">
                                    <?php _e('Get This Plan', 'meal'); ?>
                                </a>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- .section -->
<div>
<?php get_footer(); ?>