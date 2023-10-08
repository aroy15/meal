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
                        ?>
                        <tr>
                            <td><strong><?php echo esc_html($meal_pricing_item);?></strong></td>
                            <td><?php echo esc_html($meal_pricing_one_items[$meal_counter]);?></td>
                            <td><?php echo esc_html($meal_pricing_two_items[$meal_counter]);?></td>
                        </tr>
                        <?php 
                        $meal_counter++;
                        endforeach;
                        ?>
                        <tr class="gray-bg">
                            <td>More Item</td>
                            <td>
                                <i class="fa fa-check plan-active-color fa-2x" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-check plan-active-color fa-2x" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>More Item</td>
                            <td>
                                <i class="fa fa-ellipsis-h plan-inactive-color fa-2x" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-check plan-active-color fa-2x" aria-hidden="true"></i>
                            </td>
                        </tr>
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