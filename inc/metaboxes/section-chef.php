<?php
function meal_chef_section_metabox($metaboxes){

    $section_id = 0;    

    if(isset($_REQUEST['post']) || isset ($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section' !== get_post_type($section_id)){
        return $metaboxes;
    }
    
    $section_meta = get_post_meta($section_id, 'meal-section-type', true);
    $section_type = $section_meta['type'] ?? '';
    if('chef' != $section_type){
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id' => 'meal-section-chef',
        'title' => __('Chef Settings', 'meal'),
        'post_type' => 'section',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'id' => 'meal-chef-section-one',
                'name' => 'meal-chef-section-one',
                'icon' => 'fa fa-image',
                'fields' => array(
                    array(
                        'id' => 'chef',
                        'type' => 'group',
                        'title' => __('Chef', 'meal'),
                        'button_title' => __('New chef', 'meal'),
                        'accordion_title' => __('Add new chef', 'meal'),
                        'fields' => array(
                            array(
                                'id' => 'name',
                                'title' => __('Name', 'meal'),
                                'type' => 'text',
                            ),
                            array(
                                'id' => 'image',
                                'title' => __('Image', 'meal'),
                                'type' => 'image',
                            ),
                            array(
                                'id' => 'designation',
                                'title' => __('Designation', 'meal'),
                                'type' => 'text',
                            ),
                            array(
                                'id' => 'description',
                                'title' => __('Description', 'meal'),
                                'type' => 'wysiwyg',
                            ),
                            array(
                                'id' => 'facebook',
                                'title' => 'Facebook',
                                'type' => 'text',
                            ),
                            array(
                                'id' => 'twitter',
                                'title' => 'Twitter',
                                'type' => 'text',
                            ),
                            array(
                                'id' => 'instagram',
                                'title' =>'Instagram',
                                'type' => 'text',
                            )
                        )
                    ),
                    
                )
            )
        )
    );
    return $metaboxes;
}

add_filter('cs_metabox_options', 'meal_chef_section_metabox');

