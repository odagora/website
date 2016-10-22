<?php
define('LAYOUT_PATH', get_template_directory() . '/css/colors/');
define('OPTIONS_PATH', get_template_directory_uri() . '/inc/theme-option/options/');

class Redux_Framework_Kyma_config
{
    public $args = array();
    public $sections = array();
    public $theme;
    public $ReduxFramework;

    public function __construct()
    {

        if (!class_exists('ReduxFramework')) {
            return;
        }

        // This is needed. Bah WordPress bugs.  ;)
        if (true == Redux_Helpers::isTheme(__FILE__)) {
            $this->initSettings();
        } else {
            add_action('plugins_loaded', array($this, 'initSettings'), 10);
        }

    }

    function addAndOverridePanelCSS()
    {
        wp_register_style(
            'redux-custom-css',
            OPTIONS_PATH . 'css/style.css',
            time(),
            'all'
        );
        wp_enqueue_style('redux-custom-css');
    }

    function compiler_action($options, $css, $changed_values)
    {
        global $wp_filesystem;
        $filename = get_template_directory() . '/css/custom.css';

        if (empty($wp_filesystem)) {
            require_once(ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        if ($wp_filesystem) {
            $wp_filesystem->put_contents(
                $filename,
                $css,
                FS_CHMOD_FILE // predefined mode settings for WP files
            );
        }
    }

    public function initSettings()
    {
        load_theme_textdomain('kyma', get_template_directory() . '/lang');
        add_filter('redux/options/kyma_theme_options/compiler', array($this, 'compiler_action'), 10, 3);
        add_action('redux/page/kyma_theme_options/enqueue', array($this, 'addAndOverridePanelCSS'));
        // Set the default arguments
        $this->setArguments();

        // Create the sections and fields
        $this->setSections();

        if (!isset($this->args['opt_name'])) { // No errors please
            return;
        }
        $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
    }

    public function setSections()
    {
        $kyma_theme_options = kyma_theme_options();
        $alt_stylesheet_path = LAYOUT_PATH;
        $alt_stylesheets = array();
        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[$alt_stylesheet_file] = $alt_stylesheet_file;
                    }
                }
            }
        }

        $this->sections[] = array(
            'title' => __('Main Settings', 'kyma'),
            'header' => '',
            'desc' => "<div class='redux-info-field'><h3>" . __('Welcome to Kyma Theme Options', 'kyma') . "</h3>
					<p>" . __('This theme was developed by', 'kyma') . " <a href=\"http://www.webhuntinfotech.com/\" target=\"_blank\">WebHunt Infotech Themes</a></p>
					<p>" . __('For theme documentation visit', 'kyma') . ": <a href=\"http://docs.webhuntinfotech.com/kyma/\" target=\"_blank\">docs.webhuntinfotech.com/kyma/</a>
					<br />
					" . __('For support please visit', 'kyma') . ": <a href=\"http://wordpress.org/support/theme/kyma\" target=\"_blank\">wordpress.org/support/theme/kyma</a></p></div>",
            'icon_class' => 'icon-large',
            'icon' => 'el el-home',
            'customizer' => false,
            'fields' => array(
                array(
                    'id' => '_frontpage',
                    'type' => 'checkbox',
                    'compiler' => false,
                    'title' => __('Show Home Page', 'kyma'),
                    'subtitle' => __('Uncheck if you don\'t want to show', 'kyma'),
                    'default' => 1,
                ),
                array(
                    'id' => 'dark_sub_menu',
                    'type' => 'switch',
                    'compiler' => false,
                    'title' => __('Dark Sub Menu on Header', 'kyma'),
                    'default' => 0,
                ),
                array(
                    'id' => 'site_layout',
                    'type' => 'image_select',
                    'compiler' => false,
                    'title' => __('Site Layout Style', 'kyma'),
                    'subtitle' => __('Select Boxed or Wide Site Layout Style', 'kyma'),
                    'options' => array(
                        '' => array('alt' => 'Wide Layout', 'img' => OPTIONS_PATH . 'img/1c.png'),
                        'site_boxed' => array('alt' => 'Boxed Layout', 'img' => OPTIONS_PATH . 'img/3cm.png'),
                    ),
                    'default' => '',
                ),
                array(
                    'id' => 'footer_layout',
                    'type' => 'image_select',
                    'compiler' => false,
                    'title' => __('Footer Widget Layout', 'kyma'),
                    'subtitle' => __('Select how many columns for footer widgets', 'kyma'),
                    'options' => array(
                        4 => array('alt' => 'Four Column Layout', 'img' => OPTIONS_PATH . 'img/footer-widgets-4.png'),
                        3 => array('alt' => 'Three Column Layout', 'img' => OPTIONS_PATH . 'img/footer-widgets-3.png'),
                        2 => array('alt' => 'Two Column Layout', 'img' => OPTIONS_PATH . 'img/footer-widgets-2.png'),
                    ),
                    'default' => 4
                ),
                array(
                    'id' => 'logo-sep',
                    'type' => 'info',
                    'title' => 'Logo & Favicon Options',
                ),
                array(
                    'id' => 'logo_layout',
                    'type' => 'image_select',
                    'compiler' => false,
                    'title' => __('Logo Layout', 'kyma'),
                    'subtitle' => __('Choose how you want your logo to be laid out', 'kyma'),
                    'options' => array(
                         'left' => array('alt' => 'Logo Left Layout', 'img' => admin_url() . '/images/align-left-2x.png'),
                        'right' => array('alt' => 'Logo Right Layout', 'img' => admin_url() . '/images/align-right-2x.png'),
                    ),
                    'default' => 'left',
                ),
                array(
                    'id' => 'upload_image_logo',
                    'type' => 'media',
                    'compiler' => false,
                    'url' => true,
                    'title' => __('Logo', 'kyma'),
                    'subtitle' => __('Upload your Logo. If left blank theme will use site name.', 'kyma'),
                ),
                array(
                    'id' => 'x2_kyma_logo_upload',
                    'type' => 'media',
                    'url' => true,
                    'title' => __('Upload Your @2x Logo for Retina Screens', 'kyma'),
                    'compiler' => false,
                    'subtitle' => __('Should be twice the pixel size of your normal logo.', 'kyma'),
                ), 
                array(
                    'id' => 'logo_width',
                    'type' => 'slider',
                    "default" => "150",
                    "min" => "150",
                    "step" => "1",
                    "max" => "250",
                    'title' => __('Logo Width', 'kyma'),
                    'subtitle' => __('Select Logo Width', 'kyma'),
                ),
                array(
                    'id' => 'logo_padding',
                    'type' => 'spacing',
                    'title' => __('Logo Spacing', 'kyma'),
                    'units' => 'px',
                    "default" => array(
                        'top' => '0',
                        'right' => '15',
                        'bottom' => '0',
                        'left' => '15',
                    ),
                    'output' => array('#logo a')
                ),
                array(
                    'id' => 'upload_custom_favicon',
                    'type' => 'media',
                    'url' => true,
                    'title' => __('Upload Favicon', 'kyma'),
                ),
                array(
                    'id' => 'side_header',
                    'type' => 'checkbox',
                    'title' => __('Header on left Side', 'kyma'),
                    'subtitle' => __('Shift site header on left side', 'kyma'),
                    'default' => 0
                ),
                array(
                    'id' => 'headersticky',
                    'type' => 'button_set',
                    'title' => __('Header Style', 'kyma'),
                    'subtitle' => __('Select Header style fixed or static', 'kyma'),
                    'options' => array(
                        '1' => __('Fixed', 'kyma'),
                        '0' => __('Static', 'kyma'),
                    ),
                    'default' => '0',
                    'required' => array(
                        array('side_header', '=', 0)
                    )
                ),
                array(
                    'id' => 'headercolorscheme',
                    'type' => 'button_set',
                    'title' => __('Header Color Scheme', 'kyma'),
                    'desc' => __('Select Header Color Scheme Light or Dark', 'kyma'),
                    'options' => array(
                        'light_header' => __('Light Header', 'kyma'),
                        'dark_sup_menu' => __('Dark Header', 'kyma'),
                        'transparent_header' => __('Transparent Header', 'kyma')
                    ),
                    'default' => 'light_header',
                    'required' => array(
                        array('side_header', '=', 0)
                    )
                ),
                array(
                    'id' => 'kyma_custom_css',
                    'type' => 'ace_editor',
                    'url' => true,
                    'title' => __('Custom Css Editor', 'kyma'),
                    'subtitle' => __('Paste your custom css here', 'kyma'),
					'mode' => 'css',
                    'theme' => 'monokai',
                ),
            )
        );
        /* Top bar settings */
        $this->sections[] = array(
            'icon' => 'el el-cog',
            'icon_class' => 'icon-large',
            'title' => __('Topbar Settings', 'kyma'),
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'topbar',
                    'type' => 'switch',
                    'title' => __('Use Topbar?', 'kyma'),
                    'subtitle' => __('Choose to show or hide topbar', 'kyma'),
                    "default" => 1,
                ),
                array(
                    'id' => 'show_cartcount',
                    'type' => 'switch',
                    'title' => __('Show Cart total in header?', 'kyma'),
                    'subtitle' => __('This only works if using woocommerce', 'kyma'),
                    "default" => 0,
                ),
                array(
                    'id' => 'topbar_layout',
                    'type' => 'switch',
                    'title' => __('Topbar Layout Switch', 'kyma'),
                    'subtitle' => __('This moves the left items to the right and right items to the left.', 'kyma'),
                    "default" => 0,
                ),
            ),
        );

        /* Slider Options */
        $this->sections[] = array(
            'title' => 'Slider Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-picture',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_slider_enabled',
                    'type' => 'checkbox',
                    'compiler' => false,
                    'title' => __('Enabled Home Slider', 'kyma'),
                    'subtitle' => __('Uncheck if you don\'t want to show slider on home page', 'kyma'),
                    'default' => 1,
                ),
				array(
                    'id' => 'slider_type',
                    'type' => 'select',
                    'title' => __('Choose a Home Image Slider', 'kyma'),
                    'subtitle' => __("If you don't want an image slider on your home page choose none.", 'kyma'),
                    'options' => array(1 => 'Revolution Slider 1', 2 => 'Revolution Slider 2', 3 => 'Owl Slider'),
                    'default' => 1,
                    'width' => 'width:60%',
                ),
                array(
                    'id' => 'ken_burn_effect',
                    'type' => 'button_set',
                    'title' => __('Enable Kenburn effect on slider', 'kyma'),
                    'options' => array(
                        'on' => __('On', 'kyma'),
                        'off' => __('Off', 'kyma'),
                    ),
                    'default' => 'on',
                    'required' => array(
                        array('slider_type', '!=', '3')
                    )
                ),
                array(
                    'id' => 'ken_burn_duration',
                    'type' => 'slider',
                    'title' => __('Kenburn effect duration', 'kyma'),
                    'subtitle' => __('the value in ms how long the animation of ken burns effect should go. i.e. 3000 will make a 3s zoom and movement', 'kyma'),
                    'default' => 10000,
                    'min' => 3000,
                    'max' => 20000,
                    'step' => 500,
                    'required' => array(
                        array('ken_burn_effect', '=', 'on')
                    )
                ),
            )
        );
        /* Service Options */
        $this->sections[] = array(
            'title' => 'Service Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-wrench',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_service_type',
                    'type' => 'button_set',
                    'title' => __('Home Service Style', 'kyma'),
                    'subtitle' => __("Change your home service style", 'kyma'),
                    'options' => array(1 => 'Style One (Default)', 2 => 'Style Two', 3 => 'Style Three', 4 => 'Style Four'),
                    'default' => 1,
                ),
                array(
                    'id' => 'service_bottom_image',
                    'type' => 'media',
                    'url' => true,
                    'title' => __('Service Image ', 'kyma'),
                    'default' => array(
                        'url' => get_template_directory_uri() . '/images/icons/archive2.svg',
                    ),
                    'required' => array(
                        array('home_service_type', '=', '2')
                    )
                ),
                array(
                    'id' => 'home_service_heading',
                    'type' => 'text',
                    'title' => __('Home Service Title', 'kyma'),
                    'subtitle' => __('This title will be shown on home page above the services.', 'kyma'),
                    'default' => __('Our Services', 'kyma')
                ),
                array(
                    'id' => 'home_service_column',
                    'type' => 'button_set',
                    'title' => __('Home Service Layout', 'kyma'),
                    'desc' => __('Select Home Service Layout e.g. 2,3 or 4 column.', 'kyma'),
                    'options' => array(
                        2 => '2 Column',
                        3 => '3 Column',
                        4 => '4 Column'
                    ),
                    'default' => 4
                ),
            )
        );
        /* Feature Options */
        $this->sections[] = array(
            'title' => 'Feature Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-th',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_feature_heading',
                    'type' => 'text',
                    'title' => __('Home Feature Title', 'kyma'),
                    'subtitle' => __('This title will be shown on home page above the Feature section.', 'kyma'),
                    'default' => __('Our Features', 'kyma'),
                ),
                array(
                    'id' => 'feature_style',
                    'type' => 'button_set',
                    'title' => __('Feature Style', 'kyma'),
                    'desc' => __('Select Feature style among three styles', 'kyma'),
                    'options' => array(
                        1 => 'Style 1',
                        2 => 'Style 2',
                        3 => 'Style 3'
                    ),
                    'default' => 1
                ),
                array(
                    'id' => 'feature_bg_color',
                    'type' => 'select',
                    'title' => __('Background Color', 'kyma'),
                    'options' => array('bg_color1' => 'Color 1', 'bg_color2' => 'Color 2', 'bg_color3' => 'Color 3', 'bg_color4' => 'Color 4', 'bg_color5' => 'Color 5', 'bg_color6' => 'Color 6'),
                    'default' => '',
                    'width' => 'width:60%',
                ),
                array(
                    'id' => 'feature_bg_image',
                    'type' => 'media',
                    'url' => true,
                    'title' => __('Feature Image ', 'kyma'),
                    'default' => array(
                        'url' => get_template_directory_uri() . '/images/tab1.png',
                    ),
                    'required' => array(
                        array('feature_style', '=', '1')
                    )
                )
            )
        );

        /* Portfolio Options */
        $this->sections[] = array(
            'title' => 'Portfolio Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-folder',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'port_heading',
                    'type' => 'text',
                    'title' => __('Home Portfolio Title', 'kyma'),
                    'subtitle' => __('This title will be shown on home page above the Portfolio.', 'kyma'),
                    'default' => $kyma_theme_options['port_heading'],
                ),
                array(
                    'id' => 'portfolio_style',
                    'type' => 'button_set',
                    'title' => __('Home Portfolio Style', 'kyma'),
                    'options' => array(
                        '' => __('Style 1', 'kyma'),
                        'porto_animate' => __('Style 2', 'kyma'),
                        'porto_masonry' => __('Style 3', 'kyma'),
                    ),
                    'default' => ''
                ),
				array(
                    'id' => 'portfolio_filter',
                    'type' => 'button_set',
                    'title' => __('Show Portfolio Filter', 'kyma'),
                    'options' => array(
                        1 => "Yes",
                        0 => "No"
                    ),
                    'default' => $kyma_theme_options['portfolio_filter'],
                ),
                array(
                    'id' => 'portfolio_width',
                    'type' => 'button_set',
                    'title' => __('Home Portfolio Width', 'kyma'),
                    'options' => array(
                        'full_portos' => "Full Width",
                        'boxed_portos' => "Boxed Width"
                    ),
                    'default' => 'boxed_portos'
                ),
                array(
                    'id' => 'port_has_space',
                    'type' => 'button_set',
                    'title' => __('Portfolio has space', 'kyma'),
                    'subtitle' => __('Enable disable space between portfolios', 'kyma'),
                    'options' => array(
                        'has_sapce_portos' => "Yes",
                        'no_sapce_portos' => "No"
                    ),
                    'default' => 'has_sapce_portos'
                ),
                array(
                    'id' => 'portfolio_column',
                    'type' => 'button_set',
                    'title' => __('Home Portfolio Column', 'kyma'),
                    'options' => array(
                        'two_blocks' => "Two Column",
                        'three_blocks' => "Three Column",
                        'four_blocks' => "Four Column",
                    ),
                    'default' => 'three_blocks'
                ),
            )
        );
        /* fun Facts Options */
        $this->sections[] = array(
            'title' => 'Fun Facts',
            'icon_class' => 'icon-large',
            'icon' => 'el el-smiley',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_fun_fact_style',
                    'type' => 'button_set',
                    'title' => __('Fun Facts Section Style', 'kyma'),
                    'desc' => __('Select fun fact section style among three styles', 'kyma'),
                    'options' => array(
                        1 => 'Style One (Default)',
                        2 => 'Style Two',
                        3 => 'Style Three',
                    ),
                    'default' => 1
                ),
                array(
                    'id' => 'funfact_title',
                    'type' => 'text',
                    'title' => __('Fun Fact Title', 'kyma'),
                    'default' => __('Our Numbers', 'kyma')
                ),
                array(
                    'id' => 'funfact_bg_color',
                    'type' => 'select',
                    'title' => __('Fun Fact Background Color', 'kyma'),
                    'options' => array('bg_color1' => 'Color 1', 'bg_color2' => 'Color 2', 'bg_color3' => 'Color 3', 'bg_color4' => 'Color 4', 'bg_color5' => 'Color 5', 'bg_color6' => 'Color 6'),
                    'default' => 'bg_color1',
                    'width' => 'width:60%',
                ),
                array(
                    'id' => 'kyma_funfacts',
                    'type' => 'slides',
                    'title' => __('Add Fun Fact', 'kyma'),
                    'show' => array(
                        'media' => false,
                        'title' => true,
                        'subtitle' => true,
                        'icon' => true,
                        'description' => false,
                        'date' => false,
                        'url' => false,
                        'effect' => false
                    ),
                    'placeholder' => array(
                        'title' => 'Title',
                        'icon' => 'Icon',
                        'subtitle' => 'Number',
                    ),
                    'content_title' => 'Fun Facts'
                ),
            )
        );
        /* Blog Options */
        $categories = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ) );
        foreach( $categories as $category ) {
            $cats[$category->term_id] = $category->name;
        }
        $count_posts = wp_count_posts();
        $published_posts = $count_posts->publish;
        $this->sections[] = array(
            'title' => 'Blog Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-edit',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_blog_title',
                    'type' => 'text',
                    'title' => __('Home Blog Title', 'kyma'),
                    'subtitle' => __('This title will be shown on home page above the blog posts.', 'kyma'),
                    'default' => __('Our Recent Posts', 'kyma'),
                ),
                array(
                    'id' => 'about_author_text',
                    'title' => __('About Author Title', 'kyma'),
                    'description' => __('This will be displayed on single post', 'kyma'),
                    'type' => 'text',
                    'default' => $kyma_theme_options['about_author_text'],
                ),
                array(
                    'id' => 'related_post_text',
                    'title' => __('Related Posts Title', 'kyma'),
                    'description' => __('This will be displayed on single post', 'kyma'),
                    'type' => 'text',
                    'default' => $kyma_theme_options['related_post_text'],
                ),
                array(
                    'id' => 'home_post_cat',
                    'title' => __('Categor(ies)', 'kyma'),
                    'description' => __('Select the categories of posts you want to show on home page', 'kyma'),
                    'type' => 'select',
                    'multi'=>true,
                    'options' => $cats,
                ),
                array(
                    'id' => 'blog_post_count',
                    'title' => __('No. of Load Post', 'kyma'),
                    'subtitle' => __('Show No. of Posts On Blog Home', 'kyma'),
                    'description' => __('With this option you can show blog posts according your requirement', 'kyma'),
                    'type' => 'select',
                    'default' => 3,
                    'options' => array(
                        3 => 3,
                        6 => 6,
                        9 => 9,
                        12 => 12,
                        15 => 15,
                        $published_posts => __('Show All Posts', 'kyma'),
                    ),
                ),
            )
        );
        /* Team Options */
        $this->sections[] = array(
            'title' => 'Team Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-group',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_team_heading',
                    'type' => 'text',
                    'title' => __('Home Team Title', 'kyma'),
                    'subtitle' => __('This title will be shown on home page above the Team section.', 'kyma'),
                    'default' => __('Meet Our Team', 'kyma'),
                ),
                array(
                    'id' => 'team_style',
                    'type' => 'button_set',
                    'title' => __('Team Section Style', 'kyma'),
                    'desc' => __('Select Team section style among Three styles', 'kyma'),
                    'options' => array(
                        1 => 'Style One (Default)',
                        2 => 'Style Two',
                        3 => 'Style Three',
                    ),
                    'default' => 1
                ),
            )
        );
        /* Testimonial Options */
        $this->sections[] = array(
            'title' => 'Testimonial Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-comment-alt',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'testimonial_heading',
                    'type' => 'text',
                    'title' => __('Testimonial Title', 'kyma'),
                    'default' => __('What Our Client Says', 'kyma'),
                ),
                array(
                    'id' => 'testimonial_style',
                    'type' => 'button_set',
                    'title' => __('Testimonial Section Style', 'kyma'),
                    'desc' => __('Select Testimonial section style among two styles', 'kyma'),
                    'options' => array(
                        1 => 'Style 1',
                        2 => 'Style 2',
                    ),
                    'default' => 1
                ),
            )
        );
		/* Home Product Options */
        $this->sections[] = array(
            'title' => 'Product Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-shopping-cart-sign',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_product_title',
                    'type' => 'text',
                    'title' => __('Product Title', 'kyma'),
                    'default' => __('Our Products', 'kyma'),
                )
            )
        );
        /* Client Options */
        $this->sections[] = array(
            'title' => 'Client Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-group-alt',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'home_client_type',
                    'type' => 'button_set',
                    'title' => __('Home Client Style', 'kyma'),
                    'subtitle' => __("Change your home client style", 'kyma'),
                    'options' => array(1 => 'Style 1', 2 => 'Style 2'),
                    'default' => 1,
                )
            )
        );
        /* Pricing table options */
        $this->sections[] = array(
            'title' => 'Pricing Plan Options',
            'desc' => "",
            'icon_class' => 'icon-large',
            'icon' => 'el el-usd',
            'subsection' => true,
            'fields' => array(
                array(
                    'id' => 'plan_style',
                    'type' => 'button_set',
                    'title' => __('Home Pricing table Style', 'kyma'),
                    'options' => array(1 => 'Style 1', 2 => 'Style 2'),
                    'default' => $kyma_theme_options['plan_style'],
                ),
                array(
                    'id' => 'plan_style_effect',
                    'type' => 'button_set',
                    'title' => __('Style 2 Sub Style', 'kyma'),
                    'options' => array('primary' => 'Primary', 'secondary' => 'Secondary'),
                    'default' => $kyma_theme_options['plan_style_effect'],
                    'required' => array(array('plan_style', '=', 2))
                ),
                array(
                    'id' => 'plan_width',
                    'type' => 'button_set',
                    'title' => __('Pricing plan width', 'kyma'),
                    'options' => array('full' => 'Full', 'boxed' => 'Boxed'),
                    'default' => $kyma_theme_options['plan_width'],
                    'required' => array(array('plan_style', '=', 2))
                ),
                array(
                    'id' => 'home_plan_heading',
                    'type' => 'text',
                    'title' => __('Home Pricing table heading', 'kyma'),
                    'default' => $kyma_theme_options['home_plan_heading']
                ),
                array(
                    'id' => 'plan_bg_color',
                    'type' => 'select',
                    'title' => __('Home Pricing table background color', 'kyma'),
                    'options' => array('' => 'None', 'bg_color1' => 'Color 1', 'bg_color2' => 'Color 2', 'bg_color3' => 'Color 3', 'bg_color4' => 'Color 4', 'bg_color5' => 'Color 5', 'bg_color6' => 'Color 6'),
                    'default' => $kyma_theme_options['plan_bg_color'],
                    'required' => array(array('plan_style', '=', 1))
                ),
            )
        );
        /* Video Background OPtions */
        $this->sections[] = array(
            'title' => 'Video Background',
            'icon_class' => 'icon-large',
            'icon' => 'el el-bullhorn',
            'subsection' => true,
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'background_video_title',
                    'type' => 'text',
                    'title' => __('Video Background Title', 'kyma'),
                    'default' => __('Video Background', 'kyma'),
                ),
                array(
                    'id' => 'background_video_url',
                    'type' => 'text',
                    'title' => __('Put Video URL Here', 'kyma'),
                    'subtitle' => __("Here you can put YouTube video URL", 'kyma'),
                    'default' => 'http://www.youtube.com/watch?v=V6_85cSOIcE',
                ),
                array(
                    'id' => 'video_sound',
                    'type' => 'select',
                    'title' => __('Home Background Video Sound', 'kyma'),
                    'options' => array('false' => 'true', 'true' => 'false'),
                    'default' => 'true',
                ),
                array(
                    'id' => 'video_auto_play',
                    'type' => 'select',
                    'title' => __('Home Background Video AutoPlay', 'kyma'),
                    'options' => array('true' => 'true', 'false' => 'false'),
                    'default' => 'true',
                ),
         ));
        /* Callout OPtions */
        $this->sections[] = array(
            'title' => 'Callout Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-bullhorn',
            'subsection' => true,
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'home_callout_type',
                    'type' => 'button_set',
                    'title' => __('Choose a Home Call Out Style', 'kyma'),
                    'subtitle' => __("to change your home call out style", 'kyma'),
                    'options' => array(1 => 'Style One (Default)', 2 => 'Style Two', 3 => 'Style Three'),
                    'default' => 1,
                ),
                array(
                    'id' => 'callout_title',
                    'type' => 'text',
                    'title' => __('Call-Out Title', 'kyma'),
                    'default' => __('Best Wordpress Resposnive Theme Ever!', 'kyma'),
                ),
                array(
                    'id' => 'callout_description',
                    'type' => 'textarea',
                    'title' => __('Call-Out Description', 'kyma'),
                    'default' => __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour of this randomised words which don\'t look even slightly believable If you are going to use a passage of Lorem Ipsum.', 'kyma'),
                ),
                array(
                    'id' => 'callout_btn_text',
                    'type' => 'text',
                    'title' => __('Call-Out Button Text', 'kyma'),
                    'default' => __('Purchase Now', 'kyma'),
                ),
                array(
                    'id' => 'callout_btn_icon',
                    'type' => 'text',
                    'title' => __('Call-Out Button Icon', 'kyma'),
                    'subtitle' => __('Use font awesome icon for call out button text', 'kyma'),
                    'desc' => __('Use font awesome icon for call out button text. Font Awesome Icon Link Here
				<a href="http://www.fontawesome.com">Link</a>', 'kyma'),
                    'default' => 'ico ico-cart',
                ),
                array(
                    'id' => 'callout_btn_link',
                    'type' => 'text',
                    'title' => __('Call-Out Button Link', 'kyma'),
                    'subtitle' => __('Button Link(s) for above created button(s)', 'kyma'),
                    'default' => 'https://www.example.com',
                    'validate' => 'url',
                ),
                array(
                    'id' => 'callout_button_target',
                    'type' => 'checkbox',
                    'title' => __('Open link in New tab', 'kyma'),
                    'subtitle' => __('Open callout button link in new tab', 'kyma'),
                    'default' => 1
                ),
            ));
        /* Extra */
        $this->sections[] = array(
            'title' => 'Extra Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-pencil',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'home_extra_title',
                    'type' => 'text',
                    'title' => __('Home Extra Section Title', 'kyma'),
                    'default' => __('Extra Content', 'kyma'),
                ),
				array(
                    'id' => 'home-shortcode',
                    'type' => 'editor',
                    'title' => __('Home Shortcodes', 'kyma'),
                    'subtitle' => __('Put Your shortcodes here', 'kyma'),
                    'full_width' => true,
                    'args' => array(
                        'wpautop' => false,
                        'media_buttons' => false,
                        'textarea_rows' => 5,
                        'teeny' => false,
                        'quicktags' => true,
                    )
                ),
            )
        );
        $this->sections[] = array(
            'title' => 'Typography',
            'icon_class' => 'icon-large',
            'icon' => 'el el-text-width',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'font_logo_style',
                    'type' => 'typography',
                    'title' => __('Logo Text Font', 'kyma'),
                    'font-family' => true,
                    'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                    'font-backup' => false, // Select a backup non-google font in addition to a google font
                    'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                    'subsets' => true, // Only appears if google is true and subsets not set to false
                    'font-size' => true,
                    'line-height' => true,
                    'text-align' => false,
                    'color' => true,
                    'preview' => true, // Disable the previewer
                    'output' => array('#logo h3', ".logofont"),
                    'subtitle' => __("Choose size and style your sitename, if you don't use an image logo.", 'kyma'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'color' => "",
                        'font-style' => '400',
                        'font-size' => '32px',
                        'line-height' => '40px',),
                ),
                array(
                    'id' => 'font_menu_style',
                    'type' => 'typography',
                    'title' => __('Primary Menu Typography', 'kyma'),
                    'subtitle' => __('Change font styling of Primary Menu', 'kyma'),
                    'font-family' => true,
                    'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                    'font-backup' => false, // Select a backup non-google font in addition to a google font
                    'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                    'subsets' => true, // Only appears if google is true and subsets not set to false
                    'font-size' => true,
                    'line-height' => true,
                    'text-align' => false,
                    'color' => true,
                    'preview' => true, // Disable the previewer
                    'output' => array('#navy > li > a > span'),
                    'default' => array(
                        'font-family' => 'Open Sans',
                        'color' => "",
                        'font-style' => '600',
                        'font-size' => '12px',
                        'line-height' => '',),
                ),
                array(
                    'id' => 'font_home_style',
                    'type' => 'typography',
                    'title' => __('Home Sections Typography', 'kyma'),
                    'subtitle' => __('Change font styling of Home section`s title i.e. Our Services, Our Portfolio etc.', 'kyma'),
                    'compiler'=>true,
                    'font-family' => true,
                    'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                    'font-backup' => false, // Select a backup non-google font in addition to a google font
                    'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                    'subsets' => true, // Only appears if google is true and subsets not set to false
                    'font-size' => true,
                    'line-height' => true,
                    'text-align' => false,
                    'all_styles' => true,
                    'color' => true,
                    'preview' => true, // Disable the previewer
                    'output' => array('.main_title h2'),
                    'default' => array(
                        'font-family' => 'Open Sans, Helvetica, Arial, sans-serif',
                        'color' => "",
                        'font-style' => '600',
                        'font-size' => '30px',
                        'line-height' => ''
                    ),
                ),
            array(
                    'id' => 'font_body_style',
                    'type' => 'typography',
                    'title' => __('Body Font Style', 'kyma'),
                    'subtitle' => __('Change Whole body font style.', 'kyma'),
                    'compiler'=>true,
                    'font-family' => true,
                    'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                    'font-backup' => false, // Select a backup non-google font in addition to a google font
                    'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                    'subsets' => true, // Only appears if google is true and subsets not set to false
                    'font-size' => false,
                    'line-height' => false,
                    'text-align' => false,
                    'all_styles' => true,
                    'color' => true,
                    'preview' => true, // Disable the previewer
                    'output' => array('body, h1, h2, h3, h4, h5, h6, p, em, blockquote'),
                    'default' => array(
                        'font-family' => 'Open Sans, sans-serif',
                        'font-style' => '600'
                    ),
            ),
            )
        );
        /* Career Page Options */
        $this->sections[] = array(
            'title' => 'Career Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-pencil',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'career_form_title',
                    'type' => 'text',
                    'title' => __('Career Form Title', 'kyma'),
                    'default' => __('Apply For Job', 'kyma'),
                ),
                array(
                    'id' => 'job_positions',
                    'type' => 'multi_text',
                    'title' => __('Job Position', 'kyma'),
                    'desc' => __('Available Job Position ', 'kyma'),
                    'default' => array(
                        'Senior Software Developer',
                        'Junior Software Developer',
                        'Web Designer',
                        'Teeam Leader',
                        'Senior Accounttant',
                        'Marketing Manager',
                    )
                ),
            )
        );
        /* Skin Options */
        $this->sections[] = array(
            'title' => 'Basic Styling',
            'icon_class' => 'icon-large',
            'icon' => 'el el-brush',
            'fields' => array(
                array(
                    'id' => 'site_preloader',
                    'type' => 'select',
                    'title' => __('Site Preloader', 'kyma'),
                    'desc' => __("Select Site loading icon type", 'kyma'),
                    'options' => array(
                        'preloader3' => __('Boom', 'kyma'),
                        'preloader1' => __('Equalizer', 'kyma'),
                        'preloader2' => __('Dots', 'kyma')
                    ),
                    'default' => 'preloader3',
                    'width' => 'width:60%',
                ),
                array(
                    'id' => 'skin_stylesheet',
                    'type' => 'select',
                    'title' => __('Theme Color Scheme', 'kyma'),
                    'subtitle' => __("Note* changes made in options panel will override this stylesheet. Example: Colors set in typography.", 'kyma'),
                    'desc' => __('Choose one color scheme for your site.', 'kyma'),
                    'options' => $alt_stylesheets,
                    'default' => 'red.css',
                    'width' => 'width:60%'
                ),
                array(
                    'id' => 'enable_custom_color',
                    'type' => 'checkbox',
                    'title' => __('Enable Custom Color', 'kyma'),
                    'subtitle' => __('After Enabling it, <b>Theme Skin Stylesheet</b> will not work.', 'kyma'),
                    'default' => 0,
                ),
                array(
                    'id' => 'custom_color',
                    'type' => 'color',
                    'title' => __('Custom Color Scheme', 'kyma'),
                    'subtitle' => __('Select Custom Color.', 'kyma'),
                    'default' => '#eee',
                    'validate' => 'color',
                    'required' => array(
                        array('enable_custom_color', '=', 1)
                    )
                ),
            ));
        /* Social Options */
        $this->sections[] = array(
            'title' => 'Social Media',
            'icon_class' => 'icon-large',
            'icon' => 'el el-twitter',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'social_media_header',
                    'type' => 'switch',
                    'title' => __('Enable Social Icon in Header', 'kyma'),
                    'subtitle' => __('Show/Hide social icons in header', 'kyma'),
                    'default' => 1
                ),
                array(
                    'id' => 'social_facebook_link',
                    'type' => 'text',
                    'title' => __('Facebook Profile URL', 'kyma'),
                    'subtitle' => __('Your Facebook Profile URL', 'kyma'),
                    'default' => 'https://www.facebook.com',
                    'validate' => 'url',
                ),
                array(
                    'id' => 'social_twitter_link',
                    'type' => 'text',
                    'title' => __('Twitter Profile URL', 'kyma'),
                    'subtitle' => __('Your Twitter Profile URL', 'kyma'),
                    'default' => 'https://www.twitter.com/',
                    'validate' => 'url',
                ),
                array(
                    'id' => 'social_google_plus_link',
                    'type' => 'text',
                    'title' => __('Google+ Profile URL', 'kyma'),
                    'subtitle' => __('Your Google+ Profile URL', 'kyma'),
                    'default' => 'https://www.plus.google.com/',
                    'validate' => 'url',
                ),
                array(
                    'id' => 'social_skype_link',
                    'type' => 'text',
                    'title' => __('Skype Username', 'kyma'),
                    'default' => __('skype', 'kyma'),
                ),
                array(
                    'id' => 'social_vimeo_link',
                    'type' => 'text',
                    'title' => __('Vimeo Profile URL', 'kyma'),
                    'subtitle' => __('Your Vimeo Profile URL', 'kyma'),
                    'default' => 'https://www.vimeo.com/',
                    'validate' => 'url',
                ),
                array(
                    'id' => 'social_instagram_link',
                    'type' => 'text',
                    'title' => __('Instagram Profile URL', 'kyma'),
                    'subtitle' => __('Your Instagram Profile URL', 'kyma'),
                    'default' => 'https://www.Instagram.com/',
                    'validate' => 'url',
                ),
                array(
                    'id' => 'social_picasa_link',
                    'type' => 'text',
                    'title' => __('Picasa Profile URL', 'kyma'),
                    'subtitle' => __('Your Picasa Profile URL', 'kyma'),
                    'default' => 'https://www.picasa.com/',
                    'validate' => 'url',
                ),
				array(
                    'id' => 'social_pinterest_link',
                    'type' => 'text',
                    'title' => __('Pinterest Profile URL', 'kyma'),
                    'subtitle' => __('Your Pinterest Profile URL', 'kyma'),
                    'default' => 'https://www.pinterest.com/',
                    'validate' => 'url',
                ),
				array(
                    'id' => 'social_youtube_link',
                    'type' => 'text',
                    'title' => __('YouTube Profile URL', 'kyma'),
                    'subtitle' => __('Your YouTube Profile URL', 'kyma'),
                    'default' => 'https://www.youtube.com/',
                    'validate' => 'url',
                ),
            ));
        /* Twitter Feeds */
        $this->sections[] = array(
            'id' => 'twitter_feeds',
            'title' => 'Twitter Feed',
            'icon_class' => 'icon-large',
            'icon' => 'el el-twitter',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'twitter_feed_title',
                    'type' => 'text',
                    'title' => __('Twitter Feed Title', 'kyma'),
                    'default' => __('Our Tweets', 'kyma')
                ),
                array(
                    'id' => 'twitter_username',
                    'type' => 'text',
                    'title' => __('Twitter Username', 'kyma'),
                    'default' => 'webhuntinfotech'
                ),
                array(
                    'id' => 'twitter_consumer_key',
                    'type' => 'text',
                    'title' => __('Consumer Key (API Key)', 'kyma'),
                    'default' => ''
                ),
                array(
                    'id' => 'twitter_consumer_secret',
                    'type' => 'text',
                    'title' => __('Consumer Secret (API Secret)', 'kyma'),
                    'default' => ''
                ),
                array(
                    'id' => 'twitter_access_token',
                    'type' => 'text',
                    'title' => __('Access Token', 'kyma'),
                    'default' => ''
                ),
                array(
                    'id' => 'twitter_access_token_secret',
                    'type' => 'text',
                    'title' => __('Access Token Secret ', 'kyma'),
                    'default' => ''
                ),
                array(
                    'id' => 'twitter_feed_count',
                    'type' => 'spinner',
                    'title' => __('No. Of Feed ', 'kyma'),
                    'desc' => __('No. Of Feed to show', 'kyma'),
                    'default' => 2,
                    'min'      => 1,
                    'step'     => 1,
                    'max'      => 20,
                ),
        ));
        /* Contact Option */
        $this->sections[] = array(
            'id' => 'contact_info',
            'title' => 'Contact Info',
            'icon_class' => 'icon-large',
            'icon' => 'el el-phone',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'contact_info_header',
                    'type' => 'switch',
                    'title' => __('Contact Information in Header', 'kyma'),
					'subtitle' => __('Show/Hide Contact Information in Header', 'kyma'),
                    'default' => 1
                ),
                array(
                    'id' => 'contact_email',
                    'type' => 'text',
                    'title' => __('Contact Email Address', 'kyma'),
                    'default' => 'webhuntinfotech@gmail.com',
                    'validate' => 'email'
                ),
                array(
                    'id' => 'contact_phone',
                    'type' => 'text',
                    'title' => __('Phone Number', 'kyma'),
                    'default' => '+0744-44447',
                ),
                array(
                    'id' => 'contact-page-sep',
                    'type' => 'info',
                    'title' => __('Contact Us Page Options', 'kyma'),
                ),
                array(
                    'id' => 'contact_info_page',
                    'type' => 'switch',
                    'title' => __('Show/Hide Address Info', 'kyma'),
                    'subtitle' => __('Show/Hide contact address info from contact us page', 'kyma'),
                    'default' => 1
                ),
                array(
                    'id' => 'address_info_title',
                    'type' => 'text',
                    'title' => __('Contact Address Heading', 'kyma'),
                    'default' => __('Contact Information', 'kyma')
                ),
                array(
                    'id' => 'address_info_icon',
                    'type' => 'text',
                    'title' => __('Address Heading Icon', 'kyma'),
                    'default' => 'ico-pencil5'
                ),
                array(
                    'id' => 'contact_form_title',
                    'type' => 'text',
                    'title' => __('Contact Form Heading', 'kyma'),
                    'default' => __('Leave your message', 'kyma')
                ),
                array(
                    'id' => 'contact_form_icon',
                    'type' => 'text',
                    'title' => __('Contact Form Icon', 'kyma'),
                    'default' => 'ico-envelope3'
                ),
                array(
                    'id' => 'contact_info',
                    'type' => 'slides',
                    'title' => __('Address', 'kyma'),
                    'desc' => __('This address info will be display in contact us page', 'kyma'),
                    'show' => array(
                        'title' => true,
                        'icon' => true,
                        'subtitle' => true,
                        'description' => true,
                        'date' => false,
                        'url' => true,
                        'effect' => false
                    ),
                    'placeholder' => array(
                        'title' => 'Address Title',
                        'icon' => 'Phone Number',
                        'url' => 'Email Address',
                        'subtitle' => 'Icon',
                        'description' => 'Address',
                    ),
                    'content_title' => 'Contact Address'
                ),
                array(
                    'id' => 'google-map-sep',
                    'type' => 'info',
                    'title' => __('Google Map Options', 'kyma'),
                ),
                array(
                    'id' => 'contact_google_map',
                    'type' => 'switch',
                    'title' => __('Show/Hide Google Map', 'kyma'),
                    'subtitle' => __('Show/Hide google map from contact us page', 'kyma'),
                    'default' => 1
                ),
                array(
                    'id' => 'google_map_title',
                    'type' => 'text',
                    'title' => __('Google Map Title', 'kyma'),
                    'default' => __('How to reach us?', 'kyma')
                ),
                array(
                    'id' => 'google_map_url',
                    'type' => 'text',
                    'title' => __('Google Map URL', 'kyma'),
                    'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115548.28003474012!2d75.84694864999999!3d25.173402800000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396f9b30c41bb44d%3A0x5f5c103200045588!2sKota%2C+Rajasthan%2C+India!5e0!3m2!1sen!2s!4v1441138737918'
                ),
            )
        );
        /* Footer Option */
        $this->sections[] = array(
            'title' => 'Footer Options',
            'icon_class' => 'icon-large',
            'icon' => 'el el-website',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'copyright_text_footer',
                    'type' => 'switch',
                    'title' => __('Display Copyright Info in Footer', 'kyma'),
                    'default' => 1
                ),
                array(
                    'id' => 'footer_copyright',
                    'type' => 'text',
                    'title' => __('Copyright Text', 'kyma'),
                    'default' => '&copy; 2015 Kyma Theme',
                ),
                array(
                    'id' => 'developed_by_text',
                    'type' => 'text',
                    'title' => __('Developed By Text', 'kyma'),
                    'default' => __('Developed By', 'kyma'),
                ),
                array(
                    'id' => 'developed_by_link_text',
                    'type' => 'text',
                    'title' => __('Developed By Link Text', 'kyma'),
                    'default' => __('WebHunt Infotech', 'kyma')
                ),
                array(
                    'id' => 'developed_by_link',
                    'type' => 'text',
                    'title' => __('Developed By Link', 'kyma'),
                    'default' => 'https://www.wenhuntinfotech.com',
                    'validate' => 'url'
                ),

            )
        );
		/* Custom URL */
        $this->sections[] = array(
            'title' => 'Custom URL(Slug)',
            'icon_class' => 'icon-large',
            'icon' => 'el el-link',
            'customizer' => true,
            'fields' => array(
                array(
                    'id' => 'kyma_slider_cpt',
                    'type' => 'text',
                    'title' => __('Slider URL(Slug)', 'kyma'),
                    'default' => 'kyma_slider',
                ),
                array(
                    'id' => 'kyma_service_cpt',
                    'type' => 'text',
                    'title' => __('Service URL(Slug)', 'kyma'),
                    'default' => 'kyma_service',
                ),
                array(
                    'id' => 'kyma_portfolio_cpt',
                    'type' => 'text',
                    'title' => __('Portfolio URL(Slug)', 'kyma'),
                    'default' => 'kyma_portfolio',
                ),
                array(
                    'id' => 'kyma_testimonial_cpt',
                    'type' => 'text',
                    'title' => __('Testimonial URL(Slug)', 'kyma'),
                    'default' => 'kyma_testimonial',
                ),
                array(
                    'id' => 'kyma_team_cpt',
                    'type' => 'text',
                    'title' => __('Team URL(Slug)', 'kyma'),
                    'default' => 'kyma_team',
                ),
                array(
                    'id' => 'kyma_client_cpt',
                    'type' => 'text',
                    'title' => __('Client URL(Slug)', 'kyma'),
                    'default' => 'kyma_client',
                ),
				array(
                    'id' => 'kyma_pricing_cpt',
                    'type' => 'text',
                    'title' => __('Price URL(Slug)', 'kyma'),
                    'default' => 'kyma_price',
                ),
                array(
                    'id' => 'kyma_feature_cpt',
                    'type' => 'text',
                    'title' => __('Feature URL(Slug)', 'kyma'),
                    'default' => 'kyma_feature',
                ),
            )
        );
        /* Home Page Customizer*/
        $this->sections[] = array(
            'title' => 'Home Page Customizer',
            'icon_class' => 'icon-large',
            'icon' => 'el el-home-alt',
            'fields' => array(
                array(
                    'id' => 'homepage_layout',
                    'type' => 'sorter',
                    'title' => 'Homepage Layout Manager',
                    'desc' => 'Organize how you want the layout to appear on the homepage',
                    'options' => array(
                        'Disabled' => array(
                            'funfacts' => 'Fun Facts',
                            'shortcodes' => 'Home ShortCodes',
                            'pricing' => 'Pricing Table',
                            'tweets' => 'Twitter Feed',
                            'video' => 'Video Background'
                        ),
                        'Enabled' => array(
                            'service' => 'Service',
                            'portfolio' => 'Portfolio',
                            'cart' => 'Home Products',
                            'testimonial' => 'Testimonial',
                            'feature' => 'Feature',
                            'client' => 'Client',
                            'team' => 'Team',
                            'blog' => 'Blog',
                            'callout' => 'Call Out'
                        ),
                    )
                )
            ));
        /* Maintenance Mode */
        $this->sections[] = array(
            'title' => __('Maintenance Mode', 'kyma'),
            'icon_class' => 'icon-large',
            'icon' => 'el el-time',
            'fields' => array(
                array(
                    'id' => 'enable_maintenance_mode',
                    'type' => 'checkbox',
                    'title' => __('Enable Maintenance Mode', 'kyma'),
                    'default' => 0
                ),
                array(
                    'id' => 'maintenance_mode_title',
                    'type' => 'text',
                    'title' => __('Maintenance Mode Title', 'kyma'),
                    'default' => __('Coming Soon', 'kyma')
                ),
                array(
                    'id' => 'maintenance_desc',
                    'type' => 'textarea',
                    'title' => __('Maintenance Mode Description', 'kyma'),
                    'default' => __('Our Website Is Almost Ready', 'kyma')
                ),
                array(
                    'id' => 'maintenance_time',
                    'type' => 'date',
                    'time' => true,
                    'placeholder' => 'MM/DD/YYYY',
                    'title' => __('Maintenance Mode Date', 'kyma'),
                    'subtitle' => __('The day when site goes live.', 'kyma')
                ),
                array(
                    'id' => 'maintenance_bg_1',
                    'type' => 'media',
                    'title' => __('Background Image 1', 'kyma'),
                    'subtitle' => __('Upload Maintenance Mode Background Image 1', 'kyma'),
                    'default' => '',
                ),
                array(
                    'id' => 'maintenance_bg_2',
                    'type' => 'media',
                    'title' => __('Background Image 2', 'kyma'),
                    'subtitle' => __('Upload Maintenance Mode Background Image 2', 'kyma'),
                    'default' => '',
                ),
                array(
                    'id' => 'maintenance_bg_3',
                    'type' => 'media',
                    'title' => __('Background Image 3', 'kyma'),
                    'subtitle' => __('Upload Maintenance Mode Background Image 3', 'kyma'),
                    'default' => '',
                ),
            ));
    }

    public function setArguments()
    {
        $theme = wp_get_theme();
        $this->args = array(
            'dev_mode' => false,
            'update_notice' => false,
            'customizer' => false,
            'dev_mode_icon_class' => 'icon-large',
            'opt_name' => 'kyma_theme_options',
            'system_info_icon_class' => 'icon-large',
            'display_name' => $theme->get('Name'),
            'display_version' => $theme->get('Version'),
            'google_api_key' => 'AIzaSyALkgUvb8LFAmrsczX56ZGJx-PPPpwMid0',
            'import_icon' => 'icon-hdd',
            'import_icon_class' => 'icon-large',
            'menu_title' => __('Theme Options', 'kyma'),
            'page_title' => __('Theme Options', 'kyma'),
            'page_slug' => 'kyma_options',
            'default_show' => false,
            'default_mark' => '',
            'admin_bar' => false,
            'ajax_save' => true,
            'disable_tracking' => true,
            'page_type' => 'submenu',
            'page_icon' => "ico-desktop",
            'footer_credit' => __('Thank you for using the Kyma Theme by <a href="http://www.webhuntinfotech.com/" target="_blank">WebHunt Infotech</a>.', 'kyma'),
        );
        $this->args['intro_text'] = 'To now more about Kyma Advanced theme read this <a href="http://www.demo.webhuntinfotech.com/documentation/kyma-advance/">documentation</a>. Have any query? Please lets us know at our <a href="http://www.webhuntinfotech.com/forum/">premium support forum</a>. Enjoy the theme! :)';
        $this->args['share_icons']['facebook'] = array(
            'link' => 'https://www.facebook.com/webhunt_facebook',
            'title' => 'Follow WebHunt Infotech on Facebook',
            'icon' => 'el el-facebook',
        );
        $this->args['share_icons']['twitter'] = array(
            'link' => 'https://www.twitter.com/webhunt_twitter',
            'title' => 'Follow WebHunt Infotech on Twitter',
            'icon' => 'el el-twitter',
        );
        $this->args['share_icons']['instagram'] = array(
            'link' => 'https://www.instagram.com/webhunt_instagram',
            'title' => 'Follow WebHunt Infotech on Instagram',
            'icon' => 'el el-instagram',
        );

    }
}
new Redux_Framework_Kyma_config();
?>
