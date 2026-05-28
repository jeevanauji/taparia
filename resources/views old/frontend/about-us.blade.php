@extends('frontend.master')

@section('title')
About Us
@endsection()

@section('content')

<style>
    h1, h2, h3, h4, h5, h6, header {
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
        height: min(100vh, 450px); /* Max height 650px, else full viewport */
        min-height: 400px;
        display: flex;
        align-items: stretch;
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
            margin-top:14px;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .heading-con h2 {
                font-size: 2rem;
            }

            .mission-vission-bg {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .mission-box {
                padding: 2rem;
            }

            .container-fluid {
                padding: 0 15px;
            }
        }

        @media (max-width: 480px) {
            .heading-con h2 {
                font-size: 1.8rem;
            }

            .mission-box {
                padding: 1.5rem;
            }

            .icon-container {
                width: 80px;
                height: 80px;
            }

            .icon {
                width: 40px;
                height: 40px;
            }
        }

    @media (min-width: 1600px) {
        .hero-section {
            height: min(100vh, 650px);
        }
    }

    @media (min-width: 2101px){
        .hero-section {
            height: min(100vh,850px);
        }
    }
    .hero-section .videobanner {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: 0;
    }
    .hero-section .image-banner {
        width: 100%; height: 100%;
    }
    .hero-section .image-banner img {
        width: 100%; height: 100%;
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
        /* Remove min-height */
    }
    .hero-section .hero-text {
        width: 100%;
        max-width: 650px;
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
</style>

<div class="hero-section">
    <!-- Banner Image -->
    <div class="videobanner">
        <div class="image-banner">
            <img src="{{ asset('frontend/about_three.jpg') }}" alt="Banner">
        </div>
    </div>

    <!-- Text Overlay -->
    <div class="bannertxt">
        <div class="hero-text">
            <h2 class="wow fadeInLeft" style="
                font-size: 70px;
                font-weight: 600;
                margin-bottom: 10px;
                color: rgb(103 100 100);
            ">
                TRUST, LEGACY, <br> DEDICATION.
            </h2>
            <p style="font-size: clamp(22px, 6vw, 25px);
                margin-bottom: 10px;
                color: #74BCC6;">
                Our foundation is trust our future is continuous improvement.
            </p>
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

                <!-- <p style="font-size: clamp(22px, 6vw, 25px);
                margin-bottom: 10px;
                color: #74BCC6;">Taparia Tools has been consistently producing all hand tools in India with the exact technology of its collaborators.</p> -->
        </div>
    </div>
</div>

<div class="content-section pt-0">
    <div class="container-fluid pe-0" >
        <div class="row me-0">
            <div class="col-md-7 ps-md-5" style="padding:40px 0px 40px 0px;">
                <div class="aboutus-txt" style="padding-top:0px;">
                    <h2 style="color:#74BCC6;">About us</h2>
                     <div style="
                   width: 17%;
    height: 1px;
    background-color: #74BCC6;
     margin-bottom: 35px;
  
            "></div>

            <!-- Short centered underline -->
            <!-- <div style="
                    width: 152px;
    height: 1px;
    background-color: #74BCC6;
    margin: 5px auto 0 auto;
    margin-bottom: 35px;
    margin-right: 573px; 
                
            "></div> -->

                    <p style="font-size: 16px; margin-top: -16px;">
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
    <div class="about-count bg-primary py-5">
        <div class="container-xl">
            <div class="text-center">
                <img src="{{ asset('frontend/images/Taparia_new_logo2.png') }}" style="max-width: 350px;width: 100%;">
                <p class="text-light py-5" style="font-size: 16px;">
                    As we look to the future, Taparia Tools remains committed to maintaining its leadership in the hand tools industry. Our long-term goals include investing in cutting-edge technology, expanding our product range, and continually enhancing our processes. With a focus on sustainability and technological advancement, Taparia is set to continue shaping the future of the hand tools industry.
                </p>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-4">
                    <div class="company-aspect text-center">
                        <i class="fa fa-user"></i>
                        <h5 style="color:white;text-transform : none !important;">Skilled Workforce</h5>
                    </div>
                </div>
                <div class="col-4">
                    <div class="company-aspect text-center">
                        <i class="fa fa-building"></i>
                        <!-- <h3>800</h3> -->
                        <h5 style="color:white;text-transform : none !important;">Wide Distribution</h5>
                    </div>
                </div>
                <div class="col-4">
                    <div class="company-aspect text-center">
                        <i class="fa fa-globe"></i>
                        <!-- <h3>25</h3> -->
                        <h5 style="color:white;text-transform : none !important;">Worldwide Reach</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <section class="vm-section">
    <div class="vm-container-fluid">
        <div class="vm-heading-container">
            <h2 class="vm-main-title">VISION AND MISSION</h2>
            <div class="vm-title-underline">
                <div class="vm-underline-primary"></div>
            </div>
        </div>

        <div class="vm-content-wrapper">
            <div class="vm-card-container">
                <div class="vm-card vm-vision-card">
                    <div class="vm-icon-wrapper">
                        <svg class="vm-icon" viewBox="0 0 24 24">
                            <path d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z"/>
                        </svg>
                    </div>
                    <h3 class="vm-card-title">Vision</h3>
                    <div class="vm-card-text">
                        We strive to continually improve our products through innovation and advanced technology, ensuring they meet the highest standards.
                    </div>
                    <div class="vm-card-decoration"></div>
                </div>

                <div class="vm-card vm-mission-card">
                    <div class="vm-icon-wrapper">
                        <svg class="vm-icon" viewBox="0 0 24 24">
                            <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z"/>
                        </svg>
                    </div>
                    <h3 class="vm-card-title">Mission</h3>
                    <div class="vm-card-text">
                        We aspire to set new standards for quality and sustainability, ensuring that every product reflects our commitment to excellence.
                    </div>
                    <div class="vm-card-decoration"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
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
    margin-bottom: 3rem;
    position: relative;
}

.vm-main-title {
    font-size: 2.5rem;
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
    background: linear-gradient(90deg, #74bcc6, #5aa5b0);
    border-radius: 2px;
    position: relative;
}

.vm-content-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding-top: 2rem;
}

.vm-card-container {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
}

.vm-card {
    flex: 1;
    min-width: 300px;
    max-width: 550px;
    background: white;
    border-radius: 16px;
    padding: 3rem 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid rgba(116, 188, 198, 0.1);
}

.vm-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
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
    font-size: 1.75rem;
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
    width: 40px;
    height: 2px;
    background: #74bcc6;
    border-radius: 1px;
}

.vm-card-text {
    font-size: 1.1rem;
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

/* Responsive design */
@media (max-width: 992px) {
    .vm-card-container {
        gap: 2rem;
    }
    
    .vm-card {
        padding: 2.5rem 1.5rem;
    }
}

@media (max-width: 768px) {
    .vm-main-title {
        font-size: 2rem;
    }
    
    .vm-card {
        min-width: 100%;
        padding: 2rem 1.5rem;
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
}

@media (max-width: 480px) {
    .vm-main-title {
        font-size: 1.75rem;
    }
    
    .vm-card {
        padding: 1.5rem 1rem;
    }
    
    .vm-content-wrapper {
        padding-top: 1rem;
    }
}
</style>

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


    <section class="manufacturing-con" style="padding-bottom: 10rem; padding-top: 7rem;">

        <div style="background: #74bcc6db; padding: 3rem; border-radius: 10px; max-width: 982px; margin: 0 auto;">
            <h3 style="text-align: center;color: white; font-size: 2.5rem; font-weight: bold; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 2px; margin-top: 1rem;">MANUFACTURING FACILITY</h3>
            
            <p style="color: white; font-size: 1.1rem; line-height: 1.6; text-align: center; margin: 0;">The company operates fully equipped manufacturing facilities with all the essential processes for hand tool production under one roof. These plants are designed to manage both advanced technology and skilled labor, supporting the complex and meticulous nature of hand tool manufacturing.</p>
        </div>
            
    </section>

        <!-- <section class="quality-assu" style="padding: 60px 20px; background-color: #f9f9f9;">
            <div class="container" style="max-width: 1140px; margin: 0 auto;">

                
                <div class="heading-con" style="margin: 0 auto; display: block; width: 100%; max-width: 1140px; text-align: center;">
                    <h2 style="font-size: 32px;margin-bottom: 15px; font-weight: bold;">
                        QUALITY ASSURANCE & INNOVATION
                    </h2>
                     <div style="
                    width: 60%;
    height: 1px;
    background-color: #74BCC6;
    margin-top: 8px;
    margin-left: 210px;
            "></div>

         
            <div style="
                    width: 550px;
    height: 1px;
    background-color: #74BCC6;
    margin: 5px auto 0 auto;
    margin-bottom: 20px; 
                
            "></div>
                    <p style="font-size: 16px; color: #555; max-width: 800px; margin: 0 auto;">
                        At Taparia Tools, quality is at the core of everything we do. As an ISO 9001-certified company, we adhere to strict quality control processes, ensuring that our tools exceed international standards, including those from the U.S., U.K., and Germany. Every tool is designed, tested, and produced with the highest quality in mind.
                    </p>
                </div>

         
                <div class="quality-certificates mt-5" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 50px; margin-top: 40px; align-items: center;">

                 
                    <img src="{{ asset('frontend/images/ISO.png') }}" alt="ISO Certificate" style="
                        width: 300px;
                        height: 300px;
                        border-radius: 50%; /* optional: makes it circular */
                        object-fit: cover;   /* keeps image proportions clean */
                        transition: all 0.3s ease;
                        flex-shrink: 0;
                        box-shadow: none;
                        cursor: pointer;
                    " 
                    onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'; this.style.transform='scale(1.05)'"
                    onmouseout="this.style.boxShadow='none'; this.style.transform='scale(1)'">

                 
               

                    
                    <div style="
                        width: 200px;
                        height: 200px;
                        background: #eee;
                        border: 1px dashed #ccc;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: #888;
                        font-size: 16px;
                        font-style: italic;
                        text-align: center;
                        padding: 15px;
                        flex-shrink: 0;
                        transition: all 0.3s ease;
                        cursor: default;
                    " onmouseover="this.style.background='#f8f8f8'; this.style.color='#555'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'; this.style.transform='scale(1.05)'" 
                       onmouseout="this.style.background='#eee'; this.style.color='#888'; this.style.boxShadow='none'; this.style.transform='scale(1)'">
                        Coming Soon
                    </div>

                    <div style="
                        width: 200px;
                        height: 200px;
                        background: #eee;
                        border: 1px dashed #ccc;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: #888;
                        font-size: 16px;
                        font-style: italic;
                        text-align: center;
                        padding: 15px;
                        flex-shrink: 0;
                        transition: all 0.3s ease;
                        cursor: default;
                    " onmouseover="this.style.background='#f8f8f8'; this.style.color='#555'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'; this.style.transform='scale(1.05)'" 
                       onmouseout="this.style.background='#eee'; this.style.color='#888'; this.style.boxShadow='none'; this.style.transform='scale(1)'">
                        Coming Soon
                    </div>

                    <div style="
                        width: 200px;
                        height: 200px;
                        background: #eee;
                        border: 1px dashed #ccc;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: #888;
                        font-size: 16px;
                        font-style: italic;
                        text-align: center;
                        padding: 15px;
                        flex-shrink: 0;
                        transition: all 0.3s ease;
                        cursor: default;
                    " onmouseover="this.style.background='#f8f8f8'; this.style.color='#555'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'; this.style.transform='scale(1.05)'" 
                       onmouseout="this.style.background='#eee'; this.style.color='#888'; this.style.boxShadow='none'; this.style.transform='scale(1)'">
                        Coming Soon
                    </div>

                </div>


            </div>

           
            <style>
                img[alt="ISO Certificate"]:hover {
                    transform: scale(1.05);
                    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
                }
                div[style*="Coming Soon"]:hover {
                    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
                }
            </style>
        </section> -->






    <!-- <div class="heading-con" style="margin: 0 auto; display: block; width: 100%; max-width: 1140px;">
        <h2 class="wow fadeInUp" style="margin-top: 20px;">AWARDS AND RECOGNITIONS</h2>
         <div style="
                width: 45%;
    height: 1px;
    background-color: #74BCC6;
    margin-top: 8px;
    margin-left: 304px;
            "></div>

            
            <div style="
                width: 450px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto; 
                
            "></div>
    </div>

    <section class="py-5 bg-primary mt-4 awards-rec">
        <div class="container">

            <div class="quality-ass-slider owl-carousel mb-5 mt-5">
                <div class="item">
                    <div class="qa-ass-box"><img src="{{ asset('frontend/images/amazon.png') }}" /></div>
                </div>
                <div class="item">
                    <div class="qa-ass-box"><img src="{{ asset('frontend/images/brand.png') }}" /></div>
                </div>
                <div class="item">
                    <div class="qa-ass-box"><img src="{{ asset('frontend/images/number-1.png') }}" /></div>
                </div>

            </div>

            <p class="text-center text-light">Taparia Tools excellence has been recognized with numerous Export Excellence Awards, beginning in 1974 and continuing through the decades. We are proud to have been acknowledged for our contributions to the industry both in India and internationally,</p>

            <p class="text-center text-light">with accolades across multiple years: 1977-78, 1978-79, 1979-80, and many more through to 2006-07. Our tools are not only trusted across India but are also well-received in countries such as the U.S.A., U.K., Germany, Sweden, and more</p>

        </div>
    </section> -->

</div>
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
@endsection()