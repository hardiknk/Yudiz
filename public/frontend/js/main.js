$('#latest_news_section').owlCarousel({
    loop:true,
    margin:20,
    autoplay: true,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
$('#other_news_section').owlCarousel({
    loop:true,
    margin:20,
    autoplay: true,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})


$(document).ready(function(){
    $('.hamburger').click(function(){
        $('nav').slideToggle();
    })
})