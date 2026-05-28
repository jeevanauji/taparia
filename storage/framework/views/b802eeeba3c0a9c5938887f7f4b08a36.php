
<!-- Header Wrapper -->
<header class="main-header" style="position: fixed; width: 100%; top: 0; z-index: 1030;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* =======================================================
   🟦 TOP STRIP - Main Header Section
   ======================================================= */

        .top-strip {
            background-color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        /* ===============================
   🔹 Logo
   =============================== */
        .top-strip .navbar-brand img {
            height: 55px;
            transition: transform 0.3s ease;
        }

        .top-strip .navbar-brand img:hover {
            transform: scale(1.05);
        }
ś
        /* ============================ś===
   🔹 Social Iconsś
   =============================== */
        .top-strip .social-icons {
            display: flex;
            gap: 1rem;
        }

        .top-strip .social-icons a {
            color: #000;
            font-size: 1.2rem;

            transition: color 0.3s ease;
        }

        .top-strip .social-icons a:hover {
            color: black;
        }

        /* ===============================
   🔹 Download Buttons in Header
   =============================== 
.top-strip .download-buttons {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.top-strip .download-buttons a {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    background-color: #74BCC6;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.top-strip .download-buttons a:hover {
    background-color: rgb(103, 100, 100);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.top-strip .download-buttons svg {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
}

 Mobile - Hide text, show only icons 
@media (max-width: 991.98px) {
    .top-strip .download-buttons a span {
        display: none;
    }
    
    .top-strip .download-buttons a {
        padding: 8px;
        min-width: 36px;
        justify-content: center;
    }
}*/
       /* ===============================
   🔹 Sticky Side Download Buttons - FIXED VERSION
   =============================== */
.side-download-buttons {
    position: fixed;
    right: 0;
    top: 60%;
    transform: translateY(-50%);
    z-index: 999;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Base button styles */
.side-download-btn {
    display: flex;
    align-items: center;
    color: white !important;
    text-decoration: none !important;
    border-radius: 25px 0 0 25px;
    padding: 12px;
    width: 200px;
    height: 50px;
    overflow: hidden;
    box-shadow: -2px 2px 10px rgba(0, 0, 0, 0.15);
    white-space: nowrap;
    position: relative;
    right: -160px; /* Only 40px visible initially */
    transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55) !important;
}

/* Individual button colors */
.catalogue-btn {
    background-color: #74BCC6 !important;
}

.price-list-btn {
    background-color: #74BCC6 !important;
}

/* CRITICAL: Expanded state using !important to override */
.side-download-btn:hover,
.side-download-btn.expand {
    transform: translateX(-160px) !important; /* Moves fully into view */
    box-shadow: -4px 4px 15px rgba(0, 0, 0, 0.25) !important;
}

.side-download-btn svg {
    width: 22px;
    height: 22px;
    flex-shrink: 0;
    transition: transform 0.3s ease;
    color: #ffffff;
}

.side-download-btn:hover svg,
.side-download-btn.expand svg {
    transform: scale(1.1) rotate(5deg);
    color: #ffffff;
}

.side-download-btn span {
    margin-left: 12px;
    font-size: 14px;
    font-weight: 600;
    color: #ffffff;
    opacity: 1;
    transition: opacity 0.3s ease;
}

/* Tablet */
@media (max-width: 1024px) {
    .side-download-buttons {
        gap: 12px;
    }

    .side-download-btn {
        width: 180px;
        right: -140px;
    }

    .side-download-btn:hover,
    .side-download-btn.expand {
        transform: translateX(-140px) !important;
    }
}

/* Mobile */
@media (max-width: 768px) {
    .side-download-buttons {
        gap: 10px;
        top: 50%;
    }

    .side-download-btn {
        width: 160px;
        height: 45px;
        padding: 10px;
        right: -120px;
    }

    .side-download-btn:hover,
    .side-download-btn.expand {
        transform: translateX(-120px) !important;
    }

    .side-download-btn svg {
        width: 20px;
        height: 20px;
    }

    .side-download-btn span {
        font-size: 13px;
    }
}

/* Small Mobile */
@media (max-width: 480px) {
    .side-download-buttons {
        gap: 8px;
    }

    .side-download-btn {
        width: 140px;
        right: -110px;
    }

    .side-download-btn:hover,
    .side-download-btn.expand {
        transform: translateX(-100px) !important;
    }

    .side-download-btn span {
        font-size: 12px;
        margin-left: 8px;
    }

    .side-download-btn svg {
        width: 18px;
        height: 18px;
    }
}

        /* ===============================
   🔹 Search Bar
   =============================== */
        .top-strip .search-bar {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            overflow: hidden;
        }

        .top-strip .search-bar input {
            border: none;
            outline: none;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem 0 0 0.375rem;
            flex: 1;
            font-size: 0.95rem;
        }

        .top-strip .search-bar button {
            border: none;
            border-radius: 0 0.375rem 0.375rem 0;
            background-color: #74BCC6;
            color: #111;
            padding: 0.5rem 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .top-strip .search-bar button:hover {
            background-color: white;
            color: #74BCC6;
        }

        /* ===============================
   🔹 Flex Utilities
   =============================== */
        .top-strip .d-flex {
            display: flex;
            align-items: center;
        }

        .top-strip .gap-3 {
            gap: 1rem;
        }

        /* =======================================================
   📱 RESPONSIVE STYLES
   ======================================================= */

        /* --- For Tablets & Mobile (Below 768px) --- */
        @media (max-width: 767.98px) {
            .top-strip {
                /*flex-direction: column;*/
                align-items: center;
                gap: 10px;
                padding: 10px 15px;
            }

            .top-strip .search-bar,
            .top-strip .social-icons {
                display: none !important;
            }

            .main-navbar .navbar-container {
                margin-right: 10px;
                margin-top: -95px;
            }

            .top-strip .navbar-brand img {
                height: 50px;
            }

            /* Mobile Search */
            .mobile-search-container {
                display: block;
                width: 100%;
                padding: 10px 0;
            }

            .mobile-search-bar {
                width: 100%;
                display: flex;
                align-items: center;
                background: white;
                border: 1px solid #ccc;
                border-radius: 0.375rem;
                overflow: hidden;
            }

            .mobile-search-bar input {
                border: none;
                outline: none;
                padding: 0.5rem 0.75rem;
                border-radius: 0.375rem 0 0 0.375rem;
                flex: 1;
                font-size: 0.95rem;
            }

            .mobile-search-bar button {
                border: none;
                border-radius: 0 0.375rem 0.375rem 0;
                background-color: #74BCC6;
                color: #111;
                padding: 0.5rem 0.75rem;
                cursor: pointer;
            }
        }

        /* --- For Medium Devices (768px to 991.98px) --- */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .top-strip {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 10px 15px;
            }

            .top-strip .social-icons a {
                font-size: 1rem;
            }

            .top-strip .search-bar input {
                font-size: 0.9rem;
            }
        }

        /* --- For Large Screens (Above 992px) --- */
        @media (min-width: 992px) {
            .top-strip {
                padding: 10px 40px;
            }

            .top-strip .search-bar input {
                width: 220px;
            }

            .top-strip .search-bar button {
                font-size: 1rem;
            }

            .mobile-search-container {
                display: none !important;
            }
        }

        /* =======================================================
   🟦 MAIN NAVBAR - Base Styling
   ======================================================= */

        .main-navbar {
            background-color: #74BCC6;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1050;
        }

        .navbar-nav .nav-link {
            white-space: nowrap;
            color: #ecf0f1 !important;
            font-weight: 500;
            padding: 10px 15px;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        /* .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: white !important; */
        /* background-color: rgba(255, 255, 255, 0.1); */
        /* border-radius: 6px; */
        /* border-bottom: 2px solid white;
        } */

        /* --- Navbar Toggler --- */
        .navbar-toggler {
            border-color: #ecf0f1;
            outline: none;
        }

        .main-navbar .nav-links {
            position: relative;
        }

        .main-navbar .nav-links::after {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0%;
            height: 1px;
            background-color: white;
            transition: width 0.3s ease;
        }

        .main-navbar .nav-links:hover::after {
            width: 100%;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* =============== MEGA MENU BASE (LEVEL-1) =============== */

        .mega-menu-container {
            position: static !important;
        }

        .mega-menu {
            position: absolute;
            left: 0;
            top: 85%;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            /* border-top: 4px solid #74BCC6; */
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: 0.3s ease;
            z-index: 1000;
            height: 635px;
            /* border-radius: 0 0 8px 8px; */
        }

        .mega-menu-investor {
            position: absolute;
            left: 180px;
            top: 80%;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            /* border-top: 4px solid #74BCC6; */
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: 0.3s ease;
            z-index: 1000;
            border-radius: 0 0 8px 8px;
        }

        .mega-menu-container:hover .mega-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mega-menu-content {
            padding: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .mega-menu-column {
            width: 300px;
            min-width: 200px;
        }

        .category-group {
            margin-bottom: 15px;
            position: relative;
        }

        .mega-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            font-weight: bolder;
            font-size: 14px;
            color: #34495e;
            border-bottom: 1px solid #d5d5d5;
            cursor: pointer;
            /* border-radius: 4px; */
            text-decoration: none;
            transition: 0.3s;
            text-transform: uppercase;
        }

        .mega-menu-header:hover {
            color: #74BCC6;
            background: #f8f9fa;
            transform: translateX(3px);
        }

        /* =============== LEVEL-2 (SUBCATEGORIES) =============== */

        .subcategory-panel {
            position: fixed;
            left: 330px;
            /* Align the subcategory panel right next to the mega menu */
            top: 0;
            width: 350px;
            height: 635px;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            /* border-top: 2px solid #74BCC6; */
            padding: 15px;
            opacity: 0;
            visibility: hidden;
            transform: translateX(-30px);
            transition: 0.5s;
            z-index: 1001;
            overflow-y: auto;
        }

        .category-group:hover .subcategory-panel {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .subcategory-panel h4 {
            font-size: 15px;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }

        .subcategory-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .subcategory-list li {
            margin-bottom: 6px;
            position: relative;
        }

        .subcategory-list a {
            display: block;
            padding: 6px 8px;
            /* border-radius: 4px; */
            margin: 10px 0;
            text-decoration: none;
            font-size: 13px;
            color: #555;
            transition: 0.3s;
            border-bottom: 1px solid #d5d5d5;
            text-transform: uppercase;
            font-weight: 700;
        }

        .subcategory-list a:hover {
            background: #f8f9fa;
            color: #74BCC6;
            transform: translateX(3px);
        }

        /* =============== LEVEL-3 (PRODUCTS PANEL) =============== */

        .products-panel {
            position: fixed;
            left: 655px;
            /* Align the products panel to the right of the subcategory panel */
            top: 0;
            width: 300px;
            height: 635px;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-top: 2px solid #74BCC6;
            padding: 15px;
            opacity: 0;
            visibility: hidden;
            transform: translateX(-20px);
            /* Initially moved to the right */
            transition: 0.5s ease;
            z-index: 1002;
            overflow-y: auto;
        }

        .subcategory-list li:hover .products-panel {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
            /* Move into view */
        }

        .products-panel h4 {
            font-size: 15px;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }

        .products-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .products-list li {
            margin-bottom: 6px;
        }

        .products-list a {
            display: block;
            padding: 6px 8px;
            /* border-radius: 4px; */
            margin: 10px 0;
            text-decoration: none;
            font-size: 13px;
            color: #555;
            transition: 0.3s;
            border-bottom: 1px solid #d5d5d5;
            text-transform: uppercase;
            font-weight: bold;
        }

        .products-list a:hover {
            background: #f8f9fa;
            color: #74BCC6;
            transform: translateX(3px);
        }

        /* =======================================================
   📱 MOBILE & TABLET STYLES
   ======================================================= */

        @media (max-width: 991.98px) {
            .mega-menu {
                display: none !important;
            }

            .navbar-nav {
                background-color: #74BCC6;
            }

            .navbar-collapse {
                max-height: 85vh;
                overflow-y: auto;
                background-color: #74BCC6;
                padding-bottom: 1rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .nav-item {
                width: 100%;
            }

            .navbar-nav .nav-link {
                display: block !important;
                color: #ecf0f1 !important;
                font-size: 16px;
                font-weight: 500;
                padding: 12px 20px;
                text-align: left;
                border-radius: 0;
                transition: background 0.3s;
            }

            .navbar-nav .nav-link:hover {
                background-color: rgba(255, 255, 255, 0.1);
                color: white !important;
            }

            /* Show dropdown menu items on mobile - HIDDEN BY DEFAULT */
            .dropdown-menu {
                display: none !important;
                position: static !important;
                background-color: #676464 !important;
                border: none;
                padding: 0;
                margin: 0;
				--bs-dropdown-link-hover-bg: #676464 !important;
				--bs-dropdown-link-active-color: #0d6efd !important;
				 --bs-dropdown-link-active-color:#0d6efd;
				 --bs-dropdown-link-active-bg: #676464  !important;
            }

            .dropdown-menu.show-mobile {
                display: block !important;
            }

            .dropdown-item {
                color: #ecf0f1 !important;
                padding: 12px 20px;
                font-size: 15px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                display: flex !important;
                justify-content: space-between;
                align-items: center;
                cursor: pointer;
            }

            .dropdown-item:hover {
                background-color: rgba(255, 255, 255, 0.1);
                color: #fff !important;
            }

            /* Mobile dropdown toggle icon */
            .mobile-dropdown-icon {
                display: inline-block;
                margin-left: 8px;
                transition: transform 0.3s ease;
                font-size: 12px;
            }

            .nav-link.active .mobile-dropdown-icon {
                transform: rotate(180deg);
            }

            /* Category toggle icon in mobile */
            .category-toggle-mobile {
                font-size: 12px;
                transition: transform 0.3s ease;
            }

            .dropdown-item.active .category-toggle-mobile {
                transform: rotate(180deg);
            }

            /* Subcategory list in mobile */
            .mobile-subcategory-list {
                display: none;
                background-color: #7c7c7c  !important;
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .mobile-subcategory-list.show {
                display: block !important;
            }

            .mobile-subcategory-list li {
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            .mobile-subcategory-list a {
                color: #fff !important;
                padding: 10px 40px;
                font-size: 14px;
                display: block;
                text-decoration: none;
            }

            .mobile-subcategory-list a:hover {
                background-color: rgba(255, 255, 255, 0.05);
                color: #74BCC6 !important;
            }

            /* Products list in mobile */
            .mobile-products-list {
                display: none;
                background-color: #fff !important;
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .mobile-products-list.show {
                display: block !important;
            }

            .mobile-products-list li {
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            .mobile-products-list a {
                color: #74bcc6 !important;
                padding: 10px 60px;
                font-size: 13px;
                display: block;
                text-decoration: none;
            }

            .mobile-products-list a:hover {
                background-color: rgba(255, 255, 255, 0.05);
                color: #74BCC6 !important;
            }

            /* Mobile Category Toggle Styles */
            .category-toggle-mobile {
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                cursor: pointer;
                padding: 12px 20px !important;
                color: #ecf0f1 !important;
                font-size: 15px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                background-color: transparent;
                border: none;
                width: 100%;
                text-align: left;
            }

            .category-toggle-mobile:hover {
                background-color: rgba(255, 255, 255, 0.1);
                color: #fff !important;
            }

            .category-toggle-mobile.active {
                background-color: rgba(255, 255, 255, 0.15);
            }

            .category-toggle-icon-mobile {
                font-size: 12px;
                transition: transform 0.3s ease;
            }

            .category-toggle-mobile.active .category-toggle-icon-mobile {
                transform: rotate(180deg);
            }

            /* Subcategory toggle for mobile */
            .subcategory-toggle-mobile {
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                cursor: pointer;
                padding: 10px 40px !important;
                color: #bdc3c7 !important;
                font-size: 14px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                background-color: transparent;
                border: none;
                width: 100%;
                text-align: left;
            }

            .subcategory-toggle-mobile:hover {
                background-color: rgba(255, 255, 255, 0.05);
                color: #74BCC6 !important;
            }

            .subcategory-toggle-mobile.active {
                background-color: rgba(255, 255, 255, 0.08);
            }

            .subcategory-toggle-icon-mobile {
                font-size: 10px;
                transition: transform 0.3s ease;
            }

            .subcategory-toggle-mobile.active .subcategory-toggle-icon-mobile {
                transform: rotate(180deg);
            }
			.dropdown-menu .mobile-category-link{
			font-size:0.9rem;
			text-decoration:none;
			color:#fff;
			}
			.dropdown-menu .mobile-category-link a{
			font-size:18px;
			text-decoration:none;
			font-weight:bold;
			color:#fff;
			}
        }

        /* =======================================================
   💻 TABLET (768px - 991.98px)
   ======================================================= */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .navbar-nav .nav-link {
                font-size: 15px;
                padding: 10px 18px;
            }

            .subcategory-panel {
                max-height: 635px;
            }
        }
		
		
		
		@media (max-width: 1440px) {
			.mega-menu{
				top:70%;
			}
		}

        /* =======================================================
   🖥️ LARGE SCREENS (≥992px)
   ======================================================= */
        @media (min-width: 992px) {
            .navbar-nav {
                align-items: center;
                gap: 10px;
            }

            .navbar-nav .nav-link {
                font-size: 15px;
                padding: 10px 20px;
            }

            .mega-menu-content {
                flex-wrap: nowrap;
            }

            .subcategory-panel {
                max-height: 635px;
            }
        }

        /* Demo content styling */
        body {
            padding-top: 112px;
        }

        /* =============== HOVER HIGHLIGHTING STYLES =============== */
        .mega-menu-header.highlighted {
            color: #74BCC6 !important;
            background: #f8f9fa !important;
        }

        .subcategory-list a.highlighted {
            background: #f8f9fa !important;
            color: #74BCC6 !important;
            transform: translateX(3px) !important;
        }

        .products-list a.highlighted {
            background: #f8f9fa !important;
            color: #74BCC6 !important;
            transform: translateX(-20px) !important;
        }

        .category-group.active .mega-menu-header {
            color: #74BCC6 !important;
            background: #f8f9fa !important;
        }

        .subcategory-item.active a {
            background: #f8f9fa !important;
            color: #74BCC6 !important;
            transform: translateX(3px) !important;
        }

        .navbar-expand-lg .navbar-nav .nav-link.active {
            font-weight: 700;
            color: white !important;
            background: #676464;
            border-radius: 5px;
            padding: 5px 20px;
        }

        /* Override Bootstrap collapse for mobile */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                transition: none !important;
            }

            .navbar-collapse:not(.show) {
                display: none !important;
            }

            .navbar-collapse.show {
                display: block !important;
            }
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

        /* =======================================================
   🎯 14-INCH LAPTOP SPECIFIC FIX ONLY (1024px - 1440px)
   ======================================================= */

        @media (min-width: 1024px) and (max-width: 1440px) {

            /* Center the navbar content */
            .main-navbar .container-fluid {
                display: flex;
                align-items: center;
                padding: 0 20px;
            }

            .navbar-collapse {
                display: flex !important;
                justify-content: space-between;
                align-items: center;
            }

            /* Reduce spacing between nav items */
            .navbar-nav .nav-link {
                font-size: 14px;
                padding: 10px 12px;
                /* Reduced spacing */
            }

            .navbar-nav {
                gap: 3px;
                /* Reduced gap between items */
            }

            /* Remove excessive right margin - 14 inch only */
            .navbar-nav[style*="margin-right:120px"] {
                margin-right: 0 !important;
            }

            /* Center alignment for all nav sections */
            .navbar-nav.me-auto {
                margin-right: 15px !important;
                /* Small gap after Products */
                margin-left: 0;
            }

            .navbar-nav.ms-auto {
                margin-left: 15px !important;
                /* Small gap before search */
            }

            /* Make search bar wider on 14 inch */
            .navbar-nav.ms-auto .search-bar {
                width: auto;
            }

            .navbar-nav.ms-auto .search-bar input {
                width: 120px;
                /* Wider search bar */
                font-size: 0.9rem;
            }

            .navbar-nav.ms-auto .search-bar button {
                padding: 0.5rem 0.7rem;
            }

            .navbar-expand-lg .navbar-nav li.nav-item {
                padding-right: 1rem;
                padding-left: 1rem;
            }
			.top-strip .social-icons a {
            font-size: 1rem;
        }
				.shine-btn {
   				padding: 2px 10px;
		}
        }

        /* Fine-tune for smaller 14-inch (1280px - 1366px) */
        @media (min-width: 1280px) and (max-width: 1366px) {
            .navbar-nav .nav-link {
                padding: 10px 13px;
            }

            .navbar-expand-lg .navbar-nav li.nav-item {
                padding-right: 0.5rem;
                padding-left: 0.5rem;
            }

            .navbar-nav.ms-auto .search-bar input {
                width: 120px;
            }
			.navbar-expand-lg .navbar-nav .nav-link {
                padding: 0 1rem;
    			font-size: 16px;
    			color: #fff;
    			position: relative;
    			font-weight: 700;
			}
			
        .top-strip .social-icons a {
            font-size: 1rem;
        }
			.shine-btn {
   				padding: 2px 10px;
		}
			   .top-strip .navbar-brand img {
                height: 50px;
            }
        }

        /* .suggestion-box {
    position: absolute;
    background: white;
    width: 100%;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    z-index: 999;
    border-radius: 4px;
    display: none;
}
.suggestion-item {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    cursor: pointer;
}
.suggestion-item:hover {
    background: #f5f5f5;
}
.suggestion-item img {
    width: 40px;
    height: 40px;
    object-fit: contain;
    margin-right: 10px;
} */

        .suggestion-box {
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            border: 1px solid #ccc;
            border-top: none;
            z-index: 9999;
            list-style: none;
            margin: 0;
            padding: 0;
			width:500px;
            max-height: 360px;
            overflow-y: auto;
            display: none;
        }

        .suggestion-box li {
            padding: 8px 12px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .suggestion-box li:hover {
            background: #f4f9fb;
        }

        .suggestion-box .type {
            font-size: 0.7rem;
            color: #74BCC6;
            margin-right: 6px;
            text-transform: uppercase;
        }


        .ripple-btn {

            position: relative;
            display: inline-block;
            padding: 4px 30px;
            height: 100%;
            background: none;
            color: #74BCC6;
            font-size: 15px;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            overflow: hidden;
            border: 2px sollid #74BCC6;
        }

        /* Ripple effect circle */
        .ripple-btn::after {
            content: "";
            position: absolute;
            width: 12px;
            height: 12px;
            background: #74BCC6;
            opacity: 0;
            border-radius: 50%;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            animation: waterRipple 1.6s infinite ease-out;
        }

        /* Water ripple expanding animation */
        @keyframes waterRipple {
            0% {
                width: 12px;
                height: 12px;
                opacity: 0.8;
            }

            60% {
                width: 130px;
                height: 130px;
                opacity: 0.15;
            }

            100% {
                width: 200px;
                height: 200px;
                opacity: 0;
            }
        }

        .nav-link {
            color: #fff;
        }


        /* Smooth animation for both sections */
        .top-strip,
        .main-navbar {
            transition: transform 0.55s cubic-bezier(0.25, 0.1, 0.25, 1);
            position: sticky;
            top: 0;
            z-index: 9999;
        }

        /* Hide state */
        .header-hide {
            transform: translateY(-145%);
        }
		.shine-btn {
    position: relative;
    padding: 6px 32px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 700;
    color: #2483B2;
    border: 2px solid #2483B2;
    text-decoration: none;
    overflow: hidden;
}

.shine-btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -75%;
    width: 50%;
    height: 100%;
    background: linear-gradient(
        120deg,
        transparent,
        rgba(255,0,0,0.55),
        transparent
    );
    animation: shine 2.5s infinite;
}

@keyframes shine {
    0% {
        left: -75%;
    }
    100% {
        left: 130%;
    }
}
		
		
		#suggestionBox {
    list-style: none;
    margin: 0;
    padding: 0;
}

#suggestionBox li {
    padding: 10px 12px;
}

#suggestionBox li:not(.search-header):hover {
    background: #f5f5f5;
    cursor: pointer;
}

.search-header {
    background: #fafafa;
    font-size: 13px;
    font-weight: 600;
    color: #444;
    cursor: default;
    border-bottom: 1px solid #eee;
}

.no-result {
    color: #999;
    font-style: italic;
}

.highlight {
    color: #74BCC6;
    font-weight: 600;
}

.type {
    font-size: 11px;
    color: #888;
    margin-right: 6px;
    text-transform: uppercase;
}
		
		@media (max-width: 1440px) {
			
				.shine-btn {
   				padding: 4px 20px;
		}
			.top-strip .social-icons a.shine-btn{
				font-size:0.9rem;
			}
			
		}

    </style>

    <!-- Download Buttons -->


    <!-- Sticky Side Download Buttons -->
    <div class="side-download-buttons">
        <a href="<?php echo e(url('downloads')); ?>" class="side-download-btn catalogue-btn" title="Download Catalogue">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 16a1 1 0 0 1-.707-.293l-4-4a1 1 0 1 1 1.414-1.414L11 12.586V4a1 1 0 1 1 2 0v8.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-4 4A1 1 0 0 1 12 16zm-7 4a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v1h12v-1a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1H5z" />
            </svg>
            <span>Catalogue</span>
        </a>

        <a href="<?php echo e(asset('frontend/images/pricelist.pdf')); ?>" download="pricelist.pdf" class="side-download-btn price-list-btn" title="Download Price List">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 16a1 1 0 0 1-.707-.293l-4-4a1 1 0 1 1 1.414-1.414L11 12.586V4a1 1 0 1 1 2 0v8.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-4 4A1 1 0 0 1 12 16zm-7 4a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v1h12v-1a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1H5z" />
            </svg>
            <span>Price List</span>
        </a>
    </div>

    <!-- Required CSS/JS -->

    <!-- Top Blue Strip -->
    <div class="top-strip">
        <a class="navbar-brand" href="<?php echo e(url('')); ?>">
            <img src="<?php echo e(asset('frontend/images/latestlogotaparia.png')); ?>" alt="Taparia Logo" style="width: 100%; ">
        </a>

        <div class="d-flex align-items-center flex-wrap gap-4 testing">
            <div class="d-flex gap-3 social-icons pe-4" style="border-right:1px solid #74BCC6;">
                <a href="<?php echo e(url('category/new-products')); ?>"  style="color:#2483B2; border:2px solid #2483B2;" class="shine-btn">New Products</a>
            </div>
            <div class="d-flex gap-4 social-icons pe-4" style="border-right:1px solid #74BCC6;">
                <!-- <a styele= href="https://facebook.com" target="_blank"><img style="width:120px;" src="<?php echo e(asset('frontend/images/flpkartlogo.png')); ?>">				</a>-->
                <a href="https://www.amazon.in/s?k=taparia+tools&crid=20R90A3J6M9ER&sprefix=taparia+tools%2Caps%2C186&ref=nb_sb_noss_2" target="_blank"><img style="width:120px;" src="<?php echo e(asset('frontend/images/logo_-01-05.png')); ?>"></a>
            </div>
            <div class="d-flex gap-3 social-icons">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://facebook.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>

        </div>

        <!-- Mobile Search Container -->

    </div>

    <!-- Bottom Black Navbar -->
    <nav class="navbar navbar-expand-lg main-navbar">
        <div class="container-fluid">
            <!-- Mobile Toggler -->
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="navbar-collapse" id="mainNavbar" style="display: none;">
                <!-- LEFT SIDE -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Products Mega Menu -->
                    <li class="nav-item mega-menu-container position-static">
                        <a class="nav-link  dropdown-toggle <?php echo e(Request::is('products*') ? 'active' : ''); ?>" href="<?php echo e(url('products')); ?>">
                            Products
                            <i class="fas fa-chevron-down mobile-dropdown-icon d-lg-none"></i>
                        </a>

                        <div class="mega-menu d-none d-lg-block">
                            <div class="mega-menu-content">
                                <div class="mega-menu-column">

                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="category-group" data-category-id="<?php echo e($category->id); ?>">
									
                                        <!-- LEVEL 1 -->

                                        <a href="<?php echo e(url('category/' . Str::slug($category->name))); ?>"
                                            class="mega-menu-header">
                                            <span><?php echo e($category->name); ?></span>
                                            <?php if($category->subCategories && $category->subCategories->count()): ?>
                                            <i class="fas fa-chevron-right category-toggle-icon"></i>
                                            <?php endif; ?>
                                        </a>

                                        <?php if($category->subCategories && $category->subCategories->count()): ?>
                                        <!-- LEVEL 2 PANEL -->
                                        <div class="subcategory-panel">
                                            <ul class="subcategory-list">

                                                <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="subcategory-item" data-sub-id="<?php echo e($subCategory->id); ?>">
                                                    <a
                                                        href="<?php echo e(url('sub-category/' . Str::slug($subCategory->name))); ?>">
                                                        <?php echo e($subCategory->name); ?>

                                                        <?php if($subCategory->products && $subCategory->products->count()): ?>
                                                        <i class="fas fa-chevron-right"
                                                            style="float:right;font-size:10px;"></i>
                                                        <?php endif; ?>
                                                    </a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                        </div>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($subCategory->products && $subCategory->products->count()): ?>
                                        <!-- LEVEL 3 PANEL (OUTSIDE LI) -->
                                        <div class="products-panel" data-sub-id="<?php echo e($subCategory->id); ?>">
                                            <ul class="products-list">
                                                <?php $__currentLoopData = $subCategory->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(url('product/' . Str::slug($product->productName))); ?>">
                                                        <?php echo e($product->productName); ?>

                                                    </a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>

                       <!-- Mobile Products Menu -->
<ul class="dropdown-menu d-lg-none">
	 <li class="mobile-category-link">
     <a  href="<?php echo e(url('products')); ?>"> Products </a>
	</li>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <?php if($category->subCategories && $category->subCategories->count()): ?>
        <div class="dropdown-item category-toggle-mobile"
            data-category="<?php echo e(\Illuminate\Support\Str::slug($category->name)); ?>">
            <!-- Add clickable link for category -->
            <a href="<?php echo e(url('category/' . \Illuminate\Support\Str::slug($category->name))); ?>" 
               class="mobile-category-link">
                <span><?php echo e($category->name); ?></span>
            </a>
            <i class="fas fa-chevron-down category-toggle-icon-mobile"></i>
        </div>
        <ul class="mobile-subcategory-list" id="<?php echo e(\Illuminate\Support\Str::slug($category->name)); ?>-sub">
            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php if($subCategory->products && $subCategory->products->count()): ?>
                <div class="subcategory-toggle-mobile" data-subcategory="<?php echo e(\Illuminate\Support\Str::slug($subCategory->name)); ?>">
                    <!-- Add clickable link for subcategory -->
                    <a href="<?php echo e(url('sub-category/' . \Illuminate\Support\Str::slug($subCategory->name))); ?>"
                       class="mobile-subcategory-link">
                        <span><?php echo e($subCategory->name); ?></span>
                    </a>
                    <i class="fas fa-chevron-down subcategory-toggle-icon-mobile"></i>
                </div>
                <ul class="mobile-products-list"  id="<?php echo e(\Illuminate\Support\Str::slug($subCategory->name)); ?>-products">
                    <?php $__currentLoopData = $subCategory->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <!-- Product link for mobile -->
                        <a href="<?php echo e(url('product/' . \Illuminate\Support\Str::slug($product->productName))); ?>">
                            <?php echo e($product->productName); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php else: ?>
                <!-- Subcategory link for mobile (when no products) -->
                <a class="dropdown-item"
                    href="<?php echo e(url('sub-category/' . \Illuminate\Support\Str::slug($subCategory->name))); ?>">
                    <?php echo e($subCategory->name); ?>

                </a>
                <?php endif; ?>

             

            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php else: ?>
        <!-- Category link for mobile (when no subcategories) -->
        <a class="dropdown-item"
            href="<?php echo e(url('category/' . \Illuminate\Support\Str::slug($category->name))); ?>">
            <?php echo e($category->name); ?>

        </a>
        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

                    </li>


                </ul>


                <!-- RIGHT SIDE -->
                <ul class="navbar-nav  mb-2 mb-lg-0" style="margin-right:120px">
                    <li class="nav-item"><a class="nav-link nav-links <?php echo e(Request::is('/') ? 'active' : ''); ?>" href="<?php echo e(url('')); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-links <?php echo e(Request::is('about-us') ? 'active' : ''); ?>" href="<?php echo e(url('about-us')); ?>">About Us</a></li>
                    <li class="nav-item"><a class="nav-link nav-links <?php echo e(Request::is('investors-desk') ? 'active' : ''); ?>" href="<?php echo e(url('investors-desk')); ?>">Investors Desk</a></li>
                    <li class="nav-item"><a class="nav-link nav-links <?php echo e(Request::is('downloads') ? 'active' : ''); ?>" href="<?php echo e(url('downloads')); ?>">Downloads</a></li>
                    <li class="nav-item"><a class="nav-link nav-links <?php echo e(Request::is('distributors') ? 'active' : ''); ?>" href="<?php echo e(url('distributors')); ?>">Distributors</a></li>
                    <li class="nav-item"><a class="nav-link nav-links <?php echo e(Request::is('contact-us') ? 'active' : ''); ?>" href="<?php echo e(url('contact-us')); ?>">Contact Us</a></li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <div class="position-relative w-100">
                        <form class="d-flex search-bar" role="search" method="GET" action="/products">
                            <input id="searchInput" class="form-control border-0" name="q" type="search"
                                placeholder="e.g. Hand Tool" autocomplete="off">
                            <button class="btn text-white" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>

                        <ul id="suggestionBox" class="suggestion-box"></ul>
                    </div>


                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Required CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        const mainNavbar = document.getElementById('mainNavbar');
        const navbarTogglerIcon = document.querySelector('.navbar-toggler-icon');

        // Mobile menu toggle handler
        navbarToggler.addEventListener('click', function(e) {
            e.preventDefault();

            if (mainNavbar.style.display === 'block' || mainNavbar.classList.contains('show')) {
                // Close menu
                mainNavbar.style.display = 'none';
                mainNavbar.classList.remove('show');
            } else {
                // Open menu
                mainNavbar.style.display = 'block';
                mainNavbar.classList.add('show');
            }
        });


        // Ensure all mobile dropdowns start closed
        function initializeMobileMenu() {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show-mobile');
            });
            document.querySelectorAll('.mobile-subcategory-list').forEach(subList => {
                subList.classList.remove('show');
            });
            document.querySelectorAll('.mobile-products-list').forEach(productsList => {
                productsList.classList.remove('show');
            });
            document.querySelectorAll('.mega-menu-container > .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelectorAll('.category-toggle-mobile').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelectorAll('.subcategory-toggle-mobile').forEach(item => {
                item.classList.remove('active');
            });
        }

        // Disable Bootstrap dropdown for desktop mega menus
        function disableDesktopDropdowns() {
            if (window.innerWidth > 991) {
                document.querySelectorAll('.mega-menu-container .dropdown-toggle').forEach(toggle => {
                    toggle.removeAttribute('data-bs-toggle');
                    toggle.removeAttribute('data-bs-auto-close');
                    toggle.removeAttribute('aria-expanded');
                });
            } else {
                // Re-enable for mobile
                document.querySelectorAll('.mega-menu-container .dropdown-toggle').forEach(toggle => {
                    toggle.setAttribute('data-bs-toggle', 'dropdown');
                    toggle.setAttribute('data-bs-auto-close', 'outside');
                });
            }
        }

        // Initialize the menu state
        initializeMobileMenu();
        disableDesktopDropdowns();

        // Handle window resize
        window.addEventListener('resize', disableDesktopDropdowns);

        // Enhanced hover handling for desktop
        document.querySelectorAll('.mega-menu-container').forEach(container => {
            const megaMenu = container.querySelector('.mega-menu');
            const navLink = container.querySelector('.nav-link');

            if (megaMenu && navLink) {
                let hoverTimer;

                navLink.addEventListener('mouseenter', function() {
                    if (window.innerWidth > 991) {
                        clearTimeout(hoverTimer);
                        hoverTimer = setTimeout(() => {
                            megaMenu.style.opacity = '1';
                            megaMenu.style.visibility = 'visible';
                            megaMenu.style.transform = 'translateY(0)';
                        }, 50);
                    }
                });

                container.addEventListener('mouseleave', function(e) {
                    if (window.innerWidth > 991) {
                        clearTimeout(hoverTimer);
                        const relatedTarget = e.relatedTarget;
                        if (!megaMenu.contains(relatedTarget)) {
                            hoverTimer = setTimeout(() => {
                                megaMenu.style.opacity = '0';
                                megaMenu.style.visibility = 'hidden';
                                megaMenu.style.transform = 'translateY(10px)';
                            }, 100);
                        }
                    }
                });
            }
        });

        // Mobile menu - Handle Products/Investors Desk clicks
        const dropdownToggles = document.querySelectorAll('.mega-menu-container > .nav-link');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) {
                    e.preventDefault();
                    e.stopPropagation();

                    const parent = this.closest('.mega-menu-container');
                    const dropdownMenu = parent.querySelector('.dropdown-menu');

                    if (dropdownMenu) {
                        // Check if this dropdown is currently open
                        const isOpen = dropdownMenu.classList.contains('show-mobile');

                        // Close all other dropdowns first
                        document.querySelectorAll('.dropdown-menu').forEach(menu => {
                            if (menu !== dropdownMenu) {
                                menu.classList.remove('show-mobile');
                            }
                        });

                        // Remove active from all other nav links
                        document.querySelectorAll('.mega-menu-container > .nav-link').forEach(link => {
                            if (link !== this) {
                                link.classList.remove('active');
                            }
                        });

                        // Close all subcategories and products in other dropdowns
                        document.querySelectorAll('.mobile-subcategory-list').forEach(subList => {
                            subList.classList.remove('show');
                        });
                        document.querySelectorAll('.mobile-products-list').forEach(productsList => {
                            productsList.classList.remove('show');
                        });

                        // Remove active from all category and subcategory items in other dropdowns
                        document.querySelectorAll('.category-toggle-mobile').forEach(item => {
                            item.classList.remove('active');
                        });
                        document.querySelectorAll('.subcategory-toggle-mobile').forEach(item => {
                            item.classList.remove('active');
                        });

                        // Toggle current dropdown
                        if (isOpen) {
                            // Close this dropdown and all its subcategories and products
                            dropdownMenu.classList.remove('show-mobile');
                            this.classList.remove('active');

                            // Close all subcategories and products within this dropdown
                            dropdownMenu.querySelectorAll('.mobile-subcategory-list').forEach(subList => {
                                subList.classList.remove('show');
                            });
                            dropdownMenu.querySelectorAll('.mobile-products-list').forEach(productsList => {
                                productsList.classList.remove('show');
                            });
                            dropdownMenu.querySelectorAll('.category-toggle-mobile').forEach(item => {
                                item.classList.remove('active');
                            });
                            dropdownMenu.querySelectorAll('.subcategory-toggle-mobile').forEach(item => {
                                item.classList.remove('active');
                            });
                        } else {
                            // Open this dropdown
                            dropdownMenu.classList.add('show-mobile');
                            this.classList.add('active');
                        }
                    }
                }
            });
        });

        // Handle category toggle clicks (Categories with subcategories) - UPDATED FOR ICON ONLY
        document.querySelectorAll('.category-toggle-mobile').forEach(categoryItem => {
            // Handle clicks on the chevron icon only
            const chevronIcon = categoryItem.querySelector('.category-toggle-icon-mobile');
            
            if (chevronIcon) {
                chevronIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const categorySlug = categoryItem.getAttribute('data-category');
                    const subcategoryList = document.getElementById(categorySlug + '-sub');

                    if (subcategoryList) {
                        // Check if currently open
                        const isOpen = subcategoryList.classList.contains('show');

                        // Close all other subcategories and products in this dropdown
                        const parentDropdown = categoryItem.closest('.dropdown-menu');
                        parentDropdown.querySelectorAll('.mobile-subcategory-list').forEach(subList => {
                            if (subList !== subcategoryList) {
                                subList.classList.remove('show');
                            }
                        });
                        parentDropdown.querySelectorAll('.mobile-products-list').forEach(productsList => {
                            productsList.classList.remove('show');
                        });

                        // Remove active from all category and subcategory items in this dropdown
                        parentDropdown.querySelectorAll('.category-toggle-mobile').forEach(item => {
                            if (item !== categoryItem) {
                                item.classList.remove('active');
                            }
                        });
                        parentDropdown.querySelectorAll('.subcategory-toggle-mobile').forEach(item => {
                            item.classList.remove('active');
                        });

                        // Toggle current subcategory
                        if (!isOpen) {
                            subcategoryList.classList.add('show');
                            categoryItem.classList.add('active');
                        } else {
                            subcategoryList.classList.remove('show');
                            categoryItem.classList.remove('active');
                        }
                    }
                });
            }
        });

        // Handle subcategory toggle clicks (Subcategories with products) - UPDATED FOR ICON ONLY
        document.querySelectorAll('.subcategory-toggle-mobile').forEach(subcategoryItem => {
            // Handle clicks on the chevron icon only
            const chevronIcon = subcategoryItem.querySelector('.subcategory-toggle-icon-mobile');
            
            if (chevronIcon) {
                chevronIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const subcategorySlug = subcategoryItem.getAttribute('data-subcategory');
                    const productsList = document.getElementById(subcategorySlug + '-products');

                    if (productsList) {
                        // Check if currently open
                        const isOpen = productsList.classList.contains('show');

                        // Close all other products lists in this dropdown
                        const parentDropdown = subcategoryItem.closest('.dropdown-menu');
                        parentDropdown.querySelectorAll('.mobile-products-list').forEach(pList => {
                            if (pList !== productsList) {
                                pList.classList.remove('show');
                            }
                        });

                        // Remove active from all subcategory items in this dropdown
                        parentDropdown.querySelectorAll('.subcategory-toggle-mobile').forEach(item => {
                            if (item !== subcategoryItem) {
                                item.classList.remove('active');
                            }
                        });

                        // Toggle current products list
                        if (!isOpen) {
                            productsList.classList.add('show');
                            subcategoryItem.classList.add('active');
                        } else {
                            productsList.classList.remove('show');
                            subcategoryItem.classList.remove('active');
                        }
                    }
                });
            }
        });
document.querySelectorAll('.mobile-dropdown-icon').forEach(icon => {
    icon.addEventListener('click', function (e) {
        e.preventDefault();   // stop redirect
        e.stopPropagation();  // stop bubbling to <a>

        const navItem = this.closest('.mega-menu-container');
        const dropdown = navItem.querySelector('.dropdown-menu');

        if (dropdown) {
            dropdown.classList.toggle('show-mobile');
        }
    });
});




        // Close menu when clicking on mobile category, subcategory, or product links - UPDATED
        document.querySelectorAll('.mobile-category-link, .mobile-subcategory-link, .mobile-subcategory-list a, .mobile-products-list a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    mainNavbar.style.display = 'none';
                    mainNavbar.classList.remove('show');

                    // Also close all dropdowns
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.classList.remove('show-mobile');
                    });
                    document.querySelectorAll('.mobile-subcategory-list').forEach(subList => {
                        subList.classList.remove('show');
                    });
                    document.querySelectorAll('.mobile-products-list').forEach(productsList => {
                        productsList.classList.remove('show');
                    });

                    // Remove active classes
                    document.querySelectorAll('.mega-menu-container > .nav-link').forEach(link => {
                        link.classList.remove('active');
                    });
                    document.querySelectorAll('.category-toggle-mobile').forEach(item => {
                        item.classList.remove('active');
                    });
                    document.querySelectorAll('.subcategory-toggle-mobile').forEach(item => {
                        item.classList.remove('active');
                    });
                }
            });
        });

        // Close mobile menu when clicking regular nav links
        const regularNavLinks = document.querySelectorAll('.navbar-nav > .nav-item > .nav-link:not(.dropdown-toggle)');
        regularNavLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    mainNavbar.style.display = 'none';
                    mainNavbar.classList.remove('show');
                }
            });
        });


        // Handle hamburger toggle click

        // Reset dropdowns on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show-mobile');
                });
                document.querySelectorAll('.mobile-subcategory-list').forEach(subList => {
                    subList.classList.remove('show');
                });
                document.querySelectorAll('.mobile-products-list').forEach(productsList => {
                    productsList.classList.remove('show');
                });
                document.querySelectorAll('.mega-menu-container > .nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                document.querySelectorAll('.category-toggle-mobile').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.subcategory-toggle-mobile').forEach(item => {
                    item.classList.remove('active');
                });
            }
        });
    });
    
    document.querySelectorAll('.subcategory-list li').forEach(item => {
        const productsPanel = document.querySelector(`.products-panel[data-sub-id="${item.dataset.subId}"]`);

        item.addEventListener('mouseenter', function() {
            // Show the products panel when hovering over the subcategory item
            if (productsPanel) {
                productsPanel.style.opacity = '1';
                productsPanel.style.visibility = 'visible';
                productsPanel.style.transform = 'translateX(0)'; // Move it into view
            }
        });

        item.addEventListener('mouseleave', function() {
            // Hide the products panel when mouse leaves the subcategory item
            if (!productsPanel.matches(':hover')) {
                productsPanel.style.opacity = '0';
                productsPanel.style.visibility = 'hidden';
                productsPanel.style.transform = 'translateX(10px)'; // Move it off-screen
            }
        });

        // Keep Level 3 visible when hovering over it
        if (productsPanel) {
            productsPanel.addEventListener('mouseenter', function() {
                this.style.opacity = '1';
                this.style.visibility = 'visible';
                this.style.transform = 'translateX(0)';
            });

            productsPanel.addEventListener('mouseleave', function() {
                // Hide it only if the mouse leaves both the subcategory and products panel
                if (!item.matches(':hover')) {
                    this.style.opacity = '0';
                    this.style.visibility = 'hidden';
                    this.style.transform = 'translateX(10px)';
                }
            });
        }
    });

    // Remove all highlights
    function removeAllHighlights() {
        document.querySelectorAll('.mega-menu-header').forEach(item => {
            item.classList.remove('highlighted', 'active');
        });
        document.querySelectorAll('.subcategory-list a').forEach(item => {
            item.classList.remove('highlighted', 'active');
        });
        document.querySelectorAll('.products-list a').forEach(item => {
            item.classList.remove('highlighted', 'active');
        });
        document.querySelectorAll('.category-group').forEach(item => {
            item.classList.remove('active');
        });
        document.querySelectorAll('.subcategory-item').forEach(item => {
            item.classList.remove('active');
        });
    }

    // Close all panels
    function closeAllPanels() {
        document.querySelectorAll('.subcategory-panel').forEach(panel => {
            panel.style.opacity = '0';
            panel.style.visibility = 'hidden';
            panel.style.transform = 'translateX(-30px)';
        });
        document.querySelectorAll('.products-panel').forEach(panel => {
            panel.style.opacity = '0';
            panel.style.visibility = 'hidden';
            panel.style.transform = 'translateX(-20px)';
        });
    }

    // Level 1 (Category) hover handling
    document.querySelectorAll('.category-group').forEach(categoryGroup => {
        const megaMenuHeader = categoryGroup.querySelector('.mega-menu-header');
        const subcategoryPanel = categoryGroup.querySelector('.subcategory-panel');
        const hasSubcategories = categoryGroup.querySelector('.subcategory-panel') !== null;

        categoryGroup.addEventListener('mouseenter', function() {
            if (window.innerWidth > 991) {
                removeAllHighlights();
                closeAllPanels();

                this.classList.add('active');
                megaMenuHeader.classList.add('highlighted');

                // Show subcategory panel only if it exists
                if (subcategoryPanel) {
                    subcategoryPanel.style.opacity = '1';
                    subcategoryPanel.style.visibility = 'visible';
                    subcategoryPanel.style.transform = 'translateY(0)';
                }
            }
        });

        categoryGroup.addEventListener('mouseleave', function(e) {
            if (window.innerWidth > 991) {
                const relatedTarget = e.relatedTarget;
                const isMovingToSubPanel = subcategoryPanel && subcategoryPanel.contains(relatedTarget);
                const isMovingToMegaMenu = relatedTarget?.closest('.mega-menu');

                if (!isMovingToSubPanel && !isMovingToMegaMenu) {
                    this.classList.remove('active');
                    megaMenuHeader.classList.remove('highlighted');

                    if (subcategoryPanel && !subcategoryPanel.contains(relatedTarget)) {
                        subcategoryPanel.style.opacity = '0';
                        subcategoryPanel.style.visibility = 'hidden';
                        subcategoryPanel.style.transform = 'translateX(-30px)';
                    }
                }
            }
        });
    });

    // Level 2 (Subcategory) hover handling
    document.querySelectorAll('.subcategory-item').forEach(subcategoryItem => {
        const subcategoryLink = subcategoryItem.querySelector('a');
        const productsPanel = document.querySelector(`.products-panel[data-sub-id="${subcategoryItem.dataset.subId}"]`);

        subcategoryItem.addEventListener('mouseenter', function() {
            if (window.innerWidth > 991) {
                removeAllHighlights();

                // Highlight parent category
                const parentCategory = this.closest('.category-group');
                if (parentCategory) {
                    parentCategory.classList.add('active');
                    parentCategory.querySelector('.mega-menu-header').classList.add('highlighted');
                }

                // Highlight current subcategory
                this.classList.add('active');
                subcategoryLink.classList.add('highlighted');

                // Show products panel if it exists
                if (productsPanel) {
                    productsPanel.style.opacity = '1';
                    productsPanel.style.visibility = 'visible';
                    productsPanel.style.transform = 'translateX(0)';
                }
            }
        });

        subcategoryItem.addEventListener('mouseleave', function(e) {
            if (window.innerWidth > 991) {
                const relatedTarget = e.relatedTarget;

                const isMovingToProductsPanel = productsPanel && productsPanel.contains(relatedTarget);
                const isMovingToMegaMenu = relatedTarget?.closest('.mega-menu');
                const isMovingToParentCategory = relatedTarget?.closest('.category-group') === this.closest('.category-group');

                if (!isMovingToProductsPanel && !isMovingToMegaMenu && !isMovingToParentCategory) {
                    this.classList.remove('active');
                    subcategoryLink.classList.remove('highlighted');

                    if (productsPanel && !productsPanel.contains(relatedTarget)) {
                        productsPanel.style.opacity = '0';
                        productsPanel.style.visibility = 'hidden';
                        productsPanel.style.transform = 'translateX(-20px)';
                    }
                }
            }
        });

        // Products panel hover handling
        if (productsPanel) {
            productsPanel.addEventListener('mouseenter', function() {
                if (window.innerWidth > 991) {
                    // Keep subcategory highlighted when hovering over products panel
                    subcategoryItem.classList.add('active');
                    subcategoryLink.classList.add('highlighted');

                    // Keep parent category highlighted
                    const parentCategory = subcategoryItem.closest('.category-group');
                    if (parentCategory) {
                        parentCategory.classList.add('active');
                        parentCategory.querySelector('.mega-menu-header').classList.add('highlighted');
                    }
                }
            });

            productsPanel.addEventListener('mouseleave', function(e) {
                if (window.innerWidth > 991) {
                    const relatedTarget = e.relatedTarget;

                    const isMovingBackToSubcategory = subcategoryItem.contains(relatedTarget);
                    const isMovingToMegaMenu = relatedTarget?.closest('.mega-menu');

                    if (!isMovingBackToSubcategory && !isMovingToMegaMenu) {
                        subcategoryItem.classList.remove('active');
                        subcategoryLink.classList.remove('highlighted');

                        const parentCategory = subcategoryItem.closest('.category-group');
                        if (parentCategory && !parentCategory.matches(':hover')) {
                            parentCategory.classList.remove('active');
                            parentCategory.querySelector('.mega-menu-header').classList.remove('highlighted');
                        }

                        this.style.opacity = '0';
                        this.style.visibility = 'hidden';
                        this.style.transform = 'translateX(-20px)';
                    }
                }
            });
        }
    });

    // Level 3 (Products) hover handling
    document.querySelectorAll('.products-list a').forEach(productLink => {
        productLink.addEventListener('mouseenter', function() {
            if (window.innerWidth > 991) {
                removeAllHighlights();

                // Find and highlight parent subcategory
                const productsPanel = this.closest('.products-panel');
                if (productsPanel) {
                    const subId = productsPanel.dataset.subId;
                    const subcategoryItem = document.querySelector(`.subcategory-item[data-sub-id="${subId}"]`);

                    if (subcategoryItem) {
                        // Highlight subcategory
                        subcategoryItem.classList.add('active');
                        subcategoryItem.querySelector('a').classList.add('highlighted');

                        // Highlight parent category
                        const parentCategory = subcategoryItem.closest('.category-group');
                        if (parentCategory) {
                            parentCategory.classList.add('active');
                            parentCategory.querySelector('.mega-menu-header').classList.add('highlighted');
                        }
                    }
                }

                // Highlight current product
                this.classList.add('highlighted');
            }
        });

        productLink.addEventListener('mouseleave', function() {
            if (window.innerWidth > 991) {
                this.classList.remove('highlighted');
            }
        });
    });

    // Mega menu container leave handling
    document.querySelectorAll('.mega-menu-container').forEach(container => {
        const megaMenu = container.querySelector('.mega-menu');

        container.addEventListener('mouseleave', function(e) {
            if (window.innerWidth > 991) {
                const relatedTarget = e.relatedTarget;

                const isLeavingCompletely = !megaMenu.contains(relatedTarget) &&
                    !relatedTarget?.closest('.mega-menu');

                if (isLeavingCompletely) {
                    setTimeout(() => {
                        removeAllHighlights();
                        closeAllPanels();
                    }, 100);
                }
            }
        });
    });

    // Mega menu leave handling
    document.querySelectorAll('.mega-menu').forEach(menu => {
        menu.addEventListener('mouseleave', function(e) {
            if (window.innerWidth > 991) {
                const relatedTarget = e.relatedTarget;

                const isLeavingCompletely = !relatedTarget?.closest('.mega-menu-container');

                if (isLeavingCompletely) {
                    setTimeout(() => {
                        removeAllHighlights();
                        closeAllPanels();
                    }, 100);
                }
            }
        });
    });

    // Side Download Buttons - Individual Expansion
    document.addEventListener('DOMContentLoaded', function() {
        const downloadButtons = document.querySelectorAll('.side-download-btn');

        downloadButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                // Remove expand class from all other buttons
                downloadButtons.forEach(btn => {
                    if (btn !== this) {
                        btn.classList.remove('expand');
                    }
                });

                // Add expand class to current button
                this.classList.add('expand');
            });

            button.addEventListener('mouseleave', function() {
                // Remove expand class when mouse leaves
                this.classList.remove('expand');
            });
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        const currentPath = window.location.pathname;

        // Check if the current path contains 'products'
        if (currentPath.includes('products') || currentPath.includes('product')) {
            const productsLink = document.querySelector('#mainNavbar > ul.navbar-nav.me-auto.mb-2.mb-lg-0 > li:nth-child(1) > a');
            if (productsLink) {
                productsLink.classList.add('active');
            }
        }

        // Check if the current path contains 'investors-desk'
        if (currentPath.startsWith('/investors-desk')) {
            const investorsLink = document.querySelector(
                '#mainNavbar a[href*="investors-desk"]'
            );

            if (investorsLink) {
                investorsLink.classList.add('active');
            }
        }
    });
</script>


<script>
    let lastScroll = 0;
    let ticking = false;

    window.addEventListener("scroll", function() {

        if (!ticking) {
            window.requestAnimationFrame(() => {
                let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                const topStrip = document.querySelector(".top-strip");
                const mainNavbar = document.querySelector(".main-navbar");

                if (currentScroll > lastScroll && currentScroll > 80) {
                    // hide with smooth slide
                    topStrip.classList.add("header-hide");
                    mainNavbar.classList.add("header-hide");
                } else {
                    // show smoothly
                    topStrip.classList.remove("header-hide");
                    mainNavbar.classList.remove("header-hide");
                }

                lastScroll = currentScroll;
                ticking = false;
            });

            ticking = true;
        }

    });
</script>


<script>
    let lastScroll = 0;
    let ticking = false;

    window.addEventListener("scroll", function() {

        if (!ticking) {
            window.requestAnimationFrame(() => {
                let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                const topStrip = document.querySelector(".top-strip");
                const mainNavbar = document.querySelector(".main-navbar");

                if (currentScroll > lastScroll && currentScroll > 80) {
                    // hide with smooth slide
                    topStrip.classList.add("header-hide");
                    mainNavbar.classList.add("header-hide");
                } else {
                    // show smoothly
                    topStrip.classList.remove("header-hide");
                    mainNavbar.classList.remove("header-hide");
                }

                lastScroll = currentScroll;
                ticking = false;
            });

            ticking = true;
        }

    });
</script>

<script>
const input = document.getElementById('searchInput');
const box = document.getElementById('suggestionBox');
let debounce;

function highlightMatch(text, query) {
    const regex = new RegExp(`(${query})`, 'ig');
    return text.replace(regex, '<span class="highlight">$1</span>');
}

input.addEventListener('input', function () {
    clearTimeout(debounce);
    const q = this.value.trim();
    console.log(q.length);
    if (q.length < 1) {
        box.style.display = 'none';
        box.innerHTML = '';
        return;
    }
    debounce = setTimeout(() => {
        fetch(`/products?q=${encodeURIComponent(q)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(data => {
            box.innerHTML = '';
            
            /* 🔹 HEADER LINE (NOT CLICKABLE) */
            const header = document.createElement('li');
            header.className = 'search-header';
            header.innerHTML = `
                Search Result of : <strong>${q}</strong>
                <span class="close-btn" onclick="document.getElementById('suggestionBox').style.display='none'">&nbsp;&nbsp;✕</span>
            `;
            box.appendChild(header);
            
            /* 🔹 RESULTS */
            if (!data.length) {
                const empty = document.createElement('li');
                empty.className = 'no-result';
                empty.innerHTML = 'No results found';
                box.appendChild(empty);
            } else {
                data.forEach(item => {
                    const li = document.createElement('li');
                    li.innerHTML = `
                        <span class="type">${item.type}</span>
                        <span class="label">
                            ${highlightMatch(item.label, q)}
                        </span>
                    `;
                    li.onclick = () => {
                        window.location.href = item.url;
                    };
                    box.appendChild(li);
                });
            }
            box.style.display = 'block';
        });
    }, 250);
});
</script>



<?php /**PATH C:\xampp\htdocs\tapariatools.tapariatools.com\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>