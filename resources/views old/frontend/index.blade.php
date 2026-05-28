@extends('frontend.master')

@section('title')
Home
@endsection()
<!-- <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'> -->
<style>
   /* div {
        font-family: 'Bebas Neue';font-size: 22px;
    }*/
@media (min-width: 1600px) {
        height: min(100vh, 650px);
    }
}
@media (min-width: 2101px){
    .hero-section {
        height: min(100vh,850px);
    }
}
/* Mobile View: Max width 768px */
@media (max-width: 768px) {
    .hero-section {
        height: 400px !important;
    }

    .hero-text a {
        margin-top: 50px !important; /* Less space above button */
    }

}

.btn:hover{
    border-color: #74BCC6 !important;
    color : white !important;
    background-color: #74BCC6 !important;
}

.scrtabs-tab-scroll-arrow{
    color :  #74BCC6 !important;
}

.nav-pills .nav-link:hover {
    border-color: #74BCC6 !important;
}

h4{
    font-size: 1rem !important;
}

.scrollopa {
    opacity: 0.6;
    transition: opacity 0.3s;
}
.scrollopa.center-highlight {
    opacity: 1;
    z-index: 2;
}
.scrollopa.center-highlight h3 {
    background: linear-gradient(90deg, #74BCC6 0%, #5aa8b3 100%);
    color: #fff !important;
    padding: 6px 18px;
    border-radius: 8px;
    box-shadow: 0 2px 12px rgba(116,188,198,0.15);
    transition: background 0.3s, color 0.3s;
	
	
}
</style>
@section('content')
 <!--
<div class="hero-section" style="position: relative; overflow: hidden;">
     <div class="videobanner" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
        <div id="heroSlider" class="carousel slide" data-bs-ride="carousel" style="width: 100%; height: 100%;">
            <div class="carousel-inner" style="width: 100%; height: 100%;">
                <div class="carousel-item active" style="width: 100%; height: 90%;">
                    <div class="image-banner" style="width: 100%; height:100%;">
                        <img src="{{ asset('frontend/images/01.jpg') }}" alt="Banner" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="carousel-item" style="width: 100%; height: 90%;">
                    <div class="image-banner" style="width: 100%; height:100%;">
                        <img src="{{ asset('frontend/images/02.jpg') }}" alt="Banner" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="carousel-item" style="width: 100%; height: 90%;">
                    <div class="image-banner" style="width: 100%; height:100%;">
                        <img src="{{ asset('frontend/images/03.jpg') }}" alt="Banner" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev" style="filter: invert(1);">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next" style="filter: invert(1);">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

     <div class="bannertxt" style="
        position: relative;
        max-height:550px;
        z-index: 1;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        color: #676464;
        padding: 20px;
        box-sizing: border-box;
        text-align: left;
    ">
        <div class="hero-text" style="
            width: 100%;
            max-width: 650px;
            margin-left: 50px;
            margin-top: 0px;
        ">
            <h2 class="wow fadeInLeft" style="
                font-size: 70px;
                font-weight: 600;
                margin-bottom: 10px;
                color: rgb(103 100 100);
            ">
                Serving Every Corner of India
            </h2>
            <p style="font-size: clamp(22px, 6vw, 25px);
                margin-bottom: 10px;
                color: #74BCC6;">with Reliable Hand Tools Since 1969.</p>

            <a href="{{ url('products') }}" class="btn btn-outline-primary position-relative wow fadeInRight" style="
                margin-top: 50px !important;
                font-size: clamp(14px, 3vw, 16px);
                background-color: rgb(103 100 100);
                color: white;
                border: none;
                text-decoration: none;
                display: inline-block;
            ">
                Read More
            </a>
        </div>
    </div>
</div>-->


   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Slider with Blue Dots</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #676464;
            --accent-color: #74BCC6;
            --dark-color: #284957;
            --light-color: #4e8ba3;
        }
        
        .hero-section {
            position: relative;
            overflow: hidden;
            height: 100vh;
            max-height: 650px;
        }
        
        /* Banner Image Container */
        .videobanner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        
        /* Carousel Styling */
        #heroSlider {
            width: 100%;
            height: 100%;
        }
        
        .carousel-inner, .carousel-item {
            width: 100%;
            height: 100%;
        }
        
        .image-banner {
            width: 100%;
            height: 100%;
        }
        
        .image-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        /* Custom Carousel Controls (Bottom Dots) */
        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            margin: 0;
            justify-content: center;
            z-index: 3;
        }
        
        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            margin: 0 6px;
            transition: all 0.3s ease;
        }
        
        .carousel-indicators button.active {
            background-color: var(--accent-color);
            transform: scale(1.2);
        }
        
        /* Hide default Bootstrap controls */
        .carousel-control-prev, .carousel-control-next {
            display: none;
        }
        
        /* Text Overlay */
        .bannertxt {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: var(--primary-color);
            padding: 20px;
            box-sizing: border-box;
            text-align: left;
        }
        
        .hero-text {
            width: 100%;
            max-width: 650px;
            margin-left: 50px;
        }
        
        /* Typography */
        .hero-text h2 {
            font-size: 70px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--primary-color);
            line-height: 1.1;
        }
        
        .hero-text p {
            font-size: 25px;
            margin-bottom: 10px;
            color: var(--accent-color);
        }
        
        /* Button Styling */
        .btn-outline-primary {
            margin-top:  0px !important;
            font-size: 16px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            text-decoration: none;
            display: inline-block;
            padding: 12px 30px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--accent-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        /* Animation Classes */
        .wow {
            visibility: visible;
        }
        
        .fadeInLeft {
            animation: fadeInLeft 1s;
        }
        
        .fadeInRight {
            animation: fadeInRight 1s;
        }
        
        .fadeInUp {
            animation: fadeInUp 1s;
        }
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Slide Animation */
        .carousel-item {
            transition: transform 0.6s ease-in-out;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .hero-text h2 {
                font-size: 60px;
            }
            
            .hero-text p {
                font-size: 22px;
            }
        }
        
        @media (max-width: 992px) {
            .hero-text h2 {
                font-size: 50px;
            }
            
            .hero-text p {
                font-size: 20px;
            }
            
            .hero-text {
                max-width: 500px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                max-height: 500px;
            }
            
            .hero-text h2 {
                font-size: 40px;
            }
            
            .hero-text p {
                font-size: 18px;
            }
            
            .hero-text {
                max-width: 400px;
                margin-left: 20px !important;
            }
            
            .btn-outline-primary {
                padding: 10px 25px;
                font-size: 14px;
            }
            
            /* Image adjustments for tablet */
            .image-banner img {
                object-position: center 30%;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section {
                max-height: 450px;
            }
            
            .hero-text h2 {
                font-size: 32px;
            }
            
            .hero-text p {
                font-size: 16px;
            }
            
            .hero-text {
                max-width: 300px;
                margin-left: 15px !important;
            }
            
            .bannertxt {
                padding: 15px;
            }
            
            .btn-outline-primary {
                padding: 8px 20px;
                font-size: 14px;
                margin-top: 20px !important;
            }
            
            /* Image adjustments for mobile */
            .image-banner img {
                object-position: center 25%;
            }
            
            /* Adjust dot size for mobile */
            .carousel-indicators button {
                width: 10px;
                height: 10px;
                margin: 0 4px;
            }
        }
        
        @media (max-width: 400px) {
            .hero-text h2 {
                font-size: 28px;
            }
            
            .hero-text p {
                font-size: 15px;
            }
            
            .hero-text {
                max-width: 250px;
            }
            
            /* Image adjustments for small mobile */
            .image-banner img {
                object-position: center 20%;
            }
        }
		
		.carousel-indicators [data-bs-target] {
    box-sizing: content-box;
    flex: 0 1 auto;
    width: 13px;
    height: 13px;
    padding: 0;
    margin-right: 3px;
    margin-left: 3px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #ff1a1a;
    background-clip: padding-box;
    border: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    opacity: .5;
    transition: opacity .6s 
ease;
}
    </style>
</head>
<body>
    <div class="hero-section">
        <!-- Banner Image -->
        <div class="videobanner">
            <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="image-banner">
                            <img src="{{ asset('frontend/images/01.jpg') }}" alt="Banner" 
                             srcset="{{ asset('frontend/images/01.jpg') }} 1920w,
                                     {{ asset('frontend/images/01-mobile.jpg') }} 768w"
                             sizes="(max-width: 768px) 768px, 1920px">
                        </div>
                        <div class="bannertxt">
                            <div class="hero-text">
                                <h2 class="wow fadeInLeft">Built Tough, Trusted Nationwide.</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 30px;">Serving India's evolving needs with trusted tool performance.</p>
                                <a style="background: #676464; border-radius: 4px;" href="#" class="btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="image-banner">
                             <img src="{{ asset('frontend/images/02.jpg') }}" alt="Banner"
                             srcset="{{ asset('frontend/images/02.jpg') }} 1920w,
                                     {{ asset('frontend/images/02-mobile.jpg') }} 768w"
                             sizes="(max-width: 768px) 768px, 1920px">
                        </div>
                        <div class="bannertxt">
                            <div class="hero-text">
                                <h2 class="wow fadeInLeft">SERVING INDIA FOR DECADES</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 30px;">Tools built for India's pace, Trusted nationwide for performance.</p>
                                <a style="background:#676464; border-radius: 4px;" href="#" class="btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="image-banner">
                             <img src="{{ asset('frontend/images/03.jpg') }}" alt="Banner"
                             srcset="{{ asset('frontend/images/03.jpg') }} 1920w,
                                     {{ asset('frontend/images/03-mobile.jpg') }} 768w"
                             sizes="(max-width: 768px) 768px, 1920px">
                        </div>
                        <div class="bannertxt">
                            <div class="hero-text">
                                <h2 class="wow fadeInLeft">EMPOWERING INDIA'S WORKFORCE</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 30px;">Trusted by professionals to deliver consistent quality and strength</p>
                                <a style="background:#676464; border-radius: 4px;" href="#" class="btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize carousel with custom options
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = new bootstrap.Carousel(document.getElementById('heroSlider'), {
                interval: 5000, // 5 seconds between slides
                wrap: true,
                pause: false
            });
            
            // Add animation classes to active slide elements
            function animateSlideElements() {
                const activeSlide = document.querySelector('.carousel-item.active');
                const textElements = activeSlide.querySelectorAll('.wow');
                
                // Reset animations
                textElements.forEach(el => {
                    el.style.animation = 'none';
                    void el.offsetWidth; // Trigger reflow
                });
                
                // Apply animations with delays
                setTimeout(() => {
                    textElements.forEach(el => {
                        const animationClass = Array.from(el.classList).find(cls => 
                            cls.startsWith('fadeIn')
                        );
                        if (animationClass) {
                            el.style.animation = `${animationClass} 1s forwards`;
                        }
                    });
                }, 100);
            }
            
            // Animate elements when slide changes
            document.getElementById('heroSlider').addEventListener('slid.bs.carousel', animateSlideElements);
            
            // Initial animation
            animateSlideElements();
        });
    </script>
</body>
</html>






<section class="section-padd-t">
    <div class="container">

        <div class="text-center">

            <div class="heading-con" style="position: relative; text-align: center;">

            <h2 class="wow fadeInUp" style="margin: 0px; color: #74BCC6 !important; visibility: visible; animation-name: fadeInUp;">
                New Products
            </h2>

            <!-- Full-width underline -->
            <div style="
                width: 100%; 
                height: 1px; 
                background-color: #74BCC6;"></div>

            <!-- Short centered underline -->
            

        </div>

        </div>

    </div>
</section>

<section class="py-4 px-3 px-md-0" style="margin-top: 40px !important;padding-top: 0px !important; height:fit-content;">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($newProducts as $newproduct)
            <div class="swiper-slide">
                @if ($newproduct->productImage)
                <img src="{{ url($newproduct->productImage) }}" />
                @endif
                <div class="hover-section text-center">
                    <h4>
                        <a href="{{ url('product/' . Str::slug($newproduct->productName)) }}" class="text" style="text-decoration: none; color: #74BCC6; font-size: 22px;">
                            {{ $newproduct->productName }}
                        </a>
                    </h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padd about-section" style="padding-top:50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 wow fadeInLeft">
                <img src="{{ asset('frontend/images/about-us.png?p=5') }}" class="img-fluid" />
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 mt-5 mt-lg-0">
                <div class="heading-con align-items-end text-end w-100">
                    <h2 class="wow fadeInUp mb-0 pe-md-5" style="    width: 100%;
    display: flex
;
    flex-direction: column;
    align-items: start;">ABOUT US   <div style="
                width: 34%; 
                height: 1px; 
                background-color: #74BCC6; 
            "></div></h2>
                  

            <!-- Short centered underline -->
             
                </div>
                <!-- <h4 class="wow fadeInUp text-end pe-md-5">PROFESSIONAL QUALITY</h4> -->
                <div class="wow fadeInLeft mt-4" style="font-size: 16px;">
                    <p>
                        Founded in 1969, <strong>Taparia Tools Ltd.</strong> is one of India’s most trusted hand tool manufacturers. Our journey began with a partnership with Bahco of Sweden, bringing their expertise to India. Today, we blend high-quality craftsmanship with advanced technology, catering to both professionals and DIY enthusiasts. With a wide range of tools that meet global standards, we proudly represent India on the international stage.
                    </p>
                    <p>
                        Taparia is committed to delivering reliable products that meet customer needs. Integrity, innovation, and a focus on quality drive every part of our work. We also prioritize sustainable practices and continuous growth through technology.
                    </p>
                </div>
                <div class="mt-4">
    <a href="{{ url('about-us') }}" 
       class="btn btn-outline-primary wow fadeInRight" 
       style="border-color: rgb(103, 100, 100); color: white;">
       Read More
    </a>
</div>

            </div>
        </div>
    </div>
</section>

<section class="sustainble-section">
    <div class="container">
        <div class="sustainble-con section-padding-70">
            <h2 class="wow fadeInUp" style="color:#74bcc6;margin-bottom:0px !important">LEGACY</h2>
             <div style="
                width: 20%; 
                height: 1px; 
                background-color: #74BCC6; 
                
            "></div>

            <!-- Short centered underline -->
            <!-- <div style="
                width: 18%; 
                height: 1px; 
                background-color: #74BCC6; 
                margin-top: 8px;
                margin-left: 5px;
            "></div> -->
            
            <p class="wow fadeInUp mt-4" style="font-size: 16px;">
                Taparia has been synonymous with trust and excellence for over five decades, offering tools that stand the test of time. As a brand leader in India and a global exporter, Taparia’s legacy continues to be built on the strength of quality, innovation, and customer satisfaction.
            </p>
            <a href="{{ url('products') }}" 
   class="btn btn-outline-primary wow fadeInRight mt-4" 
   style="border-color:rgb(103, 100, 100 ); color:white;">
   Read More
</a>
        </div>
    </div>
</section>

<section class="section-padd-t features-categories py-md-5">
    <div class="container">
        <div class="text-center">
            <div class="heading-con">
                <h2 class="wow fadeInUp">FEATURE CATEGORIES</h2>
                <div style="
                width: 100%; 
                height: 1px; 
                background-color: #74BCC6;
            "></div>

            <!-- Short centered underline -->
            <!-- <div style="
                width: 210px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto; 
                
            "></div> -->
                <!-- <p class="wow fadeInUp">
                    With over <strong>800 distributors across India</strong>, getting your hands on top-notch tools has never been easier.                    
                </p> -->
            </div>
        </div>
    </div>

    <div class="section-padd-b mt-5">
        <div class="container wow fadeInDown">
            <div id="tabs">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap !important;">
                    @foreach($categories as $key => $category)
                    <li class="nav-item" role="presentation">
                        <button 
                        style="white-space:nowrap!important;border-color:rgb(103, 100, 100 );color: rgb(103, 100, 100);"
                            class="nav-link {{ $key === 0 ? 'active' : '' }}" 
                            id="pills-tab-{{ $category->id }}" 
                            data-bs-toggle="pill" 
                            data-bs-target="#pills-{{ $category->id }}" 
                            type="button" 
                            role="tab" 
                            aria-controls="pills-{{ $category->id }}" 
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                            {{ $category->name }}
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content catelists" id="pills-tabContent" style="margin-top: 5rem;">
                @foreach($productsByCategory as $key => $category)
                <div 
                    class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" 
                    id="pills-{{ $category['categoryId'] }}" 
                    role="tabpanel" 
                    aria-labelledby="pills-tab-{{ $category['categoryId'] }}">
                    <div class="row">
                        @foreach($category['products'] as $product)
                        <div class="col-md-6 col-lg-6 col-xl-4 mb-5">
                            <div class="best-pro-box">
                                @if ($product->productImage)
                                    <img src="{{ url($product->productImage) }}" />
                                @else
                                    <img src="{{ asset('frontend/images/default.jpg') }}" />
                                @endif
                                <div class="hover-section text-center">                                
                                    <h4>
                                        <a href="{{ url('product/' . Str::slug($product->productName)) }}" class="text-decoration-none" title="{{ ucwords(strtolower($product->productName)) }}" style="color: #74BCC6;">
                                            {{ $product->productName }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <a href="{{ url('product/' . Str::slug($product->productName)) }}" class="btn btn-outline-primary"  style="border-color:rgb(103, 100, 100 ); color:white">
                                    Read More
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
	
	
 <style>
        .get-in-touch {
            background: linear-gradient(135deg, #72c0cb, #ffffff);
            padding: 80px 30px;
            border-radius: 15px;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.1);
            animation: fadeIn 1.2s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .contact-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 100px;
            max-width: 1200px;
            margin: auto;
            position: relative;
            z-index: 2;
        }

        .contact-text {
            flex: 1;
            text-align: left;
        }

        .contact-icon {
            background: #fff;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            color: #74bcc6;
            box-shadow: 0px 6px 20px rgba(25, 118, 210, 0.4);
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }

        .contact-text h2 {
            font-size: 36px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 20px;
        }

        .contact-text p {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .call-btn {
            display: inline-block;
            background: #676464;
            color: #fff;
            padding: 10px 17px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0px 6px 15px rgba(25, 118, 210, 0.5);
            transition: all 0.3s ease;
        }

        .call-btn:hover {
            background: #74bcc6;
            transform: scale(1.08);
            box-shadow: 0px 8px 20px rgba(13, 71, 161, 0.6);
        }

        .contact-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: relative;
            height: 500px; /* Fixed height for full cover */
            width: 100%;
        }

        .contact-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Full cover styling */
            border-radius: 10px;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* Background Image for Full Cover Effect */
        .background-image {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }

        .background-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0 15px 15px 0;
        }

        /* Animations */
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(30px);}
            to {opacity: 1; transform: translateY(0);}
        }

        @keyframes bounce {
            0%, 100% {transform: translateY(0);}
            50% {transform: translateY(-10px);}
        }

        @keyframes float {
            0%, 100% {transform: translateY(0);}
            50% {transform: translateY(-8px);}
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .contact-container {
                flex-direction: column;
                gap: 50px;
            }
            
            .contact-image {
                height: 400px;
                width: 100%;
                justify-content: center;
            }
            
            .contact-image img {
                width: 100%;
                max-width: 500px;
            }
            
            .background-image {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .get-in-touch {
                padding: 60px 20px;
            }
            
            .contact-image {
                height: 300px;
            }
            
            .contact-text h2 {
                font-size: 28px;
            }
            
            .contact-text p {
                font-size: 16px;
            }
            
            .call-btn {
                padding: 14px 30px;
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .contact-image {
                height: 250px;
            }
            
            .contact-text h2 {
                font-size: 24px;
            }
            
            .contact-icon {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }
        }
    </style>
 
    <section class="get-in-touch">
        <!-- Background Image for Full Cover Effect -->
        <div class="background-image">
            <img src="https://tapariatools.tapariatools.com/public/frontend/images/get-in-touch-new.png" alt="Background Contact">
        </div>
        
        <div class="contact-container">
            <!-- Left Side Text -->
            <div class="contact-text">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h2>Get in Touch With Us</h2>
                <p>We are always ready to help you. Reach out to us anytime!</p>
                <a href="tel:#" class="call-btn" style="color: white;">
                    <i class="fas fa-phone-alt"></i> Call Now
                </a>
            </div>
            
            <!-- Right Side Image -->
             
        </div>
    </section>
</body>
</html>



<!--<section class="section-padd ">
    <div class="container">
        <div class="getintouch-con getintouch">
            <span class="fa fa-whatsapp wow fadeInLeft" style="align-items: center; justify-content: center; display: flex;margin-top:100px;">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
			</span>
            <div class="ms-3">
                <h2 class="wow fadeInUp mb-4" style="color:#74BCC6;margin-top:100px;">Get in touch with us</h2>
                <a href="{{ url('contact-us') }}" class="btn btn-outline-primary wow fadeInRight"  style="border-color:rgb(103, 100, 100 ); color:rgb(103, 100, 100);">Read More</a>
            </div>
        </div>
    </div>
</section>-->




  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .teh-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ed 100%);
        position: relative;
        overflow: hidden;
    }

    .teh-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .teh-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .teh-title {
        font-size: 3rem;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
    }

    .teh-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 5px;
        background: linear-gradient(90deg, #74bcc6, #5aa5b0);
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 5px;
    }

    .teh-subtitle {
        font-size: 1.2rem;
        color: #7f8c8d;
        max-width: 600px;
        margin: 2rem auto 0;
        line-height: 1.6;
    }

    .teh-content-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .teh-scroll-container {
        display: flex;
        gap: 50px;
        position: relative;
        min-height: 650px;
    }

    .teh-scroll-content {
        flex: 1;
        max-height: 650px;
        overflow-y: auto;
        padding-right: 20px;
        scrollbar-width: thin;
        scrollbar-color: #74bcc6 #e9ecef;
    }

    .teh-scroll-content::-webkit-scrollbar {
        width: 8px;
    }

    .teh-scroll-content::-webkit-scrollbar-track {
        background: #e9ecef;
        border-radius: 10px;
    }

    .teh-scroll-content::-webkit-scrollbar-thumb {
        background: #74bcc6;
        border-radius: 10px;
    }

    .teh-tool-item {
        background: white;
        border-radius: 16px;
        padding: 25px 30px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
        border-left: 6px solid transparent;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .teh-tool-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(116,188,198,0.08) 0%, rgba(116,188,198,0) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .teh-tool-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
    }

    .teh-tool-item.teh-active {
        border-left: 6px solid #74bcc6;
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(116,188,198,0.2);
        background: linear-gradient(135deg, #ffffff 0%, #f8fdff 100%);
    }

    .teh-tool-item.teh-active::before {
        opacity: 1;
    }

    .teh-tool-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #74bcc6, #5aa5b0);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(116,188,198,0.3);
        transition: all 0.3s ease;
    }

    .teh-tool-item.teh-active .teh-tool-icon {
        transform: scale(1.1);
        box-shadow: 0 6px 15px rgba(116,188,198,0.4);
    }

    .teh-tool-content {
        flex: 1;
    }

    .teh-tool-title {
        color: #2c3e50;
        font-size: 1.5rem;
        margin-bottom: 10px;
        font-weight: 700;
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .teh-tool-item.teh-active .teh-tool-title {
        color: #74bcc6;
    }

    .teh-tool-title::after {
        content: '';
        width: 8px;
        height: 8px;
        background: #74bcc6;
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .teh-tool-item.teh-active .teh-tool-title::after {
        opacity: 1;
        animation: pulse 1.5s infinite;
    }

    .teh-tool-desc {
        font-size: 16px;
        line-height: 1.6;
        color: #5a6c7d;
    }

    /* ✅ Updated Indicator Logic */
    .teh-indicator {
        width: 12px;
        height: 12px;
        background: #74bcc6;
        border-radius: 50%;
        margin-left: auto;
        opacity: 0;
        transform: scale(0);
        transition: all 0.3s ease;
        box-shadow: 0 0 0 4px rgba(116,188,198,0.3);
    }

    /* Show indicator when active OR hovered */
    .teh-tool-item.teh-active .teh-indicator,
    .teh-tool-item:hover .teh-indicator {
        opacity: 1;
        transform: scale(1);
    }

    .teh-image-display {
        flex: 0 0 50%;
        position: sticky;
        top: 20px;
        height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F9F9F9;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        overflow: hidden;
        border: 1px solid #eaeaea;
    }

    #teh-sticky-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: all 0.5s ease;
        border-radius: 10px;
    }

    .teh-spacer {
        height: 20px;
    }

    /* Animations */
    @keyframes tehFadeIn {
        from { opacity: 0; transform: scale(0.95) rotate(-2deg); }
        to { opacity: 1; transform: scale(1) rotate(0); }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    .teh-image-fade {
        animation: tehFadeIn 0.6s ease forwards;
    }

    /* Responsive design */
    @media (max-width: 1200px) {
        .teh-scroll-container {
            gap: 30px;
        }
        
        .teh-image-display {
            flex: 0 0 45%;
        }
    }

    @media (max-width: 992px) {
        .teh-scroll-container {
            flex-direction: column;
        }
        
        .teh-image-display {
            flex: 0 0 auto;
            height: 400px;
            margin-top: 30px;
            order: -1;
        }
        
        .teh-scroll-content {
            max-height: 500px;
        }
    }

    @media (max-width: 768px) {
        .teh-title {
            font-size: 2.2rem;
        }
        
        .teh-tool-item {
            padding: 20px;
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .teh-tool-title {
            font-size: 1.3rem;
        }
        
        .teh-tool-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        
        .teh-indicator {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    }

    @media (max-width: 576px) {
        .teh-section {
            padding: 3rem 0;
        }
        
        .teh-title {
            font-size: 1.8rem;
        }
        
        .teh-subtitle {
            font-size: 1rem;
        }
        
        .teh-image-display {
            height: 300px;
        }
    }
</style>

 
    <section class="teh-section">
       <!-- <div class="teh-container">
            <div class="teh-header">
                <h2 class="teh-title">Tool Excellence Hub</h2>
                <p class="teh-subtitle">Discover our premium range of professional tools designed for precision, durability, and exceptional performance</p>
            </div>
        </div>-->
		<div class="container">
        <div class="text-center">
            <div class="heading-con">
                <h2 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Tool Excellence Hub</h2>
                <div style="
                width: 100%; 
                height: 1px; margin-bottom: 20px;
                background-color: #74BCC6;
            "></div>

            <!-- Short centered underline -->
            <!-- <div style="
                width: 210px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto; 
                
            "></div> -->
                
            </div>
			<p class="wow fadeInUp" style="margin-bottom: 50px;">Discover our premium range of professional tools designed for precision, durability, and exceptional performance.</p>
        </div>
    </div>
        
        <div class="teh-content-wrapper">
            <div class="teh-scroll-container" id="teh-main-scroll">
                <div class="teh-scroll-content" id="teh-scroll-content">
                    <div class="teh-tool-item teh-active" data-image="{{ asset('frontend/images/combination-pliers.png') }}">
                        <div class="teh-tool-content">
                            <h3 class="teh-tool-title">Combination Pliers</h3>
                            <p class="teh-tool-desc">
                                Strong pliers for gripping, cutting, and twisting wires with ease. Works well for everyday home and professional repairs.
                            </p>
                        </div>
                        <div class="teh-indicator"></div>
                    </div>
                    
                    <div class="teh-tool-item" data-image="{{ asset('frontend/images/screw-driver.png') }}">
                        <div class="teh-tool-content">
                            <h3 class="teh-tool-title">Screw Drivers</h3>
                            <p class="teh-tool-desc">
                                Reliable screwdrivers for tightening and loosening all types of screws. Comfortable handle for safe and easy use.
                            </p>
                        </div>
                        <div class="teh-indicator"></div>
                    </div>
                    
                    <div class="teh-tool-item" data-image="{{ asset('frontend/images/ring-spanners.png') }}">
                        <div class="teh-tool-content">
                            <h3 class="teh-tool-title">Ring Spanners (Loose)</h3>
                            <p class="teh-tool-desc">
                                Open-end spanners for turning nuts and bolts in tight spaces. Sturdy build for long-lasting strength.
                            </p>
                        </div>
                        <div class="teh-indicator"></div>
                    </div>
                    
                    <div class="teh-tool-item" data-image="{{ asset('frontend/images/line-testers.png') }}">
                        <div class="teh-tool-content">
                            <h3 class="teh-tool-title">Line Testers</h3>
                            <p class="teh-tool-desc">
                                Quickly check electrical lines for power with a safe, compact tool. Easy to use for electricians and home projects.
                            </p>
                        </div>
                        <div class="teh-indicator"></div>
                    </div>
                    
                    <div class="teh-tool-item" data-image="{{ asset('frontend/images/allen-keys.png') }}">
                        <div class="teh-tool-content">
                            <h3 class="teh-tool-title">Allen Keys</h3>
                            <p class="teh-tool-desc">
                                Handy tools for tightening and loosening hex bolts and screws. Compact design fits easily in any toolkit.
                            </p>
                        </div>
                        <div class="teh-indicator"></div>
                    </div>
                    
                    <div class="teh-tool-item" data-image="{{ asset('frontend/images/socket-set.png') }}">
                        <div class="teh-tool-content">
                            <h3 class="teh-tool-title">Socket Set</h3>
                            <p class="teh-tool-desc">
                                Complete set for tightening and loosening nuts and bolts of different sizes. Ideal for car repairs, home use, and professional work.
                            </p>
                        </div>
                        <div class="teh-indicator"></div>
                    </div>
                    
                    <div class="teh-spacer"></div>
                </div>
                
                <div class="teh-image-display">
                    <img id="teh-sticky-image" src="{{ asset('frontend/images/combination-pliers.png') }}" alt="Tool Image">
                </div>
            </div>
        </div>
    </section>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const toolItems = document.querySelectorAll('.teh-tool-item');
    const stickyImage = document.getElementById('teh-sticky-image');
    let activeIndex = 0; // remember currently active item

    // Function to update image with fade animation
    function updateImage(imagePath) {
        stickyImage.classList.add('teh-image-fade');
        setTimeout(() => {
            stickyImage.src = imagePath;
        }, 200);
        setTimeout(() => {
            stickyImage.classList.remove('teh-image-fade');
        }, 600);
    }

    // Function to set active item
    function setActiveItem(index) {
        toolItems.forEach(i => i.classList.remove('teh-active'));
        toolItems[index].classList.add('teh-active');
    }

    // 👉 Click event — permanently select item
    toolItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            const imagePath = this.getAttribute('data-image');
            updateImage(imagePath);
            setActiveItem(index);
            activeIndex = index;
            this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    });

    // 👉 Hover event — temporarily preview image
    toolItems.forEach((item, index) => {
        item.addEventListener('mouseenter', function() {
            const imagePath = this.getAttribute('data-image');
            updateImage(imagePath);
            setActiveItem(index);
        });

        item.addEventListener('mouseleave', function() {
            // revert back to last selected image
            const activeItem = toolItems[activeIndex];
            const imagePath = activeItem.getAttribute('data-image');
            updateImage(imagePath);
            setActiveItem(activeIndex);
        });
    });

    // 👉 Initialize first item as active
    if (toolItems.length > 0) {
        toolItems[0].classList.add('teh-active');
    }
});
</script>







@endsection()

@section('javaScript')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('.scrollopa');
    const stickyImage = document.getElementById('sticky-image');
    const scrollContainer = document.getElementById('main');

    function highlightCenterSection() {
        let centerIndex = 0;
        let minDist = Infinity;
        const containerRect = scrollContainer.getBoundingClientRect();
        const containerMiddle = containerRect.top + containerRect.height / 2;

        sections.forEach((section, idx) => {
            const rect = section.getBoundingClientRect();
            const sectionMiddle = rect.top + rect.height / 2;
            const dist = Math.abs(sectionMiddle - containerMiddle);
            if (dist < minDist) {
                minDist = dist;
                centerIndex = idx;
            }
        });

        sections.forEach((section, idx) => {
            section.classList.remove('center-highlight');
        });

        if (sections[centerIndex]) {
            sections[centerIndex].classList.add('center-highlight');
            if (stickyImage && sections[centerIndex].dataset.image) {
                stickyImage.src = sections[centerIndex].dataset.image;
            }
        }
    }

    // Initial highlight
    highlightCenterSection();

    // Listen to scroll on the scroll-container
    if (scrollContainer) {
        scrollContainer.addEventListener('scroll', highlightCenterSection);
    }
    window.addEventListener('resize', highlightCenterSection);
});
</script>
@endsection