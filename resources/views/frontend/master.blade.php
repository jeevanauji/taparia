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
