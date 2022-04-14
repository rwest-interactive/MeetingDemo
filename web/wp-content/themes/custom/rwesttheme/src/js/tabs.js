// Start tabs.js
(function() {
  /**
   * tabs
   *
   * @description The Tabs component.
   * @param {Object} options The options hash
   */
  var tabs = function(options) {
    // console.log(options.el)
    var el = document.querySelector(options.el);
    var tabNavigationLinks = document.querySelectorAll(options.tabNavigationLinks);
    var tabContentContainers = document.querySelectorAll(options.tabContentContainers);
    var activeIndex = options.activeIndex;
    // console.log(activeIndex)
    var initCalled = false;
    /**
     * init
     *
     * @description Initializes the component by removing the no-js class from
     *   the component, and attaching event listeners to each of the nav items.
     *   Returns nothing.
     */

     var scrollIt = function(destination, duration, offsetdesktop, offsetmobile, callback) {
       var offset = 0;

       if(window.innerWidth < 768){

         offset = offsetmobile;

       }
       else{

         offset = offsetdesktop;
       }

      // var easings = t * (2 - t);
      // {
      //
      //   easeOutQuad = function(t) {
      //     return t * (2 - t);
      //   }
      //
      // };

      var start = window.pageYOffset;
      var startTime = 'now' in window.performance ? performance.now() : new Date().getTime();

      var documentHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
      var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
      var destinationOffset = typeof destination === 'number' ? destination: (destination.offsetTop !=0?destination.offsetTop:destination.offsetParent.offsetTop);
      var destinationOffsetToScroll = Math.round(documentHeight - destinationOffset < windowHeight ? documentHeight - windowHeight : destinationOffset) - offset;

      if ('requestAnimationFrame' in window === false) {
        window.scroll(0, destinationOffsetToScroll);
        if (callback) {
          callback();
        }
        return;
      }

      function scroll() {
        var now = 'now' in window.performance ? performance.now() : new Date().getTime();
        var time = Math.min(1, ((now - startTime) / duration));
        var timeFunction =  time * (2 - time); //easings[easing](time);
        window.scroll(0, Math.ceil((timeFunction * (destinationOffsetToScroll - start)) + start));

        if (window.pageYOffset === destinationOffsetToScroll) {
          if (callback) {
            callback();
          }
          return;
        }

        requestAnimationFrame(scroll);
      }

      scroll();
    }
    var init = function() {
      if (!initCalled) {
        initCalled = true;
        el.classList.remove('no-js');

        for (var i = 0; i < tabNavigationLinks.length; i++) {
          var link = tabNavigationLinks[i];
          handleClick(link, i);
        }

        // If the deepLink option is set to true and a URL # exists
        // TODO: loop through tabContentContainers and get the id, check to see if it is equal to the url hash and use the handleClick function to change the slide based on index
        if (options.deepLink && location.hash){

            var hash = location.hash.substr(1);
            // If there is an element that has the ID equal to the URL hash
            if (document.getElementById(hash)){

                /* Remove is-active classnames */
                var clear_active_tab_link = document.querySelector(".tab-link");
                clear_active_tab_link.classList.remove("is-active");

                var clear_active_tab_content = document.querySelector(".tab-content");
                clear_active_tab_content.classList.remove("is-active");

                /* Add is-active classnames based on url hash */
                var active_tab_link = document.querySelector('[data-id="'+hash+'"]');

                active_tab_link.click();

                active_tab_link.classList.add("is-active");
                var active_tab_content = document.getElementById(hash);
                active_tab_content.classList.add("is-active");

                scrollIt(document.getElementById(hash),300,250,150);
            }

        }

      }
    };
    /**
     * handleClick
     *
     * @description Handles click event listeners on each of the links in the
     *   tab navigation. Returns nothing.
     * @param {HTMLElement} link The link to listen for events on
     * @param {Number} index The index of that link
     */
    var handleClick = function(link, index) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        goToTab(index);

        // stores hash state in history for back button
        if(options.deepLink){
          history.replaceState(null, null, '#'+this.getAttribute('data-id')+'');
        }



      });
    };
    /**
     * goToTab
     *
     * @description Goes to a specific tab based on index. Returns nothing.
     * @param {Number} index The index of the tab to go to
     */
    var goToTab = function(index) {
      if (index !== activeIndex && index >= 0 && index <= tabNavigationLinks.length) {
        tabNavigationLinks[activeIndex].classList.remove('is-active');
        tabNavigationLinks[index].classList.add('is-active');
        tabContentContainers[activeIndex].classList.remove('is-active');
        tabContentContainers[index].classList.add('is-active');
        activeIndex = index;
      }
    };
    /**
     * Returns init and goToTab
     */
    return {
      init: init,
      goToTab: goToTab
    };
  };
  /**
   * Attach to global namespace
   */
  window.tabs = tabs;
})();
// End tabs.js
