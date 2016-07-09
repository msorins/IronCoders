jQuery( function ( $ ) {
    var editor = CodeMirror.fromTextArea( $( '#custom-css-textarea' ).get( 0 ), {
        'mode': 'css',
        'theme':'neat'
    } );

    $('#so-custom-css-info a').click(function(e){
        if( !confirm( $(this).closest('ol').data('confirm') ) ) {
            e.preventDefault();
        }
    });

} );