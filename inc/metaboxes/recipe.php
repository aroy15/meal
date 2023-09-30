<?php
function meal_recipe_metabox($metboxes){
    $metboxes[] = array(
        'id' => 'meal-recipe',
        'title' => __('Recipe Details', 'meal'),
        'post_type' => 'recipe',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'id' => 'meal-recipe-section-one',
                'name' => __('Recipe', 'meal'),
                'icon' => 'fa fa-image',
                'fields' => array(
                    array(
                        'id' => 'type',
                        'title' => __('Price', 'meal'),
                        'type' => 'text',
                        'default' => '0.0'
                    )
                )
            )
        )
    );
    return $metboxes;
}
add_filter('cs_metabox_options', 'meal_recipe_metabox');