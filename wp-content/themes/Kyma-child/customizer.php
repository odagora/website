<?php
/* General section */
Kirki::add_section('landing_sec', array(
    'title' => __('Landing Options', 'kyma'),
    'description' => __('Landing Page Info', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'landing_title',
    'label' => __('Landing Title', 'kyma'),
    'section' => 'landing_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['landing_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'landing_description',
    'label' => __('Show Landing Description', 'kyma'),
    'section' => 'landing_sec',
    'type' => 'editor',
    'priority' => 10,
    'default' => $kyma_theme_options['landing_description'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
?>
