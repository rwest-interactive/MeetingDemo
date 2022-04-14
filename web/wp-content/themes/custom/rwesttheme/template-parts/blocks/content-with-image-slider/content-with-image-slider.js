/* eslint-disable */
( function ( $ ) {
	/**
	 * initializeBlock
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
	const initializeContentWithImageSliderBlock = function ( $block ) {
		const id = '#' + $block[ 0 ].id + ' .slider-container .responsive';
		// console.log(id);
		$(id).slick(
      {
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1025,
            dots: true,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 768,
            dots: true,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
        ]
      }
    );
	};
  const resizeContentWithImageSliderBlock = function ( $block ) {
    // console.log( 'test' )
    const id = '#' + $block[ 0 ].id + ' .slider-container .responsive';
    $( id ).slick( 'setPosition' );
  };
	// Initialize each block on page load (front end).
	$( document ).ready( function () {
		$( '.content-with-image-slider' ).each( function () {
			initializeContentWithImageSliderBlock( $( this ) );
		} );
	} );
	// $( window ).on( 'resize orientationchange', function () {
	// 	$( '.content-with-image-slider' ).each( function () {
	// 		resizeContentWithImageSliderBlock( $( this ) );
	// 	} );
	// } );
	// Initialize dynamic block preview (editor).
	if ( window.acf ) {
		window.acf.addAction(
			'render_block_preview/type=content_with_image_slider',
			initializeContentWithImageSliderBlock
		);
	}
} )( jQuery );
