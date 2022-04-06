<?php
/*
Plugin Name: 	Custom Post Type para as Rotas
Author: 		Lucas Luoni
Plugin URI: 	http://lucasluoni.com.br
Author URI: 	http://lucasluoni.com.br
Version: 		0.1
Updated: 		18.03.2022
Description: 	Adds specific infos in pages.
#################################################################################################### */
/**
 * File Name 		rotas.php
 * @package			WordPress
 * @subpackage 	ParentTheme_VC
 * @license 		GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 		0.1
 * @updated 		18.03.2022
 **/
#################################################################################################### */

/****************************************************************************
 1.Cria CPT "Rotas"
****************************************************************************/

function create_post_type_rotas() {
  register_post_type( 'rotas',
    array(
      'labels' => array(
        'add_new' => __( 'Adicionar Rota' ),
        'add_new_item' => __( 'Nome da Rota' ),
        'edit_item' => __( 'Edite a Rota' ),
        'name' => __( 'Rotas' ),
        'singular_name' => __( 'Rota' )
    ),
		'public' => true,
		'has_archive' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'menu_icon'   => 'dashicons-location-alt',
    )
  );
}
add_action( 'init', 'create_post_type_rotas' );