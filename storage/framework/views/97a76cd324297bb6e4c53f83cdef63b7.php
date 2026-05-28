<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
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

        /* Mobile View: Max width 768px */
        @media (max-width: 768px) {
            .hero-section {
                height: 400px !important;
            }

            .hero-text a {
                margin-top: 50px !important;
                /* Less space above button */
            }

        }

        .btn:hover {
            border-color: #74BCC6 !important;
            color: white !important;
            background-color: #74BCC6 !important;
        }

        .scrtabs-tab-scroll-arrow {
            color: #74BCC6 !important;
        }

        .nav-pills .nav-link:hover {
            border-color: #74BCC6 !important;
        }

        h4 {
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
            box-shadow: 0 2px 12px rgba(116, 188, 198, 0.15);
            transition: background 0.3s, color 0.3s;


        }

        .swiper-container-new-products {
            width: 100%;
            overflow: hidden;
            padding: 10px 0;
			display:flex;
			justify-content:center;
        }

        .swiper-slide {
            transition: all 0.3s ease;
            opacity: 0.5;
            transform: scale(0.85);
        }

        .swiper-slide-active {
            opacity: 1;
            transform: scale(1.1);
            z-index: 10;
        }

        .swiper-slide img {
            width: 70%;
            height: auto;
            display: block;
            border-radius: 10px;
			margin:auto;
        }

        .swiper-navigation {
            display: flex;
            justify-content: center;
            gap: 20px;
            align-items: center;
            margin-top: 20px;
        }

        .swiper-button-prev-custom,
        .swiper-button-next-custom {
            background-color: #74BCC6;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .swiper-button-prev-custom:hover,
        .swiper-button-next-custom:hover {
            background-color: #5da3ad;
            transform: scale(1.1);
        }

        .swiper-button-prev-custom.swiper-button-disabled,
        .swiper-button-next-custom.swiper-button-disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* New Product Popup Styles */
        .new-product-popup {
            position: fixed;
            right: -320px;
            bottom: 20px;
            width: 280px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            transition: right 0.5s ease;
            overflow: hidden;
        }

        .new-product-popup.show {
            right: 20px;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            font-size: 20px;
            line-height: 1;
            z-index: 10;
            transition: background 0.3s ease;
        }

        .popup-close:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        .popup-content {
            padding: 15px;
            text-align: center;
        }

        .popup-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #ff4757;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            z-index: 10;
        }

        .popup-content img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .popup-content h5 {
            color: #333;
            font-size: 16px;
            margin: 10px 0;
            font-weight: 600;
        }

        .popup-btn {
            display: inline-block;
            background: #74BCC6;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .popup-btn:hover {
            background: #5da3ad;
            color: white;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .new-product-popup {
                width: 150px;
            }

            .new-product-popup.show {
                right: 10px;
            }

            .popup-content img {
                height: 100px;
            }
        }

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
			max-height: calc(100vh - 112px);
			height:100%
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
            max-height: calc(100vh - 112px);
			height:100%
        }

        .carousel-inner,
        .carousel-item {
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
            width: 6px;
            height: 2px;
            border-radius: 0%;
            background-color: rgb(103, 100, 100);
            border: none;
            margin: 0 6px;
            transition: all 0.3s ease;
        }

        .carousel-indicators button.active {
            background-color: red;
            transform: scale(1.2);
            width: 25px;
        }

        /* Hide default Bootstrap controls */
        .carousel-control-prev,
        .carousel-control-next {
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
            font-size: 60px;
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
            margin-top: 15px !important;
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
                width: 2px;
                height: 2px;
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
            width: 8px;
            height: 8px;
            padding: 0;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #676464;
            opacity: 1;
            background-clip: padding-box;
            border: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            transition: .6s ease;
        }


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
            min-height: 380px;
			max-height:400px;
			padding: 0 5rem;
        }

        .teh-scroll-content {
            flex: 1;
            max-height: 400px;
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
            padding: 12px 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            border-left: 6px solid transparent;
            cursor: pointer;
            position: relative;
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
            background: linear-gradient(135deg, rgba(116, 188, 198, 0.08) 0%, rgba(116, 188, 198, 0) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .teh-tool-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .teh-tool-item.teh-active {
            border-left: 6px solid #74bcc6;
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(116, 188, 198, 0.2);
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
            box-shadow: 0 4px 10px rgba(116, 188, 198, 0.3);
            transition: all 0.3s ease;
        }

        .teh-tool-item.teh-active .teh-tool-icon {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(116, 188, 198, 0.4);
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
            box-shadow: 0 0 0 4px rgba(116, 188, 198, 0.3);
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
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F9F9F9;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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
            from {
                opacity: 0;
                transform: scale(0.95) rotate(-2deg);
            }

            to {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
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
				padding: 0 1rem;
				max-height:100vh;				
            }

            .teh-image-display {
                flex: 0 0 auto;
                height: 400px;
                margin-top: 30px;
                order: -1;
            }

            .teh-scroll-content {
                max-height: 500px;
				padding-right:0;
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

        .get-in-touch {
            /* Smooth background gradient + image overlay */
            background: linear-gradient(to right, rgba(116, 188, 198, 0.5), rgba(116, 188, 198, 0.1)), url(https://tapariatools.tapariatools.com/public/frontend/images/get-in-touch-new.png) center / contain no-repeat;

            /* Fixed background for parallax-like effect */
            background-attachment: fixed;

            /* Layout and design */
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            padding: 100px 30px;
            color: #fff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            z-index: 1;
            text-align: center;
        }

        @media (max-width: 991px) {
            .get-in-touch {
                background-attachment: scroll;
                /* Prevents jitter on mobile */
                background-size: cover;
                padding: 70px 20px;
            }
        }


        .contact-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 100px;
            max-width: 1200px;
            margin: auto;
            position: relative;
            /* keep above bg */
            z-index: 2;
        }

        /* Text and icon styling */
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
            margin-bottom: 20px;
            box-shadow: 0px 6px 20px rgba(25, 118, 210, 0.4);
        }

        .contact-text h2 {
            color: #74bcc6;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .contact-text p {
            color: #676464;
            font-size: 18px;
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
            transition: all 0.3s ease;
        }

        .call-btn:hover {
            background: #74bcc6;
            transform: scale(1.08);
        }

        /* Right side image */
        .contact-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 500px;
            width: 100%;
        }

        .contact-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .contact-container {
                flex-direction: column;
                gap: 50px;
            }

            .contact-image {
                height: 400px;
                justify-content: center;
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
        }
		
		.hero-text {
    width: 100%;
     max-width: 100vw;
    margin-left: 50px;
}
    </style>
   <style>
        .product-slider-section {
            margin-top: 3rem;
        }

        .product-slider-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .product-slider-wrapper {
            position: relative;
            overflow: hidden;
            padding: 0 60px;
        }

        .product-slider-row {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 20px;
        }

        .product-slider-col {
            min-width: calc(33.333% - 14px);
            flex-shrink: 0;
            margin-bottom: 3rem;
        }

        .product-slider-box {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background: #2a2a2a;
			height:400px;
        }

        .product-slider-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .product-slider-box:hover img {
            transform: scale(1.1);
        }

        .product-slider-hover {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: #676464;
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .product-slider-box:hover .product-slider-hover {
            transform: translateY(0);
        }

        .product-slider-hover h4 a {
            color: #74BCC6 !important;
            text-decoration: none;
            font-size: 16px;
        }

        .product-slider-btn-wrapper {
            text-align: center;
            margin-top: 0.5rem;
        }

        .product-slider-read-btn {
            display: inline-block;
            padding: 8px 20px;
            border: 1px solid #676464;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
            background: transparent;
        }

        .product-slider-read-btn:hover {
            background: #676464;
            color: white;
        }

        .product-slider-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(116, 188, 198, 0.8);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            z-index: 10;
            transition: background 0.3s ease;
        }

        .product-slider-nav-btn:hover {
            background: rgba(116, 188, 198, 1);
        }

        .product-slider-nav-btn.prev {
            left: 10px;
        }

        .product-slider-nav-btn.next {
            right: 10px;
        }

        .product-slider-nav-btn:disabled {
            background: rgba(103, 100, 100, 0.5);
            cursor: not-allowed;
        }

        @media (max-width: 1024px) {
            .product-slider-col {
                min-width: calc(33.333% - 14px);
            }
        }

        @media (max-width: 768px) {
            .product-slider-col {
                min-width: calc(50% - 10px);
            }
        }

        @media (max-width: 480px) {
            .product-slider-col {
                min-width: 100%;
            }
        }
	   
	   
	   
	   /* ============================================
   SMOOTH ANIMATION FIX - ONLY FOR ABOUT & LEGACY SECTIONS
   ============================================ */

/* 1. Add GPU acceleration ONLY to About & Legacy sections */
.about-section .wow {
    will-change: transform, opacity;
    transform: translateZ(0);
    backface-visibility: hidden;
    perspective: 1000px;
}

/* 2. Optimize fadeIn animations ONLY in About & Legacy sections */
.about-section .fadeInLeft,
.about-section .fadeInRight,
.about-section .fadeInUp {
    animation-duration: 0.6s !important;
    animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;
}

/* 3. Specific animations for About & Legacy sections only */
.about-section .fadeInLeft {
    animation-name: aboutFadeInLeft !important;
}

.about-section .fadeInRight {
    animation-name: aboutFadeInRight !important;
}

.about-section .fadeInUp {
    animation-name: aboutFadeInUp !important;
}

@keyframes aboutFadeInLeft {
    from {
        opacity: 0;
        transform: translate3d(-30px, 0, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

@keyframes aboutFadeInRight {
    from {
        opacity: 0;
        transform: translate3d(30px, 0, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

@keyframes aboutFadeInUp {
    from {
        opacity: 0;
        transform: translate3d(0, 20px, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

/* 4. Optimize images ONLY in About & Legacy sections */
.about-section img {
    will-change: transform;
    transform: translateZ(0);
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}

/* 5. Add lazy loading hint ONLY to About & Legacy images */
.about-section .img-fluid {
    content-visibility: auto;
    contain-intrinsic-size: 500px;
}

/* 6. Disable animations on mobile ONLY for About & Legacy */
@media (max-width: 768px) {
    .about-section .wow {
        animation: none !important;
        opacity: 1 !important;
        transform: none !important;
    }
    
    .about-section .fadeInLeft,
    .about-section .fadeInRight,
    .about-section .fadeInUp {
        animation: none !important;
    }
}

/* 7. Smooth transitions ONLY for About & Legacy sections */
.about-section {
    transition: opacity 0.3s ease;
}

/* 8. Optimize heading animations in About & Legacy */
.about-section .heading-con {
    will-change: transform;
}

/* 9. Optimize text containers in About & Legacy */
.about-section p {
    will-change: auto;
    transform: translateZ(0);
}

/* 10. Optimize buttons in About & Legacy */
.about-section .btn-outline-primary {
    will-change: transform;
    transform: translateZ(0);
}
	.slide-up-animation {
  		animation: slideUp 1s ease forwards; 
	   }
	   
	 @keyframes slideUp {
  	0% {
    transform: translateY(100%); 
    opacity: 0; 
  }
  100% {
    transform: translateY(0); 
    opacity: 1; 
  }
}
	   
	   .best-pro-box img {
    width: 100%;
    height: auto; 
}
	   
	   .section-padd {padding-bottom: 20px;}
	   
	   @media (max-width: 767px) {
    .hero-text {
        margin-top: 15%;
    }
	.hero-text a {
        margin-top: 20px !important;
    }
}
	   .section-padd-t{
		padding-top:0;   
	   }
	   
	   @media (max-width: 1440px){
		.hero-section {
        height: min(100vh, 650px);
    		}
		.videobanner{
			height: min(100vh, 650px);
    		}
		   
	   }
	   
	   
	   /*     */
	   
	   .hover-section {
    		bottom: 7px !important;
		}
    </style>
	
</head>

<body>
    <div class="hero-section">
    <!-- Banner Image -->
    <div class="videobanner">
        <div id="heroSlider" class="carousel slide">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
               <div class="image-banner">
    			<img
        		src="<?php echo e(asset('frontend/images/slide2.jpg')); ?>"
        		alt="Banner"
        		srcset="
            	<?php echo e(asset('frontend/images/home_mobile.jpg')); ?> 768w,
            	<?php echo e(asset('frontend/images/slide2.jpg')); ?> 1920w"
        		sizes="(max-width: 768px) 100vw, 1920px">
				</div>

                    <div class="bannertxts"
                        style="width:100%; height:100% ; position:absolute; left:50%; top:30%; transform:translate(-50%, -50%);display:flex; justify-content:center; align-items:center; text-align:center; ">
                        <div class="hero-text" style="  margin-left: 0px !important;">
                            <h2 class="wow fadeInLeft" style="color:#fff;">Built Trusted <span
                                    style="color:rgb(103, 100, 100);"> Nationwide </span>
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.3s"
                                style="margin-bottom:30px; font-size:20px; color:rgb(103, 100, 100);">
                                Serving India's evolving needs with trusted tool performance
                            </p>
                            <a style="background:#676464; border-radius:4px; border:none;" href="#"
                                class="btn btn-outline-primary position-relative wow fadeInRight mt-2"
                                data-wow-delay="0.6s">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item" style="position: relative;">
                    <div class="image-banner">
                        <img src="<?php echo e(asset('frontend/images/slide3.jpg')); ?>" alt="Banner" srcset="<?php echo e(asset('frontend/images/slide3.jpg')); ?> 1920w,
                                 <?php echo e(asset('frontend/images/03-mobile.jpg')); ?> 768w"
                            sizes="(max-width: 768px) 768px, 1920px">
                    </div>
                    <div class="bannertxts"
                        style="width:100%; height:100% ; position:absolute; left:50%; top:30%; transform:translate(-50%, -50%);display:flex; justify-content:center; align-items:center; text-align:center; "">
                    <div class=" hero-text">
                        <h2 class="wow fadeInLeft" style="color:#fff;"> EMPOWERING INDIA'S WORKFORCE</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 30px;color:#fff">Trusted by
                            professionals to deliver consistent quality and strength
                        </p>
                        <a style="background:#676464;  border:none; border-radius: 4px;" href="#"
                            class="btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="image-banner">
                    <img src="<?php echo e(asset('frontend/images/slide4.jpg')); ?>" alt="Banner" srcset="<?php echo e(asset('frontend/images/slide4.jpg')); ?> 1920w,
                             <?php echo e(asset('frontend/images/02-mobile.jpg')); ?> 768w"
                        sizes="(max-width: 768px) 768px, 1920px">
                </div>
                <div class="bannertxt">
                    <div class="hero-text">
                        <h2 class="wow fadeInLeft" style="color:#ffffff;font-weight:bold;" ;>
                            SERVING
                            INDIA <br> FOR DECADES</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom:30px;color:#ffffff;text-align:left;">Tools
                            built for India's pace Trusted <br> nationwide for performance.</p>
                        <a style="background:#676464; border-radius: 4px;" href="#"
                            class="btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<section class="section-padd-t">
    <div class="container">
        <div class="text-center">
            <div class="heading-con" style="position: relative; text-align: center;">
                <h2 class="wow fadeInUp"
                    style="margin: 0px; color: #74BCC6 !important; visibility: visible; animation-name: fadeInUp;">
                    New Products
                </h2>
                <!-- Full-width underline -->
                <div class="section-underline"></div>
                <!-- Short centered underline -->
            </div>
        </div>
    </div>
    <div class="py-4 px-3 px-md-0" style="margin-top: 5px !important;padding-top: 0px !important; height:fit-content;">
        <div class="swiper-container-new-products">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $newProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <?php if($newproduct->productImage): ?>
                    <img src="<?php echo e(url($newproduct->productImage)); ?>" />
                    <?php endif; ?>
                    <div class="hover-section text-center">
                        <h4>
                            <a href="<?php echo e(url('product/' . Str::slug($newproduct->productName))); ?>" class="text"
                                style="text-decoration: none; color: #74BCC6; font-size: 16px;">
                                <?php echo e($newproduct->productName); ?>

                            </a>
                        </h4>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- Navigation Buttons Below -->
        <div class="swiper-navigation text-center mt-1">
            <button class="swiper-button-prev-custom" type="button">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="swiper-button-next-custom" type="button">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
    <!-- New Product Popup Notification 
    <div id="newProductPopup" class="new-product-popup">
        <button class="popup-close" onclick="closePopup()">&times;</button>
        <div class="popup-content">
            <div class="popup-badge">NEW</div>
            <img id="popupImage" src="" alt="New Product">
            <h5 id="popupTitle"></h5>
            <a id="popupLink" href="#" class="popup-btn">View Product</a>
        </div>
    </div>
-->

    <!-- ABOUT US SECTION - OPTIMIZED -->
<section class="section-padd about-section" style="padding-top:50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 wow fadeInLeft">
                <!-- Add loading="lazy" and decoding="async" -->
                <img src="<?php echo e(asset('frontend/images/about-us.png?p=5')); ?>" 
                     class="img-fluid slide-up-animation" 
                     loading="lazy" 
                     decoding="async" 
                     alt="About Us" />
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 mt-5 mt-lg-0">
                <div class="heading-con align-items-end text-end w-100">
                    <h2 class="wow fadeInUp mb-0 pe-md-5" 
                        data-wow-delay="0.1s"
                        style="width: 100%; display: flex; flex-direction: column; align-items: start;">
                        ABOUT US
                    </h2>
                    <div style="width: 80px; margin:0 0 20px 35px; height: 1px; background-color: #ff0000ff;"></div>
                </div>
                
                <!-- Remove wow from paragraphs, keep only on parent -->
                <div class="mt-4" style="font-size: 16px;">
                      <p>
                            Founded in 1969, <strong>Taparia Tools Ltd.</strong> is one of India’s most trusted hand tool manufacturers. Our journey began with a partnership with Bahco of Sweden, bringing their expertise to India. Today, we blend high-quality craftsmanship with advanced technology, catering to both professionals and DIY enthusiasts. With a wide range of tools that meet global standards, we proudly represent India on the international stage.
                        </p>
                        <p>
                            Taparia is committed to delivering reliable products that meet customer needs. Integrity, innovation, and a focus on quality drive every part of our work. We also prioritize sustainable practices and continuous growth through technology.
                        </p>
                </div>
                
                <div class="mt-4">
                    <a href="<?php echo e(url('about-us')); ?>"
                        class="btn btn-outline-primary"
                        style="border-color: rgb(103, 100, 100); color: white;">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LEGACY SECTION - OPTIMIZED -->
<section class="section-padd about-section" style="padding-top:50px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mt-5 mt-lg-0 order-2 order-lg-1">
                <div class="heading-con align-items-start text-start w-100">
                    <h2 class="wow fadeInUp mb-0" 
                        data-wow-delay="0.1s"
                        style="width: 100%; display: flex; flex-direction: column; align-items: start;">
                        LEGACY
                    </h2>
                    <div style="width: 80px; margin:0 0 20px 10px; height: 1px; background-color: #ff0000ff;"></div>
                </div>

                <!-- Remove wow from paragraphs -->
                <p class="mt-4" style="font-size: 16px;">
                    Taparia has been synonymous with trust and excellence for over five decades, offering tools that stand the test of time. As a brand leader in India and a global exporter, Taparia’s legacy continues to be built on the strength of quality, innovation, and customer satisfaction.
                </p>

                <a href="<?php echo e(url('products')); ?>"
                    class="btn btn-outline-primary mt-4"
                    style="border-color: rgb(103, 100, 100); color: white;">
                    Read More
                </a>
            </div>

            <div class="col-lg-2 order-1 order-lg-2"></div>

            <div class="col-lg-5 wow fadeInRight order-1 order-lg-2">
                <!-- Add loading="lazy" and decoding="async" -->
                <img src="<?php echo e(asset('frontend/images/sustainable.png')); ?>" 
                     class="img-fluid slide-up-animation" 
                     loading="lazy" 
                     decoding="async" 
                     alt="Legacy" />
            </div>
        </div>
    </div>
</section>


       <section class="section-padd-t features-categories py-md-5">
        <div class="container">
            <div class="text-center">
                <div class="heading-con">
                    <h2 class="wow fadeInUp">FEATURED PRODUCTS</h2>
                    <div class="section-underline"></div>
                </div>
            </div>
        </div>


         <div class="section-padd-b mt-5">
    <div class="container wow fadeInDown">
        <div class="row justify-content-center">

            <!-- 1 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/BOXSPANNERS.jpg" style="max-width: 200px; height: auto; margin: 0 auto; display: block;" />
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">BOX SPANNERS</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/box-spanner')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 2 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/CUPWHEEL.jpg" style="max-width: 200px; height: auto; margin: 0 auto; display: block;" />
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">CUP WHEEL</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/cup-wheel')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 3 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/ELECTRICIANHAMMERS.jpg" style="max-width: 200px; height: auto; margin: 0 auto; display: block;" />
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">ELECTRICIAN HAMMERS</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/electric-hammer')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 4 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/FCLAMP.jpg" style="max-width: 200px; height: auto; margin: 0 auto; display: block;" />
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">F CLAMP</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/f-clamp')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 5 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/HALFMOONSPANNER.jpg"  style="max-width: 200px; height: auto; margin: 0 auto; display: block;"/>
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">HALF MOON SPANNER</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/half-moon-spanner')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 6 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/MINIPLIERS.jpg" style="max-width: 200px; height: auto; margin: 0 auto; display: block;" />
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">MINI PLIERS</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/mini-plier')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 7 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/PIPEVICES.jpg"  style="max-width: 200px; height: auto; margin: 0 auto; display: block;"/>
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">PIPE VICES</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/pipe-vices')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 8 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/SCREWDRIVERBITSET(80pcs).jpg" style="max-width: 200px; height: auto; margin: 0 auto; display: block;" />
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">SCREW DRIVER BIT SET (80 pcs)</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/screw-drivers-bits-set-80-pcs')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

            <!-- 9 -->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="best-pro-box">
                    <img src="public/frontend/images/VDEPLIERS.jpg" style="max-width: 200px; height: auto; margin: 0 auto; display: block;"/>
                    <div class="hover-section text-center">
                        <h4 style="font-size: 0.8rem !important;"><a href="#" class="text-decoration-none" style="color:#74BCC6;">VDE PLIERS</a></h4>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <a href="<?php echo e(url('product/vde-pliers-set')); ?>" class="btn btn-outline-primary" style="border-color:#676464; color:white;">Read More</a>
                </div>
            </div>

        </div>
    </div>
</div>

    </section>


    <section class="get-in-touch">
        <div class="contact-container">
            <!-- Left Side Text -->
            <div class="contact-text">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h2 style="color: #ffffff;">Get in Touch With Us</h2>
                <p>We are always ready to help you. Reach out to us anytime!</p>
                <a href="tel:#" class="call-btn btn btn-outline-primary" style="border-color:rgb(103, 100, 100 ); color:white">
                    <i class="fas fa-phone-alt"></i> Get in Touch
                </a>
            </div>

        </div>
    </section>

    <section class="teh-section">
        <div class="container">
            <div class="text-center">
                <div class="heading-con">
                    <h2 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Tool Excellence Hub</h2>
                    <div class="section-underline"></div>
                </div>
                <p class="wow fadeInUp" style="margin-bottom: 50px;">Discover our premium range of professional tools designed for precision, durability, and exceptional performance.</p>
            </div>
        </div>

        <div class="teh-content-wrapper wow fadeInUp">
            <div class="teh-scroll-container" id="teh-main-scroll">
                <div class="teh-scroll-content" id="teh-scroll-content">
                      <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/adjustable-spanner.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Adjustable Spanner</h3>
                        <p class="teh-tool-desc">
                            Spanner with a moving jaw to grip nuts and bolts of many sizes. Perfect for quick adjustments and repairs.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item  teh-active" data-image="<?php echo e(asset('frontend/images/combination-pliers.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Combination Pliers</h3>
                        <p class="teh-tool-desc">
                            Strong pliers for gripping, cutting, and twisting wires with ease. Works well for everyday home and professional repairs.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/screw-driver.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Screw Drivers</h3>
                        <p class="teh-tool-desc">
                            Reliable screwdrivers for tightening and loosening all types of screws. Comfortable handle for safe and easy use.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/line-testers.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Line Testers</h3>
                        <p class="teh-tool-desc">
                            Quickly check electrical lines for power with a safe, compact tool. Easy to use for electricians and home projects.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/allen-keys.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Allen Keys</h3>
                        <p class="teh-tool-desc">
                            Handy tools for tightening and loosening hex bolts and screws. Compact design fits easily in any toolkit.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/socket-set.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Socket Set</h3>
                        <p class="teh-tool-desc">
                            Complete set for tightening and loosening nuts and bolts of different sizes. Ideal for car repairs, home use, and professional work.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/socket-loose.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Socket (Loose)</h3>
                        <p class="teh-tool-desc">
                            Individual sockets to fit various nuts and bolts with a ratchet or handle. Durable and easy to swap for different jobs.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/ring-spanners.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Ring Spanners (Loose)</h3>
                        <p class="teh-tool-desc">
                            Open-end spanners for turning nuts and bolts in tight spaces. Sturdy build for long-lasting strength.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/Cclamp.jpg')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">C-Clamp</h3>
                        <p class="teh-tool-desc">
                            The C-Clamp is designed to hold materials securely in place, making it easier to cut, drill, or weld without any movement.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/BPCPHammers.jpg')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">BP & CP Hammers</h3>
                        <p class="teh-tool-desc">
                            Ball Peen and Cross Peen hammers are ideal for shaping metal, striking punches, and handling a variety of metalwork tasks with precision.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/PipeWrench.jpg')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Pipe Wrench</h3>
                        <p class="teh-tool-desc">
                            A pipe wrench is perfect for gripping and turning pipes or any round objects, providing strong leverage and control.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/Chisel1.jpg')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Chisel</h3>
                        <p class="teh-tool-desc">
                            Chisels are used to cut, carve, or shape wood, metal, or stone, giving you accuracy and clean finishes.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/bolt-cutters-blades.png')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Bolt Cutters & Blades</h3>
                        <p class="teh-tool-desc">
                            Heavy-duty cutters for snapping thick wires, rods, or bolts. Sharp blades give clean cuts with less effort.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/Punches1.jpg')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Punches</h3>
                        <p class="teh-tool-desc">
                            Punches are essential for marking, indenting, or driving pins into metal surfaces with precision.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>
                <div class="teh-tool-item" data-image="<?php echo e(asset('frontend/images/UniversalToolKit.jpg')); ?>">
                    <div class="teh-tool-content ">
                        <h3 class="teh-tool-title">Universal Tool Kit</h3>
                        <p class="teh-tool-desc">
                            A universal tool kit includes all the basic hand tools you need for general repairs, mechanical work, and DIY projects, making it a versatile and indispensable companion for any workshop.
                        </p>
                    </div>
                    <div class="teh-indicator"></div>
                </div>


                    <div class="teh-spacer"></div>
                </div>

                <div class="teh-image-display wow fadeInUp">
                    <img id="teh-sticky-image" src="<?php echo e(asset('frontend/images/combination-pliers.png')); ?>" alt="Tool Image">
                </div>
            </div>
        </div>
    </section>

    <?php $__env->stopSection(); ?>

</body>

</html>






<?php $__env->startSection('javaScript'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = new bootstrap.Carousel(document.getElementById('heroSlider'), {
        interval: false, // STOP AUTO SLIDE
        wrap: true,
        pause: false
    });

    function animateSlideElements() {
        const activeSlide = document.querySelector('.carousel-item.active');
        const textElements = activeSlide.querySelectorAll('.wow');

        textElements.forEach(el => {
            el.style.animation = 'none';
            void el.offsetWidth;
        });

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

    document.getElementById('heroSlider').addEventListener('slid.bs.carousel', animateSlideElements);

    animateSlideElements();
});
</script>


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
                this.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });
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
                //updateImage(imagePath);
                // setActiveItem(activeIndex);
            });


        });

        // 👉 Initialize first item as active
        if (toolItems.length > 0) {
            toolItems[0].classList.add('teh-active');
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Destroy existing instance if any
        const existingSwiper = document.querySelector('.swiper-container-new-products')?.swiper;
        if (existingSwiper) {
            existingSwiper.destroy(true, true);
        }

        // Initialize new Swiper
        const newProductsSwiper = new Swiper('.swiper-container-new-products', {
            // Centered slides
            centeredSlides: true,
            slidesPerView: 'auto',
            spaceBetween: 30,

            // Default slides per view for different screens
            slidesPerView: 1,

            // Animation settings
            speed: 800,
            effect: 'slide',

            // Loop settings
            loop: true,
            loopedSlides: 3,

            // Navigation
            navigation: {
                nextEl: '.swiper-button-next-custom',
                prevEl: '.swiper-button-prev-custom',
            },

            // Autoplay (optional)
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            // Responsive breakpoints
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },

            // Add class to center slide
            on: {
                init: function() {
                   // console.log('Swiper initialized with centered slides');
                },
                slideChange: function() {
                    //console.log('Active slide:', this.activeIndex);
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const newProducts = <?php echo json_encode($newProducts ?? [], 15, 512) ?>; // Laravel variable
        let currentProductIndex = 0;
        let popupTimeout = null;
        let popupClosed = false; // Flag to track whether the popup has been closed

        const popup = document.getElementById('newProductPopup');
        const popupImage = document.getElementById('popupImage');
        const popupTitle = document.getElementById('popupTitle');
        const popupLink = document.getElementById('popupLink');

        if (!popup || newProducts.length === 0) return; // stop if no data or popup missing

        function slugify(text) {
            return text.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-');
        }

        function showProductPopup(product) {
            popupImage.src = product.productImage || '';
            popupTitle.textContent = product.productName || 'New Product';
            popupLink.href = '/product/' + slugify(product.productName || '');
            popup.classList.add('show');

            clearTimeout(popupTimeout);
            popupTimeout = setTimeout(() => {
                popup.classList.remove('show');
            }, 8000);
        }

        function showNextProduct() {
            if (popupClosed) return; // Stop showing products if the popup has been closed

            if (currentProductIndex >= newProducts.length) currentProductIndex = 0;
            showProductPopup(newProducts[currentProductIndex]);
            currentProductIndex++;

            setTimeout(showNextProduct, 10000);
        }

        setTimeout(showNextProduct, 3000);

        window.closePopup = () => {
            popup.classList.remove('show');
            clearTimeout(popupTimeout);
            popupClosed = true; // Set the flag to stop showing new products
        };
    });
</script>
	
	  <script>
        let currentProductSlide = 0;
        const productSlider = document.getElementById('productSlider');
        const productItems = document.querySelectorAll('.product-slider-col');
        const totalProductItems = productItems.length;
        const itemsPerProductSlide = 3;
        const maxProductSlides = Math.ceil(totalProductItems / itemsPerProductSlide) - 1;

        function slideProducts(direction) {
            currentProductSlide += direction;
            
            if (currentProductSlide < 0) {
                currentProductSlide = 0;
            } else if (currentProductSlide > maxProductSlides) {
                currentProductSlide = maxProductSlides;
            }
            
            const slideWidth = productItems[0].offsetWidth + 20;
            const offset = currentProductSlide * itemsPerProductSlide * slideWidth;
            productSlider.style.transform = `translateX(-${offset}px)`;
            
            updateProductButtons();
        }

        function updateProductButtons() {
            const prevBtn = document.querySelector('.product-slider-nav-btn.prev');
            const nextBtn = document.querySelector('.product-slider-nav-btn.next');
            
            prevBtn.disabled = currentProductSlide === 0;
            nextBtn.disabled = currentProductSlide === maxProductSlides;
        }

        updateProductButtons();

        window.addEventListener('resize', () => {
            const slideWidth = productItems[0].offsetWidth + 20;
            const offset = currentProductSlide * itemsPerProductSlide * slideWidth;
            productSlider.style.transform = `translateX(-${offset}px)`;
        });
    </script>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true // animation will trigger every time you scroll up/down
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/frontend/index.blade.php ENDPATH**/ ?>