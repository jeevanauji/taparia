@extends('frontend.master')

@section('title')
Contact Us
@endsection()

@section('content')

<!-- STYLES -->
<style>
    /* Google Font */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        color: #222;
        background-color: #f9f9f9;
        line-height: 1.5;
        font-size: 14px; /* smaller base font */
    }

    /* HERO SECTION */
    .hero-section {
        position: relative;
        width: 100%;
        height: min(100vh, 450px); /* Max height 650px, else full viewport */
        min-height: 400px;
        display: flex;
        align-items: stretch;
        overflow: hidden;
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
    }
    .hero-section .hero-text {
        width: 100%;
        max-width: 800px;
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

    /* HEADINGS */
    .section-title {
        font-size: 2rem; /* 32px */
        font-weight: 700;
        margin-bottom: 40px;
        text-align: center;
        color: #74BCC6;
        letter-spacing: 0.02em;
    }

    .sub-heading {
        font-size: 1.2rem; /* 18px */
        color: #555;
        margin-bottom: 30px;
        text-align: center;
        font-weight: 600;
    }

    /* CONTACT CARDS */
    .conicon {
        background: #fff;
        padding: 28px 25px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease-in-out;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .conicon:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .conicon img {
        height: 38px;
        margin-bottom: 20px;
    }

    .conicon h4 {
        font-size: 1.3rem; /* 21px */
        font-weight: 700;
        color: #222;
        margin-bottom: 6px;
    }

    .conicon h6 {
        font-size: 1rem; /* 14px */
        color: #777;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .conicon p {
        font-size: 0.875rem; /* 14px */
        color: #444;
        margin-bottom: 6px;
        line-height: 1.4;
    }

    /* EMAIL SECTION */
    .emailadd p {
        font-size: 1rem; /* 14px */
        display: flex;
        align-items: flex-start;
        line-height: 1.4;
        margin-bottom: 15px;
        color: #333;
        max-width: 650px;
        margin-left: auto;
        margin-right: auto;
    }

    .emailadd i {
        margin-right: 12px;
        font-size: 18px;
        color: #007bff;
        margin-top: 3px;
    }

    /* MAP */
    .location_map iframe {
        width: 100%;
        height: 450px;
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
        .hero-text h1 {
            font-size: 1.9rem; /* 30px */
        }

        .hero-text p {
            font-size: 0.9rem; /* 13px */
            max-width: 100%;
        }

        .section-title {
            font-size: 1.7rem; /* 27px */
            margin-bottom: 30px;
        }

        .sub-heading {
            font-size: 1rem; /* 14px */
            margin-bottom: 25px;
        }

        .conicon img {
            height: 35px;
        }

        .conicon h4 {
            font-size: 1.15rem; /* 18.5px */
        }

        .conicon h6 {
            font-size: 0.9rem; /* 13px */
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            height: 350px;
        }

        .hero-text h1 {
            font-size: 1.6rem; /* 26px */
        }

        .hero-text p {
            font-size: 0.85rem; /* 12px */
        }

        .section-title {
            font-size: 1.5rem; /* 24px */
        }

        .sub-heading {
            font-size: 0.95rem; /* 13.5px */
        }

        .conicon {
            padding: 20px 18px;
        }

        .emailadd p {
            font-size: 0.9rem; /* 13px */
        }

        .location_map iframe {
            height: 300px;
        }
    }
</style>



<!-- HERO BANNER -->
<div class="hero-section">
    <!-- Banner Image -->
    <div class="videobanner">
        <div class="image-banner">
            <img src="{{ asset('frontend/images/contact.jpg') }}" alt="Banner">
        </div>
    </div>

    <!-- Text Overlay -->
    <div class="bannertxt">
        <div class="hero-text">
            <h2 class="wow fadeInLeft hero-heading" style="
                font-size: 70px;
                font-weight: 600;
                margin-bottom: 10px;
                color: rgb(103 100 100);
            ">
                GUIDANCE YOU<br>CAN TRUST
            </h2>
            <p class="hero-subheading" style="font-size: clamp(22px, 6vw, 30px);
                margin-bottom: 10px;
                color: #74BCC6;">
                Need help? Taparia is always here with guidance, support, and solutions for you.
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
        </div>
    </div>
</div>

<!-- CONTACT CONTENT -->
<div class="content-section py-5">
    <div class="container">
        <h2 class="section-title" style="margin-bottom:0 !important">Get in Touch</h2>
        <div style="
                width: 20%; 
                height: 1px; 
                background-color: #74BCC6; 
                margin-left: 40%;
                 margin-bottom: 20px;
                
            "></div>

            <!-- Short centered underline -->
            <!-- <div style="
                width: 180px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto;
                margin-bottom: 20px; 
                
            "></div> -->

        <h3 class="sub-heading mb-5">Our Offices</h3>

        <div class="row">
            <!-- Head Office -->
            <div class="col-md-4 mb-4">
                <div class="conicon h-100">
                    <i class="fa fa-home" style="font-size: 40px; color: #74BCC6; margin-bottom: 20px;"></i>
                    <h4>Head Office</h4>
                    <h6>Mumbai</h6>
                   <p><strong>Address:</strong> <p>423/424 A-2, Shah & Nahar, Lower Parel (W), Mumbai - 400013</p>
                    <p><strong>Phone:</strong> +91-22-61478600</p>
                </div>
            </div>

            <!-- Registered Office -->
            <div class="col-md-4 mb-4">
                <div class="conicon h-100">
                    <i class="fa fa-building" style="font-size: 40px; color: #74BCC6; margin-bottom: 20px;"></i>
                    <h4>Registered Office</h4>
                    <h6>Nashik</h6>
                   <p><strong>Address:</strong> <p>52 & 52-B, MIDC Satpur, Nashik - 422007</p>
                    <p><strong>Phone:</strong> +91-253-2350317/18</p>
                </div>
            </div>


            <div class="col-md-4 mb-4">
                <div class="conicon h-100">
                    <i class="fa fa-envelope" style="font-size: 40px; color: #74BCC6; margin-bottom: 20px;"></i>
                    <h4>Contact Us</h4>
                    <h6>Inquiry</h6>
                   <p><strong>Sales Enquiries:</strong> <p><a href="mailto:opltd@vsnl.net" style="color: #444444; text-decoration: none;">opltd@vsnl.net</a> / <a href="mailto:sales@tapariatools.com" style="color: #444444; text-decoration: none;">sales@tapariatools.com</a></p>
                    <p><strong>Customer Complaints:</strong> <a href="mailto:sales@tapariatools.com" style="color: #444444; text-decoration: none;">sales@tapariatools.com</a></p>
                </div>
                </div>
            </div>

            <!-- Email Office -->
            <!-- <div class="col-md-4 mb-4">
                <div class="conicon h-100">
                    <i class="fa fa-envelope" style="font-size: 40px; color: #74BCC6; margin-bottom: 20px;"></i>
                    <h4>Contact Us</h4>
                    <h6>Contact</h6>
                    <p><strong>Sales Enquiries:</strong> <a href="mailto:opltd@vsnl.net" style="color: #74BCC6; text-decoration: none;">opltd@vsnl.net</a> / <a href="mailto:sales@tapariatools.com" style="color: #74BCC6; text-decoration: none;">sales@tapariatools.com</a></p>
                    <p><strong>Customer Complaints:</strong> <a href="mailto:sales@tapariatools.com" style="color: #74BCC6; text-decoration: none;">sales@tapariatools.com</a></p>
                </div>
            </div> -->
        </div>

        <!-- EMAILS -->
        <!-- <div class="email-no mt-5">
          <div class="emailadd" style="max-width: 600px; margin: 0 auto; background: #f7f9fc; padding: 20px 25px 20px 50px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-family: Arial, sans-serif;">

            
            <div style="display: grid; grid-template-columns: 240px 1fr; row-gap: 15px; align-items: center; font-size: 0.95rem; color: #333;">

             
              <div style="display: flex; align-items: center; white-space: nowrap;">
                <i class="fa fa-envelope" style="color: #74BCC6; font-size: 20px; margin-right: 8px;"></i>
                <strong>Sales Enquiries:</strong>
              </div>
              <div style="white-space: nowrap;">
                <a href="mailto:opltd@vsnl.net" style="color: #74BCC6; text-decoration: none; margin-right: 10px;">opltd@vsnl.net</a> /
                <a href="mailto:sales@tapariatools.com" style="color: #74BCC6; text-decoration: none;">sales@tapariatools.com</a>
              </div>

             
              <div style="display: flex; align-items: center; white-space: nowrap;">
                <i class="fa fa-envelope" style="color: #74BCC6; font-size: 20px; margin-right: 8px;"></i>
                <strong>Customer Complaints:</strong>
              </div>
              <div style="white-space: nowrap;">
                <a href="mailto:sales@tapariatools.com" style="color: #74BCC6; text-decoration: none;">sales@tapariatools.com</a>
              </div>

            </div>
          </div>
        </div> -->




        <!-- Add this style block somewhere in your CSS or inside a <style> tag -->
        <style>
            .email-link:hover {
                color: #0662a3; /* lighter shade of #74BCC6 for hover */
                text-decoration: underline;
                transition: color 0.3s ease;
            }
        </style>

        <!-- MAP -->
        <div class="location_map mt-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30180.68250230338!2d72.82794!3d18.993913!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce923fffffff%3A0x7313db78fed8047e!2sTaparia%20Tools%20Ltd!5e0!3m2!1sen!2sin!4v1736423049239!5m2!1sen!2sin" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

@endsection()

@section('javaScript')
@endsection()
