/**
 * Loads more post
 * @return null
 */

const blogPPP = 9; // Posts per load more page. Needs to match initial number of posts loaded on blog archive page.
let blogPageNumber = 1;
function loadPosts() {
	blogPageNumber++;
	const str =
		'&pageNumber=' +
		blogPageNumber +
		'&ppp=' +
		blogPPP +
		'&action=rwest_more_post_ajax';
	jQuery.ajax( {
		type: 'POST',
		dataType: 'html',
		url: ajax_posts.ajaxurl,
		data: str,
		success: function ( data ) {
			const $data = jQuery( data );
			if ( $data.length ) {
				jQuery( '#ajax-posts' ).append( $data );
				jQuery( '#more_posts' )
					.attr( 'disabled', false )
					.removeClass( 'disabled' );
			} else {
				jQuery( '#more_posts' )
					.attr( 'disabled', true )
					.addClass( 'disabled' )
					.text( 'NO MORE POSTS' );
			}
		},
		error: function ( jqXHR, textStatus, errorThrown ) {
			$loader.html( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
		},
	} );
	return false;
}

jQuery( '#more_posts' ).on( 'click', function () {
	jQuery( '#more_posts' ).attr( 'disabled', true ).addClass( 'disabled' );
	loadPosts();
} );
