<?php
foreach(glob("*.css") as $css){
    echo "wp_enqueue_style('meal-{$css}', get_template_directory_uri().'/css/{$css}', null, '1.0');<br>";
}