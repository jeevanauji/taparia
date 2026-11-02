<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Library -->
        @include('frontend.layout.library')
        <!-- End Library -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <div id="loading-wrapper">
            <div id="loading-text">
                <img src="{{ asset('frontend/images/preloader.gif') }}" />
            </div>
            <div id="loading-content"></div>
        </div>
        
        <!-- Header -->
        @include('frontend.layout.header')
        <!-- End Header -->
        
        <!-- Content -->
        @yield('content')         
        <!-- End Content -->

        <style>
            /* Mobile layout: keep the complete header in document flow so it cannot
               cover page content when the compact navigation is toggled on scroll. */
            @media (max-width: 767.98px) {
                html,
                body {
                    width: 100%;
                    max-width: 100%;
                    overflow-x: hidden;
                }

                body {
                    padding-top: 0 !important;
                }

                .main-header {
                    position: relative !important;
                    top: auto !important;
                    width: 100% !important;
                }

                .main-header .top-strip,
                .main-header .main-navbar {
                    position: relative !important;
                    top: auto !important;
                    transform: none !important;
                }

                .top-strip {
                    padding: 8px 16px 10px !important;
                }

                .top-strip .navbar-brand {
                    display: block;
                    max-width: min(260px, 78vw);
                }

                .top-strip .navbar-brand img {
                    display: block;
                    width: 100% !important;
                    max-width: 100%;
                    height: auto !important;
                    max-height: 58px;
                    object-fit: contain;
                    object-position: left center;
                }

                .mobile-search-container {
                    padding: 8px 0 2px !important;
                }

                .mobile-search-bar input {
                    font-size: 16px !important;
                }

                .main-navbar {
                    min-height: 72px;
                }

                .main-navbar .navbar-container {
                    margin: 0 !important;
                    padding: 10px 16px !important;
                }

                .main-navbar .navbar-toggler {
                    min-width: 48px;
                    min-height: 44px;
                }

                .hero-section {
                    width: 100% !important;
                    max-width: 100vw;
                }

                .hero-section .bannertxt {
                    padding: 16px !important;
                }

                .hero-section .hero-text {
                    max-width: 100% !important;
                }

                .container,
                .container-fluid,
                .container-xl,
                .row,
                [class*="col-"] {
                    min-width: 0;
                    max-width: 100%;
                }

                .side-download-buttons {
                    right: 0 !important;
                    top: auto !important;
                    bottom: 16px !important;
                    flex-direction: row !important;
                    gap: 8px !important;
                    transform: none !important;
                }

                .side-download-btn,
                .side-download-btn:hover,
                .side-download-btn.expand {
                    width: 42px !important;
                    height: 42px !important;
                    right: 0 !important;
                    padding: 10px !important;
                    border-radius: 50% !important;
                    transform: none !important;
                }

                .side-download-btn span {
                    display: none;
                }

                img,
                video,
                iframe {
                    max-width: 100%;
                }

                .breadcrumb,
                nav[aria-label="breadcrumb"] {
                    max-width: 100%;
                    overflow-wrap: anywhere;
                }

                .investor-card {
                    width: min(100%, 420px) !important;
                    max-width: 100%;
                }

                .investor-card p {
                    overflow-wrap: anywhere;
                }

                table {
                    max-width: 100%;
                }
            }

            @media (max-width: 767.98px) {
                .hero-section {
                    position: relative !important;
                    width: 100% !important;
                    height: clamp(250px, 56svh, 380px) !important;
                    min-height: 250px !important;
                    max-height: 380px !important;
                    overflow: hidden !important;
                }

                .hero-section .videobanner,
                .hero-section .innerbanner,
                .hero-section .image-banner {
                    position: absolute !important;
                    inset: 0 !important;
                    display: block !important;
                    width: 100% !important;
                    height: 100% !important;
                    min-height: 0 !important;
                    overflow: hidden !important;
                }

                .hero-section .image-banner img,
                .hero-section .innerbanner img,
                .hero-section video {
                    display: block !important;
                    width: 100% !important;
                    height: 100% !important;
                    max-width: 100% !important;
                    object-fit: cover !important;
                    object-position: center !important;
                }

                .hero-section .bannertxt {
                    position: absolute !important;
                    inset: 0 !important;
                    z-index: 3 !important;
                    display: flex !important;
                    align-items: center !important;
                    justify-content: center !important;
                    width: 100% !important;
                    height: 100% !important;
                    margin: 0 !important;
                    padding: 20px 18px !important;
                    text-align: center !important;
                }

                .hero-section .bannertxt .hero-text {
                    width: 100% !important;
                    max-width: 620px !important;
                    margin: 0 auto !important;
                    padding: 0 !important;
                    text-align: center !important;
                }

                .hero-section .bannertxt h1,
                .hero-section .bannertxt h2,
                .hero-section .bannertxt .hero-heading {
                    margin: 0 auto 10px !important;
                    font-size: clamp(1.45rem, 6vw, 2.15rem) !important;
                    line-height: 1.15 !important;
                    text-align: center !important;
                    overflow-wrap: anywhere;
                }

                .hero-section .bannertxt h1 span,
                .hero-section .bannertxt h2 span,
                .hero-section .bannertxt .hero-heading span {
                    font-size: inherit !important;
                    line-height: inherit !important;
                    font-weight: inherit;
                }

                .hero-section .bannertxt p,
                .hero-section .bannertxt .hero-subheading,
                .hero-section .bannertxt span {
                    font-size: clamp(0.9rem, 3.8vw, 1.1rem) !important;
                    line-height: 1.4 !important;
                    text-align: center !important;
                }

                .hero-section .bannertxt .btn,
                .hero-section .bannertxt .btn-outline-primary {
                    position: static !important;
                    display: inline-flex !important;
                    align-items: center;
                    justify-content: center;
                    max-width: 100%;
                    margin: 12px auto 0 !important;
                    padding: 9px 18px !important;
                    font-size: 0.9rem !important;
                }

                .hero-section .hero-slide-content {
                    position: absolute !important;
                    inset: 0 !important;
                    display: flex !important;
                    align-items: center !important;
                    justify-content: center !important;
                    padding: 20px 18px !important;
                    text-align: center !important;
                }

                .hero-section .hero-slide-content .hero-text {
                    width: 100% !important;
                    max-width: 620px !important;
                    margin: 0 auto !important;
                    text-align: center !important;
                }

                .hero-section .hero-slide-content h2 {
                    font-size: clamp(1.5rem, 6vw, 2.2rem) !important;
                    line-height: 1.15 !important;
                    text-align: center !important;
                }

                .hero-section .hero-slide-content p {
                    font-size: clamp(0.9rem, 3.8vw, 1.1rem) !important;
                    line-height: 1.4 !important;
                    text-align: center !important;
                }
            }

            @media (max-width: 380px) {
                .hero-section .bannertxt {
                    padding: 16px 14px !important;
                }
            }

            /* Shared compact, horizontally scrollable phone breadcrumbs. */
            @media (max-width: 767.98px) {
                body nav[aria-label="breadcrumb"] {
                    box-sizing: border-box;
                    width: calc(100% - 32px) !important;
                    max-width: 920px;
                    margin: 10px auto 16px !important;
                    padding: 5px 8px !important;
                    border: 1px solid #e4edef !important;
                    border-radius: 12px !important;
                    background: #f7fafb !important;
                    box-shadow: 0 3px 10px rgba(34, 75, 86, .07) !important;
                    overflow-x: auto !important;
                    overscroll-behavior-x: contain;
                    scrollbar-width: none;
                    -webkit-overflow-scrolling: touch;
                    touch-action: pan-x;
                }

                body nav[aria-label="breadcrumb"]::-webkit-scrollbar {
                    display: none;
                }

                body nav[aria-label="breadcrumb"] .breadcrumb {
                    display: flex !important;
                    flex-direction: row !important;
                    width: max-content !important;
                    min-width: 100%;
                    flex-wrap: nowrap !important;
                    align-items: center !important;
                    justify-content: flex-start !important;
                    gap: 5px !important;
                    margin: 0 auto !important;
                    padding: 0 !important;
                    overflow: visible !important;
                }

                body nav[aria-label="breadcrumb"] .breadcrumb-item {
                    display: flex !important;
                    flex: 0 0 auto !important;
                    width: auto !important;
                    min-width: max-content;
                    margin: 0 !important;
                    padding: 0 !important;
                    border: 1px solid #e3ebed !important;
                    border-radius: 9px !important;
                    background: #fff !important;
                    color: #50666d !important;
                    box-shadow: 0 1px 3px rgba(34, 75, 86, .05) !important;
                }

                body nav[aria-label="breadcrumb"] .breadcrumb-item.active {
                    border-color: #74bcc6 !important;
                    background: #74bcc6 !important;
                    color: #fff !important;
                    font-weight: 700;
                }

                body nav[aria-label="breadcrumb"] .breadcrumb-item a,
                body nav[aria-label="breadcrumb"] .breadcrumb-item span {
                    display: inline-flex !important;
                    flex: 0 0 auto;
                    width: auto !important;
                    min-height: 30px;
                    align-items: center;
                    justify-content: center !important;
                    padding: 5px 8px !important;
                    border: 0 !important;
                    border-radius: 8px !important;
                    background: transparent !important;
                    color: inherit !important;
                    font-size: 11px !important;
                    line-height: 1.25;
                    white-space: nowrap;
                    box-shadow: none !important;
                }

                body nav[aria-label="breadcrumb"] .breadcrumb-item svg {
                    width: 12px !important;
                    height: 12px !important;
                    flex: 0 0 12px;
                    margin-right: 4px !important;
                }

                body nav[aria-label="breadcrumb"] li.separator,
                body nav[aria-label="breadcrumb"] li[style*="margin: 0 10px"] {
                    display: inline-flex !important;
                    flex: 0 0 auto;
                    align-items: center;
                    justify-content: center;
                    width: auto !important;
                    margin: 0 1px !important;
                    padding: 0 !important;
                    color: #93a7ad !important;
                    font-size: 12px !important;
                }

                body nav[aria-label="breadcrumb"] .breadcrumb-item + .breadcrumb-item::before {
                    display: inline-flex !important;
                    float: none !important;
                    align-items: center;
                    padding: 0 !important;
                    color: #93a7ad !important;
                    content: "›" !important;
                    font-size: 12px;
                }
            }
        </style>

        <!-- Footer -->
        @include('frontend.layout.footer')
        <!-- End Footer -->
        
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.scrolling-tabs.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/swiper.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/script.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var changebox = $(".changebox");

                var firstclone = changebox.children(":first").clone();
                changebox.append(firstclone);

                var fsstr = changebox.parent().css("font-size");
                fsstr = fsstr.slice(0, fsstr.indexOf("p"));
                var fs = parseInt(fsstr);

                changebox.css("height", changebox.parent().css("font-size"));
                ChangeSize(0);
                setInterval(Next, 2000);

                function Next() {
                    if (typeof Next.i == 'undefined') {
                        Next.i = 0;
                    }
                    Next.i++;
                    if (Next.i == changebox.children("span").length) {
                        Next.i = 1;
                        changebox.scrollTop(0);
                    }
                    changebox.animate({scrollTop: (fs * Next.i) + Next.i * 5 + 3}, 500);
                    setTimeout(function () {
                        ChangeSize(Next.i);
                    }, 500);

                }

                function ChangeSize(i) {
                    var word = changebox.children("span").eq(i);
                    var wordsize = word.css("width");
                    changebox.css("width", wordsize);
                }
                
                $('.dropdown > a').click(function () {
                    location.href = this.href;
                });
            });
        </script>
        
        @yield('javaScript')
    </body>
</html>
