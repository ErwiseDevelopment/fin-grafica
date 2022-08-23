(function() {
    const shortcutItem = document.getElementsByClassName( ' js-shortcut-item' )

    for(const i of shortcutItem) {
        i.addEventListener( 'mouseover', function() {
            for(const j of shortcutItem) {
                j.style.background = 'none'
            }

            this.style.backgroundColor = this.dataset.color
        })
    }

    for(const i of shortcutItem) {
        i.addEventListener( 'mouseout', function() {
            this.style.background = 'none'
        })
    }
})()