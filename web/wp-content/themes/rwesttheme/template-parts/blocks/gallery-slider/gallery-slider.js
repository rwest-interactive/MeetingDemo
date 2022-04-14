/* eslint-disable no-var */
/* eslint-disable indent */
/* eslint-disable prettier/prettier */
( function( $ ){

  /**
   * initializeGallerySliderBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date 15/4/19
   * @since   1.0.0
   * @param $block
   * @param object $block The block jQuery element.
   * @param object attributes The block attributes (only available when editing).
   * @return  void
   */
  
  var initializeGallerySliderBlock = function( $block ) {
    
    var id = '#'+$block[0].id+' .slider';
    $( id ).slick( {
      dots: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      adaptiveHeight: true
    } );
  }

  
  // Initialize each block on page load (front end).
  $( document ).ready( function(){
    // console.log($block)
    // console.log('test')
      $( '.gallery-slider' ).each( function(){
        initializeGallerySliderBlock( $( this ) );
      } );
  } );


  // Initialize dynamic block preview (editor).
  if( window.acf ) {
      window.acf.addAction( 'render_block_preview/type=gallery_slider', initializeGallerySliderBlock );
  }

} )( jQuery );
