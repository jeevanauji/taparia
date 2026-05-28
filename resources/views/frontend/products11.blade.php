 @extends('frontend.master')

 @section('title')
 Our Products
 @endsection

 @section('content')
 <style type="text/css">
     /* Enhanced Filter Section Styles */
     .pro-filter {
         background: #ffffff;
         border-radius: 12px;
         padding: 20px;
         position: sticky;
         top: 20px;
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

     .pro-filter h3::after {
         content: '';
         position: absolute;
         bottom: -6px;
         left: 0;
         width: 50px;
         height: 1px;
         border-radius: 2px;
         background: red;
         /* background: linear-gradient(90deg, #74bcc6, #5aa5b0); */
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
         content: '›';
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
         color: #edfdff;
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

     .accordion-collapse {
         display: none;
         transition: height 0.3s ease;
     }

     .accordion-collapse.show {
         display: block;
     }

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

    /* .section-title::after {
         content: '';
         position: absolute;
         bottom: 0;
         left: 50%;
         transform: translateX(-50%);
         width: 120px;
         height: 1px;
         background: red;
          background: linear-gradient(90deg, #74BCC6, #5aa5b0);
         border-radius: 2px;
     } */

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

     @media (max-width: 576px) {
         .product__lists .row {
             grid-template-columns: 1fr;
             gap: 12px;
         }
     }

     /* --- HERO SECTION FULL HEIGHT --- */
     .hero-section {
         position: relative;
         overflow: hidden;
         width: 100%;
         height: min(100vh, 450px);
         min-height: 400px;
         display: flex;
         align-items: stretch;
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
 </style>

 @php
 if (Str::startsWith(request()->path(), 'category/')) {
 $titleName = str_replace('-', ' ', Str::after(request()->path(), 'category/'));
 } elseif (Str::startsWith(request()->path(), 'sub-category/')) {
 $titleName = str_replace('-', ' ', Str::after(request()->path(), 'sub-category/'));
 } elseif (Str::startsWith(request()->path(), 'child-sub-category/')) {
 $titleName = str_replace('-', ' ', Str::after(request()->path(), 'child-sub-category/'));
 } else {
 $titleName = 'Our Products';
 }
 @endphp

 <div class="hero-section">
     <div class="videobanner">
         <div class="image-banner">
             @php
             if (Str::startsWith(request()->path(), 'category/')) {
             $bannerImage = 'frontend/images/' . str_replace(' ', '-', $titleName) . '.jpg';
             } else {
             $bannerImage = 'frontend/images/main_product_two.jpg';
             }
             @endphp

             <img data-aos="fade-up" src="{{ asset($bannerImage) }}" alt="Banner" class="img-fluid">
         </div>

     </div>
     <div class="bannertxt">
         <div class="hero-text">
             <h2 class="wow fadeInLeft hero-heading" style="
                font-size: 70px;
                font-weight: 600;
                margin-bottom: 10px;
                color: rgb(103 100 100);
            ">
                 EXPLORE TAPARIA'S RANGE.
             </h2>
             <p class="hero-subheading" style="font-size: clamp(22px, 6vw, 30px);
                margin-bottom: 10px;
                margin-top:-18px;
                color: #74BCC6;">Made for strength, comfort, and reliability.</p>

             <style>
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
                         font-size: 1.3rem !important;
                     }

                     .hero-subheading {
                         font-size: 0.95rem !important;
                         text-align: start !important;
                     }
                 }
             </style>
         </div>
     </div>
 </div>

 <nav aria-label="breadcrumb" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 15px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(116, 188, 198, 0.1); margin: 20px 0px 30px 50px; border: 1px solid rgba(116, 188, 198, 0.2);">
     <ol class="breadcrumb mb-0" style="margin: 0; padding: 0; list-style: none; display: flex; align-items: center; flex-wrap: wrap;">
         <li class="breadcrumb-item" style="display: flex; align-items: center;">
             <a href="{{ url('') }}" style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                 </svg>
                 Home
             </a>
         </li>
         <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
         <li class="breadcrumb-item" style="display: flex; align-items: center;">
             <a href="{{ url('products') }}" style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                 </svg>
                 Our Products
             </a>
         </li>
         @if(Str::startsWith(request()->path(), 'category/'))
         <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
         <li class="breadcrumb-item active" aria-current="page" style="display: flex; align-items: center;">
             <a href="{{ url('category/' . Str::slug($titleName)) }}" style="color: #ffffff; font-weight: 700; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%); box-shadow: 0 2px 8px rgba(116, 188, 198, 0.3); display: flex; align-items: center; border: 1px solid #74BCC6;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                 </svg>
                 {{ ucwords(strtolower($titleName)) }}
             </a>
         </li>
         @endif
         @if(Str::startsWith(request()->path(), 'sub-category/'))
         <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
         <li class="breadcrumb-item" style="display: flex; align-items: center;">
             <a href="{{ url('category/' . Str::slug($categoryName->name)) }}" style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                 </svg>
                 {{ ucwords(strtolower($categoryName->name)) }}
             </a>
         </li>
         <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
         <li class="breadcrumb-item active" aria-current="page" style="display: flex; align-items: center;">
             <a href="{{ url('sub-category/' . Str::slug($titleName)) }}" style="color: #ffffff; font-weight: 700; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%); box-shadow: 0 2px 8px rgba(116, 188, 198, 0.3); display: flex; align-items: center; border: 1px solid #74BCC6;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                 </svg>
                 {{ ucwords(strtolower($titleName)) }}
             </a>
         </li>
         @endif
         @if(Str::startsWith(request()->path(), 'child-sub-category/'))
         <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
         <li class="breadcrumb-item" style="display: flex; align-items: center;">
             <a href="{{ url('category/' . Str::slug($categoryName->name)) }}" style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                 </svg>
                 {{ ucwords(strtolower($categoryName->name)) }}
             </a>
         </li>
         <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
         <li class="breadcrumb-item" style="display: flex; align-items: center;">
             <a href="{{ url('sub-category/' . Str::slug($subCategoryName->name)) }}" style="color: #74BCC6; font-weight: 600; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; transition: all 0.3s ease; background: rgba(116, 188, 198, 0.1); border: 1px solid transparent; display: flex; align-items: center;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                 </svg>
                 {{ ucwords(strtolower($subCategoryName->name)) }}
             </a>
         </li>
         <li style="margin: 0 10px; color: #74BCC6; font-size: 20px; font-weight: bold;">›</li>
         <li class="breadcrumb-item active" aria-current="page" style="display: flex; align-items: center;">
             <a href="{{ url('child-sub-category/' . Str::slug($titleName)) }}" style="color: #ffffff; font-weight: 700; font-size: 18px; text-decoration: none; padding: 8px 15px; border-radius: 8px; background: linear-gradient(135deg, #74BCC6 0%, #5aa8b3 100%); box-shadow: 0 2px 8px rgba(116, 188, 198, 0.3); display: flex; align-items: center; border: 1px solid #74BCC6;">
                 <svg style="width: 18px; height: 18px; margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24">
                     <path d="M22.7 19.3l-4.2-4.2c1.1-2.1.7-4.7-1.1-6.4-1.8-1.8-4.5-2.2-6.6-1l2.2 2.2-2.1 2.1-2.2-2.2c-1.2 2.1-.8 4.8 1 6.6 1.7 1.7 4.3 2.2 6.4 1.1l4.2 4.2c.4.4 1 .4 1.4 0l.9-.9c.4-.4.4-1 0-1.4z" />
                 </svg>
                 {{ ucwords(strtolower($titleName)) }}
             </a>
         </li>
         @endif
     </ol>
 </nav>
 <div class="content-section">
     <div class="container-xl">
         <div class="row">
             <!-- Filter Section -->
             <div class="col-md-4">
                 <div class="pro-filter">
                     <h3>Products</h3>
                     <div class="filter-section">
                         <h4>Categories</h4>
                         <div class="accordion" id="mainCategories">
                             @foreach ($categories as $category)
                             <div class="accordion-item acc_layer1 {{ request()->is('category/' . Str::slug($category->name)) ? 'active-category' : '' }}">
                                 <h2 class="accordion-header d-flex  categoryidclick" id="headingCategory{{ $category->id }}">
                                     <a href="{{ url('category/' . Str::slug($category->name)) }}" class="main-title {{ request()->is('category/' . Str::slug($category->name)) ? 'active-category-link' : '' }}">
                                         {{ $category->name }}
                                     </a>
                                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory{{ $category->id }}" aria-expanded="false" aria-controls="collapseCategory{{ $category->id }}">
                                     </button>
                                 </h2>
                                 <div id="collapseCategory{{ $category->id }}" class="accordion-collapse collapse" aria-labelledby="headingCategory{{ $category->id }}" data-bs-parent="#mainCategories">
                                     <div class="accordion-body px-0 py-1">
                                         @php
                                         $categorySubCategories = $subCategories->where('categoryId', $category->id);
                                         @endphp
                                         @if ($categorySubCategories->isNotEmpty())
                                         <div class="accordion" id="subCategories{{ $category->id }}">
                                             @foreach ($categorySubCategories as $subCategory)
                                             <div class="accordion-item acc_layer2">
                                                 <h2 class="accordion-header d-flex" id="headingSubCategory{{ $subCategory->id }}">
                                                     <a href="{{ url('sub-category/' . Str::slug($subCategory->name)) }}" class="main-title subcategory-link {{ request()->is('sub-category/' . Str::slug($subCategory->name)) ? 'active-subcategory' : '' }}">
                                                         {{ $subCategory->name }}
                                                     </a>
                                                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSubCategory{{ $subCategory->id }}" aria-expanded="false" aria-controls="collapseSubCategory{{ $subCategory->id }}">
                                                     </button>
                                                 </h2>
                                                 <div id="collapseSubCategory{{ $subCategory->id }}" class="accordion-collapse collapse" aria-labelledby="headingSubCategory{{ $subCategory->id }}" data-bs-parent="#subCategories{{ $category->id }}">
                                                     <div class="accordion-body px-0 py-1">
                                                         @php
                                                         $subCategoryProducts = $products->where('subCategoryId', $subCategory->id);
                                                         @endphp
                                                         @if ($subCategoryProducts->isNotEmpty())
                                                         <ul class="list-unstyled mb-0">
                                                             @foreach ($subCategoryProducts as $product)
                                                             <li>
                                                                 <div class="form-check">
                                                                     <label class="form-check-label" for="product{{ $product->id }}">
                                                                         <a href="{{ url('product/' . Str::slug($product->productName)) }}" class="main-title">
                                                                             {{ $product->productName }}
                                                                         </a>
                                                                     </label>
                                                                 </div>
                                                             </li>
                                                             @endforeach
                                                         </ul>
                                                         @else
                                                         <p>No products found in this subcategory.</p>
                                                         @endif
                                                     </div>
                                                 </div>
                                             </div>
                                             @endforeach
                                         </div>
                                         @else
                                         @php
                                         $categoryProducts = $products->where('categoryId', $category->id);
                                         @endphp
                                         @if ($categoryProducts->isNotEmpty())
                                         <ul class="list-unstyled mb-0">
                                             @foreach ($categoryProducts as $product)
                                             <li>
                                                 <div class="form-check">
                                                     <label class="form-check-label" for="product{{ $product->id }}">
                                                         <a href="{{ url('product/' . Str::slug($product->productName)) }}" class="main-title">
                                                             {{ $product->productName }}
                                                         </a>
                                                     </label>
                                                     <input class="form-check-input" type="checkbox" value="" id="product{{ $product->id }}" />
                                                 </div>
                                             </li>
                                             @endforeach
                                         </ul>
                                         @else
                                         <p>No products found in this category.</p>
                                         @endif
                                         @endif
                                     </div>
                                 </div>
                             </div>
                             @endforeach
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Product Section -->
             <div class="col-md-8">
                 <div class="section-title-container" style="width: 100%; margin: 0 auto 30px;">
                     <h3 class="section-title">{{ $titleName }}</h3>
                 </div>
                 <div class="product__lists">
                     <div class="row">
                         @php if (Str::startsWith(request()->path(), 'category/')) { @endphp
                         @foreach ($subCategoriesWithChildSubCategories as $index => $subCategoryData)
                         <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%!important">
                             <div class="product-list-box">
                                 <div class="product-list-img" data-aos="fade-up">
                                     @if ($subCategoryData['subCategory']->subCategoryImage)
                                     <img data-aos="fade-up" src="{{ url($subCategoryData['subCategory']->subCategoryImage) }}" class="img-fluid" alt="{{ $subCategoryData['subCategory']->name }}" />
                                     @else
                                     <img data-aos="fade-up" src="{{ asset('frontend/images/default.jpg') }}" class="img-fluid" alt="Default Image" />
                                     @endif
                                 </div>
                                 <div class="subcateLists">
                                     <div>
                                         <a href="{{ url('sub-category/' . Str::slug($subCategoryData['subCategory']->name)) }}" style="text-decoration: none;">
                                             <h4 style="margin-top: 0px;">{{ $subCategoryData['subCategory']->name }}</h4>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @endforeach

                         @php } elseif (Str::startsWith(request()->path(), 'sub-category/')) { @endphp
                         @foreach ($childSubCategoriesWithProducts as $index => $childSubCategoryData)
                         <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%">
                             <div class="product-list-box">
                                 <div class="product-list-img" data-aos="fade-up">
                                     @if ($childSubCategoryData['childSubCategory']->childSubCategoryImage)
                                     <img data-aos="fade-up" src="{{ url($childSubCategoryData['childSubCategory']->childSubCategoryImage) }}" class="img-fluid" alt="{{ $childSubCategoryData['childSubCategory']->name }}" />
                                     @else
                                     <img data-aos="fade-up" src="{{ asset('frontend/images/default.jpg') }}" class="img-fluid" alt="Default Image" />
                                     @endif
                                 </div>
                                 <div class="subcateLists">
                                     <div>
                                         @php
                                         $products = $childSubCategoryData['productsBychildSubCategory'];
                                         $productChunks = $products->chunk(5);
                                         $totalProductChunks = $productChunks->count();
                                         @endphp
                                         @if($totalProductChunks > 0)
                                         <div class="subcate-slider" id="product-slider-{{ $index }}">
                                             <div class="subcate-slides" id="product-slides-{{ $index }}">
                                                 @foreach ($productChunks as $chunkIndex => $productChunk)
                                                 <div class="subcate-slide">
                                                     <!-- Heading Above Each Product List -->
                                                     <h4 class="mb-2">{{ $childSubCategoryData['childSubCategory']->name }}</h4>

                                                     <ul class="list-unstyled">
                                                         @foreach ($productChunk as $childSubCategoryProduct)
                                                         <li>
                                                             <a href="{{ url('product/' . Str::slug($childSubCategoryProduct->productName)) }}" style="white-space: nowrap;">
                                                                 {{ $childSubCategoryProduct->productName }}
                                                             </a>
                                                         </li>
                                                         @endforeach
                                                     </ul>
                                                 </div>
                                                 @endforeach
                                             </div>
                                         </div>
                                         @if($totalProductChunks > 1)
                                         <div class="subcate-pagination">
                                             <button class="pagination-btn" id="product-prev-{{ $index }}" disabled>‹</button>
                                             <span style="font-size: 0.8rem; color: #fff;">
                                                 <span id="product-current-{{ $index }}">1</span>/{{ $totalProductChunks }}
                                             </span>
                                             <button class="pagination-btn" id="product-next-{{ $index }}" {{ $totalProductChunks <= 1 ? 'disabled' : '' }}>›</button>
                                         </div>
                                         @endif
                                         @endif
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @endforeach

                         @php } elseif (Str::startsWith(request()->path(), 'child-sub-category/')) { @endphp
                         <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%">
                             <div class="product-list-box">
                                 <div class="product-list-img">
                                     <img data-aos="fade-up" src="{{ url($childSubCategoryData->childSubCategoryImage) }}" class="img-fluid" alt="{{ $childSubCategoryData->name }}" />
                                 </div>
                                 <div class="subcateLists">
                                     <div>
                                         <ul class="list-unstyled">
                                             @foreach ($productsByChildSubCategory as $childSubCategoryProduct)
                                             <li>
                                                 <a href="{{ url('product/' . Str::slug($childSubCategoryProduct->productName)) }}">
                                                     {{ $childSubCategoryProduct->productName }}
                                                 </a>
                                             </li>
                                             @endforeach
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         @php } else { @endphp
                         @foreach ($categories as $categoryData)
                         <div class="col-md-6 mt-3 mt-md-0 pb-3" style="width:100%">
                             <div class="product-list-box">
                                 <div class="product-list-img">
                                     @if ($categoryData->categoryImage)
                                     <img data-aos="fade-up" src="{{ url($categoryData->categoryImage) }}" class="img-fluid" alt="{{ $categoryData->name }}" />
                                     @else
                                     <img data-aos="fade-up" src="{{ asset('frontend/images/default.jpg') }}" class="img-fluid" alt="Default Image" />
                                     @endif
                                 </div>
                                 <div class="subcateLists">
                                     <div>
                                         <a href="{{ url('category/' . Str::slug($categoryData->name)) }}" style="text-decoration: none;">
                                             <h4 style="margin-top: 0px;">{{ $categoryData->name }}</h4>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @endforeach
                         @php } @endphp
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>

 @endsection

 @section('javaScript')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         // Remove conflicting CSS rule and add proper styles
         const style = document.createElement('style');
         style.textContent = `
        .accordion-collapse {
            display: none;
            transition: all 0.3s ease;
        }
        
        .accordion-collapse.show {
            display: block !important;
        }
    `;
         document.head.appendChild(style);

         // Initialize: Close all accordions except the active one
         const allAccordionItems = document.querySelectorAll('.accordion-item');
         allAccordionItems.forEach(item => {
             if (!item.classList.contains('active-category')) {
                 const collapseElement = item.querySelector('.accordion-collapse');
                 if (collapseElement) {
                     collapseElement.classList.remove('show');
                 }
             }
         });

         // Handle main category accordion button clicks
         document.querySelectorAll('#mainCategories > .accordion-item > .accordion-header > .accordion-button').forEach(button => {
             button.addEventListener('click', function(e) {
                 e.preventDefault();
                 e.stopPropagation();

                 const targetId = this.getAttribute('data-bs-target');
                 const targetCollapse = document.querySelector(targetId);

                 if (!targetCollapse) return;

                 // Check if THIS accordion is currently open
                 const isThisOpen = targetCollapse.classList.contains('show');

                 // Close ALL main category accordions
                 document.querySelectorAll('#mainCategories > .accordion-item > .accordion-collapse').forEach(collapse => {
                     collapse.classList.remove('show');
                     const accordionHeader = collapse.previousElementSibling;
                     const btn = accordionHeader ? accordionHeader.querySelector('.accordion-button') : null;
                     if (btn) btn.classList.add('collapsed');
                 });

                 // If THIS was closed, open it. If it was open, keep it closed.
                 if (!isThisOpen) {
                     targetCollapse.classList.add('show');
                     this.classList.remove('collapsed');
                 }
             });
         });

         // Handle subcategory accordion button clicks
         document.querySelectorAll('.accordion .accordion .accordion-button').forEach(button => {
             button.addEventListener('click', function(e) {
                 e.preventDefault();
                 e.stopPropagation();

                 const targetId = this.getAttribute('data-bs-target');
                 const targetCollapse = document.querySelector(targetId);

                 if (!targetCollapse) return;

                 // Find the parent subcategory accordion container
                 const parentSubCategoryAccordion = this.closest('.accordion[id^="subCategories"]');

                 if (!parentSubCategoryAccordion) return;

                 // Check if THIS subcategory accordion is currently open
                 const isThisOpen = targetCollapse.classList.contains('show');

                 // Close all subcategories within the same parent category
                 parentSubCategoryAccordion.querySelectorAll('.accordion-collapse').forEach(collapse => {
                     collapse.classList.remove('show');
                     const accordionHeader = collapse.previousElementSibling;
                     const btn = accordionHeader ? accordionHeader.querySelector('.accordion-button') : null;
                     if (btn) btn.classList.add('collapsed');
                 });

                 // If THIS was closed, open it. If it was open, keep it closed.
                 if (!isThisOpen) {
                     targetCollapse.classList.add('show');
                     this.classList.remove('collapsed');
                 }
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
                     } else {
                         button.classList.add('collapsed');
                     }
                 }
             }
         });
     });

     // Slider functionality
     const sectionTitle = document.querySelector('.section-title');
     if (sectionTitle) {
         sectionTitle.scrollIntoView({
             behavior: 'smooth',
             block: 'start'
         });
     }

     const subcateSliders = {};
     const productSliders = {};

     function nextSubcateSlide(index) {
         if (!subcateSliders[index]) {
             const slides = document.querySelectorAll(`#subcate-slides-${index} .subcate-slide`);
             if (slides.length) {
                 subcateSliders[index] = {
                     current: 0,
                     total: slides.length
                 };
             } else return;
         }
         if (subcateSliders[index].current < subcateSliders[index].total - 1) {
             subcateSliders[index].current++;
             updateSubcateSlide(index);
         }
     }

     function previousSubcateSlide(index) {
         if (!subcateSliders[index]) {
             const slides = document.querySelectorAll(`#subcate-slides-${index} .subcate-slide`);
             if (slides.length) {
                 subcateSliders[index] = {
                     current: 0,
                     total: slides.length
                 };
             } else return;
         }
         if (subcateSliders[index].current > 0) {
             subcateSliders[index].current--;
             updateSubcateSlide(index);
         }
     }

     function updateSubcateSlide(index) {
         const slidesContainer = document.getElementById(`subcate-slides-${index}`);
         const currentSpan = document.getElementById(`subcate-current-${index}`);
         const prevBtn = document.getElementById(`subcate-prev-${index}`);
         const nextBtn = document.getElementById(`subcate-next-${index}`);

         if (slidesContainer && subcateSliders[index]) {
             slidesContainer.style.transform = `translateX(-${subcateSliders[index].current * 100}%)`;

             if (currentSpan) currentSpan.textContent = subcateSliders[index].current + 1;
             if (prevBtn) prevBtn.disabled = subcateSliders[index].current === 0;
             if (nextBtn) nextBtn.disabled = subcateSliders[index].current === subcateSliders[index].total - 1;
         }
     }

     function nextProductSlide(index) {
         if (!productSliders[index]) {
             const slides = document.querySelectorAll(`#product-slides-${index} .subcate-slide`);
             if (slides.length) {
                 productSliders[index] = {
                     current: 0,
                     total: slides.length
                 };
             } else return;
         }
         if (productSliders[index].current < productSliders[index].total - 1) {
             productSliders[index].current++;
             updateProductSlide(index);
         }
     }

     function previousProductSlide(index) {
         if (!productSliders[index]) {
             const slides = document.querySelectorAll(`#product-slides-${index} .subcate-slide`);
             if (slides.length) {
                 productSliders[index] = {
                     current: 0,
                     total: slides.length
                 };
             } else return;
         }
         if (productSliders[index].current > 0) {
             productSliders[index].current--;
             updateProductSlide(index);
         }
     }

     function updateProductSlide(index) {
         const slidesContainer = document.getElementById(`product-slides-${index}`);
         const currentSpan = document.getElementById(`product-current-${index}`);
         const prevBtn = document.getElementById(`product-prev-${index}`);
         const nextBtn = document.getElementById(`product-next-${index}`);

         if (slidesContainer && productSliders[index]) {
             slidesContainer.style.transform = `translateX(-${productSliders[index].current * 100}%)`;

             if (currentSpan) currentSpan.textContent = productSliders[index].current + 1;
             if (prevBtn) prevBtn.disabled = productSliders[index].current === 0;
             if (nextBtn) nextBtn.disabled = productSliders[index].current === productSliders[index].total - 1;
         }
     }

     // Initialize pagination button event listeners
     document.querySelectorAll('.subcate-pagination .pagination-btn').forEach(button => {
         const idMatch = button.id.match(/(subcate|product)-(prev|next)-(\d+)/);
         if (idMatch) {
             const type = idMatch[1];
             const action = idMatch[2];
             const index = parseInt(idMatch[3]);

             button.addEventListener('click', () => {
                 if (type === 'subcate') {
                     if (action === 'prev') {
                         previousSubcateSlide(index);
                     } else {
                         nextSubcateSlide(index);
                     }
                 } else {
                     if (action === 'prev') {
                         previousProductSlide(index);
                     } else {
                         nextProductSlide(index);
                     }
                 }
             });
         }
     });

     // Initialize sliders
     document.querySelectorAll('.subcate-slider').forEach(slider => {
         const idMatch = slider.id.match(/(subcate|product)-slider-(\d+)/);
         if (idMatch) {
             const type = idMatch[1];
             const index = parseInt(idMatch[2]);

             if (type === 'subcate') {
                 updateSubcateSlide(index);
             } else {
                 updateProductSlide(index);
             }
         }
     });
 </script>


 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script>
     AOS.init();
 </script>
 @endsection