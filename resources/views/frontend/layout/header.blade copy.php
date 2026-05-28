<!-- Header Wrapper -->
<header class="main-header">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        html {
          scroll-behavior: smooth;
        }
        /* YOUR EXISTING STYLES - unchanged */
        .top-strip {
            background-color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .top-strip .social-icons a {
            color: #74BCC6;
        }

        .top-strip .search-bar {
            background: white;
            border: 1px solid #ccc;
        }

        .main-navbar {
            background-color: #74BCC6 ;
        }

        .main-navbar .navbar-container {
            max-width: 1320px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;



        }

        .main-navbar .nav-link {
            color: white !important;
            font-weight: bold;
            position: relative;
        }

        .main-navbar .nav-link::after {
            /* content: ""; */
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            /* background-color: white; */
            transition: width 0.3s;
        }

        .main-navbar .nav-link:hover::after {
            width: 100%;
        }

        .main-navbar .dropdown-menu {
            background-color: white;
            color: black;
            overflow: visible;
            word-break: break-word;
        }

        .main-navbar .dropdown-menu a {
            color: black;
            font-weight: bold;
        }

        .main-navbar .dropdown-menu a:hover {
            color: #74BCC6;
        }

        .main-navbar .dropdown-menu .dropdown-item {
            padding: 8px 15px;
            font-size: 0.95rem;
        }

        .nav-item.dropdown.position-static {
            position: relative !important;
        }

        .nav-item.dropdown.position-static>.dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.15s ease-in-out;
            min-width: 250px;
            z-index: 1050;
        }

        .nav-item.dropdown.position-static:hover>.dropdown-menu {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-item {
            white-space: nowrap;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dropdown-submenu>.dropdown-item::after {
            content: " ▸";
            float: right;
            font-weight: bold;
            color: #888;
            transition: transform 0.2s ease;
        }

        .dropdown-submenu:hover>.dropdown-item::after {
            transform: translateX(2px);
        }

        .dropdown-submenu>.dropdown-menu {
            position: absolute;
            top: -80px;
            left: 100%;
            margin-top: -40px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.15s ease-in-out;
            min-width: auto;
            width: max-content;
            max-width: 320px;
            z-index: 1060;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .dropdown-submenu:hover>.dropdown-menu {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

          #productsDropdownDesktop.dropdown-toggle::after {
        display: none !important;
    }

    /* Remove Bootstrap's default dropdown arrow styling */
    .nav-item.dropdown .nav-link.dropdown-toggle::after {
        display: none !important;
    }

        /* Mobile-specific styles for dropdown arrows */
        @media (max-width: 991.98px) {

            /* Disable Bootstrap dropdown behavior on mobile */
            .nav-item.position-static:not(.dropdown) .dropdown-menu {
                position: static !important;
                transform: none !important;
                margin-top: 0 !important;
                opacity: 1 !important;
                visibility: visible !important;
                pointer-events: auto !important;
                display: none;
                border: none;
                box-shadow: none;
                background-color: #333;
                padding: 0;
            }

            .nav-item.position-static:not(.dropdown) .dropdown-menu.show {
                display: block !important;
            }

            /* Products dropdown with separate text and arrow */
            .mobile-dropdown-wrapper {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
            }

            .mobile-dropdown-text {
                color: white !important;
                text-decoration: none;
                flex: 1;
                padding: 0.5rem 0;
            }

            .mobile-dropdown-arrow {
                color: white;
                background: none;
                border: none;
                font-size: 1.2rem;
                padding: 0.5rem;
                cursor: pointer;
                transition: transform 0.3s ease;
            }

            .mobile-dropdown-arrow.rotated {
                transform: rotate(180deg);
            }

            .mobile-dropdown-arrow-Investor {
                background: none;
                border: none;
                font-size: 1.2rem;
            }

            /* Submenu item wrapper for categories and subcategories */
            .mobile-submenu-wrapper {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
            }

            .mobile-submenu-text {
                color: black;
                text-decoration: none;
                flex: 1;
                padding: 8px 0;
            }

            .mobile-submenu-arrow {
                color: #666;
                background: none;
                border: none;
                font-size: 1rem;
                padding: 8px;
                cursor: pointer;
                transition: transform 0.3s ease;
            }

            .mobile-submenu-arrow.rotated {
                transform: rotate(180deg);
            }

            .dropdown-submenu .dropdown-menu {
                margin-top: 10px;
                margin-left: 15px;
                position: static !important;
                opacity: 1 !important;
                visibility: visible !important;
                pointer-events: auto !important;
                display: none;
                box-shadow: none;
                border: none;
                background-color: #f8f9fa;
                border-left: 2px solid #74BCC6;
                transform: none !important;
            }

            .dropdown-submenu .dropdown-menu.show {
                display: block !important;
            }

            /* Prevent Bootstrap dropdown auto-behavior on mobile */
            @media (max-width: 991.98px) {

                .dropdown-menu {
                    position: static !important;
                    float: none !important;
                    display: none;
                }

                .dropdown-menu.show {
                    display: block !important;
                }

                .nav-item.dropdown.position-static>.dropdown-menu {
                    position: static !important;
                    transform: none !important;
                    margin-top: 0 !important;
                }


            }

            .dropdown-submenu>.dropdown-menu>.dropdown-item {
                padding-left: 25px;
            }

            /* Hide desktop arrows on mobile */
            .dropdown-submenu>.dropdown-item::after {
                display: none;
            }
        }

        @media (max-width: 767.98px) {
            .top-strip {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .top-strip .search-bar,
            .top-strip .social-icons {
                display: none !important;
            }

            .main-navbar .navbar-container {
                margin-right: 10px;
                margin-top: -95px;
            }

            .main-navbar {
                background-color: white;
            }

            #productsDropdownDesktop {
                font-size: 18px !important;
            }



            /* Mobile menu background and text colors */


            .main-navbar .navbar-collapse {
                background-color: white !important;
                /* White background for collapsed menu */
            }

            .main-navbar .nav-link {
                color: black !important;
                /* Black text for nav links */
                font-weight: bold !important;
                /* Add this line */

            }

            .main-navbar .navbar-nav {
                background-color: white !important;
                /* White background for nav list */
            }

            /* Mobile dropdown styling */
            .mobile-dropdown-text {
                color: black !important;
                /* Black text for mobile dropdown text */
                font-weight: bold !important;
                font-size: 18px !important;
            }

            .mobile-dropdown-arrow {
                color: black !important;
                /* Black color for dropdown arrows */
            }

            .mobile-submenu-text {
                color: black !important;
                /* Black text for submenu items */
            }

            .mobile-submenu-arrow {
                color: black !important;
                /* Black color for submenu arrows */
            }

            /* Remove the mobile-black-bg class effect on mobile */
            .mobile-black-bg {
                background-color: white !important;
            }

            /* Dropdown menus in mobile */
            .dropdown-menu {
                background-color: white !important;
                color: black !important;
            }

            .dropdown-item {
                color: black !important;
            }

            .dropdown-item:hover {
                color: #74BCC6 !important;
                /* Keep the hover color */
                background-color: #f8f9fa !important;
            }





            .search-bar {
                width: 100%;
            }

            .search-bar input {
                width: 100%;
            }

            .mobile-black-bg {
                background-color: black !important;
            }
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.05);
        }

        .social-icons a {
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: black;
        }

        .search-bar input {
            border-radius: 0.375rem 0 0 0.375rem;
        }

        .search-bar button {
            border-radius: 0 0.375rem 0.375rem 0;
            background-color: #74BCC6;
            color: #111;
            border: none;
        }

        .search-bar button:hover {
            background-color: white;
        }

        @media (max-width: 767.98px) {
            .dropdown-menu-Investors {
                background-color: #ffffff;
                list-style: none;
                padding: 1rem;
                margin: 0;
                border: 1px solid #ddd;
                border-radius: 0.5rem;
                position: absolute;
                top: 100%;
                left: 5%;
                width: 90%;
                z-index: 1050;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                /* Add gap between list items */
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
                /* adjust spacing as needed */
                padding: 0.5rem;
                cursor: pointer;
                transition: transform 0.3s ease;
            }


            /* Hide desktop arrows on mobile */
             .main-navbar .nav-link::after {
                display: none;
            }
        }



        /* MOBILE: Show the button */
        @media (max-width: 767.98px) {
            .mobile-dropdown-arrow-Investor {
                display: inline-block;
            }
        }

        /* LAPTOP & UP: Hide the button */
        @media (min-width: 768px) {
            .mobile-dropdown-arrow-Investor {
                display: none;
            }
        }

        .dnone {
            display: none;
        }




      /* Add underline hover effect for all menu items on desktop */
@media (min-width: 992px) {
    .main-navbar .nav-link {
        position: relative;
    }

    .main-navbar .nav-link::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 0%;
        height: 1px;
        background-color: white;
        transition: width 0.3s ease;
    }

    .main-navbar .nav-link:hover::after {
        width: 100%;
    }

    /* Also add hover effect for dropdown items */
    .dropdown-menu .dropdown-item {
        position: relative;
    }

    .dropdown-menu .dropdown-item::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 15px;
        right: 15px;
        width: 0%;
        height: 1px;
        background-color: #74BCC6;
        transition: width 0.3s ease;
    }

    .dropdown-menu .dropdown-item:hover::before {
        width: calc(100% - 30px);
    }
}
/*.nav-link.active::after {
  content: "⚙️";
  margin-left: 6px;
  font-size: 16px;
  vertical-align: middle;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}*/

@media (min-width: 992px) {
    .mega-menu-container {
        position: static !important;
    }

    .mega-menu {
        position: absolute;
        top: calc(100% - 10px); /* Move up by 30px */
        left: 0;
        width: 100%;
        background: white;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-15px);
        transition: all 0.4s ease;
        z-index: 1000;
        border-top: 3px solid #74BCC6;
    }

    .mega-menu-container:hover .mega-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .mega-menu-content {
        max-width: 1320px;
        margin: 0 auto;
        display: flex;
        padding: 2.5rem;
        gap: 3rem;
        min-height: 400px;
    }

    .mega-menu-column {
        flex: 1;
        min-width: 280px;
        border-right: 1px solid #eee;
        padding-right: 2rem;
    }

    .mega-menu-column:last-child {
        border-right: none;
        padding-right: 0;
    }

    .category-group {
       position: relative;
    }

    .category-group:last-child {
        margin-bottom: 0;
    }

    .mega-menu-header {
        display: block;
        font-weight: 700;
        color: #333;
        text-decoration: none;
        padding: 0.75rem 0;
        border-bottom: 2px solid #74BCC6;
        margin-bottom: 1rem;
        font-size: 1rem;
        letter-spacing: 0.5px;
        transition: color 0.3s ease;
        cursor: pointer;
    }

    .mega-menu-header:hover {
        color: #74BCC6;
    }

    /* CRITICAL: Hide subcategory lists by default */
    .mega-menu-list {
        list-style: none;
        padding: 0;
        margin: 0;
        opacity: 0;
        visibility: hidden;
        max-height: 0;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    /* Show subcategories only when category is hovered */
    .category-group:hover .mega-menu-list {
        opacity: 1;
        visibility: visible;
        max-height: 500px;
    }

    .mega-menu-list li {
        margin-bottom: 0.4rem;
    }

    .mega-menu-list a {
        color: #666;
        text-decoration: none;
        display: block;
        padding: 0.4rem 0;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        line-height: 1.4;
        position: relative;
    }

    .mega-menu-list a:hover {
        color: #74BCC6;
        padding-left: 0.75rem;
    }

    .mega-menu-list a::before {
        content: "";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 1px;
        background-color: #74BCC6;
        transition: width 0.3s ease;
    }

    .mega-menu-list a:hover::before {
        width: 0.5rem;
    }

    .view-all-link {
        font-weight: 600;
        color: #74BCC6 !important;
        border-top: 1px solid #eee;
        margin-top: 0.5rem;
        padding-top: 0.75rem !important;
    }

    .view-all-link:hover {
        background-color: #f8f9fa;
    }

    /* Disable Bootstrap dropdown behavior for mega menu on desktop */
    .mega-menu-container .dropdown-menu {
        display: none !important;
    }

    /* Ensure mega menu is hidden by default */
    .mega-menu-container .mega-menu {
        display: block;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    .mega-menu-container:hover .mega-menu {
        pointer-events: auto;
    }
}

/* Mobile - keep existing dropdown styles */
@media (max-width: 991.98px) {
    .mega-menu {
        display: none !important;
    }
    
    /* Keep your existing mobile styles */
    .mega-menu-list {
        opacity: 1 !important;
        visibility: visible !important;
        max-height: none !important;
    }
}

    </style>
<a href="{{ url('downloads') }}"
   target="_blank"
   style="
        height: fit-content;
        position: fixed;
        top: 40%;
        right: 0;
        transform: translateY(-50%);
        background-color: #74bcc6;
        color: #ffffff;
        padding: 16px 12px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px color:rgb(103, 100, 100);;
        z-index: 9999;
        writing-mode: vertical-rl;
        text-orientation: mixed;
        white-space: nowrap;
        outline: none;
   "
   onmouseover="this.style.backgroundColor='rgb(103, 100, 100)'; this.style.boxShadow='0 6px 16px rgb(103, 100, 100)'"
   onmouseout="this.style.backgroundColor='#74bcc6'; this.style.boxShadow='0 4px 12px rgb(103, 100, 100)'"
   onfocus="this.style.outline='3px solid black'; this.style.outlineOffset='4px'"
   onblur="this.style.outline='none'">

   <div style="display: flex; align-items: center; justify-content: center; position: relative; gap:10px;">
       <span style="font-size: 12px;">DOWNLOAD CATALOGUE</span>
       <span style="display: inline-block; font-size: 28px; color: #ffffff; ">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 24 24" style="display: block; rotate: 90deg;">
            <path d="M12 16a1 1 0 0 1-.707-.293l-4-4a1 1 0 1 1 1.414-1.414L11 12.586V4a1 1 0 1 1 2 0v8.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-4 4A1 1 0 0 1 12 16zm-7 4a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v1h12v-1a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1H5z"/>
        </svg>
       </span>
   </div>
</a>


<a href="{{ asset('frontend/images/pricelist.pdf') }}"
   download="pricelist.pdf"
   style="
        height: fit-content;
        position: fixed;
        top: 75%;
        right: 0;
        transform: translateY(-50%);
        background-color: #74bcc6;
        color: #ffffff;
        padding: 16px 12px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgb(103, 100, 100);
        z-index: 9999;
        writing-mode: vertical-rl;
        text-orientation: mixed;
        white-space: nowrap;
        outline: none;
   "
   onmouseover="this.style.backgroundColor='rgb(103, 100, 100)'; this.style.boxShadow='0 6px 16px rgb(103, 100, 100)'"
   onmouseout="this.style.backgroundColor='#74bcc6'; this.style.boxShadow='0 4px 12px rgb(103, 100, 100)'"
   onfocus="this.style.outline='3px solid black'; this.style.outlineOffset='4px'"
   onblur="this.style.outline='none'">
   
   <div style="display: flex; align-items: center; justify-content: center; position: relative; gap:10px;">
       <span style="font-size: 12px;">DOWNLOAD PRICE</span>
       <span style="display: inline-block; font-size: 28px; color: #ffffff; ">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 24 24" style="display: block; rotate: 90deg;">
            <path d="M12 16a1 1 0 0 1-.707-.293l-4-4a1 1 0 1 1 1.414-1.414L11 12.586V4a1 1 0 1 1 2 0v8.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-4 4A1 1 0 0 1 12 16zm-7 4a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v1h12v-1a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1H5z"/>
        </svg>
       </span>
   </div>
</a>

<!-- Keyframe animation (must be added somewhere on your page, like in <style>) -->
<style>
@keyframes zoomShadowPulse {
    0%, 100% {
        transform: translateY(-50%) scale(1);
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }
    50% {
        transform: translateY(-50%) scale(1.08);
        box-shadow: 0 8px 20px rgba(4, 69, 124, 0.5); /* strong bluish glow */
    }
}
</style>


<!-- Animation keyframes (must be in a <style> tag somewhere on your page) -->
<style>
    @keyframes zoomPulse {
        0%, 100% {
            transform: translateY(-50%) scale(1);
        }
        50% {
            transform: translateY(-50%) scale(1.1);
        }
    }
</style>


    <!-- Top Blue Strip -->
    <div class="top-strip">
        <a class="navbar-brand" href="{{ url('') }}">
            <img src="{{ asset('frontend/images/tapariya-logo.svg') }}" alt="Taparia Logo" style="height: 55px;">
        </a>
        <div class="d-flex align-items-center flex-wrap gap-3 testing">
            <div class="d-flex gap-3 social-icons">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <form class="d-flex search-bar" role="search" method="GET" action="{{ url('search') }}">
                <input class="form-control border-0" name="q" type="search" placeholder="e.g. Knives"
                    aria-label="Search">
                <button class="btn text-white" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    <!-- Bottom Black Navbar -->
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="navbar-container">
        <button class="navbar-toggler" type="button" id="mobileMenuToggle" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mobile-black-bg">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}"  href="{{ url('about-us') }}">About Us</a></li>

                <!-- Products Mega Menu -->
                <li class="nav-item mega-menu-container position-static">
                    <!-- Desktop version -->
                    <a class="nav-link dropdown-toggle d-none d-lg-block" href="{{ url('products') }}" role="button"
                        id="productsDropdownDesktop" aria-expanded="false">
                        Products
                    </a>

                    <!-- Mobile version with separate text and arrow -->
                    <div class="d-lg-none mobile-dropdown-wrapper">
                        <a href="{{ url('products') }}" class="mobile-dropdown-text">Products</a>
                        <button class="mobile-dropdown-arrow" id="productsDropdownMobile" aria-expanded="false">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>

                    <!-- Desktop Mega Menu -->
                    <div class="mega-menu d-none d-lg-block">
                        <div class="mega-menu-content">
                            @php
                                $totalCategories = $categories->count();
                                $columnsCount = 3;
                                $categoriesPerColumn = ceil($totalCategories / $columnsCount);
                                $categoryChunks = $categories->chunk($categoriesPerColumn);
                            @endphp
                            
                            @foreach($categoryChunks as $chunk)
                            <div class="mega-menu-column">
                                @foreach($chunk as $category)
                                <div class="category-group" data-category-id="{{ $category->id }}">
                                    <a href="{{ url('category/' . \Illuminate\Support\Str::slug($category->name)) }}" 
                                       class="mega-menu-header">{{ strtoupper($category->name) }}</a>
                                    
                                    @if($category->subCategories && $category->subCategories->count())
                                    <ul class="mega-menu-list">
                                        @foreach($category->subCategories->take(10) as $subCategory)
                                        <li><a href="{{ url('sub-category/' . \Illuminate\Support\Str::slug($subCategory->name)) }}">{{ $subCategory->name }}</a></li>
                                        @endforeach
                                        @if($category->subCategories->count() > 10)
                                        <li><a href="{{ url('category/' . \Illuminate\Support\Str::slug($category->name)) }}" class="view-all-link">View All →</a></li>
                                        @endif
                                    </ul>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Mobile dropdown menu (existing structure) -->
                    <ul class="dropdown-menu shadow d-lg-none" aria-labelledby="productsDropdownMobile">
                        @foreach ($categories as $category)
                            <li class="dropdown-submenu">
                                @if (!empty($category->subCategories) && $category->subCategories->count())
                                    <!-- Category with subcategories - Mobile version -->
                                    <div class="mobile-submenu-wrapper">
                                        <a href="{{ url('category/' . \Illuminate\Support\Str::slug($category->name)) }}"
                                            class="mobile-submenu-text">
                                            {{ $category->name }}
                                        </a>
                                        <button class="mobile-submenu-arrow" data-category="{{ $category->name }}">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                @else
                                    <!-- Category without subcategories -->
                                    <a class="dropdown-item"
                                        href="{{ url('category/' . \Illuminate\Support\Str::slug($category->name)) }}">
                                        {{ $category->name }}
                                    </a>
                                @endif

                                @if (!empty($category->subCategories) && $category->subCategories->count())
                                    <ul class="dropdown-menu">
                                        @foreach ($category->subCategories as $subCategory)
                                            <li class="dropdown-submenu">
                                                @if (!empty($subCategory->childSubCategories) && $subCategory->childSubCategories->count())
                                                    <!-- Subcategory with child subcategories - Mobile version -->
                                                    <div class="mobile-submenu-wrapper">
                                                        <a href="{{ url('sub-category/' . \Illuminate\Support\Str::slug($subCategory->name)) }}"
                                                            class="mobile-submenu-text">
                                                            {{ $subCategory->name }}
                                                        </a>
                                                        <button class="mobile-submenu-arrow"
                                                            data-subcategory="{{ $subCategory->name }}">
                                                            <i class="fas fa-chevron-down"></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    <!-- Subcategory without child subcategories -->
                                                    <a class="dropdown-item"
                                                        href="{{ url('sub-category/' . \Illuminate\Support\Str::slug($subCategory->name)) }}">
                                                        {{ $subCategory->name }}
                                                    </a>
                                                @endif

                                                @if (!empty($subCategory->childSubCategories) && $subCategory->childSubCategories->count())
                                                    <ul class="dropdown-menu">
                                                        @foreach ($subCategory->childSubCategories as $child)
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ url('child-sub-category/' . \Illuminate\Support\Str::slug($child->name)) }}">
                                                                    {{ $child->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Investors Desk -->
                <li class="nav-item dropdown d-flex" style="justify-content: space-between;">
                    <a class="nav-link dropdown-toggle" href="{{ url('investors-desk') }}">Investors Desk</a>
                    <div style="display: flex; justify-content: right;">
                        <button class="mobile-dropdown-arrow-Investor" id="InvestorsDropdownMobile"
                            aria-expanded="false">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul class="dropdown-menu dnone" id="InvestorsDropdownMobile-menu">
                        <li><a class="dropdown-item"
                                href="{{ url('investors-desk-reports/shareholding-pattern') }}">Shareholding
                                Pattern</a></li>
                        <li><a class="dropdown-item"
                                href="{{ url('investors-desk-reports/annual-reports') }}">Annual Reports</a></li>
                        <li><a class="dropdown-item"
                                href="{{ url('investors-desk-reports/corporate-governance') }}">Corporate
                                Governance</a></li>
                        <li><a class="dropdown-item"
                                href="{{ url('investors-desk-reports/financial-results') }}">Financial Results</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('investors-desk-reports/clause-47') }}">Clause
                                47</a></li>
                        <li><a class="dropdown-item"
                                href="{{ url('investors-desk-reports/investor-information') }}">Investor Info</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="{{ url('investors-desk-reports/general-meetings') }}">General Meetings</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link {{ Request::is('downloads') ? 'active' : '' }}"  href="{{ url('downloads') }}">Downloads</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('distributors') ? 'active' : '' }}" href="{{ url('distributors') }}">Distributors</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}"  href="{{ url('contact-us') }}">Contact Us</a></li>
            </ul>
            <div class="nav-indicator" id="navIndicator"></div>
        </div>
    </div>
</nav>

</header>
 <!-- Required CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // FIXED: Proper mobile menu toggle functionality
        const mobileToggleBtn = document.getElementById('mobileMenuToggle');
        const mobileCloseBtn = document.getElementById('mobileMenuClose');
        const mainNavbar = document.getElementById('mainNavbar');
        const bsCollapse = new bootstrap.Collapse(mainNavbar, { toggle: false });

        // Toggle menu open/close
        function toggleMobileMenu() {
            if (mainNavbar.classList.contains('show')) {
                bsCollapse.hide();
                mobileToggleBtn.setAttribute('aria-expanded', 'false');
            } else {
                bsCollapse.show();
                mobileToggleBtn.setAttribute('aria-expanded', 'true');
            }
        }

        // Close menu function
        function closeMobileMenu() {
            bsCollapse.hide();
            mobileToggleBtn.setAttribute('aria-expanded', 'false');
            
            // Close all dropdowns when menu closes
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
            document.querySelectorAll('.mobile-dropdown-arrow.rotated, .mobile-submenu-arrow.rotated').forEach(arrow => {
                arrow.classList.remove('rotated');
            });
        }

        // Event listeners
        mobileToggleBtn.addEventListener('click', toggleMobileMenu);
        mobileCloseBtn.addEventListener('click', closeMobileMenu);

        // Close menu when clicking on nav links (mobile only)
        if (window.innerWidth <= 991) {
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!this.classList.contains('dropdown-toggle')) {
                        setTimeout(closeMobileMenu, 300);
                    }
                });
            });
        }

        // Close menu when clicking outside (mobile only)
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 991 && mainNavbar.classList.contains('show')) {
                if (!mainNavbar.contains(e.target) && !mobileToggleBtn.contains(e.target)) {
                    closeMobileMenu();
                }
            }
        });

        // Desktop Products mega menu - disable Bootstrap dropdown
        const productsDropdownDesktop = document.getElementById('productsDropdownDesktop');
        if (productsDropdownDesktop) {
            productsDropdownDesktop.addEventListener('click', function (e) {
                if (window.innerWidth > 991) {
                    // Mega menu is handled by CSS hover
                }
            });
            
            // Remove Bootstrap dropdown attributes on desktop
            if (window.innerWidth > 991) {
                productsDropdownDesktop.removeAttribute('data-bs-toggle');
            }
        }

        // Progressive hover effect for categories (desktop only)
        if (window.innerWidth > 991) {
            document.querySelectorAll('.category-group').forEach(function(categoryGroup) {
                const header = categoryGroup.querySelector('.mega-menu-header');
                const subList = categoryGroup.querySelector('.mega-menu-list');
                
                if (header && subList) {
                    let hoverTimeout;
                    
                    categoryGroup.addEventListener('mouseenter', function() {
                        clearTimeout(hoverTimeout);
                        setTimeout(() => {
                            subList.style.opacity = '1';
                            subList.style.visibility = 'visible';
                            subList.style.maxHeight = '500px';
                        }, 100);
                    });
                    
                    categoryGroup.addEventListener('mouseleave', function() {
                        hoverTimeout = setTimeout(() => {
                            subList.style.opacity = '0';
                            subList.style.visibility = 'hidden';
                            subList.style.maxHeight = '0';
                        }, 200);
                    });
                }
            });
        }

        // Mobile Products dropdown functionality
        const productsDropdownMobile = document.getElementById('productsDropdownMobile');
        if (productsDropdownMobile) {
            const productsMenu = productsDropdownMobile.closest('.position-static').querySelector('.dropdown-menu');

            productsDropdownMobile.addEventListener('click', function (e) {
                e.stopPropagation();

                if (window.innerWidth <= 991) {
                    const isOpen = productsMenu.classList.contains('show');

                    // Close all other open submenus first
                    document.querySelectorAll('.dropdown-submenu .dropdown-menu.show').forEach(function (openSubmenu) {
                        openSubmenu.classList.remove('show');
                    });
                    document.querySelectorAll('.mobile-submenu-arrow.rotated').forEach(function (rotatedArrow) {
                        rotatedArrow.classList.remove('rotated');
                    });

                    productsMenu.classList.toggle('show');
                    productsDropdownMobile.classList.toggle('rotated');
                    productsDropdownMobile.setAttribute('aria-expanded', !isOpen);
                }
            });
        }

        // Mobile submenu arrows for categories
        document.querySelectorAll('.mobile-submenu-arrow[data-category]').forEach(function (arrow) {
            arrow.addEventListener('click', function (e) {
                e.stopPropagation();

                if (window.innerWidth <= 991) {
                    const parentSubmenu = arrow.closest('.dropdown-submenu');
                    const submenu = parentSubmenu.querySelector(':scope > .dropdown-menu');

                    if (submenu) {
                        const isOpen = submenu.classList.contains('show');

                        // Close all sibling submenus at the same level
                        const parentDropdown = parentSubmenu.parentElement;
                        parentDropdown.querySelectorAll(':scope > .dropdown-submenu > .dropdown-menu.show').forEach(function (siblingSubmenu) {
                            if (siblingSubmenu !== submenu) {
                                siblingSubmenu.classList.remove('show');
                            }
                        });
                        parentDropdown.querySelectorAll(':scope > .dropdown-submenu .mobile-submenu-arrow.rotated').forEach(function (siblingArrow) {
                            if (siblingArrow !== arrow) {
                                siblingArrow.classList.remove('rotated');
                            }
                        });

                        // Toggle current submenu
                        submenu.classList.toggle('show');
                        arrow.classList.toggle('rotated');
                    }
                }
            });
        });

        // Mobile submenu arrows for subcategories
        document.querySelectorAll('.mobile-submenu-arrow[data-subcategory]').forEach(function (arrow) {
            arrow.addEventListener('click', function (e) {
                e.stopPropagation();

                if (window.innerWidth <= 991) {
                    const parentSubmenu = arrow.closest('.dropdown-submenu');
                    const submenu = parentSubmenu.querySelector(':scope > .dropdown-menu');

                    if (submenu) {
                        const isOpen = submenu.classList.contains('show');

                        // Close all sibling submenus at the same level
                        const parentDropdown = parentSubmenu.parentElement;
                        parentDropdown.querySelectorAll(':scope > .dropdown-submenu > .dropdown-menu.show').forEach(function (siblingSubmenu) {
                            if (siblingSubmenu !== submenu) {
                                siblingSubmenu.classList.remove('show');
                            }
                        });
                        parentDropdown.querySelectorAll(':scope > .dropdown-submenu .mobile-submenu-arrow.rotated').forEach(function (siblingArrow) {
                            if (siblingArrow !== arrow) {
                                siblingArrow.classList.remove('rotated');
                            }
                        });

                        // Toggle current submenu
                        submenu.classList.toggle('show');
                        arrow.classList.toggle('rotated');
                    }
                }
            });
        });

        // Investors Desk dropdown
        document.getElementById('InvestorsDropdownMobile').addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelector('#InvestorsDropdownMobile-menu').classList.toggle('dnone');
        });

        // Handle window resize
        window.addEventListener('resize', function () {
            const productsDropdownContainer = document.querySelector('.mega-menu-container');

            if (window.innerWidth > 991) {
                // Remove Bootstrap dropdown attributes for desktop mega menu
                if (productsDropdownDesktop) {
                    productsDropdownDesktop.removeAttribute('data-bs-toggle');
                }

                // Reset mobile states when switching to desktop
                document.querySelectorAll('.dropdown-menu.show').forEach(function (submenu) {
                    submenu.classList.remove('show');
                });
                document.querySelectorAll('.mobile-dropdown-arrow.rotated, .mobile-submenu-arrow.rotated').forEach(function (arrow) {
                    arrow.classList.remove('rotated');
                });
                
                // Close mobile menu if open
                closeMobileMenu();
            } else {
                // Re-enable Bootstrap dropdown for mobile if needed
                if (productsDropdownDesktop) {
                    productsDropdownDesktop.setAttribute('data-bs-toggle', 'dropdown');
                }
            }
        });

        // Escape key to close mobile menu
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mainNavbar.classList.contains('show')) {
                closeMobileMenu();
            }
        });
    });
</script>

