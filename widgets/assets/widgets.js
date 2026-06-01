jQuery( document ).ready( function( $ ) {
	function media_upload( button_class ) { // handle image upload

		var _custom_media = true,
			_orig_send_attachment = wp.media.editor.send.attachment;

		$( 'body' ).on( 'click', button_class, function( e ) {
			e.preventDefault();
			var button_id = '#' + $( this ).attr( 'id' );
			var _this = $( this );
			var self = $( button_id );
			var send_attachment_bkp = wp.media.editor.send.attachment;
			var button = $( button_id );
			var id = button.attr( 'id' ).replace( '_button', '' );
			_custom_media = true;
			wp.media.editor.send.attachment = function( props, attachment ) {
				if ( _custom_media ) {
					$( _this ).parents( 'p' ).find( '.custom_media_url' ).val( attachment.sizes[props.size].url );
					$( _this ).parents( 'p' ).find( '.custom_media_image' ).attr( 'src', attachment.url ).css( 'display', 'block' );
				} else {
					return _orig_send_attachment.apply( button_id, [ props, attachment ]);
				}
			};
			wp.media.editor.open( button );
			return false;
		});

		$( 'body' ).on( 'click', '.duplicate', function( e ) { // handle duplicate item button click
			e.preventDefault();
			var oldItem = $( this ).parents( '.card' )
				.html()
				.replace( /collapseOne/g, 'collapseOne' + $( this ).parents( '#accordion' ).find( '.card' ).length )
				.replace( /repetable/g, 'repetable' + jQuery( this ).parents( '#accordion' ).find( '.card' ).length )
				.replace( /collapse show/g, 'collapse' );
			var newItem = '<div class="card">';
			newItem += oldItem;
			newItem += '</div>';
			$( this ).parents( '#accordion' ).append( newItem );
		});

		$('body').on('click', '.remove', function(e) { // handle remove item button click
			e.preventDefault();
			var index = e.target.getAttribute('data-index');
			console.log(index);
			$(this).parents('#accordion').children(`#card-item-${index}`).remove();
			console.log($(this).parents('#accordion').children(`#card-item-${index}`).remove())
		})
	}
	$( document ).on( 'panelsopen', function( e ) {
		$.each( $( '.customEditor' ), function() {
			var mceSettings = $( this ).parents( '.customEditorParent' ).data( 'mceSettings' );
			for ( var initId in tinyMCEPreInit.mceInit ) {
				mceSettings = $.extend({}, tinyMCEPreInit.mceInit[initId], mceSettings );
			}
			var id = $( this ).attr( 'id' );
			mceSettings = $.extend({}, mceSettings, {
				selector: '#' + id,
				setup: function( editor ) {
					editor.on( 'change', function() {
						tinyMCE.triggerSave();
					});
				}
			});
			tinyMCEPreInit.mceInit[id] = mceSettings;
			tinymce.init( tinyMCEPreInit.mceInit[id]);
		});
	});
	media_upload( '.custom_media_button.button' );
});
