<?php

/**
 * Template Name: Mailchimp
 */
?>

<?php

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
                    <h2 class="heading mb-3"><?php the_title();?></h2>
                    <?php
                    the_content();
                    ?>
                </div>                
            </div>
        </div>
    </div> <!-- .section -->
    <section class="section-gap">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div id="mc_embed_shell">                       
                        <div id="mc_embed_signup">
                            <form action="https://gmail.us14.list-manage.com/subscribe/post?u=53a417682d208fda8edb7340f&id=583af6df17&f_id=00a088e0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                                <div id="mc_embed_signup_scroll"><h2>Subscribe</h2>
                                    <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                    <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""><span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span></div><div class="mc-field-group"><label for="mce-FNAME">First Name </label><input type="text" name="FNAME" class=" text" id="mce-FNAME" value=""></div><div class="mc-field-group"><label for="mce-LNAME">Last Name </label><input type="text" name="LNAME" class=" text" id="mce-LNAME" value=""></div><div class="mc-field-group"><label for="mce-PHONE">Phone Number </label><input type="text" name="PHONE" class="REQ_CSS" id="mce-PHONE" value=""></div>
                                    <div id="mce-responses" class="clear foot">
                                        <div class="response" id="mce-error-response" style="display: none;"></div>
                                        <div class="response" id="mce-success-response" style="display: none;"></div>
                                    </div>
                                    <div aria-hidden="true" style="position: absolute; left: -5000px;">
                                        /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
                                        <input type="text" name="b_53a417682d208fda8edb7340f_583af6df17" tabindex="-1" value="">
                                    </div>
                                    <div class="optionalParent">
                                        <div class="clear foot">
                                            <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe">
                                            <p style="margin: 0px auto;"><a href="http://eepurl.com/iBkCTU" title="Mailchimp - email marketing made easy and fun"><span style="display: inline-block; background-color: transparent; border-radius: 4px;"><img class="refferal_badge" src="https://digitalasset.intuit.com/render/content/dam/intuit/mc-fe/en_us/images/intuit-mc-rewards-text-dark.svg" alt="Intuit Mailchimp" style="width: 220px; height: 40px; display: flex; padding: 2px 0px; justify-content: center; align-items: center;"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--sdfdf-->
            </div>
        </div>
    </section>
<div>
<?php get_footer(); ?>