<?php

function meal_section_type_metabox($metboxes){
    $metboxes[] = array(
        'id' => 'meal-section-type',
        'title' => __('section type', 'meal'),
        'post_type' => 'section',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'id' => 'meal-section-type-section-one',
                'name' => __('Section', 'meal'),
                'icon' => 'fa fa-image',
                'fields' => array(
                    array(
                        'id' => 'type',
                        'title' => __('Select Section type', 'meal'),
                        'type' => 'select',
                        'options' => array(
                            'banner' => __('Banner', 'meal'),
                            'featured' => __('Featured Recipes', 'meal'),
                            'gallery' => __('Gallery', 'meal'),
                            'chef' => __('Chef', 'meal'),
                            'menu' => __('Menu', 'meal'),
                            'services' => __('Services', 'meal'),
                            'reservation' => __('Reservation', 'meal'),
                            'testimonials' => __('Testimonials', 'meal'),
                            'contact' => __('Contact', 'meal'),
                        )
                    )
                )
            )
        )
    );
    return $metboxes;
}
add_filter('cs_metabox_options', 'meal_section_type_metabox');


