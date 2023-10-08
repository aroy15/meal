<?php

/**
 * Template Name: Pricing Page
 */

get_header();
?>

<div class="main-wrap">
    <?php
    $meal_section_id = 17;
    get_template_part("section-templates/banner");
    the_post();
    ?>

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
                            <th scope="col">Small Plan</th>
                            <th scope="col">Big Plan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Item One</td>
                            <td>Text One</td>
                            <td>Text Two</td>
                        </tr>
                        <tr>
                            <td>Item One</td>
                            <td>Text One</td>
                            <td>Text Two</td>
                        </tr>
                        <tr>
                            <td>Item One</td>
                            <td>Text One</td>
                            <td>Text Two</td>
                        </tr>
                        <tr>
                            <td>More Item</td>
                            <td>
                                <i class="fa fa-check plan-active-color" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-check plan-active-color" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>More Item</td>
                            <td>
                                <i class="fa fa-ellipsis-h plan-inactive-color" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-check plan-active-color" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong></strong>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger">
                                    <?php _e('Get This Plan', 'meal'); ?>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger">
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