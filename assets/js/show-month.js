// (function($) {
//     $('#mes').change(function() {
// 		$( '#formulario' ).submit();
// 	});

//     if(document.getElementsByClassName( 'js-swiper-months' )) {
//         const months = document.getElementsByClassName( 'js-swiper-months' )
//         const findMonthActive = document.getElementsByClassName( 'js-swiper-find-month-active' )

//         for( const i of findMonthActive ) {
//             i.addEventListener( 'click', function() {

//                 for( const j of months) {
//                     if( j.classList.contains( 'swiper-slide-active' ) ) {
//                         localStorage.setItem( 'month', j.dataset.month )

//                         const swiperDay= new Swiper( '.js-swiper-day', {
//                             initialSlide: j.dataset.count,
//                         })
//                     }     
//                 }
//             })
//         }
//     }
// })(jQuery)