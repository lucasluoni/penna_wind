// IIFE -> a function created and executed inmediately
// Before ECMAScript15 the only way to keep variables in a local scope was to put them inside functions
(function (){
  // turns on strict mode in JS
  'use strict';

  // we just want to make sure that our form elements are ready for us to start adding event listeners to them 
  document.addEventListener('DOMContentLoaded', function () {
    
    // const bodyHome = document.querySelector('.page-id-10')
    // bodyHome.classList.add('shark-banner')
    
    //   const addClass = () => {
    //     let subMenuItens = document.querySelectorAll('#main-menu .dropdown-menu a')
    //     subMenuItens.forEach((item) => {
    //       item.classList.add('nav-link')
    //     })
    //   }
    // addClass()

    // const btnModal = document.querySelector('#botao-modal')
    // btnModal.addEventListener('click', () => {
    //   document.querySelector('body.modal-open').style.paddingRight = '0'
    // })


  });

  window.addEventListener('load', (event) => {
    //Hide spinnerLoader
    const hideLoader = () => {
      let loader = document.querySelector('.spinner-wrapper')
      loader.style.visibility = 'hidden'
    }
    setTimeout(hideLoader, 2000) 
  });

  // Load More Rotas (loop-nossas-rotas.php) ////////////////////////////////////////////////////// -->   
  var ajaxurl = `<?php echo admin_url( 'admin-ajax.php' ); ?>`;
  var page = 2;
  jQuery(function($) {
  $('body').on('click', '#load_more', function() {
  // alert("clicou no btn!!");
  $('#loading').stop().hide().fadeIn('fast');
  //$('.loadmore').hide().fadeOut('fast');
  $('#loading').html('<div style="margin:0 auto 20px auto" class="spinner rotas"></div>');
    var data = {
      'action': 'load_posts_by_ajax',
      'page': page,
      'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
    };

    console.log(ajaxurl)
    $.post(ajaxurl, data, function (response) {
    $('#loading').hide().fadeOut('fast');
    //$('.loadmore').stop().hide().fadeIn('fast');    
      $('#nossas_rotas').append(response);
      page++;
    });
  });
  });

})();