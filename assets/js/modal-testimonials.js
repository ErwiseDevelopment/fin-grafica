(function() {
    const linksReadMore = document.getElementsByClassName( 'js-testimonial-read-more' )
    const modals = document.getElementsByClassName( 'js-modal-testimonials' )
    const btnClose = document.getElementsByClassName( 'js-modal-testimonials-btn-close' )
    const body = document.querySelector( 'body' )

    for( const i of linksReadMore ) {
        i.addEventListener( 'click', function() {
            for( const j of modals ) {
                if( i.dataset.value == j.dataset.value ) {
                    j.classList.add( 'active' )
                    body.classList.add( 'overflow-hidden' )
                } else {
                    j.classList.remove( 'active' )
                }
            }
        })
    }

    for( const k of btnClose ) {
        k.addEventListener( 'click', function() {
            for( const l of modals ) {
                l.classList.remove( 'active' )
                body.classList.remove( 'overflow-hidden' )
            }
        })
    }
})()