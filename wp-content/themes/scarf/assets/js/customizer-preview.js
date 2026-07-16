( function( $ ) {
	'use strict';

	var cssVars = {
		'scarf_color_primary':        '--scarf-color-primary',
		'scarf_color_primary_hover':  '--scarf-color-primary-hover',
		'scarf_color_primary_soft':   '--scarf-color-primary-soft',
		'scarf_color_secondary':      '--scarf-color-secondary',
		'scarf_color_secondary_soft': '--scarf-color-secondary-soft',
		'scarf_color_accent':         '--scarf-color-accent',
		'scarf_color_text':           '--scarf-color-text',
		'scarf_color_text_soft':      '--scarf-color-text-soft',
		'scarf_color_background':     '--scarf-color-background',
		'scarf_color_surface':        '--scarf-color-surface',
		'scarf_color_border':         '--scarf-color-border',
		'scarf_color_discount':       '--scarf-color-discount'
	};

	$.each( cssVars, function( setting, cssVar ) {
		wp.customize( setting, function( value ) {
			value.bind( function( newVal ) {
				document.documentElement.style.setProperty( cssVar, newVal );
			} );
		} );
	} );

	// Font family
	wp.customize( 'scarf_font_family', function( value ) {
		value.bind( function( newVal ) {
			document.documentElement.style.setProperty( '--scarf-font-family', newVal );
		} );
	} );

	// Heading scale
	wp.customize( 'scarf_heading_scale', function( value ) {
		value.bind( function( newVal ) {
			var s = parseFloat( newVal );
			document.documentElement.style.setProperty( '--scarf-font-2xl', ( 1.75 * s ) + 'rem' );
			document.documentElement.style.setProperty( '--scarf-font-xl', ( 1.375 * s ) + 'rem' );
			document.documentElement.style.setProperty( '--scarf-font-lg', ( 1.125 * s ) + 'rem' );
		} );
	} );

	// Hero background color
	wp.customize( 'scarf_hero_bg_color', function( value ) {
		value.bind( function( newVal ) {
			var heroBg = document.querySelector( '.scarf-hero__bg' );
			if ( heroBg ) {
				heroBg.style.backgroundColor = newVal;
			}
		} );
	} );

} )( jQuery );
