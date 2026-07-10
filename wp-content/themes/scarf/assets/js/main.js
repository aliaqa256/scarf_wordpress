( function () {
	document.documentElement.classList.remove( 'no-js' );
	document.documentElement.classList.add( 'js' );

	document.addEventListener( 'DOMContentLoaded', function () {
		var toggle = document.querySelector( '.scarf-mobile-menu-toggle' );
		var nav    = document.getElementById( 'scarf-site-navigation' );

		if ( toggle && nav ) {
			function closeMenu() {
				toggle.setAttribute( 'aria-expanded', 'false' );
				nav.classList.remove( 'is-open' );
				document.body.classList.remove( 'scarf-menu-open' );
			}

			function openMenu() {
				toggle.setAttribute( 'aria-expanded', 'true' );
				nav.classList.add( 'is-open' );
				document.body.classList.add( 'scarf-menu-open' );
			}

			toggle.addEventListener( 'click', function () {
				var expanded = toggle.getAttribute( 'aria-expanded' ) === 'true';
				if ( expanded ) {
					closeMenu();
				} else {
					openMenu();
				}
			} );

			document.addEventListener( 'keydown', function ( e ) {
				if ( e.key === 'Escape' && nav.classList.contains( 'is-open' ) ) {
					closeMenu();
					toggle.focus();
				}
			} );
		}

		var filterToggle = document.querySelector( '.scarf-filter-toggle' );
		var filterPanel  = document.getElementById( 'scarf-shop-filters' );

		if ( filterToggle && filterPanel ) {
			function closeFilters() {
				filterToggle.setAttribute( 'aria-expanded', 'false' );
				filterPanel.classList.remove( 'is-open' );
				document.body.classList.remove( 'scarf-filter-open' );
			}

			function openFilters() {
				filterToggle.setAttribute( 'aria-expanded', 'true' );
				filterPanel.classList.add( 'is-open' );
				document.body.classList.add( 'scarf-filter-open' );
			}

			filterToggle.addEventListener( 'click', function () {
				var expanded = filterToggle.getAttribute( 'aria-expanded' ) === 'true';
				if ( expanded ) {
					closeFilters();
				} else {
					openFilters();
				}
			} );

			document.addEventListener( 'keydown', function ( e ) {
				if ( e.key === 'Escape' && filterPanel.classList.contains( 'is-open' ) ) {
					closeFilters();
					filterToggle.focus();
				}
			} );
		}
	} );
} )();
