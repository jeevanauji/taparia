wow=new WOW({animateClass:'animated',offset:50,callback:function(box)
  {
    
    // console.log("WOW: animating <"+box.tagName.toLowerCase()+">")

  }});wow.init();

$('.product-slider').owlCarousel({
    loop:true,
    margin:100,
    nav:true,
    dots:false,
    center:false,
    autoplay:false,
    autoplayTimeout:2000,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        600:{
            items:2,
            margin:10,
        },
          1100:{
            items:2,
        },
        1200:{
          items:3
        }
    }
})

$('.best-pro-slider').owlCarousel({
  loop:false,
  margin:50,
  nav:true,
  dots:false,
  center:false,
  navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
  responsive:{
      0:{
          items:1,
          margin:10,
      },
      600:{
          items:2,
          margin:10,
      },
      1100:{
          items:2,
          margin:10,
      },
      1200:{
        items:3
      }
  }
})

$(document).ready(() => {
    $('.nav-pills').scrollingTabs({
      bootstrapVersion: 4,
      scrollToTabEdge: true,
      cssClassLeftArrow: 'fa fa-chevron-left',
      cssClassRightArrow: 'fa fa-chevron-right',
    }).on('ready.scrtabs', () => {
      $('.nav-link').click(() => {
        setTimeout(() => {
          $('.nav-pills').scrollingTabs('scrollToActiveTab');
        }, 10);
      });
    });
  });


  $(document).ready(function() {
    var $swiper = $(".swiper-container");
    var $bottomSlide = null;
    var $bottomSlideContent = null;
    var mySwiper = new Swiper(".swiper-container", {
      spaceBetween: 10,
      slidesPerView: 3.5,
      centeredSlides: true,
      roundLengths: true,
      autoplay:true,
      delay: 2000,
      waitForTransition: true,
      loop: true,
      loopAdditionalSlides: 30,
      speed: 2000,
      disableOnInteraction: false,
      breakpoints: {
        500: { slidesPerView: 1.5 },
        700: { slidesPerView: 2.5 },
        1200: { slidesPerView: 4.5 },
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
  });
  
  
  $(".close-mar").click(function(){
    $(".header-top").hide();
})

$(document).ready(function() {
  $('.dropdown').hover(function() {
    $(this).addClass('show');
    $(this).find('.dropdown-menu').addClass('show');
  }, function() {
    $(this).removeClass('show');
    $(this).find('.dropdown-menu').removeClass('show');
  });
});

$('#loading-wrapper').delay(2000).fadeOut(300);


// Header

$(window).scroll(function() {    
  var scroll = $(window).scrollTop();
  if (scroll >= 100) {
      $("header").addClass("lightHeader");
  } else {
    $("header").removeClass("lightHeader");
  }
});

//Product'S Slider 

// $('.productSLider').slick({
//   centerMode: true,
//   focusOnSelect: true,
//   centerPadding: '40px',
//   slidesToShow: 3,
//   autoplay: false,
//   autoplaySpeed: 2000,
//   dots:true,
//   responsive: [
//     {
//       breakpoint: 768,
//       settings: {
//         arrows: false,
//         centerMode: true,
//         centerPadding: '40px',
//         slidesToShow: 2
//       }
//     },
//     {
//       breakpoint: 480,
//       settings: {
//         arrows: false,
//         centerMode: true,
//         centerPadding: '40px',
//         slidesToShow: 1
//       }
//     }
//   ]
// });

//image scroll


if(typeof window.IntersectionObserver !== 'undefined') {
  let options = {
    threshold: [0.5, 1]
  }
  const targets = document.querySelectorAll('.cb');
  const locker = document.querySelector('.locker__container');
  function handleIntersection(entries) {
    entries.map((entry) => {
      if (entry.isIntersecting) {
        entry.target.current = entry.target.dataset.swap;
        document.querySelector(".locker__container ." + entry.target.current).classList.add("active");
      } else {
        document.querySelector(".locker__container ." + entry.target.current).classList.remove("active");
      }
    });
  }
  const observer = new IntersectionObserver(handleIntersection, options);
  targets.forEach(target => observer.observe(target));
} else {
}

//Product details

$(document).ready(function() {
  var bigimage = $("#big");
  var thumbs = $("#thumbs");
  //var totalslides = 10;
  var syncedSecondary = true;

  bigimage
    .owlCarousel({
    items: 1,
    slideSpeed: 2000,
    nav: false,
    autoplay: false,
    dots: false,
    loop: true,
    responsiveRefreshRate: 200,
    navText: [
      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    ]
  })
    .on("changed.owl.carousel", syncPosition);

  thumbs
    .on("initialized.owl.carousel", function() {
    thumbs
      .find(".owl-item")
      .eq(0)
      .addClass("current");
  })
    .owlCarousel({
    items: 4,
    dots: false,
    nav: true,
    margin:10,
    navText: [
      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    ],
    smartSpeed: 200,
    slideSpeed: 500,
    slideBy: 4,
    responsiveRefreshRate: 100
  })
    .on("changed.owl.carousel", syncPosition2);

  function syncPosition(el) {
    //if loop is set to false, then you have to uncomment the next line
    //var current = el.item.index;

    //to disable loop, comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
      current = count;
    }
    if (current > count) {
      current = 0;
    }
    //to this
    thumbs
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = thumbs.find(".owl-item.active").length - 1;
    var start = thumbs
    .find(".owl-item.active")
    .first()
    .index();
    var end = thumbs
    .find(".owl-item.active")
    .last()
    .index();

    if (current > end) {
      thumbs.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (syncedSecondary) {
      var number = el.item.index;
      bigimage.data("owl.carousel").to(number, 100, true);
    }
  }

  thumbs.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    bigimage.data("owl.carousel").to(number, 300, true);
  });
});

$('.quality-ass-slider').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots:false,
  items:3,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
})


document.addEventListener("DOMContentLoaded", () => {
  const stickyImage = document.getElementById("sticky-image");
  const sections = document.querySelectorAll("section");

  const observerOptions = {
    root: null,
    threshold: 0.6,
  };
  const observerCallback = (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const newImage = entry.target.getAttribute("data-image");
        if (stickyImage.src.includes(newImage)) return;
        stickyImage.style.opacity = 0;
        setTimeout(() => {
          stickyImage.src = newImage;
          stickyImage.style.opacity = 1;
        }, 300);
      }
    });
  };
  const observer = new IntersectionObserver(observerCallback, observerOptions);
  sections.forEach((section) => observer.observe(section));
});


// var scrollableHeight = $('#main')[0].scrollHeight - $('#main').height();
// $('#container section').each(function () {
//   $(this).data('relPos', ($(this).position().top + $(this).height()) / $('#main')[0].scrollHeight);
// });

// $('#main').scroll(function () {
//   var absScrPos = $(this).scrollTop();
//   var relScrPos = absScrPos / scrollableHeight;
//   $(this).find('#container > section')
//     .removeClass('highlight')
//     .filter(function () {
//       return parseFloat($(this).data('relPos')) > relScrPos;
//     })
//     .first()
//     .addClass('highlight');
// });



$(".mobiledrop .dropdown").click(function () {
  $(".dropdown-menu").toggle();
});

// var scrollableHeight = $('#main')[0].scrollHeight - $('#main').height();
// $('#container section').each(function () {
//   $(this).data('relPos', ($(this).position().top + $(this).height()) / $('#main')[0].scrollHeight);
// });

// $('#main').scroll(function () {
//   var absScrPos = $(this).scrollTop();
//   var relScrPos = absScrPos / scrollableHeight;
//   $(this).find('#container > section')
//     .removeClass('highlight')
//     .filter(function () {
//       return parseFloat($(this).data('relPos')) > relScrPos;
//     })
//     .first()
//     .addClass('highlight');
// });
document.querySelector('.search-button').addEventListener('click', function() {
  const searchContainer = document.querySelector('.search-container');
  searchContainer.classList.toggle('active');
});

