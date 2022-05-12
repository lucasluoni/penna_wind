    <footer class="container-fluid">
      <div class="container">
        <div class="row py-4">
          <div class="col">
            <span class="float-start">&#169; 2022 Copyright de André Penna</span>
            <span class="float-end d-none d-sm-block">Desenvolvido por <a href="#" target="_blank">art&luz</a></span>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>

    <script>
      /*/ Load More Rotas (includes/loop-nossas-rotas.php) /*/  
      var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
      var page = 3;
      jQuery(function($) {
      $('body').on('click', '#load_more', function() {
      // alert("clicou no btn");
      $('#loading').stop().hide().fadeIn('fast');
      $('#load_more').hide().fadeOut('fast');
      $('#loading').html('<div style="margin:0 auto 20px auto" class="spinner rotas"></div>');
        var data = {
          'action': 'load_posts_by_ajax',
          'page': page,
          'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
        };
        $.post(ajaxurl, data, function (response) {
        $('#loading').hide().fadeOut('fast');
        $('#mais_rotas').append(response);
        $('#load_more').stop().hide().fadeIn('fast');    
          page++;
        });
      // });
      });

})();
    </script>
    
  </body>
</html>
