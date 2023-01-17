let data = new Date()
let monthCurrent = String(data.getMonth() + 1).padStart(2, '0')
monthCurrent = parseInt(monthCurrent)
monthCurrent--

//banner
const swiperBanner = new Swiper( '.js-swiper-banner', {
    loop: true,

    autoplay: {
        delay: 6000,
        disableOnInteraction: false
    }
});

//best sellers
const swiperProducts = new Swiper( '.js-swiper-best-sellers', {    
    allowTouchMove: false,
    
    breakpoints: {
        320: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
        },

        992: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },

    navigation: {
        prevEl: '.js-swiper-button-prev-best-sellers',
        nextEl: '.js-swiper-button-next-best-sellers',
    }
})

//product images
const swiperProductImages = new Swiper( '.js-swiper-product-images', {    
    slidePerView: 1,
    loop: true,

    navigation: {
        prevEl: '.js-swiper-button-prev-product-images',
        nextEl: '.js-swiper-button-next-product-images',
    }
})

//show products
const swiperShowProducts = new Swiper( '.js-swiper-show-products', {
    breakpoints: {
        320: {
            slidesPerView: 1
        },

        768: {
            slidesPerView: 2
        },

        992: {
            slidesPerView: 3
        }
    },

    navigation: {
        prevEl: '.js-swiper-button-prev-show-products',
        nextEl: '.js-swiper-button-next-show-products',
    }
})

//testimonials
const swiperTestimonials = new Swiper( '.js-swiper-testimonials', {
    slidesPerView: 3,
    spaceBetween: 30,

    breakpoints: {
        320: {
            slidesPerView: 1
        },

        768: {
            slidesPerView: 2
        },

        992: {
            slidesPerView: 3,
            spaceBetween: 30
        }
    },

    navigation: {
        prevEl: '.js-swiper-button-prev-testimonials',
        nextEl: '.js-swiper-button-next-testimonials',
    }
})

//about
const swiperAbout = new Swiper( '.js-swiper-about', {
    breakpoints: {
        320: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 30,
        },

        992: {
            slidesPerView: 3,
            spaceBetween: 30,
        }
    },

    navigation: {
        prevEl: '.js-swiper-button-prev-about',
        nextEl: '.js-swiper-button-next-about',
    }
})

//calendar day
const swiperDay = new Swiper( '.js-swiper-day', {
    allowTouchMove: false,
    initialSlide: monthCurrent,
    
    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

//videos
const swiperVideos = new Swiper( '.js-swiper-videos', {
    navigation: {
        prevEl: '.js-swiper-button-prev-videos',
        nextEl: '.js-swiper-button-next-videos'
    },

    breakpoints: {
        320: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 3,
            spaceBetween: 6,
        }
    }
}) 

//calendar
const swiperMonth = new Swiper( '.js-swiper-month', {
    allowTouchMove: false,
    initialSlide: monthCurrent,
    
    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

const swiperCalendar = new Swiper( '.js-swiper-calendar', {
    allowTouchMove: false,
    initialSlide: monthCurrent,
    
    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

//partners 
const swiperPartners = new Swiper( '.js-swiper-partners', {
    spaceBetween: 30,
    loop: true,

    breakpoints: {
        320: {
            slidesPerView: 2,
        },

        768: {
            slidesPerView: 4,
        },

        992: {
            slidesPerView: 5,
        },
    },

    autoplay: {
        delay: 6000,
        disableOnInteraction: false,
    },

    navigation: {
        prevEl: '.js-swiper-button-prev-partners',
        nextEl: '.js-swiper-button-next-partners'
    }
})