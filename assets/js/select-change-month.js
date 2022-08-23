(function($) {
    $(document).ready(function() {
        $('#categoria-evento').change(function() {
            $( '#formulario' ).submit();
        
        });

        $( '#mes' ).change(function() {
            $( '#formulario' ).submit();
        });
    })
})(jQuery)