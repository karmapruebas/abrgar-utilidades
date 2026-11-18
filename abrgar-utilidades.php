<?php
/*
Plugin Name: Utilidades del blog
Description: Funciones personalizadas para la práctica 4.
Version: 1.0
Author: abrgar
*/

function mostrar_caja_contacto($contenido) {
    if (is_singular('post') && in_the_loop() && is_main_query()) {
        $caja = '<div style="border:2px solid #2457A7; padding:15px; margin-top:25px;">';
        $caja .= '<p>¿Tienes alguna pregunta? Contacta conmigo.</p>';
        $caja .= '<a href="/wordpress/?page_id=40">Ir a Contacto</a>';
        $caja .= '</div>';

        return $contenido . $caja;
    }

    return $contenido;
}
add_filter('the_content', 'mostrar_caja_contacto');

function mostrar_anio_actual() {
    return wp_date('Y');
}
add_shortcode('anio', 'mostrar_anio_actual');

remove_action('wp_head', 'wp_generator');

add_filter('the_generator', '__return_empty_string');

function cambiar_aviso_login($mensaje) {
    return $mensaje . '<div class="message">Acceso al blog de prácticas de WordPress.</div>';
}
add_filter('login_message', 'cambiar_aviso_login');

