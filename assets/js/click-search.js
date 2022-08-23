(function() {
    if(document.querySelector( '.js-icon-search' )) {
        document.querySelector( '.js-icon-search' ).addEventListener( 'click', function() {
            document.querySelector( '.js-input-search' ).click()   
        })
    }
})()