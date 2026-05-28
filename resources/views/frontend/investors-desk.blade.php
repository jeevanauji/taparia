@extends('frontend.master')

@section('title')
Investors Desk
@endsection()

@section('content')

<style>
    /* Keep existing media queries at top */
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

    /* Updated Hero Section */
    .hero-section {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100vh;
        max-height: 650px;
        min-height: 400px;
        display: flex;
        align-items: stretch;
    }

    /* Typography - Keep your classes but improved */
    .hero-heading {
        font-size: clamp(1.6rem, 5vw, 4.3rem);
        font-weight: 600;
        margin-bottom: 15px;
        color: rgb(255, 255, 255);
        line-height: 1.2;
    }

    .hero-subheading {
        font-size: clamp(1rem, 3.5vw, 1.9rem);
        margin-bottom: 20px;
        color: #74BCC6;
        line-height: 1.4;
    }

    /* Desktop - Keep left alignment */
    .hero-text {
        text-align: left;
    }

    /* Video/Image Banner */
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

    /* Improved image handling */
    .hero-section .image-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    /* Text Overlay */
    .hero-section .bannertxt {
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
        max-width: 800px;
        margin-left: 50px;
    }

    /* Button Styling - Improved */
    .btn-outline-primary {
        margin-top: 20px !important;
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
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        /* Mobile Hero Section */
        .hero-section {
            height: 60vh;
            min-height: 300px;
            max-height: 400px;
        }

        /* Mobile Text Alignment - Center like home page */
        .bannertxt {
            justify-content: center;
            text-align: left;
            left: 0;
        }

        .hero-heading {
            font-size: clamp(1.8rem, 6vw, 2.3rem);
            text-align: left;
            line-height: 1.1;
        }

        .hero-subheading {
            font-size: clamp(1rem, 4vw, 1.1rem);
            line-height: 1.3;
            text-align: left;
            margin-bottom: 15px;
        }

        .hero-section .hero-text {
            margin-left: 0;
            text-align: left;
            padding: 0 20px;
        }

        .image-banner img {
            object-position: center 25%;
        }

        .btn-outline-primary {
            padding: 10px 25px;
            font-size: 14px;
            margin-top: 15px !important;
        }
    }

    /* Additional responsive breakpoints */
    @media (max-width: 992px) {
        .hero-text {
            text-align: center;
        }
        
        .hero-section .hero-text {
            margin-left: 0;
            max-width: 90%;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            max-height: 450px;
            min-height: 350px;
        }
        
        .hero-heading {
            font-size: clamp(1.5rem, 5vw, 2rem);
        }
        
        .hero-subheading {
            font-size: clamp(0.9rem, 3vw, 1rem);
        }
    }

    /* Keep existing section underline styles */
    .section-underline {
        width: 80px;
        height: 1px;
        background-color: #ff0000ff;
        margin: 0 auto 20px;
    }

    @media (max-width: 768px) {
        .section-underline {
            width: 60px;
        }
    }

    /* Keep existing pagination styles */
    .pagination {
        --bs-pagination-color: #fff;
        --bs-pagination-hover-color: #fff;
        --bs-pagination-focus-color: #fff;
        --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 1);
        --bs-pagination-active-color: #fff;
        --bs-pagination-active-bg: #fff;
        --bs-pagination-active-border-color: #fff;
    }
    
    /* Keep existing button theme variables */
    .btn-outline-primary {
        --bs-btn-color: #fff;
        --bs-btn-border-color: #fff;
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: #fff;
        --bs-btn-hover-border-color: #fff;
        --bs-btn-focus-shadow-rgb: 13, 110, 253;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: #fff;
        --bs-btn-active-border-color: #fff;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        --bs-btn-disabled-color: #fff;
        --bs-btn-disabled-bg: transparent;
        --bs-btn-disabled-border-color: #fff;
        --bs-gradient: none;
    }
    
    .btn {
        --bs-btn-focus-box-shadow: 0 0 0 0.25rem #fff;
    }

    /* Investor Card Styles - KEEP AS IS */
    .investor-card {
        font-family: "Nunito Sans", sans-serif;
    }

    .investor-card {
        width: 260px;
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        padding: 10px;
        transition: 0.3s ease;
        text-align: center;
        font-size: medium;
    }

    .investor-card img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .investor-card:hover img {
        transform: scale(1.1);
    }

    .investor-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: #74BCC6;
    }

    .investor-card p {
        font-size: 17px;
        color: #333;
        margin: 15px 0;
    }

    .btn:hover {
        background-color: #74BCC6;
        border: none !important;
    }

    .investor-card a {
        border-color: rgb(103, 100, 100);
        color: #fff;
        background-color: rgb(103, 100, 100);
        visibility: visible;
        animation-name: fadeInRight;
    }

    .investor-card a:hover {
        background-color: #74BCC6 !important;
        color: white;
        border: 2px solidrgb(1, 52, 107);
    }

    .investor-card.active,
    .investor-card:hover {
        background-color: #e6f0ff;
        box-shadow: 0 6px 12px rgba(0, 47, 95, 0.2);
        transform: translateY(-5px);
    }

    @media screen and (max-width: 768px) {
        .investor-card {
            width: 90%;
        }
    }

    .btn-primary:hover {
        background-color: #43b7ff;
        border-color: #43b7ff;
        color: #fff;
    }

    /* TPR Button Styles - KEEP AS IS */
    .tpr-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 24px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid;
        border-radius: 8px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        background: transparent;
        cursor: pointer;
        min-height: 48px;
    }

    .tpr-btn-outline-primary {
        color: #74BCC6;
        border-color: #74BCC6;
        background: transparent;
    }

    .tpr-btn-outline-primary:hover {
        color: #ffffff;
        background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%);
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(116, 188, 198, 0.3);
    }

    .tpr-btn:active {
        transform: translateY(0);
        box-shadow: 0 4px 12px rgba(116, 188, 198, 0.4);
    }

    .tpr-btn-text {
        position: relative;
        z-index: 2;
        transition: all 0.3s ease;
    }

    .tpr-btn-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
        transition: transform 0.3s ease;
    }

    .tpr-btn-arrow {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    .tpr-btn:hover .tpr-btn-arrow {
        transform: translateX(3px);
    }

    .tpr-btn-hover-effect {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
        z-index: 1;
    }

    .tpr-btn:hover .tpr-btn-hover-effect {
        left: 100%;
    }

    /* Pulse Animation */
    @keyframes tpr-btn-pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(116, 188, 198, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(116, 188, 198, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(116, 188, 198, 0);
        }
    }

    .tpr-btn-pulse {
        animation: tpr-btn-pulse 2s infinite;
    }

    /* Loading State */
    .tpr-btn-loading .tpr-btn-text {
        opacity: 0.7;
    }

    .tpr-btn-loading .tpr-btn-icon {
        animation: tpr-btn-spin 1s linear infinite;
    }

    @keyframes tpr-btn-spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Size Variants */
    .tpr-btn-sm {
        padding: 8px 16px;
        font-size: 0.875rem;
        min-height: 36px;
    }

    .tpr-btn-lg {
        padding: 16px 32px;
        font-size: 1.125rem;
        min-height: 56px;
        gap: 12px;
    }

    .tpr-btn-lg .tpr-btn-arrow {
        width: 20px;
        height: 20px;
    }

    /* Disabled State */
    .tpr-btn:disabled,
    .tpr-btn-disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
        box-shadow: none !important;
    }

    .tpr-btn:disabled:hover,
    .tpr-btn-disabled:hover {
        color: #74BCC6;
        background: transparent;
        border-color: #74BCC6;
    }

    .tpr-btn:disabled .tpr-btn-hover-effect,
    .tpr-btn-disabled .tpr-btn-hover-effect {
        display: none;
    }

    /* Focus State */
    .tpr-btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(116, 188, 198, 0.3);
    }

    .tpr-btn:focus:not(:focus-visible) {
        box-shadow: none;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .tpr-btn {
            padding: 10px 20px;
            font-size: 0.9rem;
            min-height: 44px;
        }

        .tpr-btn-sm {
            padding: 6px 14px;
            font-size: 0.8rem;
            min-height: 34px;
        }

        .tpr-btn-lg {
            padding: 14px 28px;
            font-size: 1rem;
            min-height: 52px;
        }
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        .tpr-btn-outline-primary {
            color: #74BCC6;
            border-color: #74BCC6;
        }

        .tpr-btn-outline-primary:hover {
            color: #1a1a1a;
            background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%);
        }
    }

    /* Print Styles */
    @media print {
        .tpr-btn {
            border: 1px solid #000 !important;
            color: #000 !important;
            background: transparent !important;
            box-shadow: none !important;
        }

        .tpr-btn-hover-effect {
            display: none !important;
        }
    }
</style>

<div class="hero-section">
    <!-- Banner Image -->


	<div class="videobanner">
    <picture class="image-banner">
        <source media="(max-width: 767px)" srcset="{{ asset('frontend/images/mobile-investor.jpg') }}">
        <img src="{{ asset('frontend/images/BANNER_123_25_Investor_desk.jpg') }}" alt="Banner">
    </picture>
</div>

    <!-- Text Overlay -->
    <div class="bannertxt">
        <div class="hero-text">
    <h2 class="hero-heading" data-aos="fade-up" >
		TAPARIA <span style="color:#AEE7ED">POWERS </span> INDIA’S FUTURE
    </h2>

    <p class="hero-subheading" data-aos="fade-up" style="text-align:left;" >
        Providing businesses with dependable access to corporate insights and financial data.
    </p>
</div>

    </div>
</div>


<div class="content-section">
    <div class="container-xl pt-5">
        <div class="row">
            <div class="col-md-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-offset="0">
                <img data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-offset="0" src="{{ asset('frontend/images/investor-man.png?p=4') }}" class="w-100" />
            </div>
            <div class="col-md-7 align-self-center mt-4 mt-md-0" data-aos="fade-up">
                <h2 style=" color:#74BCC6;margin-bottom:0px !important">Investor Relation Hub </h2> 
                <div class="section-underline" style="margin: 10px 7rem;"></div>


                <h5 style="color:#74BCC6;" data-aos="fade-up">Your Gateway to Financial Insights</h5>
                <p class="meduam-fonts" data-aos="fade-up" style="font-size: 16px;">
                    Welcome to the Investor Desk, your one-stop destination for accessing all crucial information related to Taparia’s finances and shareholder details. Here, we provide transparent and up-to-date content to help investors make informed decisions.
                </p>
                <p class="meduam-fonts" style="font-size: 16px;" data-aos="fade-up">
                    The sections cover a broad range of financial and corporate data, ensuring easy navigation and full disclosure. With key insights on shareholder patterns, corporate governance, and financial performance, you can stay informed about the company’s progress. Whether you’re reviewing annual reports or attending general meetings, this is your trusted source for all investor-related matters at Taparia.
                </p>
            </div>
        </div>

        <div class="investor__grid pt-5" style="margin-bottom: 40px;">
            <h2 class="text-center" style="color:#74BCC6;margin-bottom:0px !important">Investor Desk</h2>
            <div class="section-underline"></div>
            <!-- <div style="
                width: 23%; 
                height: 1px; 
                background-color: #ff0000ff; 
                margin-bottom: 20px;
                text-align: center;
                margin:0 auto;
            "></div> -->

            <!-- Short centered underline -->
            <!-- <div style="
                width: 210px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto; 
                margin-bottom: 20px;
                
            "></div> -->

        </div>

        @php
        $sections = [

        [
        'title' => 'General Meetings',
        'desc' => 'Find information about upcoming and past general meetings, including agendas and minutes.',
        'image' => 'general_meeting.png',
        'url' => 'investors-desk-reports/general-meetings',
        'button' => 'Read More'
        ],

   
        [
        'title' => 'Investor Information',
        'desc' => 'Find essential information for our investors, including stock market data, dividends, and performance metrics.',
        'image' => 'Investor_Information.png',
        'url' => 'investors-desk-reports/investor-information',
        'button' => 'Read More'
        ],
        [
        'title' => 'Financial Results',
        'desc' => 'Stay informed with our latest financial outcomes. Taparia’s financial results offer an in-depth view of our profitability and revenue trends.',
        'image' => 'financial_result.png',
        'url' => 'investors-desk-reports/financial-results',
        'button' => 'Read More'
        ],
        [
        'title' => 'Annual Reports',
        'desc' => 'Discover Taparia’s performance over the years. Our Annual Reports provide a comprehensive overview of financial performance, achievements, and strategies that drive our future growth.',
        'image' => 'annual_report.png',
        'url' => 'investors-desk-reports/annual-reports',
        'button' => 'Read More'
        ],
        [
        'title' => 'Corporate Governance',
        'desc' => 'At Taparia, corporate governance is the foundation of our trust and integrity. Explore our commitment to the highest ethical standards, strong leadership, and transparency.',
        'image' => 'corporate_governance.png',
        'url' => 'investors-desk-reports/corporate-governance',
        'button' => 'Read More'
        ],
        [
        'title' => 'Shareholding Pattern',
        'desc' => 'Understand the distribution of our ownership and the stakeholders who power Taparia’s growth. This section provides detailed insights into the company’s equity structure, helping investors track the involvement of major shareholders and institutional investors.',
        'image' => 'shareholding_patern.png',
        'url' => 'investors-desk-reports/shareholding-pattern',
        'button' => 'Read More'
        ],
        ];
        @endphp
        

        <div class="container d-flex flex-wrap justify-content-center gap-5">
            @foreach ($sections as $index => $section)
            <div data-aos="fade-up" class="investor-card" style="    display: flex; flex-direction: column; justify-content:space-between;" onclick="highlightCard(this)">
                <div data-aos="fade-up">
                    <img src="{{ asset('frontend/images/' . $section['image']) }}" alt="{{ $section['title'] }}">
                    <h3>{{ strtoupper($section['title']) }}</h3>
                    <p>{{ $section['desc'] }}</p>
                </div>
                <a href="{{ url($section['url']) }}" class="btn btn-outline-primary position-relative wow fadeInRight" style="background: #676464; border-radius: 4px;" data-wow-delay="0.6s">
                    <span class="tpr-btn-text "> {{ $section['button'] }}</span>
                    <!--  <span class="tpr-btn-icon">
        <svg class="tpr-btn-arrow" viewBox="0 0 24 24" fill="none">
            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span> -->
                    <span class="tpr-btn-hover-effect"></span>
                </a>

             
            </div>
            @endforeach
        </div>
    </div>

    @endsection()
    @section('javaScript')
    <script>
        function highlightCard(clickedCard) {
            const cards = document.querySelectorAll('.investor-card');
            cards.forEach(card => card.classList.remove('active'));
            clickedCard.classList.add('active');
        }
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @endsection