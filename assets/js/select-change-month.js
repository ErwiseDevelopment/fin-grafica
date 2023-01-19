(function($) {
    $(document).ready(function() {
        $('#categoria-evento').change(function() {
            $( '#formulario' ).submit();
        
        });

        $( '#material' ).change(function() {
            $( '#formulario' ).submit();
        });
    })
})(jQuery)