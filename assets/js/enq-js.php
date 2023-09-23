<?php
foreach(glob("*.js") as $js){
    echo "wp_enqueue_script('meal-{$js}', get_template_directory_uri().'/js/{$js}', null, '1.0', true);<br>";
}