<?php
/*
Plugin Name: 	Custom Post Type para adicionar as informações dos Rotas
Author: 		Lucas Luoni
Plugin URI: 	http://lucasluoni.com.br
Author URI: 	http://lucasluoni.com.br
Version: 		0.1
Updated: 		18.03.2022
Description: 	Adds specific infos for posts.
#################################################################################################### */
/**
 * File Name 		info_rotas.php
 * @package			WordPress
 * @subpackage 	ParentTheme_VC
 * @license 		GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 		0.1
 * @updated 		18.03.2022
 **/
#################################################################################################### */

/***************************************************************************************
 1.A funcção "add_custom_meta_box" vai gerar os campos personalizados para os Posts
/***************************************************************************************/

// Add the Meta Box
function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Informações da rota', // $title 
        'show_custom_meta_box', // $callback
        'rotas', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');

// Field Array
$prefix = 'custom_';
$custom_meta_fieldss = array(
    array(
        'label' => 'Local início:',
        //'desc'  => 'A description for the field.',
        'id'    => $prefix.'inicio',
        'type'  => 'text'
    ),
    array(
        'label' => 'Local fim:',
        //'desc'  => 'A description for the field.',
        'id'    => $prefix.'fim',
        'type'  => 'text'
    ),
    array(
        'label' => 'Duração (em dias):',
        //'desc'  => 'A description for the field.',
        'id'    => $prefix.'duração',
        'type'  => 'text'
    ),
    array(
        'label' => 'Número de integrantes (mínimo):',
        //'desc'  => 'A description for the field.',
        'id'    => $prefix.'integrantes',
        'type'  => 'text'
    ),
    array(
        'label' => 'Preço:',
        //'desc'  => 'A description for the field.',
        'id'    => $prefix.'preco',
        'type'  => 'text'
    ),
);

// The Callback
function show_custom_meta_box() {
global $custom_meta_fieldss, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    // Begin the field table and loop
    echo '<table class="form-table">';
      foreach ($custom_meta_fieldss as $field) {
          // get value of this field if it exists for this post
          $meta = get_post_meta($post->ID, $field['id'], true);
          // begin a table row with
          echo '<tr>
                  <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                  <td>';
                  switch($field['type']) {

                    // text
                    case 'text':
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" />';
                    break;

                 } //end switch

          echo '</td></tr>';
      } // end foreach
    echo '</table>'; // end table
}

// Save the Data
add_action('save_post', 'save_custom_meta');
function save_custom_meta($post_id) {
    global $custom_meta_fieldss;
     
    // verify nonce
    if ( !isset( $_POST['custom_meta_box_nonce'] ) )
        return;
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($custom_meta_fieldss as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}