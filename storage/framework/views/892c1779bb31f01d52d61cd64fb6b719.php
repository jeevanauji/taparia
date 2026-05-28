<?php $__env->startSection('title'); ?>
    Our Products
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style type="text/css">
        /* Enhanced Filter Section Styles */
        .pro-filter {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            position: sticky;
            top: 120px;
            border: 1px solid #e0e6f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .pro-filter h3 {
            color: #1e293b;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: left;
            position: relative;
            text-transform: uppercase;
        }

        
        .filter-section h4 {
            color: #475569;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 16px;
            padding-left: 12px;
            text-transform: uppercase;
        }

        .accordion {
            background: transparent;
        }

        .accordion-item {
            border: none;
            margin-bottom: 8px;
            border-radius: 8px;
            background: #f9fafb;
            transition: all 0.2s ease;
        }

        .accordion-item:hover {
            background: #f1f5f9;
            transform: translateX(4px);
        }

        .accordion-item.active-category {
            background: linear-gradient(135deg, rgba(116, 188, 198, 0.15) 0%, rgba(116, 188, 198, 0.05) 100%);
            box-shadow: 0 4px 12px rgba(116, 188, 198, 0.15);
        }

        .accordion-header {
            display: flex;
            align-items: center;
            border-radius: 8px;
            overflow: hidden;
        }

        .main-title {
            flex: 1;
            padding: 12px 16px;
            font-size: 1.1rem;
            font-weight: bold;
            color: #1e293b;
            text-decoration: none;
            transition: all 0.2s ease;
            border-radius: 8px 0 0 8px;
        }

        .main-title:hover {
            color: #74BCC6;
            background: rgba(116, 188, 198, 0.05);
        }

        .main-title.active-category-link {
            color: #ffffff;
            background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%);
            font-weight: 600;
        }

        .subcategory-link {
            padding: 10px 16px 10px 32px;
            font-size: 1.05rem;
            font-weight: bold;
            color: #64748b;
            position: relative;
            border-radius: 6px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: block;
        }

        .subcategory-link::before {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #74BCC6;
            transition: transform 0.2s ease;
        }

        .subcategory-link:hover {
            background: #eff6ff;
            color: #74BCC6;
            text-decoration: none;
        }

        .subcategory-link:hover::before {
            transform: translateY(-50%) scale(1.2);
        }

        .subcategory-link.active-subcategory {
            background: linear-gradient(135deg, rgba(116, 188, 198, 0.1) 0%, rgba(116, 188, 198, 0.05) 100%);
            color: #74BCC6;
            font-weight: 600;
            border-left: 3px solid #74BCC6;
        }

        .accordion-button {
            width: 40px;
            height: 48px;
            padding: 0 12px;
            border: none;
            background: #e0e6f0;
            border-radius: 0 8px 8px 0;
            transition: all 0.2s ease;
            position: relative;
        }

        .accordion-button::after {
            content: '';
            width: 16px;
            height: 16px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2374BCC6'%3E%3Cpath d='M12 15.5l-6-6h12l-6 6z'/%3E%3C/svg%3E");
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: transform 0.2s ease-in-out;
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2374BCC6'%3E%3Cpath d='M12 15.5l-6-6h12l-6 6z'/%3E%3C/svg%3E");
            transform: translate(-50%, -50%) rotate(180deg);
        }

        .accordion-button:focus {
            box-shadow: none;
            outline: none;
        }

        .accordion-button:hover {
            background: #d1d5db;
            transform: scale(1.05);
        }

        .accordion-body {
            padding: 12px 16px;
            background: #ffffff;
            border-top: 1px solid #e0e6f0;
        }

        .form-check {
            padding: 8px 12px;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .form-check-label .main-title :before {
            content: "-";

        }

        .filter-section .form-check {
            background: #74BCC6;
            /* background: #454545; */
            padding-right: 1.5em;
            padding-left: inherit;
        }

        .form-check-label .main-title {
            font-size: 1.05rem;
            /* font-size: 0.9rem; */
            font-weight: bold;
            /* color: #64748b; */
            text-decoration: none;
            color: #ffffff;
            text-transform: uppercase;
        }

        .form-check-label .main-title:hover {
            color: #b4b4b4ff;
        }

        .form-check-input {
            margin-right: 8px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
        }

        .form-check-input:checked {
            background-color: #74BCC6;
            border-color: #74BCC6;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(116, 188, 198, 0.2);
        }

        .accordion .accordion {
            margin-top: 8px;
        }

        .accordion .accordion .accordion-item {
            background: #f9fafb;
        }

        /* .accordion-collapse {
                                             display: none;
                                             transition: height 0.3s ease;
                                         }

                                         .accordion-collapse.show {
                                             display: block;
                                         } */

        /* .accordion-collapse {
                                             display: none !important;
                                         }

                                         .accordion-item.active>.accordion-collapse {
                                             display: block !important;
                                         } */

        /* Enhanced Responsive Product Card Styles */
        .product-list-box {
            background: #F9F9F9;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #e0e6f0;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .product-list-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #74bcc6, #5aa5b0);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .product-list-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-color: #74BCC6;
        }

        .product-list-box:hover::before {
            transform: scaleX(1);
        }

        .product-list-img {
            text-align: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .product-list-box:hover .product-list-img {
            transform: scale(1.05);
        }

        .product-list-img img {
            max-height: 100%;
            max-width: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .product-list-box:hover .product-list-img img {
            transform: scale(1.08);
        }

        .subcateLists {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .subcateLists>div {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .subcateLists h4 {
            color: #1e293b;
            font-size: 1.1rem;
            font-weight: 700;
            margin-top: 70px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            padding-bottom: 10px;
            line-height: 1.3;
            order: -1;
            /* This ensures the heading stays at the top */
        }

        .subcateLists h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 1px;
            background: red;
            border-radius: 1px;
            transition: width 0.3s ease;
        }

        .product-list-box:hover .subcateLists h4 {
            color: white;
        }

        .product-list-box:hover .subcateLists h4::after {
            width: 80px;
        }

        .subcateLists a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .subcateLists a:hover {
            color: red;
        }

        .subcateLists ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
            flex: 1;
        }

        .subcateLists li {
            margin-bottom: 8px;
            padding: 0px 0px;
            border-radius: 6px;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .subcateLists li::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(116, 188, 198, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .subcateLists li:hover::before {
            left: 100%;
        }

        .subcateLists li:hover {
            background: rgba(116, 188, 198, 0.08);
            transform: translateX(4px);
        }

        .subcateLists li a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.2s ease;
            display: block;
            position: relative;
            z-index: 1;
            line-height: 1.4;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .subcateLists li:hover a {
            color: red;
            padding-left: 5px;
        }

        /* Section Title Styles */
        .section-title {
            color: #74BCC6;
            padding-bottom: 15px;
            padding-top: 35px !important;
            font-size: 1.8rem;
            text-align: center;
            font-weight: 700;
            position: relative;
            margin-bottom: 30px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 1px;
            background: red;
            /* background: linear-gradient(90deg, #74BCC6, #5aa5b0); */
            border-radius: 2px;
        }

        /* Enhanced Subcategory Slider */
        .subcate-slider {
            position: relative;
            overflow: hidden;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .subcate-slides {
            display: flex;
            transition: transform 0.3s ease-in-out;
            width: 100%;
            flex: 1;
        }

        .subcate-slide {
            min-width: 100%;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .subcate-slide .list-unstyled {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Enhanced Pagination */
        .subcate-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
            gap: 10px;
            flex-shrink: 0;
        }

        .subcate-pagination .pagination-btn {
            padding: 6px 10px;
            border: 1px solid #74BCC6;
            background: #ffffff;
            color: #74BCC6;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .subcate-pagination .pagination-btn:hover:not(:disabled) {
            background: #74BCC6;
            color: #ffffff;
        }

        .subcate-pagination .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f1f5f9;
            border-color: #d1d5db;
            color: #9ca3af;
        }

        /* Responsive Design - Enhanced */
        @media (max-width: 1200px) {
            .product-list-img {
                height: 160px;
            }

            .subcateLists h4 {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 992px) {
            .pro-filter {
                position: static;
                margin-bottom: 30px;
            }

            .product-list-box {
                margin-bottom: 20px;
            }

            .product-list-img {
                height: 140px;
            }

            .subcateLists h4 {
                font-size: 1.25rem;
            }

            .subcateLists li a {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .pro-filter {
                padding: 15px;
            }

            .pro-filter h3 {
                font-size: 1.5rem;
            }

            .main-title {
                font-size: 0.9rem;
                padding: 10px 12px;
            }

            .accordion-button {
                width: 36px;
                height: 42px;
            }

            .subcategory-link {
                font-size: 0.9rem;
                padding-left: 28px;
            }

            .product-list-box {
                padding: 15px;
            }

            .product-list-img {
                height: 130px;
                margin-bottom: 15px;
            }

            .subcateLists h4 {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .subcateLists li a {
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 1.5rem;
                padding-top: 25px !important;
            }
        }

        @media (max-width: 576px) {
            .pro-filter h3 {
                font-size: 1.3rem;
            }

            .filter-section h4 {
                font-size: 1.1rem;
            }

            .product-list-box {
                padding: 12px;
                margin-bottom: 15px;
            }

            .product-list-img {
                margin-bottom: 15px;
                height: 120px;
            }

            .subcateLists h4 {
                font-size: 1.1rem;
                margin-bottom: 12px;
            }

            .subcateLists li {
                padding: 6px 10px;
                margin-bottom: 6px;
            }

            .subcateLists li a {
                font-size: 0.85rem;
            }

            .section-title {
                font-size: 1.3rem;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .product-list-img {
                height: 110px;
            }

            .subcateLists h4 {
                font-size: 1rem;
            }

            .subcateLists li a {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 400px) {
            .product-list-img {
                height: 100px;
            }
        }

        /* Grid System for Better Card Layout */
        .product__lists .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        @media (max-width: 768px) {
            .product__lists .row {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 15px;
            }
        }

  
		
		@media (max-width: 992px) {
    .product__lists .row {
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    }
}

/* Mobile */
@media (max-width: 576px) {
    .product__lists .row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
}

        /* --- HERO SECTION FULL HEIGHT --- */
        .hero-section {
            position: relative;
            overflow: hidden;
            width: 100%;
             height: 100vh;
    		max-height: 650px;
            min-height: 400px;
            display: flex;
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
            max-width: 800px;
            height: fit-content;
            margin-left: 50px;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 60vh;
                min-height: 300px;
                max-height: 400px;
            }

            .hero-section .hero-text {
                margin-left: 0;
                max-width: 100%;
            }
        }

        /* Breadcrumb Styles */
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

        /* Responsive breadcrumb design */
        @media (max-width: 768px) {
            nav[aria-label="breadcrumb"] {
                margin: 15px 20px 25px 20px !important;
                padding: 12px 15px !important;
            }

            .breadcrumb-item a {
                font-size: 16px !important;
                padding: 6px 12px !important;
            }

            .breadcrumb-item a span {
                font-size: 14px !important;
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

            .breadcrumb-item a {
                width: 100%;
                justify-content: flex-start !important;
            }

            li[style*="margin: 0 10px"] {
                display: none !important;
            }
        }


        /* ///////// */


        /* =============== MODERN ACCORDION FILTER STYLING =============== */
        .product-filter {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            font-family: 'Poppins', sans-serif;
            border: 1px solid #f0f0f0;
        }

        .product-filter h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1a1a1a;
            padding-bottom: 12px;
            border-bottom: 2px solid #f5f5f5;
        }

        .filter-group h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-group h4:before {
            content: '';
            display: block;
            width: 4px;
            height: 18px;
            background: linear-gradient(135deg, #74BCC6 0%, #e0e0e0ff 100%);
            border-radius: 2px;
        }

        /* Accordion core */
        .custom-accordion {
            border: none;
        }

        .custom-item {
            margin: 5px 0;
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        .custom-item:hover {
            background-color: #fafafa;
            border-radius: 8px;
        }

        .custom-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 8px 12px;
            transition: all 0.3s ease;
            /* border-radius: 8px; */
        }

        .custom-header:hover {
            background-color: #74bcc6;
            color: #ffffff;
        }

        .custom-header .title {
            font-weight: bold;
            font-size: 1rem;
            color: #2d3748;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            transition: color 0.2s ease;
        }

        .custom-header .title:hover {
            color: #ffffff;
        }

        .custom-header .title:before {
            content: '';
            display: block;
            width: 6px;
            height: 6px;
            background: #a0aec0;
            border-radius: 50%;
        }

        .custom-toggle {
            background:  #74BCC6;
            /* background: linear-gradient(135deg, #74BCC6 0%, #e2e2e2ff 100%); */
            border: none;
            outline: none;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(102, 126, 234, 0.3);
        }

        .custom-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.4);
        }

        .custom-toggle.open {
            transform: rotate(90deg);
            /* background: linear-gradient(135deg, #764ba2 0%, #74bcc6 100%); */
            background:   #74BCC6;;
        }

        /* Accordion animation */
        .custom-body {
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            transition: max-height 0.4s ease, opacity 0.3s ease, padding 0.3s ease;
            padding: 0 16px;
        }

       .custom-body.show {
    max-height: 1000px;   /* or calc(70vh) if you want responsive height */
    opacity: 1;
    padding: 2px 16px;

    /* ✨ Added scroll behavior */
    overflow-y: auto;
    overflow-x: hidden;
    -webkit-overflow-scrolling: touch; /* smooth on iOS */
    scrollbar-width: none;             /* Firefox */
    scrollbar-color: rgba(0,0,0,0.2) transparent;
}

/* Optional: custom scrollbar for WebKit browsers */
.custom-body.show::-webkit-scrollbar {
    width: 8px;
}
.custom-body.show::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.2);
    border-radius: 6px;
}
.custom-body.show::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0,0,0,0.35);
}


        /* Sub level */
        .custom-sub {
            margin-left: 12px;
            /* border-left: 2px solid #e2e8f0; */
            padding-left: 16px;
        }

        .custom-sub .custom-item {
            border-bottom: 1px dashed #e2e8f0;
        }

        .custom-sub .custom-item:last-child {
            border-bottom: none;
        }

        .custom-sub .custom-header {
            padding: 3px 8px;
        }

        .custom-sub .custom-header .title {
            font-size: 0.9rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .custom-sub .custom-header .title:before {
            width: 5px;
            height: 5px;
            background: #fff;
        }

        .custom-sub .custom-toggle {
            width: 24px;
            height: 24px;
            font-size: 0.7rem;
        }

        /* Make all inner product lists scrollable if content overflows */
.custom-accordion.custom-sub {
  max-height: calc(50vh);      /* limit height — adjust as you like */
  overflow-y: auto;            /* enable scrolling when needed */
  overflow-x: hidden;
  -webkit-overflow-scrolling: touch; /* smooth on iOS */
  scrollbar-width: none;       /* Firefox */
  scrollbar-color: rgba(0,0,0,0.2) transparent;
  padding-right: 8px;          /* avoid content behind scrollbar */
}

/* Optional: subtle scrollbar styling for WebKit browsers */
.custom-accordion.custom-sub::-webkit-scrollbar {
  width: 8px;
}
.custom-accordion.custom-sub::-webkit-scrollbar-thumb {
  background-color: rgba(0,0,0,0.25);
  border-radius: 6px;
}
.custom-accordion.custom-sub::-webkit-scrollbar-thumb:hover {
  background-color: rgba(0,0,0,0.4);
}

        /* Product list */
        .custom-products ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .custom-products li {
            padding: 8px 0;
            border-bottom: 1px solid #f7f7f7;
            transition: all 0.2s ease;
        }

        .custom-products li:hover {
            background-color: #74bcc6;
            border-radius: 6px;
            padding-left: 8px;
        }

        .custom-products li:last-child {
            border-bottom: none;
        }

        .custom-products a {
            text-decoration: none;
            font-weight: 600;
            color: #4a5568;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.2s ease;
            text-transform: capitalize;
        }

        .custom-products a:before {
            content: '▸';
            font-size: 0.7rem;
            color: #a0aec0;
            transition: all 0.2s ease;
        }

        .custom-products a:hover {
            color: #ffffff;
        }

        .custom-products a:hover:before {
            color: #74bcc6;
            transform: translateX(3px);
        }

        /* Active link */
        .active-link {
            color: #2f5d63 !important;
            font-weight: 600;
        }

        .active-link:before {
            /* color: #74bcc6 !important; */
            /* content: '▶' !important; */
        }

        /* No products message */
        .custom-body p {
            font-size: 0.85rem;
            color: #a0aec0;
            font-style: italic;
            padding: 8px 0;
            text-align: center;
            background: #f8f9fa;
            border-radius: 6px;
            margin: 8px 0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .product-filter {
                padding: 16px;
                border-radius: 12px;
            }

            .custom-header {
                padding: 12px 8px;
            }

            .custom-body {
                padding: 0 12px;
            }

            .custom-body.show {
                padding: 10px 12px;
            }
        }
		/* =============== COMPACT FOR 13-14 INCH LAPTOPS =============== */
@media (max-width: 1440px) {
  .product-filter {
    background: #fff;
    border-radius: 16px;
    padding: 10px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    font-family: 'Poppins', sans-serif;
    border: 1px solid #f0f0f0;
    max-height: 90vh;
    overflow: hidden;
    width: 265px;
}

.product-filter h3 {
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: #1a1a1a;
    padding-bottom: 6px;
    border-bottom: 2px solid #f5f5f5;
}

/* Remove the filter-group styles since you don't need them */
.filter-group h4 {
    display: none;
}

/* Accordion core - more compact */
.custom-accordion {
    border: none;
    margin: 0;
    padding: 0;
}

.custom-item {
    margin: 1px 0;
    border-bottom: 1px solid #f0f0f0;
    transition: all 0.3s ease;
}

.custom-item:hover {
    background-color: #fafafa;
    border-radius: 8px;
}

.custom-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding: 13px 6px;
    transition: all 0.3s ease;
    min-height: 24px;
}

.custom-header:hover {
    background-color: #74bcc6;
    border-radius: 8px;
}

.custom-header .title {
    font-weight: 600;
    font-size: 0.85rem;
    color: #2d3748;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 4px;
    flex: 1;
    transition: color 0.2s ease;
}

.custom-header:hover .title {
    color: #ffffff;
}

.custom-header .title:before {
    content: '';
    display: block;
    width: 4px;
    height: 4px;
    background: #a0aec0;
    border-radius: 50%;
}

.custom-toggle {
    background: #74BCC6;
    border: none;
    outline: none;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.7rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(102, 126, 234, 0.3);
    flex-shrink: 0;
    margin-left: 4px;
}

.custom-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 8px rgba(102, 126, 234, 0.4);
}

.custom-toggle.open {
    transform: rotate(90deg);
    background: #74BCC6;
}

/* Accordion animation */
.custom-body {
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    transition: max-height 0.4s ease, opacity 0.3s ease, padding 0.3s ease;
    padding: 0 8px;
}

.custom-body.show {
    max-height: 60vh;
    opacity: 1;
    padding: 2px 8px;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    scrollbar-color: rgba(0,0,0,0.2) transparent;
}

.custom-body.show::-webkit-scrollbar {
    width: 6px;
}
.custom-body.show::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.2);
    border-radius: 6px;
}
.custom-body.show::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0,0,0,0.35);
}

/* Sub level - compact but keeping original styles */
.custom-sub {
    margin-left: 6px;
    padding-left: 12px;
    max-height: 20vh;
}

.custom-sub .custom-item {
    border-bottom: 1px dashed #e2e8f0;
}

.custom-sub .custom-item:last-child {
    border-bottom: none;
}

.custom-sub .custom-header {
    padding: 2px 6px;
    min-height: 22px;
}

.custom-sub .custom-header .title {
    font-size: 0.8rem;
    font-weight: 800;
    text-transform: uppercase;
}

.custom-sub .custom-header .title:before {
    width: 3px;
    height: 3px;
    background: #fff;
}

.custom-sub .custom-toggle {
    width: 16px;
    height: 16px;
    font-size: 0.55rem;
}

/* Product list - compact */
.custom-products ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.custom-products li {
    padding: 2px 0;
    border-bottom: 1px solid #f7f7f7;
    transition: all 0.2s ease;
}

.custom-products li:hover {
    background-color: #74bcc6;
    border-radius: 6px;
    padding-left: 4px;
}

.custom-products li:last-child {
    border-bottom: none;
}

.custom-products a {
    text-decoration: none;
    font-weight: 600;
    color: #4a5568;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 4px;
    transition: color 0.2s ease;
    text-transform: capitalize;
}

.custom-products a:before {
    content: '▸';
    font-size: 0.7rem;
    color: #a0aec0;
    transition: all 0.2s ease;
}

.custom-products a:hover {
    color: #ffffff;
}

.custom-products a:hover:before {
    color: #74bcc6;
    transform: translateX(3px);
}

/* Active link */
.active-link {
    color: #2f5d63 !important;
    font-weight: 600;
}

/* No products message */
.custom-body p {
    font-size: 0.8rem;
    color: #a0aec0;
    font-style: italic;
    padding: 4px 0;
    text-align: center;
    background: #f8f9fa;
    border-radius: 6px;
    margin: 4px 0;
}

/* Make all inner lists scrollable */
.custom-accordion.custom-sub {
    max-height: 60vh;
    overflow-y: auto;
    overflow-x: hidden;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    scrollbar-color: rgba(0,0,0,0.2) transparent;
    padding-right: 4px;
}

.custom-accordion.custom-sub::-webkit-scrollbar {
    width: 4px;
}
.custom-accordion.custom-sub::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.2);
    border-radius: 4px;
}
.custom-accordion.custom-sub::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0,0,0,0.35);
}

/* Remove any overlay/absolute positioning */
.custom-sub,
.custom-products {
    position: static;
    display: block;
    box-shadow: none;
    border: none;
    width: auto;
}
	.custom-sub .custom-header .title {
        font-size: 0.7rem
    }
.custom-products a{
        font-size: 0.65rem
    }
	
	
		}

@media (max-width: 1366px) {
    .product-filter {
        width: 265px;
        padding: 8px;
        max-height: 95vh;
    }
    
    .product-filter h3 {
        font-size: 0.8rem;
		font-weight:700;
    }
    
    .custom-header .title {
        font-size: 0.74rem;
		font-weight:600;
    }
    
    .custom-body.show {
        max-height: 60vh;
		overflow:scroll !important;
    }
}

@media (max-width: 1280px) {
    .product-filter {
        width: 220px;
        padding: 6px;
        max-height: 90vh;
    }
    
    .custom-header {
        padding: 2px 4px;
        min-height: 22px;
    }
    
    .custom-body.show {
        max-height: 60vh;
    }
}

@media (max-width: 1440px) and (min-width: 1024px) {
    .col-md-4 {
        flex: 0 0 25% !important;
        max-width: 25% !important;
    }
	
	footer .container .row .col-md-4{
		flex: 0 0 auto !important;
		 max-width: 33.33333333% !important;
        width: 33.33333333% !important;
	}
}


		/* Sidebar mobile responsiveness */
@media (max-width: 992px) {
    .pro-filter {
        position: static !important;
        top: unset !important;
        width: 100% !important;
        max-height: none !important;
        padding: 15px !important;
        margin-bottom: 25px !important;
        overflow: visible !important;
    }
}
		
		
		/* Product card standard height */
.product-list-img {
    height: 220px;
}

/* Tablets */
@media (max-width: 992px) {
    .product-list-img {
        height: 180px;
    }
}

/* Mobile */
@media (max-width: 576px) {
    .product-list-img {
        height: 150px;
    }
}

		@media (max-width: 768px) {
    .hero-section {
        height: 45vh !important;
        min-height: 260px !important;
    }

    .hero-heading {
        font-size: 1.7rem !important;
    }

    .hero-subheading {
        font-size: 1rem !important;
    }
}

		
		@media (max-width: 576px) {
    nav[aria-label="breadcrumb"] {
        margin: 10px !important;
        padding: 10px !important;
    }

    .breadcrumb-item a {
        padding: 6px 10px !important;
        font-size: 14px !important;
    }

    .separator {
        margin: 0 6px !important;
    }
}
@media (max-width: 768px) {
    .subcateLists h4 {
        margin-top: 10px !important;
        font-size: 1rem !important;
    }
}


		
		 @media (max-width: 991px) {
     .hero-heading {
         font-size: 2.1rem !important;
     }

     .hero-subheading {
         font-size: 1.1rem !important;
     }
 }

 @media (max-width: 576px) {
     .hero-heading {
         font-size: 28px !important;
		 text-align:left;
     }

     .hero-subheading {
         font-size: 20px !important;
         text-align: start !important;
     }
 }

 /* ---------------------------
   BASE (Your Original Styles)
--------------------------- */
 nav[aria-label="breadcrumb"] {
     background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
     padding: 15px 20px;
     border-radius: 12px;
     box-shadow: 0 4px 15px rgba(116, 188, 198, 0.1);
     margin: 20px 0px 30px 50px;
     border: 1px solid rgba(116, 188, 198, 0.2);
 }

 nav[aria-label="breadcrumb"] .breadcrumb {
     margin: 0;
     padding: 0;
     list-style: none;
     display: flex;
     align-items: center;
     flex-wrap: wrap;
 }

 .breadcrumb-item {
     display: flex;
     align-items: center;
 }

 .separator {
     margin: 0 10px;
     color: #74BCC6;
     font-size: 20px;
     font-weight: bold;
 }

 .breadcrumb-item a {
     color: #74BCC6;
     font-weight: 600;
     font-size: 18px;
     text-decoration: none;
     padding: 8px 15px;
     border-radius: 8px;
     transition: all 0.3s ease;
     background: rgba(116, 188, 198, 0.1);
     border: 1px solid transparent;
     display: flex;
     align-items: center;
 }

 .breadcrumb-item a svg {
     width: 18px;
     height: 18px;
     margin-right: 8px;
     fill: currentColor;
 }

 .breadcrumb-item.active a {
     color: #ffffff;
     font-weight: 700;
     font-size: 18px;
     padding: 8px 15px;
     border-radius: 8px;
     background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%);
     box-shadow: 0 2px 8px rgba(116, 188, 198, 0.3);
     display: flex;
     align-items: center;
     border: 1px solid #74BCC6;
 }

 /* FORCE separators from inline-li */
 nav[aria-label="breadcrumb"] li[style*="margin: 0 10px"] {
     margin: 0 10px;
     color: #74BCC6;
     font-size: 20px;
     font-weight: bold;
 }

 /* ---------------------------
   RESPONSIVE ADJUSTMENTS
--------------------------- */

 /* Tablets (max-width: 991px) */
 @media (max-width: 991px) {
     nav[aria-label="breadcrumb"] {
         padding: 12px 15px;
         margin: 15px;
     }

     .breadcrumb-item a,
     .breadcrumb-item.active a {
         font-size: 16px;
         padding: 6px 12px;
     }

     .breadcrumb-item a svg,
     .breadcrumb-item.active a svg {
         width: 16px;
         height: 16px;
         margin-right: 6px;
     }

     .separator {
         font-size: 18px;
         margin: 0 8px;
     }
 }

 /* Mobile devices (max-width: 768px) */
 @media (max-width: 768px) {
     nav[aria-label="breadcrumb"] {
         padding: 10px 12px;
         border-radius: 10px;
         margin: 10px;
     }

     .breadcrumb {
         flex-wrap: wrap;
         gap: 6px 8px;
     }

     .breadcrumb-item a,
     .breadcrumb-item.active a {
         font-size: 14px;
         padding: 5px 10px;
     }

     .breadcrumb-item a svg,
     .breadcrumb-item.active a svg {
         width: 14px;
         height: 14px;
         margin-right: 4px;
     }

     .separator {
         font-size: 16px;
         margin: 0 6px;
     }
 }

 /* Extra Small devices (max-width: 480px) */
 @media (max-width: 480px) {
     nav[aria-label="breadcrumb"] {
         padding: 8px 10px;
         border-radius: 8px;
         margin: 5px 8px;
     }

     .breadcrumb {
         gap: 5px;
     }

     .breadcrumb-item a,
     .breadcrumb-item.active a {
         font-size: 13px;
         padding: 4px 8px;
     }

     .breadcrumb-item a svg,
     .breadcrumb-item.active a svg {
         width: 12px;
         height: 12px;
         margin-right: 3px;
     }

     .separator {
         font-size: 14px;
         margin: 0 4px;
     }
 }


 /* LAPTOP SCREENS — 13" to 14" */
 @media (max-width: 1440px) and (min-width: 1024px) {

     nav[aria-label="breadcrumb"] {
         padding: 12px 15px;
         margin: 15px 20px;
     }

     .breadcrumb-item a,
     .breadcrumb-item.active a {
         font-size: 14px;
         /* Smaller text */
         padding: 6px 10px;
         /* Reduced padding */
     }

     .breadcrumb-item a svg,
     .breadcrumb-item.active a svg {
         width: 15px;
         /* Smaller icon */
         height: 15px;
         margin-right: 5px;
     }

     .separator {
         font-size: 16px;
         /* Smaller separator */
         margin: 0 8px;
     }
 }

/* --------------------
   TYPOGRAPHY
-------------------- */
.hero-heading {
    font-size: clamp(1.6rem, 5vw, 4.3rem);
    font-weight: 600;
    margin-bottom: 10px;
   /* color: rgb(103, 100, 100);*/
	color: #fff;
    line-height: 1.2;
}

.hero-subheading {
    font-size: clamp(1rem, 3.5vw, 1.9rem);
    margin-bottom: 10px;
    margin-top: -18px;
    color: #74BCC6;
    line-height: 1.5;
}

/* --------------------
   ALIGNMENT LOGIC
-------------------- */

/* Desktop / PC (default) */
.hero-text {
    text-align: left;
}

@media (max-width: 576px) {
    .hero-text {
        text-align: center;
    }

    .hero-heading {
        font-size: 4rem;
    }

    .hero-subheading {
        font-size: 0.95rem;
    }
	.hero-section p {
    color: #74BCC6;
    font-size:0.95rem;
    line-height: 1.2;
}
	.bannertxt {
		left:5px;
	}
}
	.hero-section p {
    color: #74BCC6;
}	
    </style>

    <?php
        if (Str::startsWith(request()->path(), 'category/')) {
            $titleName = str_replace('-', ' ', Str::after(request()->path(), 'category/'));
        } elseif (Str::startsWith(request()->path(), 'sub-category/')) {
            $titleName = str_replace('-', ' ', Str::after(request()->path(), 'sub-category/'));
        } elseif (Str::startsWith(request()->path(), 'child-sub-category/')) {
            $titleName = str_replace('-', ' ', Str::after(request()->path(), 'child-sub-category/'));
        } else {
            $titleName = 'Our Products';
        }
     ?>

    <div class="hero-section">
        <div class="videobanner">
            <div class="image-banner">
                <?php
                    if (Str::startsWith(request()->path(), 'category/')) {
                        $bannerImage = 'frontend/images/' . str_replace(' ', '-', $titleName) . '.jpg';
                    } else {
                        $bannerImage = 'frontend/images/main_product_two1.jpg';
                    }
                 ?>

                <img data-aos="fade-up" src="<?php echo e(asset('/frontend/images/newProduct_all.jpg')); ?>" alt="Banner" class="img-fluid">
            </div>

        </div>
        <div class="bannertxt">
   		 <div class="hero-text" style="position:absolute; top:20%;">
      	  <h2 class="wow fadeInLeft hero-heading">
            EXPLORE TAPARIA'S RANGE.
      	  </h2>

       	 <p class="hero-subheading">
            Made for strength, comfort, and reliability.
       	 </p>
    </div>
</div>

    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo e(url('')); ?>">
                <svg viewBox="0 0 24 24">
                    <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                </svg>
                Home
            </a>
        </li>

        <li class="separator">›</li>

        <li class="breadcrumb-item">
            <a href="<?php echo e(url('products')); ?>">
                <svg viewBox="0 0 24 24">
                    <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                </svg>
                Our Products
            </a>
        </li>

        <?php if(Str::startsWith(request()->path(), 'category/')): ?>
            <li class="separator">›</li>
            <li class="breadcrumb-item active">
                <a href="<?php echo e(url('category/' . Str::slug($titleName))); ?>">
                    <svg viewBox="0 0 24 24">
                        <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                    </svg>
                    <?php echo e(ucwords(strtolower($titleName))); ?>

                </a>
            </li>
        <?php endif; ?>

        <?php if(Str::startsWith(request()->path(), 'sub-category/')): ?>
            <li class="separator">›</li>
            <li class="breadcrumb-item">
                <a href="<?php echo e(url('category/' . Str::slug($categoryName->name))); ?>">
                    <svg viewBox="0 0 24 24">
                        <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                    </svg>
                    <?php echo e(ucwords(strtolower($categoryName->name))); ?>

                </a>
            </li>

            <li class="separator">›</li>

            <li class="breadcrumb-item active">
                <a href="<?php echo e(url('sub-category/' . Str::slug($titleName))); ?>">
                    <svg viewBox="0 0 24 24">
                        <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l .9-.9c.4-.4.4-1 0-1.4z" />
                    </svg>
                    <?php echo e(ucwords(strtolower($titleName))); ?>

                </a>
            </li>
        <?php endif; ?>

        <?php if(Str::startsWith(request()->path(), 'child-sub-category/')): ?>
            <li class="separator">›</li>
            <li class="breadcrumb-item">
                <a href="<?php echo e(url('category/' . Str::slug($categoryName->name))); ?>">
                    <svg viewBox="0 0 24 24">
                        <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c .4 .4 1 .4 1.4 0l .9-.9c .4-.4 .4-1 0-1.4z" />
                    </svg>
                    <?php echo e(ucwords(strtolower($categoryName->name))); ?>

                </a>
            </li>

            <li class="separator">›</li>

            <li class="breadcrumb-item">
                <a href="<?php echo e(url('sub-category/' . Str::slug($subCategoryName->name))); ?>">
                    <svg viewBox="0 0 24 24">
                        <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c .4 .4 1 .4 1.4 0l .9-.9c .4-.4 .4-1 0-1.4z" />
                    </svg>
                    <?php echo e(ucwords(strtolower($subCategoryName->name))); ?>

                </a>
            </li>

            <li class="separator">›</li>

            <li class="breadcrumb-item active">
                <a href="<?php echo e(url('child-sub-category/' . Str::slug($titleName))); ?>">
                    <svg viewBox="0 0 24 24">
                        <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c .4 .4 1 .4 1.4 0l .9-.9c .4-.4 .4-1 0-1.4z" />
                    </svg>
                    <?php echo e(ucwords(strtolower($titleName))); ?>

                </a>
            </li>
        <?php endif; ?>
    </ol>
</nav>

    <div class="content-section">
        <div class="container-xl">
            <div class="row">
                <!-- Filter Section -->
                <div class="col-md-4">
                    <div class="product-filter pro-filter">
                        <h3>Products</h3>
                        <div class="filter-group">
 <!-- <h4>Categories</h4> -->

                            <div class="custom-accordion" id="categoryAccordion">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $categorySubCategories = $subCategories->where('categoryId', $category->id);
                                        $categoryProducts = $products->where('categoryId', $category->id);
                                    ?>

                                    <div class="custom-item">
                                        <div class="custom-header" data-target="#cat<?php echo e($category->id); ?>">
                                            <a href="<?php echo e(url('category/' . Str::slug($category->name))); ?>"
                                                class="title <?php echo e(request()->is('category/' . Str::slug($category->name)) ? 'active-link' : ''); ?>">
                                                <?php echo e($category->name); ?>

                                            </a>
                                            <?php if($categorySubCategories->isNotEmpty() || $categoryProducts->isNotEmpty()): ?>
                                                <button class="custom-toggle" type="button"><i class="fa-solid fa-chevron-right" style="color: #fff; font-size: 12px;"></i></button>
                                            <?php endif; ?>
                                        </div>

                                        <div class="custom-body" id="cat<?php echo e($category->id); ?>">
                                            <?php if($categorySubCategories->isNotEmpty()): ?>
                                                <div class="custom-accordion custom-sub" id="sub<?php echo e($category->id); ?>">
                                                    <?php $__currentLoopData = $categorySubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $subCategoryProducts = $products->where('subCategoryId', $subCategory->id)->sortBy('childSubCategoryId');
                                                        ?>
                                                        <div class="custom-item">
                                                            <div class="custom-header" data-target="#subcat<?php echo e($subCategory->id); ?>">
                                                                <a href="<?php echo e(url('sub-category/' . Str::slug($subCategory->name))); ?>"
                                                                    class="title <?php echo e(request()->is('sub-category/' . Str::slug($subCategory->name)) ? 'active-link' : ''); ?>">
                                                                    <?php echo e($subCategory->name); ?>

                                                                </a>
                                                                <?php if($subCategoryProducts->isNotEmpty()): ?>
                                                                    <button class="custom-toggle" type="button"><i class="fa-solid fa-chevron-right" style="color: #fff; font-size: 12px;"></i></button>
                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="custom-body custom-products" id="subcat<?php echo e($subCategory->id); ?>">
                                                                <?php if($subCategoryProducts->isNotEmpty()): ?>
                                                                    <ul>
                                                                        <?php $__currentLoopData = $subCategoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li>
                                                                                <a href="<?php echo e(url('product/' . Str::slug($product->productName))); ?>"
                                                                                    class="<?php echo e(request()->is('product/' . Str::slug($product->productName)) ? 'active-link' : ''); ?>">
                                                                                    <?php echo e($product->productName); ?>

                                                                                </a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php else: ?>
                                                                    <p>No products found.</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php elseif($categoryProducts->isNotEmpty()): ?>
                                                <div class="custom-products">
                                                    <ul>
                                                        <?php $__currentLoopData = $categoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(url('product/' . Str::slug($product->productName))); ?>"
                                                                    class="<?php echo e(request()->is('product/' . Str::slug($product->productName)) ? 'active-link' : ''); ?>">
                                                                    <?php echo e($product->productName); ?>

                                                                </a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            <?php else: ?>
                                                <p>No products found in this category.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Section -->
                <div class="col-md-8">
                    <div class="section-title-container" style="width: 100%; margin: 0 auto 30px;">
                        <h3 class="section-title"><?php echo e($titleName); ?></h3>
                    </div>
                    <div class="product__lists">
                        <div class="row">
                            <?php if (Str::startsWith(request()->path(), 'category/')) { ?>
                            <?php $__currentLoopData = $subCategoriesWithChildSubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subCategoryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%!important">
                                    <div class="product-list-box">
                                        <div class="product-list-img" data-aos="fade-up">
                                            <?php if($subCategoryData['subCategory']->subCategoryImage): ?>
                                                <img data-aos="fade-up"
                                                    src="<?php echo e(url($subCategoryData['subCategory']->subCategoryImage)); ?>"
                                                    class="img-fluid" alt="<?php echo e($subCategoryData['subCategory']->name); ?>" />
                                            <?php else: ?>
                                                <img data-aos="fade-up" src="<?php echo e(asset('frontend/images/default.jpg')); ?>"
                                                    class="img-fluid" alt="Default Image" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="subcateLists">
                                            <div>
                                                <a href="<?php echo e(url('sub-category/' . Str::slug($subCategoryData['subCategory']->name))); ?>"
                                                    style="text-decoration: none;">
                                                    <h4 style="margin-top: 0px;"><?php echo e($subCategoryData['subCategory']->name); ?>

                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php } elseif (Str::startsWith(request()->path(), 'sub-category/')) { ?>
                            <?php $__currentLoopData = $childSubCategoriesWithProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $childSubCategoryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%">
                                    <div class="product-list-box">
                                        <div class="product-list-img" data-aos="fade-up">
                                            <?php if($childSubCategoryData['childSubCategory']->childSubCategoryImage): ?>
                                                <img data-aos="fade-up"
                                                    src="<?php echo e(url($childSubCategoryData['childSubCategory']->childSubCategoryImage)); ?>"
                                                    class="img-fluid" alt="<?php echo e($childSubCategoryData['childSubCategory']->name); ?>" />
                                            <?php else: ?>
                                                <img data-aos="fade-up" src="<?php echo e(asset('frontend/images/default.jpg')); ?>"
                                                    class="img-fluid" alt="Default Image" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="subcateLists">
                                            <div>
                                                <?php
                                                    $products = $childSubCategoryData['productsBychildSubCategory'];
                                                    $productChunks = $products->chunk(5);
                                                    $totalProductChunks = $productChunks->count();
                                                 ?>
                                                <?php if($totalProductChunks > 0): ?>
                                                    <div class="subcate-slider" id="product-slider-<?php echo e($index); ?>">
                                                        <div class="subcate-slides" id="product-slides-<?php echo e($index); ?>">
                                                            <?php $__currentLoopData = $productChunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunkIndex => $productChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="subcate-slide">
                                                                    <!-- Heading Above Each Product List -->
                                                                    <h4 class="mb-2">
                                                                        <?php echo e($childSubCategoryData['childSubCategory']->name); ?>

                                                                    </h4>

                                                                    <ul class="list-unstyled">
                                                                        <?php $__currentLoopData = $productChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childSubCategoryProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li>
                                                                                <a href="<?php echo e(url('product/' . Str::slug($childSubCategoryProduct->productName))); ?>"
                                                                                    style="white-space: nowrap;">
                                                                                    <?php echo e($childSubCategoryProduct->productName); ?>

                                                                                </a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <?php if($totalProductChunks > 1): ?>
                                                        <div class="subcate-pagination">
                                                            <button class="pagination-btn" id="product-prev-<?php echo e($index); ?>"
                                                                disabled>‹</button>
                                                            <span style="font-size: 0.8rem; color: #fff;">
                                                                <span
                                                                    id="product-current-<?php echo e($index); ?>">1</span>/<?php echo e($totalProductChunks); ?>

                                                            </span>
                                                            <button class="pagination-btn" id="product-next-<?php echo e($index); ?>" <?php echo e($totalProductChunks <= 1 ? 'disabled' : ''); ?>>›</button>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php } elseif (Str::startsWith(request()->path(), 'child-sub-category/')) { ?>
                            <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%">
                                <div class="product-list-box">
                                    <div class="product-list-img">
                                        <img data-aos="fade-up"
                                            src="<?php echo e(url($childSubCategoryData->childSubCategoryImage)); ?>" class="img-fluid"
                                            alt="<?php echo e($childSubCategoryData->name); ?>" />
                                    </div>
                                    <div class="subcateLists">
                                        <div>
                                            <ul class="list-unstyled">
                                                <?php $__currentLoopData = $productsByChildSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childSubCategoryProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a
                                                            href="<?php echo e(url('product/' . Str::slug($childSubCategoryProduct->productName))); ?>">
                                                            <?php echo e($childSubCategoryProduct->productName); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } else { ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%">
                                    <div class="product-list-box">
                                        <div class="product-list-img">
                                            <?php if($categoryData->categoryImage): ?>
                                                <img data-aos="fade-up" src="<?php echo e(url($categoryData->categoryImage)); ?>"
                                                    class="img-fluid" alt="<?php echo e($categoryData->name); ?>" />
                                            <?php else: ?>
                                                <img data-aos="fade-up" src="<?php echo e(asset('frontend/images/default.jpg')); ?>"
                                                    class="img-fluid" alt="Default Image" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="subcateLists">
                                            <div>
                                                <a href="<?php echo e(url('category/' . Str::slug($categoryData->name))); ?>"
                                                    style="text-decoration: none;">
                                                    <h4 style="margin-top: 0px;"><?php echo e($categoryData->name); ?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javaScript'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- <script>
                                         document.addEventListener('DOMContentLoaded', function() {
                                             // Enhanced CSS with smooth animations - OVERRIDE existing styles
                                             const style = document.createElement('style');
                                             style.textContent = `
                                            .accordion-collapse {
                                                overflow: hidden;
                                                max-height: 0;
                                                opacity: 0;
                                                transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                                                            opacity 0.3s ease !important;
                                            }

                                            .accordion-collapse.show {
                                                display: block !important;
                                                max-height: 3000px !important;
                                                opacity: 1 !important;
                                            }

                                            .accordion-collapse:not(.show) {
                                                display: none !important;
                                            }

                                            .accordion-button::after {
                                                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
                                            }

                                            /* Smooth hover effect */
                                            .accordion-header:hover {
                                                transform: translateX(2px);
                                                transition: transform 0.2s ease;
                                            }
                                        `;
                                             document.head.appendChild(style);

                                             // Track if animation is in progress
                                             let isAnimating = false;

                                             // Initialize: Close all accordions except the active one
                                             const allAccordionItems = document.querySelectorAll('.accordion-item');
                                             allAccordionItems.forEach(item => {
                                                 if (!item.classList.contains('active-category')) {
                                                     const collapseElement = item.querySelector('.accordion-collapse');
                                                     if (collapseElement) {
                                                         collapseElement.classList.remove('show');
                                                         collapseElement.style.display = 'none';
                                                     }
                                                 }
                                             });

                                             // Universal function to toggle accordion with animation

                                             function toggleAccordion(button, targetCollapse, siblingCollapses) {
                                                 // Prevent rapid clicking during animation
                                                 if (isAnimating) return;
                                                 isAnimating = true;

                                                 const isCurrentlyOpen = targetCollapse.classList.contains('show');

                                                 // Close all sibling accordions
                                                 siblingCollapses.forEach(collapse => {
                                                     if (collapse !== targetCollapse && collapse.classList.contains('show')) {
                                                         const accordionHeader = collapse.previousElementSibling;
                                                         const btn = accordionHeader ? accordionHeader.querySelector('.accordion-button') : null;
                                                         if (btn) btn.classList.add('collapsed');
                                                         collapse.classList.remove('show');
                                                         collapse.style.display = 'none';
                                                     }
                                                 });

                                                 if (isCurrentlyOpen) {
                                                     // Close current accordion
                                                     button.classList.add('collapsed');
                                                     targetCollapse.classList.remove('show');
                                                     targetCollapse.style.display = 'none';
                                                 } else {
                                                     // Open current accordion
                                                     button.classList.remove('collapsed');
                                                     targetCollapse.style.display = 'block';
                                                     targetCollapse.offsetHeight; // force reflow
                                                     targetCollapse.classList.add('show');
                                                 }

                                                 // Wait a bit before allowing next click (simulate animation end)
                                                 setTimeout(() => {
                                                     isAnimating = false;
                                                 }, 300); // 300ms = typical animation duration
                                             }

                                             // Handle main category accordion button clicks
                                             document.querySelectorAll('#mainCategories > .accordion-item > .accordion-header > .accordion-button').forEach(button => {
                                                 button.addEventListener('click', function(e) {
                                                     e.preventDefault();
                                                     e.stopPropagation();

                                                     const targetId = this.getAttribute('data-bs-target');
                                                     const targetCollapse = document.querySelector(targetId);

                                                     if (!targetCollapse) return;

                                                     // Get all main category collapses
                                                     const siblingCollapses = Array.from(
                                                         document.querySelectorAll('#mainCategories > .accordion-item > .accordion-collapse')
                                                     );

                                                     toggleAccordion(this, targetCollapse, siblingCollapses);
                                                 });
                                             });

                                             // Handle subcategory accordion button clicks (all nested levels)
                                             document.querySelectorAll('.accordion .accordion .accordion-button').forEach(button => {
                                                 button.addEventListener('click', function(e) {
                                                     e.preventDefault();
                                                     e.stopPropagation();

                                                     const targetId = this.getAttribute('data-bs-target');
                                                     const targetCollapse = document.querySelector(targetId);

                                                     if (!targetCollapse) return;

                                                     // Find the parent accordion container for this level
                                                     const parentAccordion = this.closest('.accordion-body')?.querySelector('.accordion') ||
                                                         this.closest('.accordion[id^="subCategories"]');

                                                     if (!parentAccordion) return;

                                                     // Get all sibling collapses at the same level
                                                     const siblingCollapses = Array.from(
                                                         parentAccordion.querySelectorAll(':scope > .accordion-item > .accordion-collapse')
                                                     );

                                                     toggleAccordion(this, targetCollapse, siblingCollapses);
                                                 });
                                             });

                                             // Initialize button states based on current collapse state
                                             document.querySelectorAll('.accordion-button').forEach(button => {
                                                 const collapseTarget = button.getAttribute('data-bs-target');
                                                 if (collapseTarget) {
                                                     const collapseElement = document.querySelector(collapseTarget);
                                                     if (collapseElement) {
                                                         if (collapseElement.classList.contains('show')) {
                                                             button.classList.remove('collapsed');
                                                             collapseElement.style.display = 'block';
                                                         } else {
                                                             button.classList.add('collapsed');
                                                             collapseElement.style.display = 'none';
                                                         }
                                                     }
                                                 }
                                             });
                                         });
                                     </script> -->

    <script>
		
        document.addEventListener('DOMContentLoaded', function () {
			

		
     const sectionTitle = document.querySelector('.breadcrumb');
    if (sectionTitle) {
        sectionTitle.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }


			
			
		
            document.querySelectorAll('.custom-toggle').forEach(toggleBtn => {
                toggleBtn.addEventListener('click', e => {
                    e.preventDefault(); // Prevent button default
                    e.stopPropagation(); // Prevent triggering parent click

                    const header = toggleBtn.closest('.custom-header');
                    const targetId = header.getAttribute('data-target');
                    const targetBody = document.querySelector(targetId);
                    if (!targetBody) return;

                    const parentAccordion = header.closest('.custom-accordion');
                    const siblingBodies = parentAccordion
                        ? Array.from(parentAccordion.querySelectorAll(':scope > .custom-item > .custom-body'))
                        : [];

                    const isOpen = targetBody.classList.contains('show');

                    // Close all siblings
                    siblingBodies.forEach(sib => {
                        if (sib !== targetBody) {
                            sib.classList.remove('show');
                            sib.previousElementSibling?.querySelector('.custom-toggle')?.classList.remove('open');
                        }
                    });

                    // Toggle current
                    if (isOpen) {
                        targetBody.classList.remove('show');
                        toggleBtn.classList.remove('open');
                    } else {
                        targetBody.classList.add('show');
                        toggleBtn.classList.add('open');
                    }
                });
            });
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/frontend/products.blade.php ENDPATH**/ ?>