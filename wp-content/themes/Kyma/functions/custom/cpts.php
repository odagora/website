<?php
$kyma_theme_options = kyma_theme_options();
$kyma_slider_cpt = $kyma_theme_options['kyma_slider_cpt'];
$kyma_service_cpt = $kyma_theme_options['kyma_service_cpt'];
$kyma_portfolio_cpt = $kyma_theme_options['kyma_portfolio_cpt'];
$kyma_testimonial_cpt = $kyma_theme_options['kyma_testimonial_cpt'];
$kyma_team_cpt = $kyma_theme_options['kyma_team_cpt'];
$kyma_client_cpt = $kyma_theme_options['kyma_client_cpt'];
$kyma_feature_cpt = $kyma_theme_options['kyma_feature_cpt'];
$kyma_pricing_cpt = $kyma_theme_options['kyma_pricing_cpt'];
function kyma_register_cpts()
{
    register_post_type('kyma_slider',
        array(
            'labels' => array(
                'name' => __('Kyma Sliders', 'kyma'),
                'add_new' => __('Add New Slider', 'kyma'),
                'add_new_item' => __('Add New Slider', 'kyma'),
                'edit_item' => __('Edit Slider', 'kyma'),
                'new_item' => __('New Link', 'kyma'),
                'all_items' => __('All Sliders', 'kyma'),
                'view_item' => __('View Slider', 'kyma'),
                'search_items' => __('Search Slider', 'kyma'),
                'not_found' => __('No Slider found', 'kyma'),
                'not_found_in_trash' => __('No Slider found in Trash', 'kyma'),
            ),
            'supports' => array('title', 'thumbnail'),
            'show_in' => true,
            'show_in_nav_menus' => false,
            'rewrite' => array('slug' => $GLOBALS['kyma_slider_cpt']),
            'public' => true,
            'menu_icon' => 'dashicons-format-gallery',
        )
    );
    /* Team CPT*/
    $labels = array(
        'name' => __('Kyma Team', 'kyma'),
        'all_items' => __('All Members', 'kyma'),
        'view_item' => __('View Member', 'kyma'),
        'add_new_item' => __('Add New Member', 'kyma'),
        'add_new' => __('Add New Member', 'kyma'),
        'edit_item' => __('Edit Member', 'kyma'),
        'update_item' => __('Update Member', 'kyma'),
        'search_items' => __('Search Member', 'kyma'),
    );
    $args = array(
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'menu_position' => 25,
		'rewrite' => array('slug' => $GLOBALS['kyma_team_cpt']),
        'can_export' => true,
        'menu_icon' => 'dashicons-groups',
    );
    register_post_type('kyma_team', $args);
    /* Service cpt */
    register_post_type('kyma_service',
        array(
            'labels' => array(
                'name' => __('Servicios', 'kyma'),
                'add_new' => __('Add New Service', 'kyma'),
                'add_new_item' => __('Add New Service', 'kyma'),
                'edit_item' => __('Edit Service', 'kyma'),
                'new_item' => __('New Service', 'kyma'),
                'all_items' => __('All Services', 'kyma'),
                'view_item' => __('View Link', 'kyma'),
                'search_items' => __('Search Links', 'kyma'),
                'not_found' => __('No Links found', 'kyma'),
                'not_found_in_trash' => __('No Links found in Trash', 'kyma'),
            ),
            'supports' => array('title', 'thumbnail'),
            'show_in' => true,
            'show_in_nav_menus' => false,
            'rewrite' => array('slug' => $GLOBALS['kyma_service_cpt']),
            'public' => true,
            'menu_icon' => 'dashicons-admin-tools',
        )
    );
    /* Features CPT */
    register_post_type('kyma_feature',
        array(
            'labels' => array(
                'name' => __('Kyma Features', 'kyma'),
                'add_new' => __('Add New Feature', 'kyma'),
                'add_new_item' => __('Add New Feature', 'kyma'),
                'edit_item' => __('Edit Feature', 'kyma'),
                'new_item' => __('New Feature', 'kyma'),
                'all_items' => __('All Features', 'kyma'),
                'view_item' => __('View Link', 'kyma'),
                'search_items' => __('Search Links', 'kyma'),
                'not_found' => __('No Links found', 'kyma'),
                'not_found_in_trash' => __('No Links found in Trash', 'kyma'),
            ),
            'supports' => array('title'),
            'show_in' => true,
            'show_in_nav_menus' => false,
            'rewrite' => array('slug' => $GLOBALS['kyma_feature_cpt']),
            'public' => true,
            'menu_icon' => 'dashicons-networking',
        )
    );
    /* Portfolio cpt */
    register_post_type('kyma_portfolio',
        array(
            'labels' => array(
                'name' => __('Kyma Portfolio', 'kyma'),
                'add_new' => __('Add New Portfolio', 'kyma'),
                'add_new_item' => __('Add New Portfolio', 'kyma'),
                'edit_item' => __('Edit Portfolio', 'kyma'),
                'new_item' => __('New Portfolio', 'kyma'),
                'all_items' => __('All Portfolios', 'kyma'),
                'view_item' => __('View Link', 'kyma'),
                'search_items' => __('Search Links', 'kyma'),
                'not_found' => __('No Links found', 'kyma'),
                'not_found_in_trash' => __('No Links found in Trash', 'kyma'),
            ),
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in' => true,
            'show_in_nav_menus' => false,
            'rewrite' => array('slug' => $GLOBALS['kyma_portfolio_cpt']),
            'public' => true,
            'menu_icon' => 'dashicons-portfolio',
        )
    );
    $labels = array(
        'name' => __('Portfolio category', 'kyma'),
        'all_items' => __('All Categories', 'kyma'),
        'new_item_name' => __('New Category Name', 'kyma'),
        'add_new_item' => __('Add New Category', 'kyma'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('portfolio_taxonomy', array('kyma_portfolio'), $args);
    /* Testimonial CPT*/
    register_post_type('kyma_testimonial',
        array(
            'labels' => array(
                'name' => __('Kyma Testimonial', 'kyma'),
                'add_new' => __('Add New Testimonial', 'kyma'),
                'add_new_item' => __('Add New Testimonial', 'kyma'),
                'edit_item' => __('Edit Testimonial', 'kyma'),
                'new_item' => __('New Testimonial', 'kyma'),
                'all_items' => __('All Testimonials', 'kyma'),
                'view_item' => __('View Link', 'kyma'),
                'search_items' => __('Search Links', 'kyma'),
                'not_found' => __('No Links found', 'kyma'),
                'not_found_in_trash' => __('No Links found in Trash', 'kyma'),
            ),
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in' => true,
            'show_in_nav_menus' => false,
            'rewrite' => array('slug' => $GLOBALS['kyma_testimonial_cpt']),
            'public' => true,
            'menu_icon' => 'dashicons-format-chat',
        )
    );
    /* Client CPT*/
    register_post_type('kyma_client',
        array(
            'labels' => array(
                'name' => __('Kyma Clients', 'kyma'),
                'add_new' => __('Add New Client', 'kyma'),
                'add_new_item' => __('Add New Client', 'kyma'),
                'edit_item' => __('Edit Client Info', 'kyma'),
                'new_item' => __('New Client', 'kyma'),
                'all_items' => __('All Clients', 'kyma'),
                'view_item' => __('View Link', 'kyma'),
                'search_items' => __('Search Links', 'kyma'),
                'not_found' => __('No Links found', 'kyma'),
                'not_found_in_trash' => __('No Links found in Trash', 'kyma'),
            ),
            'supports' => array('title', 'thumbnail'),
            'show_in' => true,
            'show_in_nav_menus' => false,
            'rewrite' => array('slug' => $GLOBALS['kyma_client_cpt']),
            'public' => true,
            'menu_icon' => 'dashicons-businessman',
        )
    );
    /* Pricing table CPT*/
    register_post_type('kyma_pricing_plan',
        array(
            'labels' => array(
                'name' => __('Kyma Pricing Plan', 'kyma'),
                'add_new' => __('Add New Plan', 'kyma'),
                'add_new_item' => __('Add New Plan', 'kyma'),
                'edit_item' => __('Edit Plan', 'kyma'),
                'new_item' => __('New Plan', 'kyma'),
                'all_items' => __('All Pricing Plans', 'kyma'),
                'view_item' => __('View Link', 'kyma')
            ),
            'supports' => array('title'),
            'show_in' => true,
            'show_in_nav_menus' => false,
            'rewrite' => array('slug' => $GLOBALS['kyma_pricing_cpt']),
            'public' => true,
            'menu_icon' => 'dashicons-list-view',
        )
    );
}

add_action('init', 'kyma_register_cpts');
/* add default terms in our Portfolio Taxonomy */
add_action('init', 'add_defaut_terms_in_portfolio');
function add_defaut_terms_in_portfolio()
{
    $default_cat_id = get_option('dafault_portfolio_category_id');
    if (!$default_cat_id) {
        wp_insert_term(
            'All', // the term
            'portfolio_taxonomy', // the taxonomy
            array(
                'description' => 'Default Category',
                'slug' => 'all'
            )
        );
        $term = term_exists('all', 'portfolio_taxonomy');
        $term_id = $term['term_id'];
        update_option('dafault_portfolio_category_id', $term_id);

    }
    if (isset($_POST['action']) && $_POST['action'] == 'delete-tag' && isset($_POST['taxonomy']) && isset($_POST['tag_ID'])) {
        if ($_POST['tag_ID'] == $default_cat_id):
            delete_option('dafault_portfolio_category_id');
        endif;
    }

    if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['taxonomy'])) {

        if (in_array($default_cat_id, $_POST['delete_tags'])):
            delete_option('dafault_portfolio_category_id');
        endif;
    }
}

add_action('save_post', 'setdefaultcategorytothepostifnotset');
function setdefaultcategorytothepostifnotset($post_id)
{
    if (get_post_type($post_id) == "kyma_portfolio") {
        $terms = wp_get_post_terms($post_id, 'portfolio_taxonomy');
        if (!$terms):
            $default_cat_id = get_option('dafault_portfolio_category_id');
            $default_term = get_term_by('id', $default_cat_id, 'portfolio_taxonomy', 'ARRAY_A');
            wp_set_post_terms($post_id, $default_term, 'portfolio_taxonomy');
        endif;
    }
}