/**
 * @function
 * @param modalID
 */
function openModal( modalID ) {
	const modal = document.getElementById( modalID );
	modal.classList.add( 'open' );
}

/**
 * @param modalID
 */
function closeModal( modalID ) {
	const modal = document.getElementById( modalID );
	modal.classList.remove( 'open' );
}

jQuery( document ).ready( function () {
	const modalTriggers = document.querySelectorAll( '.modal-trigger' );
	const modalOverlays = document.querySelectorAll( '.modal-overlay' );
	const modalCloseBtns = document.querySelectorAll( '.modal-close' );

	modalTriggers.forEach( function ( trigger ) {
		trigger.addEventListener( 'click', function ( e ) {
			e.preventDefault();
			const modalID = this.dataset.modalid;
			openModal( modalID );
		} );
	} );

	modalCloseBtns.forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			const modalID = this.closest( '.modal' ).id;
			closeModal( modalID );
		} );
	} );

	modalOverlays.forEach( function ( overlay ) {
		overlay.addEventListener( 'click', function () {
			const modalID = this.closest( '.modal' ).id;
			closeModal( modalID );
		} );
	} );
} );
