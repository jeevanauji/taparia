@extends('frontend.master')

@section('title')
    {{ $productInfo->productName }}
@endsection()

@section('content')
    <style type="text/css">
        .product-overview {
            overflow-x: auto;
        }

        .product-overview table {
            width: 100% !important;
        }

        .product-description ul li,
        .product-description ul li,
        .product-description table,
        .product-description table {
            width: 100% !important;
        }

        .product-overview table th,
        .product-overview table td {
            font-size: 14px;
            padding: 5px;
        }

        @media (max-width:767px) {

            .product-overview table th,
            .product-overview table td {
                font-size: 10px;
                padding: 2px;
            }
        }

        .product-description img,
        .product-overview img {
            max-width: 100%;
        }

        /* Simple Image Zoom Styles */
        .image-zoom-container {
            position: relative;
            /* overflow: hidden; */
            cursor: zoom-in;
        }

        .image-zoom-container img {
            transition: transform 0.3s ease;
            width: 100%;
            height: auto;
        }

        .image-zoom-container:hover img {
            transform: scale(1.1);
        }

        /* Advanced Zoom with Magnifier */
        .detailsSLider .outer {
            position: relative;
            overflow: visible;
            /* Allow zoom to appear outside */
        }

        .detailsSLider {
            position: relative;
            overflow: visible;
        }

        .magnify-container {
            position: relative;
            display: block;
            width: 100%;
            overflow: visible;
            /* Allow zoom to appear outside */
        }

        .magnify-container img {
            display: block;
            width: 100%;
            height: auto;
        }

        .magnify-glass {
            position: absolute;
            border: 2px solid #74BCC6;
            border-radius: 5px;
            cursor: none;
            /* Hide default cursor */
            width: 180px;
            height: 180px;
            opacity: 0;
            pointer-events: none;
            background: rgba(255, 255, 255, 0.4);
            z-index: 100;
            transition: opacity 0.2s ease;
            transform: translate(-50%, -50%);
            /* Center the glass on cursor */
        }

        /* Add crosshair in center of magnifying glass */
        .magnify-glass::before,
        .magnify-glass::after {
            content: '';
            position: absolute;
            background: #74BCC6;
            opacity: 0.8;
        }

        .magnify-glass::before {
            width: 2px;
            height: 20px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .magnify-glass::after {
            width: 20px;
            height: 2px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Show custom cursor only when hovering over magnify container */
        .magnify-container {
            cursor: none;
        }


        /* UPDATED: Magnify Zoom - Positioned in Product Overview Area */
        .magnify-zoom {
            position: absolute;
            top: 0;
            left: calc(100% + 40px);
            /* Position to the right of the image column with 40px gap */
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.98);
            background-repeat: no-repeat;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            z-index: 9999;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            border: 3px solid #74BCC6;
            transition: all 0.3s ease;
        }

        .magnify-zoom::before {
            content: "Zoom View";
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: rgba(0, 0, 0, 0.85);
            padding: 6px 16px;
            border-radius: 6px;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .magnify-container:hover~.magnify-zoom,
        .detailsSLider:hover .magnify-zoom {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 1400px) {
            .magnify-zoom {
                width: 350px;
                height: 350px;
                left: calc(100% + 30px);
            }
        }

        @media (max-width: 1200px) {
            .magnify-zoom {
                width: 300px;
                height: 300px;
                left: calc(100% + 20px);
            }
        }

        @media (max-width: 991px) {
            .magnify-zoom {
                position: fixed;
                top: 50%;
                left: auto;
                right: 20px;
                transform: translateY(-50%);
                width: 250px;
                height: 250px;
            }
        }

        @media (max-width: 768px) {
            .magnify-zoom {
                display: none;
            }

            .image-zoom-container:hover img {
                transform: scale(1);
            }
        }

        /* Hide default Owl Carousel navigation */
        .owl-carousel .owl-nav,
        .owl-carousel .owl-dots {
            display: none !important;
        }

        /* Main Image Container with Side Navigation */
        .main-image-container {
            position: relative;
            margin-bottom: 20px;
        }

        /* Side Arrow Navigation */
        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgb(116 188 198);
            border: 1px solid #fff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
            font-size: 18px;
            color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .carousel-arrow:hover:not(:disabled) {
            background: #fff;
            color: rgb(116 188 198);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-arrow:disabled {
            opacity: 0.3;
            cursor: not-allowed;
            color: #ccc;
        }

        .carousel-arrow.prev {
            left: 10px;
        }

        .carousel-arrow.next {
            right: 10px;
        }

        /* Thumbnail Carousel Styling */
        #thumbs {
            margin-top: 15px;
        }

        #thumbs .owl-item {
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            border-radius: 8px;
            overflow: hidden;
        }

        #thumbs .owl-item:hover {
            opacity: 1;
            transform: scale(1.05);
        }

        #thumbs .owl-item.active {
            opacity: 1;
            border-color: #74BCC6;
        }

        #thumbs .owl-item img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .carousel-arrow {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .carousel-arrow.prev {
                left: 5px;
            }

            .carousel-arrow.next {
                right: 5px;
            }

            #thumbs .owl-item img {
                height: 60px;
            }
        }

        /* Fullscreen Modal Styles */
        .fullscreen-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 10000;
            display: none;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .fullscreen-modal.active {
            display: flex;
        }

        .fullscreen-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            animation: modalZoomIn 0.3s ease;
        }

        .fullscreen-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            max-width: 100vw;
            max-height: 100vh;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .fullscreen-close {
            position: absolute;
            top: -50px;
            right: -10px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10001;
        }

        .fullscreen-close:hover {
            background: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .fullscreen-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10001;
        }

        .fullscreen-nav:hover:not(:disabled) {
            background: #fff;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .fullscreen-nav:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .fullscreen-nav.prev {
            left: -70px;
        }

        .fullscreen-nav.next {
            right: -70px;
        }

        .fullscreen-counter {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            color: #333;
            backdrop-filter: blur(10px);
        }

        @keyframes modalZoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Cursor pointer for clickable images */
        .main-product-image {
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .fullscreen-nav.prev {
                left: 10px;
            }

            .fullscreen-nav.next {
                right: 10px;
            }

            .fullscreen-close {
                top: 20px;
                right: 20px;
            }

            .fullscreen-counter {
                bottom: 20px;
                font-size: 14px;
                padding: 8px 16px;
            }
        }

        .breadcrumb-item+.breadcrumb-item::before {
            font-size: x-large !important;
        }

           .btn-outline-primary {
            margin-top: 0px !important;
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
		.hero-section {
    position: relative;
    overflow: hidden;
    height: 100vh;
	min-height: 400px;
    max-height: 650px;
}
		
		/* =====================================================
   FIX: Owl Carousel cloned item scaling (≤1440px)
   ===================================================== */

@media (max-width: 1440px) {

    /* Ensure carousel wrapper does not overflow */
    .detailsSLider,
    .detailsSLider .outer,
    #big.owl-carousel,
    #big .owl-stage-outer {
        max-width: 100%;
       /* overflow: hidden;*/
    }

    /* Scale down cloned and active items uniformly */
    #big .owl-item,
    #big .owl-item.cloned {
        transform: scale(0.95);
        transition: transform 0.3s ease;
    }

    /* Active item slightly emphasized */
    #big .owl-item.active {
        transform: scale(1);
        z-index: 2;
    }

    /* Ensure images fit properly */
    #big .owl-item img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    /* Prevent magnify zoom from pushing layout */
    .magnify-zoom {
        max-width: 380px;
        max-height: 380px;
    }
}

/* =====================================================
   EXTRA SAFETY FOR SMALLER LAPTOPS (≤1200px)
   ===================================================== */

@media (max-width: 1200px) {

    #big .owl-item,
    #big .owl-item.cloned {
        transform: scale(0.9);
    }

    .magnify-zoom {
        max-width: 320px;
        max-height: 320px;
    }
}

		.bannertxt {
    position: relative;
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
}

.hero-text {
    width: 100%;
    max-width: 800px;
    margin-left: 50px;
}

.hero-text h2 {
    font-size: 70px;
    font-weight: 600;
    margin-bottom: 10px;
    color: rgb(103, 100, 100);
}

/* 📱 Tablet & Mobile */
@media (max-width: 768px) {
    .bannertxt {
        justify-content: center;
        text-align: center;
        padding: 15px;
		left:0;
    }

    .hero-text {
        margin-left: 0;
        max-width: 100%;
    }

    .hero-text h2 {
        font-size: 38px;
    }
}

/* 📱 Small Phones */
@media (max-width: 480px) {
    .hero-text h2 {
        font-size: 28px;
        line-height: 1.2;
    }
}

    </style>

    <div class="hero-section" style="position: relative; height: 450px; overflow: hidden;">
        <!-- Banner Image -->
        <div class="videobanner" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
            <div class="image-banner" style="width: 100%; height: 450px;">
                <img src="{{ asset('frontend/images/newProduct_all.jpg') }}" alt="Banner"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>

        <!-- Text Overlay -->
     <div class="bannertxt">
    <div class="hero-text">
        <h2 class="wow fadeInLeft">
            {{ $productInfo->productName }}
        </h2>
    </div>
</div>

    </div>

    <nav aria-label="breadcrumb" id="brdcrumsection"
        style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 15px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(116, 188, 198, 0.1); margin: 20px 0px 30px 50px; border: 1px solid rgba(116, 188, 198, 0.2);">
        <ol class="breadcrumb mb-0"
            style="margin: 0; padding: 0; list-style: none; display: flex; align-items: center; flex-wrap: wrap;">
            <li class="breadcrumb-item" style="display: flex; align-items: center;">
                <a href="{{ url('') }}"
                    style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                    <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                        <path
                            d="M21.71,9.29L20.29,7.88L16.17,12H14V10H18.11L19.53,8.58C19.38,8.32 19.21,8.07 19,7.88C18.68,7.56 18.33,7.3 18,7.11L15.88,9.23L12,5.35L14.12,2.23C13.92,2 13.67,1.81 13.41,1.65C13.05,1.41 12.68,1.23 12.29,1.11L10.29,3.12L11.71,4.53L13.12,3.12C13.5,3.32 13.84,3.6 14.12,3.88L11.06,6.94L5,0.88L3.88,2L11.94,10.06L9,13H7V15H9L6.5,17.5L3.08,14.08L1,16.17L5.12,20.29C4.73,20.69 4.38,21.12 4.11,21.58L5.71,23.18C6.17,22.91 6.6,22.56 7,22.17L10,19.06V21H12V19H13.06L16.12,22.06C16.5,22.44 16.84,22.72 17.22,22.88L18.65,21.47C18.36,21.18 18.11,20.84 17.88,20.53L20,18.41L22.12,20.53L23.54,19.12L17.47,13.05L20.59,9.93C20.87,10.21 21.15,10.55 21.35,10.94L19.94,12.35H18V14H20V16H22V14C22,13.72 21.95,13.45 21.85,13.15L21.71,9.29Z" />
                    </svg>
                    Home
                </a>
            </li>

            <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>

            <li class="breadcrumb-item" style="display: flex; align-items: center;">
                <a href="{{ url('products') }}"
                    style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                    <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                        <path
                            d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                    </svg>
                    Products
                </a>
            </li>

            @if ($productInfo->categoryId)
                <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
                <li class="breadcrumb-item" style="display: flex; align-items: center;">
                    <a href="{{ url('category/' . Str::slug($productInfo->category->name)) }}"
                        style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                        <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                            <path
                                d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                        </svg>
                        {{ ucwords(strtolower($productInfo->category->name)) }}
                    </a>
                </li>
            @endif

            @if ($productInfo->subCategoryId)
                <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
                <li class="breadcrumb-item" style="display: flex; align-items: center;">
                    <a href="{{ url('sub-category/' . Str::slug($productInfo->subCategory->name)) }}"
                        style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                        <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                            <path
                                d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                        </svg>
                        {{ ucwords(strtolower($productInfo->subCategory->name)) }}
                    </a>
                </li>
            @endif

            <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
            <li class="breadcrumb-item active" aria-current="page" style="display: flex; align-items: center;">
                <span
                    style="color: #ffffff; font-weight: 700; font-size: 18px; padding: 8px 15px; border-radius: 8px; background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%); box-shadow: 0 2px 8px rgba(116, 188, 198, 0.3); display: flex; align-items: center; border: 1px solid #74BCC6;">
                    <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                        <path
                            d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                    </svg>
                    {{ ucwords(strtolower($productInfo->productName)) }}
                </span>
            </li>
        </ol>

        <style>
            .breadcrumb-item a:hover {
                background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%) !important;
                color: #ffffff !important;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(116, 188, 198, 0.4) !important;
                border: 1px solid #74BCC6 !important;
            }

            .breadcrumb-item a:active {
                transform: translateY(0px);
            }

            /* Responsive design */
            @media (max-width: 768px) {
                nav[aria-label="breadcrumb"] {
                    margin: 15px 20px 25px 20px !important;
                    padding: 12px 15px !important;
                }

                .breadcrumb-item a,
                .breadcrumb-item span {
                    font-size: 16px !important;
                    padding: 6px 12px !important;
                }

                .breadcrumb-item svg {
                    width: 16px !important;
                    height: 16px !important;
                }
            }

            @media (max-width: 480px) {
                .breadcrumb {
                    flex-direction: column !important;
                    align-items: flex-start !important;
                }

                .breadcrumb-item {
                    margin: 2px 0 !important;
                    width: 100%;
                }

                .breadcrumb-item a,
                .breadcrumb-item span {
                    width: 100%;
                    justify-content: flex-start !important;
                }

                li[style*="margin: 0 10px"] {
                    display: none !important;
                }
            }
        </style>
    </nav>

    <div class="content-section" id="content-section">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-5">
                    <div class="detailsSLider">
                        <div class="outer">
                            <!-- Main Image with Side Navigation -->
                            <div class="main-image-container">
                                <div id="big" class="owl-carousel owl-theme">
                                    @foreach($productImages as $productImg)
                                        <div class="item">
                                            <div class="magnify-container image-zoom-container"
                                                onmousemove="magnify(event, this)" onmouseleave="hideMagnify(this)">
                                                <img src="{{ url($productImg->productImage) }}"
                                                    class="img-fluid main-product-image" onclick="openFullscreen(this.src)" />
                                                <div class="magnify-glass"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Side Arrow Navigation -->
                                <button id="prevArrow" class="carousel-arrow prev" aria-label="Previous Image">
                                    ◀
                                </button>
                                <button id="nextArrow" class="carousel-arrow next" aria-label="Next Image">
                                    ▶
                                </button>
                            </div>

                            <!-- Thumbnail Carousel -->
                            <div id="thumbs" class="owl-carousel owl-theme">
                                @foreach($productImages as $productImg)
                                    <div class="item">
                                        <img src="{{ url($productImg->productImage) }}" class="img-fluid" />
                                    </div>
                                @endforeach
                            </div>

                            <!-- Magnify Zoom - Moved outside carousel items -->
                            <div class="magnify-zoom"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mt-4 mt-md-0">
                    <div class="bg-headings">
                        <h3 style="font-size: 1.8rem;color:#74BCC6;">{{ $productInfo->productName }}</h3>
                    </div>
                    <!-- Download Button -->
                    <div class="catelog-d-btn mt-3 mb-3 text-left">
                        <a href="{{ $productInfo->productCatalogue ? url($productInfo->productCatalogue) : 'javascript:void(0);' }}" target="_blank" title="Download Product Catalogue" download="" style="background: #676464; border-radius: 4px;" href="#"
                            class="btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s">
                            <span style="font-size: 12px; color: #ffffff; font-weight: bold;">DOWNLOAD CATALOGUE</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M12 16a1 1 0 0 1-.707-.293l-4-4a1 1 0 1 1 1.414-1.414L11 12.586V4a1 1 0 1 1 2 0v8.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-4 4A1 1 0 0 1 12 16zm-7 4a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v1h12v-1a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1H5z" />
                            </svg>
                        </a>
                    </div>

                    <h4>Product Overview</h4>
                    <div class="product-overview" style="padding-left:2px;">
                        <p>
                            {!! $productInfo->productOverview !!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="product-description">
                        <h4>Special Features</h4>
                        {!! $productInfo->productHighlighting !!}
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="product-description">
                        <h4>Salient Features</h4>
                        {!! $productInfo->productSpecifications !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fullscreen Modal -->
    <div id="fullscreenModal" class="fullscreen-modal">
        <div class="fullscreen-content">
            <button class="fullscreen-close" onclick="closeFullscreen()">&times;</button>
            <button id="fullscreenPrev" class="fullscreen-nav prev">◀</button>
            <img id="fullscreenImage" class="fullscreen-image" src="" alt="Product Image" />
            <button id="fullscreenNext" class="fullscreen-nav next">▶</button>
            <div id="fullscreenCounter" class="fullscreen-counter">1 / 1</div>
        </div>
    </div>

@endsection()

@section('javaScript')
    <script>
        // Scroll to content section on page load
        document.addEventListener('DOMContentLoaded', function () {
            const contentSection = document.getElementById('brdcrumsection');
            // const contentSection = document.queryselector('.breadcrumb');
            if (contentSection) {
                contentSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });

        // Global variables for fullscreen functionality
        let currentFullscreenIndex = 0;
        let productImages = [];

        // Enhanced Magnify Function
        function magnify(event, container) {
            // Only work on desktop
            if (window.innerWidth <= 768) return;

            const img = container.querySelector('img');
            const glass = container.querySelector('.magnify-glass');
            const zoom = document.querySelector('.detailsSLider .magnify-zoom'); // Get zoom from outer container

            if (!img || !glass || !zoom) return;

            const rect = container.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            // Position the magnifying glass centered on cursor
            glass.style.left = x + 'px';
            glass.style.top = y + 'px';
            glass.style.opacity = '1';

            // Calculate zoom area with higher zoom ratio
            const zoomRatio = 2.5; // Increased from 1.4 to 2.5 for more zoom
            const imgRect = img.getBoundingClientRect();

            zoom.style.backgroundImage = `url('${img.src}')`;
            zoom.style.backgroundSize = (imgRect.width * zoomRatio) + 'px ' + (imgRect.height * zoomRatio) + 'px';

            // Calculate background position for zoom
            const bgX = -((x / rect.width) * (imgRect.width * zoomRatio) - 200);
            const bgY = -((y / rect.height) * (imgRect.height * zoomRatio) - 200);

            zoom.style.backgroundPosition = bgX + 'px ' + bgY + 'px';
            zoom.style.opacity = '1';
            zoom.style.visibility = 'visible';
        }

        function hideMagnify(container) {
            const glass = container.querySelector('.magnify-glass');
            const zoom = document.querySelector('.detailsSLider .magnify-zoom'); // Get zoom from outer container

            if (glass) glass.style.opacity = '0';
            if (zoom) {
                zoom.style.opacity = '0';
                zoom.style.visibility = 'hidden';
            }
        }

        // Fullscreen Modal Functions
        function openFullscreen(imageSrc) {
            console.log('Opening fullscreen for:', imageSrc);

            // Get all product images
            productImages = [];
            document.querySelectorAll('.main-product-image').forEach(function (img) {
                productImages.push(img.src);
            });

            // Find current image index
            currentFullscreenIndex = productImages.findIndex(function (src) {
                return src === imageSrc;
            });

            if (currentFullscreenIndex === -1) {
                currentFullscreenIndex = 0;
            }

            console.log('Current fullscreen index:', currentFullscreenIndex);
            console.log('Total images:', productImages.length);

            updateFullscreenImage();

            // Show modal
            document.getElementById('fullscreenModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeFullscreen() {
            document.getElementById('fullscreenModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function updateFullscreenImage() {
            const modal = document.getElementById('fullscreenModal');
            const image = document.getElementById('fullscreenImage');
            const counter = document.getElementById('fullscreenCounter');
            const prevBtn = document.getElementById('fullscreenPrev');
            const nextBtn = document.getElementById('fullscreenNext');

            if (productImages.length > 0) {
                image.src = productImages[currentFullscreenIndex];
                counter.textContent = `${currentFullscreenIndex + 1} / ${productImages.length}`;

                // Update navigation buttons
                prevBtn.disabled = currentFullscreenIndex === 0;
                nextBtn.disabled = currentFullscreenIndex === productImages.length - 1;

                console.log('Updated fullscreen to image:', currentFullscreenIndex + 1, 'of', productImages.length);
            }
        }

        function prevFullscreenImage() {
            if (currentFullscreenIndex > 0) {
                currentFullscreenIndex--;
                updateFullscreenImage();
                console.log('Moved to previous fullscreen image:', currentFullscreenIndex + 1);
            }
        }

        function nextFullscreenImage() {
            if (currentFullscreenIndex < productImages.length - 1) {
                currentFullscreenIndex++;
                updateFullscreenImage();
                console.log('Moved to next fullscreen image:', currentFullscreenIndex + 1);
            }
        }

        // Initialize carousel functionality
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM Content Loaded - Initializing carousel and fullscreen');

            // Setup fullscreen navigation
            document.getElementById('fullscreenPrev').addEventListener('click', prevFullscreenImage);
            document.getElementById('fullscreenNext').addEventListener('click', nextFullscreenImage);

            // Close modal when clicking outside the image
            document.getElementById('fullscreenModal').addEventListener('click', function (e) {
                if (e.target === this) {
                    closeFullscreen();
                }
            });

            // Escape key to close modal
            document.addEventListener('keydown', function (e) {
                const modal = document.getElementById('fullscreenModal');
                if (modal.classList.contains('active')) {
                    if (e.keyCode === 27) { // Escape key
                        closeFullscreen();
                    } else if (e.keyCode === 37) { // Left arrow
                        prevFullscreenImage();
                    } else if (e.keyCode === 39) { // Right arrow
                        nextFullscreenImage();
                    }
                }
            });

            // Add simple hover zoom for mobile
            const images = document.querySelectorAll('.main-product-image');
            console.log('Found images:', images.length);

            images.forEach(function (img, index) {
                img.addEventListener('mouseenter', function () {
                    if (window.innerWidth <= 768) {
                        this.style.transform = 'scale(1.2)';
                    }
                });

                img.addEventListener('mouseleave', function () {
                    if (window.innerWidth <= 768) {
                        this.style.transform = 'scale(1)';
                    }
                });
            });

            // Initialize carousel with jQuery
            if (typeof $ !== 'undefined' && typeof $.fn.owlCarousel !== 'undefined') {
                console.log('jQuery and Owl Carousel detected, initializing...');
                setTimeout(initializeCarousel, 500);
            } else {
                console.error('jQuery or Owl Carousel not loaded');
                createFallbackNavigation();
            }
        });

        // Main carousel initialization function
        function initializeCarousel() {
            try {
                console.log('Starting Owl Carousel initialization...');

                var currentSlideIndex = 0;
                var totalSlides = $('#big .item').length;

                console.log('Total slides detected:', totalSlides);

                // Initialize main carousel
                var bigCarousel = $('#big').owlCarousel({
                    items: 1,
                    loop: false,
                    nav: false,
                    dots: false,
                    autoplay: false,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false,
                    freeDrag: false,
                    startPosition: 0,
                    animateOut: false,
                    animateIn: false,
                    onInitialized: function (event) {
                        console.log('Big carousel initialized with', event.item.count, 'items');
                    }
                });

                // Initialize thumbnail carousel
                var thumbCarousel = $('#thumbs').owlCarousel({
                    items: 4,
                    loop: false,
                    nav: false,
                    dots: false,
                    autoplay: false,
                    mouseDrag: true,
                    touchDrag: true,
                    margin: 10,
                    responsive: {
                        0: {
                            items: 3,
                            margin: 5
                        },
                        480: {
                            items: 4,
                            margin: 10
                        }
                    },
                    onInitialized: function (event) {
                        console.log('Thumb carousel initialized with', event.item.count, 'items');
                    }
                });

                // Update navigation UI
                function updateNavigation() {
                    $('#prevArrow').prop('disabled', currentSlideIndex === 0);
                    $('#nextArrow').prop('disabled', currentSlideIndex === totalSlides - 1);
                    console.log('Navigation updated - Current:', currentSlideIndex + 1, 'of', totalSlides);
                }

                // Previous Arrow Button
                $('#prevArrow').on('click', function (e) {
                    e.preventDefault();
                    console.log('=== PREVIOUS ARROW CLICKED ===');
                    console.log('Current index:', currentSlideIndex);

                    if (currentSlideIndex > 0) {
                        var oldIndex = currentSlideIndex;
                        currentSlideIndex--;
                        console.log('Moving PREVIOUS:', oldIndex, '→', currentSlideIndex);
                        bigCarousel.trigger('to.owl.carousel', [currentSlideIndex, 300]);
                        updateNavigation();
                        $('#thumbs .owl-item').removeClass('active').eq(currentSlideIndex).addClass('active');
                        thumbCarousel.trigger('to.owl.carousel', [currentSlideIndex, 300]);
                        console.log('PREVIOUS navigation completed');
                    } else {
                        console.log('Cannot go previous - already at first slide');
                    }
                });

                // Next Arrow Button
                $('#nextArrow').on('click', function (e) {
                    e.preventDefault();
                    console.log('=== NEXT ARROW CLICKED ===');
                    console.log('Current index:', currentSlideIndex);

                    if (currentSlideIndex < totalSlides - 1) {
                        var oldIndex = currentSlideIndex;
                        currentSlideIndex++;
                        console.log('Moving NEXT:', oldIndex, '→', currentSlideIndex);
                        bigCarousel.trigger('to.owl.carousel', [currentSlideIndex, 300]);
                        updateNavigation();
                        $('#thumbs .owl-item').removeClass('active').eq(currentSlideIndex).addClass('active');
                        thumbCarousel.trigger('to.owl.carousel', [currentSlideIndex, 300]);
                        console.log('NEXT navigation completed');
                    } else {
                        console.log('Cannot go next - already at last slide');
                    }
                });

                // Thumbnail clicks
                $('#thumbs').on('click', '.owl-item', function (e) {
                    e.preventDefault();
                    var clickedIndex = $(this).index();
                    console.log('=== THUMBNAIL CLICKED ===');
                    console.log('Moving from slide', currentSlideIndex, 'to', clickedIndex);

                    currentSlideIndex = clickedIndex;
                    bigCarousel.trigger('to.owl.carousel', [currentSlideIndex, 300]);
                    $('#thumbs .owl-item').removeClass('active');
                    $(this).addClass('active');
                    updateNavigation();
                    console.log('Thumbnail navigation completed');
                });

                // Keyboard navigation
                $(document).on('keydown', function (e) {
                    if (e.keyCode === 37) { // Left arrow
                        $('#prevArrow').click();
                    } else if (e.keyCode === 39) { // Right arrow
                        $('#nextArrow').click();
                    }
                });

                // Initialize starting position
                setTimeout(function () {
                    bigCarousel.trigger('to.owl.carousel', [0, 0]);
                    $('#thumbs .owl-item').removeClass('active').first().addClass('active');
                    updateNavigation();
                    console.log('Initialization complete - Ready for navigation');
                }, 500);

            } catch (error) {
                console.error('Error initializing Owl Carousel:', error);
                createFallbackNavigation();
            }
        }

        // Fallback navigation without Owl Carousel
        function createFallbackNavigation() {
            console.log('Creating fallback navigation');

            const bigCarousel = document.getElementById('big');
            const thumbsCarousel = document.getElementById('thumbs');

            if (!bigCarousel || !thumbsCarousel) {
                console.error('Carousel elements not found');
                return;
            }

            const bigItems = bigCarousel.querySelectorAll('.item');
            const thumbItems = thumbsCarousel.querySelectorAll('.item');

            console.log('Fallback: Big items:', bigItems.length, 'Thumb items:', thumbItems.length);

            let currentIndex = 0;

            // Hide all items initially
            bigItems.forEach((item, index) => {
                item.style.display = index === 0 ? 'block' : 'none';
            });

            function updateDisplay() {
                bigItems.forEach((item, index) => {
                    item.style.display = index === currentIndex ? 'block' : 'none';
                });

                thumbItems.forEach((item, index) => {
                    item.style.opacity = index === currentIndex ? '1' : '0.5';
                    item.style.border = index === currentIndex ? '2px solid #007bff' : 'none';
                });

                document.getElementById('prevArrow').disabled = currentIndex === 0;
                document.getElementById('nextArrow').disabled = currentIndex === bigItems.length - 1;
                console.log('Fallback navigation: Current index =', currentIndex);
            }

            document.getElementById('prevArrow').addEventListener('click', function () {
                if (currentIndex > 0) {
                    console.log('Fallback PREVIOUS:', currentIndex, '→', currentIndex - 1);
                    currentIndex--;
                    updateDisplay();
                }
            });

            document.getElementById('nextArrow').addEventListener('click', function () {
                if (currentIndex < bigItems.length - 1) {
                    console.log('Fallback NEXT:', currentIndex, '→', currentIndex + 1);
                    currentIndex++;
                    updateDisplay();
                }
            });

            thumbItems.forEach((thumb, index) => {
                thumb.style.cursor = 'pointer';
                thumb.addEventListener('click', function () {
                    console.log('Fallback THUMBNAIL:', currentIndex, '→', index);
                    currentIndex = index;
                    updateDisplay();
                });
            });

            updateDisplay();
            console.log('Fallback navigation initialized');
        }

        
    </script>
@endsection()