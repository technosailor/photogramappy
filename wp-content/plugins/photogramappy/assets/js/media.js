jQuery( document ).ready( function($) { 
	var modal = wp.media;
        modal.view.Modal.prototype.on('open', function() {
            var modal = wp.media.frame.el;
            var selected_images;
            if ('undefined' !== modal) {
                $(document).on('click', 'div.attachment-preview', function( ev ) {
                    selected_images = $( '.attachments-browser li.attachment.selected' );
                    selected_images.each( function() {
                        var attachment_id = $(this).data( 'id' );
                        console.log( attachment_id );
                        // @todo do Ajax to check meta
                        $.post( bcmedia.ajax_url, {
                            action      : 'check_thumbail_meta',
                            post_id     : bcmedia.post_id,
                            nonce       : bcmedia._check_thumb_nonce,
                            min_width   : bcmedia.min_width
                        }, function( data ) {
                            console.debug( data );
                        });
                    });
                } );
            }
        });
});