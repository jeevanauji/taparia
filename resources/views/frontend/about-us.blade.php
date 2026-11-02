@extends('frontend.master')

@section('title')
About Us
@endsection()

@section('content')
<style>
    /* --- CRITICAL MOBILE FIXES --- */
    * {
        box-sizing: border-box;
    }

    html,
    body {
        width: 100% !important;
        overflow-x: hidden !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    header {
        font-family: 'Overpass', sans-serif !important;
    }

    body {
        font-family: 'Open Sans', sans-serif !important;
    }

    /* --- HERO SECTION FULL HEIGHT --- */
    .hero-section {
        position: relative;
        overflow: hidden;
        width: 100%;
        /*height: min(100vh, 450px);*/
		height: 100vh;
		max-height: calc(100vh - 112px);
        display: flex;
		
    }
	



    .mission-vission-bg {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 3rem;
        align-items: stretch;
    }

    .mission-box {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 8px 25px rgba(116, 188, 198, 0.15);
        border: 2px solid #f8f9fa;
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .mission-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 15px;
        background-color: #74BCC6;
    }

    .mission-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(116, 188, 198, 0.25);
        border-color: #74BCC6;
    }

    .icon-container {
        width: 100px;
        height: 100px;
        background-color: #74BCC6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem auto;
        position: relative;
        transition: all 0.3s ease;
        margin-top: 14px;
    }

    .mission-box:hover .icon-container {
        transform: scale(1.1);
        background-color: #5fa8b2;
    }

    .icon {
        width: 50px;
        height: 50px;
        fill: white;
    }

    .mission-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .mission-text {
        font-size: 1.1rem;
        color: #666;
        line-height: 1.8;
        text-align: center;
    }
	.manufacturing-con {
    height: 500px !important;
    display: flex;
    justify-content: center;
    align-items: center;
}

    /* Responsive Design - Updated for all devices */
    @media (max-width: 1200px) {
        .hero-section .hero-text {
            margin-left: 30px;
            max-width: 600px;
        }

        .vm-card-container {
            gap: 2rem;
        }
    }

    @media (max-width: 992px) {
        .hero-section {
			height: min(100vh, 450px);
    		min-height: 400px;
         	max-height: 450px; 
    		}
        .hero-section .hero-text {
            margin-left: 20px;
            max-width: 500px;
        }

        .content-section .row {
            flex-direction: column;
        }

        .col-md-7,
        .col-md-5 {
            width: 100%;
            padding: 20px 15px;
        }

        .col-md-5 .abou-img {
            text-align: center;
        }

        .col-md-5 .abou-img img {
            max-width: 100%;
            height: auto;
        }

        .mission-vission-bg {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .vm-card {
            min-width: 100%;
            margin-bottom: 2rem;
        }

        .manufacturing-con div {
            margin: 0 15px;
            padding: 2rem;
        }
    }

    /* MOBILE FIXES - Critical updates */
    @media (max-width: 767px) {
 .hero-section {
			height: min(100vh, 450px);
    		min-height: 400px;
         	max-height: 450px; 
    		}
        /* Force proper mobile layout */
        .row {
            flex-direction: column !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .col-md-7,
        .col-md-5,
        .col-4 {
            width: 100% !important;
            max-width: 100% !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
            flex: 0 0 100% !important;
        }

        .heading-con h2 {
            font-size: 2rem;
        }

        .mission-vission-bg {
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 0 15px;
        }

        .mission-box {
            padding: 2rem 1.5rem;
        }

        .container-fluid {
            padding: 0 15px;
        }

      

        /* Mobile hero text left alignment */
        .hero-section .hero-text {
            margin-left: 0 !important;
            max-width: 100% !important;
            padding: 0 20px !important;
            text-align: left !important;
        }

        .hero-section .hero-text h2 {
            font-size: 2.2rem !important;
            line-height: 1.2;
            text-align: left !important;
        }

        .hero-section .hero-text span {
            /*font-size: 1.2rem !important;*/
            text-align: left !important;
        }

        .about-count .row {
            flex-direction: column;
            gap: 2rem;
        }

        .about-count .col-4 {
            width: 100%;
        }

        .vm-main-title {
            font-size: 2rem;
        }

        .vm-card {
            padding: 2rem 1.5rem;
            min-width: 100% !important;
            max-width: 100% !important;
        }

        .manufacturing-con div h3 {
            font-size: 2rem !important;
        }

        .manufacturing-con {
            padding-bottom: 5rem;
            padding-top: 4rem;
        }

        /* Content section mobile fixes */
        .content-section .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .aboutus-txt {
            padding: 20px 15px !important;
        }

        .aboutus-txt h2 {
            font-size: 1.8rem !important;
        }

        .aboutus-txt p {
            font-size: 14px !important;
            text-align: justify;
            padding: 0 5px;
        }
    }

    @media (max-width: 576px) {
		 .hero-section {
			height: min(100vh, 450px);
    		min-height: 400px;
         	max-height: 450px; 
    		}
        .heading-con h2 {
            font-size: 1.8rem;
        }

        .mission-box {
            padding: 1.5rem 1rem;
        }

        .icon-container {
            width: 80px;
            height: 80px;
        }

        .icon {
            width: 40px;
            height: 40px;
        }

    
        /* Mobile hero text adjustments */
        .hero-section .hero-text {
            padding: 0 15px !important;
            text-align: left !important;
        }

        .hero-section .hero-text h2 {
            font-size: 2rem !important;
            text-align: left !important;
            margin-bottom: 10px;
        }

        .hero-section .hero-text span {
            /*font-size: 1.1rem !important;*/
            text-align: left !important;
        }

        .aboutus-txt h2 {
            font-size: 1.8rem;
        }

        .aboutus-txt p {
            font-size: 14px !important;
            text-align: justify;
            padding: 0 5px;
        }

        .vm-main-title {
            font-size: 1.75rem;
        }

        .vm-card {
            padding: 1.5rem 1rem;
        }

        .vm-icon-wrapper {
            width: 70px;
            height: 70px;
        }

        .vm-icon {
            width: 35px;
            height: 35px;
        }

        .vm-card-title {
            font-size: 1.5rem;
        }

        .vm-card-text {
            font-size: 1rem;
        }

        .manufacturing-con div {
            padding: 1.5rem;
            margin: 0 10px;
        }

        .manufacturing-con div h3 {
            font-size: 1.8rem !important;
            margin-bottom: 1rem;
        }

        .manufacturing-con div p {
            font-size: 1rem !important;
            text-align: justify;
        }

        .about-count .container-xl img {
            max-width: 250px !important;
        }

        .about-count .container-xl p {
            font-size: 14px !important;
            padding: 2rem 0 !important;
        }

        .company-aspect h5 {
            font-size: 1rem !important;
        }

        .section-underline {
            width: 60px;
        }
    }

    @media (max-width: 480px) { 
		.hero-section {
			height: min(100vh, 450px);
    		min-height: 400px;
         	max-height: 450px; 
    		}
   
        /* Mobile hero text - left aligned and edge-to-edge */
        .hero-section .hero-text {
            padding: 0 15px !important;
            text-align: left !important;
            width: 100%;
        }

        .hero-section .hero-text h2 {
            font-size: 2.3rem !important;
            margin-bottom: 5px;
            text-align: left !important;
            padding: 0;
        }

        .hero-section .hero-text span {
            /*font-size: 18px !important;*/
            text-align: left !important;
            padding: 0;
        }

        .mission-vission-bg {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .mission-title {
            font-size: 1.5rem;
        }

        .mission-text {
            font-size: 1rem;
        }

        .vm-content-wrapper {
            padding-top: 0rem;
        }

        .manufacturing-con {
            padding-bottom: 4rem;
            padding-top: 3rem;
        }

        .manufacturing-con div h3 {
            font-size: 1.6rem !important;
        }

        .manufacturing-con div p {
            font-size: 0.9rem !important;
        }

        /* Remove padding from content sections */
        .content-section .container-fluid {
            padding: 0 !important;
        }

        .aboutus-txt {
            padding: 0 10px !important;
        }

        .aboutus-txt p {
            padding: 0 !important;
        }
    }

    @media (max-width: 375px) {
     .hero-section {
			height: min(100vh, 450px);
    		min-height: 400px;
         	max-height: 450px; 
    		}
        /* Extra small mobile adjustments */
        .hero-section .hero-text {
            padding: 0 10px !important;
            text-align: left !important;
        }

        .hero-section .hero-text h2 {
            font-size: 1.5rem !important;
            text-align: left !important;
            padding: 0;
        }

        .hero-section .hero-text span {
            /*font-size: 0.9rem !important;*/
            text-align: left !important;
            padding: 0;
        }

        .mission-box {
            padding: 1rem;
        }

        .icon-container {
            width: 70px;
            height: 70px;
            margin-top: 10px;
            margin-bottom: 1.5rem;
        }

        .icon {
            width: 35px;
            height: 35px;
        }

        /* Remove all side padding for edge-to-edge layout */
        .container-fluid,
        .container-xl,
        .vm-container-fluid {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .content-section .row,
        .aboutus-txt,
        .vm-content-wrapper {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    }

    @media (max-width: 320px) {

 .hero-section {
			height: min(100vh, 450px);
    		min-height: 400px;
         	max-height: 450px; 
    		}
        .hero-section .hero-text {
            padding: 0 5px !important;
            text-align: left !important;
        }

        .hero-section .hero-text h2 {
            font-size: 1.3rem !important;
            text-align: left !important;
        }

        .mission-title {
            font-size: 1.3rem;
        }

        .mission-text {
            font-size: 0.9rem;
        }

        /* Ultra small devices - completely edge-to-edge */
        body {
            padding: 0;
            margin: 0;
        }

        .container-fluid,
        .container-xl,
        .vm-container-fluid,
        .content-section,
        .aboutus-txt {
            padding-left: 5px !important;
            padding-right: 5px !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
    }

    @media (min-width: 1600px) {
        .hero-section {
            height: min(100vh, 650px);
        }
    }

    @media (min-width: 2101px) {
        .hero-section {
            height: min(100vh, 850px);
        }
    }

    .hero-section .videobanner {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .hero-section .image-banner {
        width: 100%;
        height: 100%;
    }

    .hero-section .image-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .hero-section .bannertxt {
        position: relative;
        z-index: 1;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        color: #676464;
        padding: 20px;
        box-sizing: border-box;
        text-align: left;
    }

    .hero-section .hero-text {
        width: 100%;
        max-width: 650px;
        margin-left: 50px;
    }

    /* Mobile-first adjustments for text elements */
    .hero-heading {
        font-size: clamp(1.8rem, 6vw, 3.75rem) !important;
        line-height: 1.2;
        text-align: left !important;
    }

    .hero-subheading {
        font-size: clamp(1rem, 3vw, 1.5rem) !important;
        text-align: left !important;
    }

    .fa {
        transition: 0.3s all ease;
    }

    .fa:hover {
        color: #ff0000ff;
        transform: scale(1.2);
    }

    .section-underline {
        width: 80px;
        height: 1px;
        background-color: #ff0000ff;
        margin: 0 auto 20px;
    }

    /* Vision Mission Section Responsive */
    .vm-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        position: relative;
        overflow: hidden;
    }

    .vm-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #74bcc6, #5aa5b0, #74bcc6);
    }

    .vm-container-fluid {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .vm-heading-container {
        text-align: center;
        margin-bottom: 1rem;
        position: relative;
    }

    .vm-main-title {
        font-size: clamp(1.75rem, 4vw, 2.5rem);
        font-weight: 700;
        color: #74bcc6;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: relative;
        display: inline-block;
    }

    .vm-title-underline {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .vm-underline-primary {
        width: 30%;
        height: 1px;
        background: #ff0000ff;
        border-radius: 2px;
        position: relative;
    }

    .vm-content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding-top: 0rem !important;
    }

    .vm-card-container {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        gap: 2rem;
    }

    .vm-card {
        flex: 1;
        min-width: 300px;
        max-width: 450px;
        background: white;
        border-radius: 16px;
        padding: 1.5rem 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        border: 1px solid rgba(116, 188, 198, 0.1);
    }

    .vm-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .vm-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #74bcc6, #5aa5b0);
    }

    .vm-icon-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, #74bcc6, #5aa5b0);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        box-shadow: 0 8px 20px rgba(116, 188, 198, 0.3);
    }

    .vm-icon {
        width: 40px;
        height: 40px;
        fill: white;
    }

    .vm-card-title {
        font-size: clamp(1.5rem, 3vw, 1.75rem);
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .vm-card-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 1px;
        background: #ff0000ff;
        border-radius: 1px;
    }

    .vm-card-text {
        font-size: clamp(1rem, 2vw, 1.1rem);
        line-height: 1.7;
        color: #4a5568;
        margin-bottom: 1rem;
    }

    .vm-card-decoration {
        position: absolute;
        bottom: -30px;
        right: -30px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(116, 188, 198, 0.1) 0%, rgba(116, 188, 198, 0.05) 100%);
        z-index: 0;
    }

    /* Manufacturing Section Responsive */
    .manufacturing-con div h3 {
        font-size: clamp(1.8rem, 4vw, 2.5rem) !important;
        text-align: center;
    }

    .manufacturing-con div p {
        font-size: clamp(1rem, 2vw, 1.1rem) !important;
        line-height: 1.6;
    }

    /* About Count Section Responsive */
    .about-count .container-xl img {
        max-width: min(350px, 80%) !important;
        width: 100%;
    }

    .about-count .container-xl p {
        font-size: clamp(14px, 2vw, 16px) !important;
    }

    /* Company Aspect Responsive */
    .company-aspect h5 {
        font-size: clamp(0.9rem, 2vw, 1.1rem) !important;
    }

    /* Animation for cards */
    @keyframes vmFadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .vm-card {
        animation: vmFadeInUp 0.6s ease forwards;
    }

    .vm-vision-card {
        animation-delay: 0.1s;
    }

    .vm-mission-card {
        animation-delay: 0.3s;
    }

    /* Touch device optimizations */
    @media (hover: none) {
        .mission-box:hover {
            transform: none;
        }

        .vm-card:hover {
            transform: none;
        }

        .fa:hover {
            transform: none;
            color: inherit;
        }
    }

    /* Force left alignment for all hero text on mobile */
    @media (max-width: 768px) {
		 .hero-section {
			height: 400px !important;
    		min-height: 400px;
         	max-height: 450px; 
    		}
        .hero-section .bannertxt {
            justify-content: flex-start !important;
            text-align: left !important;
        }

        .hero-section .hero-text,
        .hero-section .hero-text h2,
        .hero-section .hero-text span,
        .hero-section .hero-text p {
            text-align: left !important;
            margin-left: 0 !important;
        }
		.hero-heading{
			font-size:2.3rem;   
			text-align: left;
		   }
		   .hero-subheading{
			font-size:18px;
			line-height:0;   
			 text-align: left;
		   }
		
		.hero-section p {
        display: block;
		font-size:18px;
        text-align: left;
        position: relative;
    	}
    }

    /* Ensure containers don't overflow on mobile */
    @media (max-width: 768px) {

        .container-fluid,
        .container-xl,
        .vm-container-fluid {
            max-width: 100% !important;
            width: 100% !important;
        }

        .hero-section,
        .content-section,
        .vm-section {
            width: 100% !important;
            max-width: 100% !important;
        }
		.hero-heading{
			font-size:2.3rem;   
			text-align: left;
		   }
		   .hero-subheading{
			font-size:18px;
			line-height:0;   
			 text-align: left;
		   }
		
		.hero-section p {
        display: block;
		font-size:18px;
        text-align: left;
        position: relative;
    	}
    }
	
	/* Mobile only (≤ 767px) */
@media (max-width: 768px) {
	 .hero-section {
			height: min(100vh, 450px);
    		min-height: 400px;
         	max-height: 450px; 
    		}
    .abou-img {
        margin: 0 !important;
        padding: 0 !important;
    }

    .abou-img img {
        margin: 0 !important;
        padding: 0 !important;
        display: block;
        width: 100%;
        height: auto;
    }

    .col-md-5.pe-0 {
        padding: 0 !important;
        margin: 0 !important;
    }
	.hero-heading{
			font-size:2.3rem;   
			text-align: left;
		   }
		   .hero-subheading{
			font-size:18px;
			line-height:0;   
			 text-align: left;
		   }
		
		.hero-section p {
        display: block;
		font-size:18px;
        text-align: left;
        position: relative;
    	}
}

	body > div.content-section.pt-0 > div.about-count.bg-primary{
		padding:2rem 0;
	}
	
	.vm-card {
		max-width: 400px;
	}
	
	@media (max-width: 767px) {
    .bannertxt {
		left:0;
		right:0;
    }
		.hero-heading{
			font-size:2.3rem;   
			text-align: left;
		   }
		   .hero-subheading{
			font-size:18px;
			line-height:0;   
			 text-align: left;
		   }
		
		.hero-section p {
        display: block;
		font-size:18px;
        text-align: left;
        position: relative;
    	}
}
</style>

<div class="hero-section">
    <!-- Banner Image -->
  
	<div class="videobanner">
    <picture class="image-banner">
        <source media="(max-width: 767px)" srcset="{{ asset('frontend/images/aboutus-mobile.jpg') }}">
        <img src="{{ asset('frontend/images/aboutus-05.jpg') }}" alt="Banner">
    </picture>
</div>


    <!-- Text Overlay -->
    <div class="bannertxt">
        <div class="hero-text">
            <h2 class="wow fadeInLeft hero-heading" style="font-weight: 600; margin-bottom: 10px;color: rgb(255 255 255);">
				TRUST, <span style="color:#AEE7ED;"> LEGACY</span>, <br> DEDICATION.
            </h2>
            <span class="hero-subheading" style="margin-bottom:10px;color: #fff;">
                Our foundation is trust our future is <br> continuous improvement
            </span>
        </div>
    </div>
</div>

<div class="content-section pt-0">
   <div class="container-fluid pe-0" >
        <div class="row me-0">
            <div class="col-md-7 ps-md-5" style="padding:60px 0px 80px 0px;">
                <div class="aboutus-txt" style="padding-top:0px;">
                    <h2 style="color:#74BCC6;">About us</h2>
                     <div style=" width: 17%;height: 1px;background-color: #74BCC6; margin-bottom: 35px; "></div>           
                    <p style="font-size: 16px; margin-top: 10px;">
                        Founded in 1969, Taparia Tools Ltd. is one of India’s most trusted hand tool manufacturers. Our journey began with a partnership with Bahco of Sweden, bringing their expertise to India. Today, we blend high-quality craftsmanship with advanced technology, catering to both professionals and DIY enthusiasts. With a wide range of tools that meet global standards, we proudly represent India on the international stage.
                    </p>
                    <p style="font-size: 16px;">
                        We use advanced technology to ensure high-quality products from our manufacturing units in Nashik and Goa. Our company has a dedicated research and development team that constantly works on improving and creating new tools. We export to numerous regions worldwide, making us a globally trusted brand.
                    </p>
                    <p style="font-size: 16px;">
                        Taparia is committed to delivering reliable products that meet customer needs. Integrity, innovation, and a focus on quality drive every part of our work. We also prioritize sustainable practices and continuous growth through technology.
                    </p>
                </div>
            </div>
            <div class="col-md-5 pe-0 align-self-end">
                <div class="abou-img" style="margin-bottom: 0rem;">
                    <img src="{{ asset('frontend/images/about-us-1965.png') }}"/>
                </div>
            </div>
        </div>
    </div>

    <div class="about-count bg-primary">
        <div class="container-xl">
            <div class="text-center" data-aos="fade-up">
                <img src="{{ asset('frontend/images/Taparia_new_logo2.png') }}" style="max-width: 350px;width: 100%;" data-aos="fade-up" alt="Taparia Logo">
                <p class="text-light py-5" style="font-size: 16px;" data-aos="fade-up">
                    As we look to the future, Taparia Tools remains committed to maintaining its leadership in the hand tools industry. Our long-term goals include investing in cutting-edge technology, expanding our product range, and continually enhancing our processes. With a focus on sustainability and technological advancement, Taparia is set to continue shaping the future of the hand tools industry.
                </p>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-4" data-aos="fade-up">
                    <div class="company-aspect text-center">
                        <i class="fa fa-user"></i>
                        <h5 style="color:white;text-transform : none !important;">Skilled Workforce</h5>
                    </div>
                </div>
                <div class="col-4" data-aos="fade-up">
                    <div class="company-aspect text-center">
                        <i class="fa fa-building"></i>
                        <h5 style="color:white;text-transform : none !important;">Wide Distribution</h5>
                    </div>
                </div>
                <div class="col-4" data-aos="fade-up">
                    <div class="company-aspect text-center">
                        <i class="fa fa-globe"></i>
                        <h5 style="color:white;text-transform : none !important;">Worldwide Reach</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="vm-section">
        <div class="vm-container-fluid">
            <div class="vm-heading-container">
                <h2 class="vm-main-title" data-aos="fade-up">VISION AND MISSION</h2>
                <div class="vm-title-underline">
                    <div style="width: 80px; height: 1px; margin: 0 auto 20px auto; background-color: #ff0000ff; "></div>
                </div>
            </div>

            <div class="vm-content-wrapper">
                <div class="vm-card-container">
                    <div class="vm-card vm-vision-card" data-aos="fade-up">
                        <div class="vm-icon-wrapper" data-aos="fade-up">
                            <svg class="vm-icon" viewBox="0 0 24 24">
                                <path d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                            </svg>
                        </div>
                        <h3 class="vm-card-title" data-aos="fade-up">Vision</h3>
                        <div class="vm-card-text" data-aos="fade-up">
                            We strive to continually improve our products through innovation and advanced technology, ensuring they meet the highest standards.
                        </div>
                        <div class="vm-card-decoration"></div>
                    </div>

                    <div class="vm-card vm-mission-card" data-aos="fade-up">
                        <div class="vm-icon-wrapper" data-aos="fade-up">
                            <svg class="vm-icon" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z" />
                            </svg>
                        </div>
                        <h3 class="vm-card-title" data-aos="fade-up">Mission</h3>
                        <div class="vm-card-text" data-aos="fade-up">
                            We aspire to set new standards for quality and sustainability, ensuring that every product reflects our commitment to excellence.
                        </div>
                        <div class="vm-card-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="manufacturing-con" style="padding:5rem 1rem 5rem 1rem;">
        <div style="background: #74bcc6db; padding: 2rem; border-radius: 10px; max-width: 982px; margin: 0 auto;" data-aos="fade-up">
            <h3 style="text-align: center;color: white; font-size: 2.5rem; font-weight: bold; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 2px; margin-top: 1rem;" data-aos="fade-up">MANUFACTURING FACILITY</h3>
            <p style="color: white; font-size: 1.1rem; line-height: 1.6; text-align: center; margin: 0;" data-aos="fade-up">The company operates fully equipped manufacturing facilities with all the essential processes for hand tool production under one roof. These plants are designed to manage both advanced technology and skilled labor, supporting the complex and meticulous nature of hand tool manufacturing.</p>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add intersection observer for scroll animations
        const cards = document.querySelectorAll('.vm-card');

        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Set initial state for animation
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    });
</script>
@endsection()

@section('javaScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollTrigger);

        gsap.from('.mission-vission-bg > div:first-child', {
            x: -150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: '.mission-vission-bg',
                start: 'top 80%',
                toggleActions: 'play none none none'
            }
        });

        gsap.from('.mission-vission-bg > div:last-child', {
            x: 150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: '.mission-vission-bg',
                start: 'top 80%',
                toggleActions: 'play none none none'
            }
        });
    });
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection()