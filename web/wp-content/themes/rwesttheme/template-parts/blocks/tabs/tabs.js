(function($){

  /**
   * initializeTabsBlock
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
  var initializeTabsBlock = function( $block ) {

    var id = '#'+$block[0].id
    console.log('test ',id)
    if(id !== '#'){
    var myTabs = tabs({
      el: id,
      tabNavigationLinks: '.tab-link',
      tabContentContainers: '.tab',
      // deepLink: deep_link,
      activeIndex: 0
    });
    myTabs.init();
  }
    // $(id).slick({
    //   dots: true,
    //   // infinite: false,
    //   speed: 300,
    //   slidesToShow: 1,
    //   slidesToScroll: 1,
      
    // });
  }

  // Initialize each block on page load (front end).
  $(document).ready(function(){
      $('.tabs').each(function(){
        initializeTabsBlock( $(this) );
        // console.log('test')
      });
  });

  // Initialize dynamic block preview (editor).
  if( window.acf ) {
      window.acf.addAction( 'render_block_preview/type=tabs', initializeTabsBlock );
  }

})(jQuery);