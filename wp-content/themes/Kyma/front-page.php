<?php
$kyma_theme_options = kyma_theme_options();
if ($kyma_theme_options['_frontpage']) {
    get_header();
    get_template_part('home', 'slider');
    foreach ($kyma_theme_options['homepage_layout']['Enabled'] as $key => $value) {
        get_template_part('home', $key);
    }
    get_footer();
} else {
    if (get_page_template_slug(get_the_ID())) {
        $page_name = get_page_template_slug(get_the_ID());
        $page_name = str_replace('.php', '', $page_name);
        get_template_part($page_name);
    } else if (is_page()) {
        get_template_part('page');
    }
} ?>