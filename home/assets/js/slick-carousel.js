$('.center').slick({
    centerMode: false,
    centerPadding: '60px',
    slidesToShow: 6,
    infinite: true,
    arrows: true,
    swipeToSlide: true,
    speed: 200,
    nextArrow: "<i class='fas shadow p-3 pt-4 pb-4 rounded-start display-6 fa-chevron-right'></i>",
    prevArrow: "<i class='fas shadow p-3 pt-4 pb-4 rounded-end display-6 fa-chevron-left'></i>",
    responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});

$('.single-item-rtl').slick({
    rtl: true
});

$('.banner_slider').slick({
    adaptiveHeight: true,
    infinite: true,
    autoplay: true,
    speed: 500,
    arrows: true,
    swipeToSlide: true,
    autoplaySpeed: 1500,
    slidesToShow: 1,
    nextArrow: "<i class='fas display-6 fa-chevron-right nextArrowBtn'></i>",
    prevArrow: "<i class='fas display-6 fa-chevron-left prevArrowBtn'></i>",
});