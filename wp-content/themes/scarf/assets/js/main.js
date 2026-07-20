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

	/* ── Quick View Modal ───────────────────────────────────────── */
	if ( typeof scarfQuickView !== 'undefined' ) {
		document.addEventListener( 'DOMContentLoaded', function () {
			var overlay  = null;
			var modal    = null;
			var closeBtn = null;

			function createModal() {
				if ( overlay ) {
					return;
				}

				overlay = document.createElement( 'div' );
				overlay.className = 'scarf-qv-overlay';
				overlay.setAttribute( 'role', 'dialog' );
				overlay.setAttribute( 'aria-modal', 'true' );
				overlay.setAttribute( 'aria-label', scarfQuickView.i18n.close );

				modal = document.createElement( 'div' );
				modal.className = 'scarf-qv-modal';

				closeBtn = document.createElement( 'button' );
				closeBtn.type = 'button';
				closeBtn.className = 'scarf-qv-modal__close';
				closeBtn.setAttribute( 'aria-label', scarfQuickView.i18n.close );
				closeBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';

				var spinner = document.createElement( 'div' );
				spinner.className = 'scarf-qv-spinner';
				spinner.textContent = scarfQuickView.i18n.loading;

				modal.appendChild( closeBtn );
				modal.appendChild( spinner );
				overlay.appendChild( modal );
				document.body.appendChild( overlay );

				closeBtn.addEventListener( 'click', closeModal );
				overlay.addEventListener( 'click', function ( e ) {
					if ( e.target === overlay ) {
						closeModal();
					}
				} );
				document.addEventListener( 'keydown', function ( e ) {
					if ( e.key === 'Escape' && overlay && overlay.parentNode ) {
						closeModal();
					}
				} );
			}

			function openModal( productId ) {
				createModal();
				document.body.classList.add( 'scarf-qv-open' );

				var spinner = modal.querySelector( '.scarf-qv-spinner' );
				if ( spinner ) {
					spinner.style.display = '';
				}

				var existingContent = modal.querySelector( '.scarf-qv' );
				if ( existingContent ) {
					existingContent.remove();
				}

				var formData = new FormData();
				formData.append( 'action', 'scarf_quick_view' );
				formData.append( 'nonce', scarfQuickView.nonce );
				formData.append( 'product_id', productId );

				fetch( scarfQuickView.ajaxUrl, {
					method: 'POST',
					body: formData,
					credentials: 'same-origin'
				} )
				.then( function ( response ) {
					return response.json();
				} )
				.then( function ( data ) {
					if ( data.success && data.data && data.data.html ) {
						if ( spinner ) {
							spinner.style.display = 'none';
						}
						modal.insertAdjacentHTML( 'beforeend', data.data.html );
					} else {
						closeModal();
					}
				} )
				.catch( function () {
					closeModal();
				} );
			}

			function closeModal() {
				if ( overlay && overlay.parentNode ) {
					overlay.parentNode.removeChild( overlay );
				}
				overlay  = null;
				modal    = null;
				closeBtn = null;
				document.body.classList.remove( 'scarf-qv-open' );
			}

			document.addEventListener( 'click', function ( e ) {
				var trigger = e.target.closest( '.scarf-qv__trigger' );
				if ( trigger ) {
					e.preventDefault();
					var productId = trigger.getAttribute( 'data-product-id' );
					if ( productId ) {
						openModal( productId );
					}
				}
			} );
		} );
	}
} )();
