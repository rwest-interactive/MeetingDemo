(function($){

  /**
   * initializeHeroSliderBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeHeroSliderBlock = function( $block ) {
    var id = '#'+$block[0].id+' .slider';
    $(id).slick({
      dots: true,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      adaptiveHeight: true
    });
  }


  // Initialize each block on page load (front end).
  $(document).ready(function(){
      $('.hero-slider').each(function(){
        initializeHeroSliderBlock( $(this) );
      });
  });


  // Initialize dynamic block preview (editor).
  if( window.acf ) {
      window.acf.addAction( 'render_block_preview/type=hero_slider', initializeHeroSliderBlock );
  }

})(jQuery);
