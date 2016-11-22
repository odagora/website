<?php
/**
 * Template name: Portfolio Style-1-col-3 Boxed
 */
get_header();
get_template_part('breadcrumbs');
$kyma_theme_options = kyma_theme_options();
$mecanica_rapida = get_template_directory_uri().'/../Kyma-child/images/mecanica-rapida.jpg';
$colision_expres = get_template_directory_uri().'/../Kyma-child/images/colision-expres.jpg';
$serviteca = get_template_directory_uri().'/../Kyma-child/images/serviteca.jpg'; ?>
    <section id="portfolio" class="content_section">
        <div class="row_spacer clearfix">
            <!-- Filter Content -->
            <div
                class="hm_filter_wrapper three_blocks boxed_portos has_sapce_portos project_text_nav nav_with_nums upper_title upper_title">
                <div class="hm_filter_wrapper_con">
                    <div class="filter_item_block All; ?>">
                        <div class="porto_block">
                            <div class="porto_title_page">
                                <h5 class="name">Mecánica Rápida</h5>
                            </div>
                            <div class="porto_type">
                                <div class="porto_galla">
                                    <a data-rel="Mecánica Rápida>" href="">
                                        <img class="img-responsive" src="<?php
                                        echo $mecanica_rapida?>"
                                             alt="">
                                    </a>
                                </div>
                                <div class="porto_nav">
                                    <a href="<?php
                                        echo get_template_directory_uri();?>/../../../servicios/mecanica-rapida/"
                                       class="detail_link"><?php _e('Más Detalles', 'kyma'); ?></a>
                                </div>
                            </div>
                            <div class="porto_desc_page">
                                <p>Desde pequeñas intervenciones rutinarias hasta mantenimientos eléctricos y mecánicos más especializados, en Servitalleres encuentras la solución adecuada en el momento preciso.<a href="<?php
                                        echo get_template_directory_uri();?>/../../../servicios/mecanica-rapida/"> Ver más</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="filter_item_block All; ?>">
                        <div class="porto_block">
                            <div class="porto_title_page">
                                <h5 class="name">Colisión Exprés</h5>
                            </div>
                            <div class="porto_type">
                                <div class="porto_galla">
                                    <a data-rel="Colisión Exprés>" href="">
                                        <img class="img-responsive" src="<?php
                                        echo $colision_expres?>"
                                             alt="">
                                    </a>
                                </div>
                                <div class="porto_nav">
                                    <a href="<?php
                                        echo get_template_directory_uri();?>/../../../servicios/colision-expres/"
                                       class="detail_link"><?php _e('Más Detalles', 'kyma'); ?></a>
                                </div>
                            </div>
                            <div class="porto_desc_page">
                                <p>Para esos molestos rayones, pequeñas abolladuras o golpes más fuertes, tenemos una opción para que salgas estrenando carro. Todo con alta calidad, personal calificado y en tiempo récord.<a href="<?php
                                        echo get_template_directory_uri();?>/../../../servicios/colision-expres/"> Ver más</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="filter_item_block All; ?>">
                        <div class="porto_block">
                            <div class="porto_title_page">
                                <h5 class="name">Serviteca</h5>
                            </div>
                            <div class="porto_type">
                                <div class="porto_galla">
                                    <a data-rel="Serviteca>" href="">
                                        <img class="img-responsive" src="<?php
                                        echo $serviteca?>"
                                             alt="">
                                    </a>
                                </div>
                                <div class="porto_nav">
                                    <a href="<?php
                                        echo get_template_directory_uri();?>/../../../servicios/serviteca/"
                                       class="detail_link"><?php _e('Más Detalles', 'kyma'); ?></a>
                                </div>
                            </div>
                            <div class="porto_desc_page">
                                <p>Contamos con todos los servicios para el óptimo cuidado de tus llantas, pero no solo eso, también nos hacemos cargo de los rines y otros detalles de tu carro para que luzca y funcione perfecto.<a href="<?php
                                        echo get_template_directory_uri();?>/../../../servicios/serviteca/"> Ver más</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php
            ?>
            <!-- End Filter Content -->
        </div>
    </section>
<?php the_post();
the_content();
get_template_part('page', 'testimonial');
get_template_part('page', 'client'); ?>
<?php get_footer(); ?>