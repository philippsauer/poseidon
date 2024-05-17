/**
 * Sticky Header
 *
 * Copyright 2017 ThemeZee
 * Free to use under the GPLv2 and later license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Author: Thomas Weichselbaumer (themezee.com)
 *
 * @package Poseidon
 */

(function($) {

	/**--------------------------------------------------------------
	# Sticky Header
	--------------------------------------------------------------*/
	$.fn.stickyHeader = function() {

		var body = $( 'body' ),
			top_position = $( this ).offset().top - body.offset().top - 1,
			small_header = top_position + 70;

		var makeSticky = function() {

			var window_top = $( window ).scrollTop();

			if ( window_top > top_position ) {

				body.addClass( 'sticky-header' );

			} else {

				body.removeClass( 'sticky-header' );

			}

			if ( window_top > small_header ) {
				body.addClass( 'small-header' );
			} else {
				body.removeClass( 'small-header' );
			}
		}

		makeSticky();

		$( window ).scroll( makeSticky );

	};

	/**--------------------------------------------------------------
	# Setup Sticky Header
	--------------------------------------------------------------*/
	$( document ).ready( function() {

		/* Add Sticky Header feature */
		$( '.site-header' ).stickyHeader();

	} );

}(jQuery));
