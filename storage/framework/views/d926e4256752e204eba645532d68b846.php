<?php $__env->startSection('title'); ?>
Contact Us
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- STYLES -->
<style>
    /* Google Font */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        color: #222;
        background-color: #f9f9f9;
        line-height: 1.5;
        font-size: 14px;
    }

    /* ================================
       HERO SECTION - UPDATED
       ================================ */
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

    .hero-section {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100vh;
        max-height: 650px;
        min-height: 400px;
        display: flex;
        align-items: stretch;
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
        object-position: center;
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

    /* Hero Typography */
    .hero-heading {
        font-size: clamp(2.3rem, 5vw, 4.5rem);
        font-weight: 600;
        margin-bottom: 15px;
        color: rgb(255, 255, 255);
        line-height: 1.2;
    }

    .hero-subheading {
        font-size: clamp(1.1rem, 3vw, 1.9rem);
        margin-bottom: 20px;
        color: #fff;
        line-height: 1.4;
    }

    /* ================================
       HEADINGS
       ================================ */
    .section-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 40px;
        text-align: center;
        color: #74BCC6;
        letter-spacing: 0.02em;
    }

    .sub-heading {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 30px;
        text-align: center;
        font-weight: 600;
    }

    /* ================================
       CONTACT CARDS
       ================================ */
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
        font-size: 1.3rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 6px;
    }

    .conicon h6 {
        font-size: 1rem;
        color: #777;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .conicon p {
        font-size: 0.875rem;
        color: #444;
        margin-bottom: 6px;
        line-height: 1.4;
    }

    /* Email Link Hover Effect */
    .email-link:hover {
        color: #0662a3;
        text-decoration: underline;
        transition: color 0.3s ease;
    }

    /* ================================
       EMAIL SECTION
       ================================ */
    .emailadd p {
        font-size: 1rem;
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

    /* ================================
       MAP
       ================================ */
    .location_map iframe {
        width: 100%;
        height: 450px;
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    /* ================================
       SECTION UNDERLINE
       ================================ */
    .section-underline {
        width: 80px;
        height: 1px;
        background-color: #ff0000ff;
        margin: 0 auto 20px;
    }

    /* ================================
       RESPONSIVE BREAKPOINTS
       ================================ */
    /* Tablet */
    @media (max-width: 991px) {
        .hero-section {
            height: min(100vh, 500px);
        }

        .hero-section .hero-text {
            margin-left: 0;
            text-align: center;
        }

        .hero-heading {
            font-size: clamp(1.8rem, 4vw, 3rem);
            text-align: center;
        }

        .hero-subheading {
            font-size: clamp(1rem, 3vw, 1.5rem);
            text-align: center;
        }

        .section-title {
            font-size: 1.7rem;
            margin-bottom: 30px;
        }

        .sub-heading {
            font-size: 1rem;
            margin-bottom: 25px;
        }

        .conicon img {
            height: 35px;
        }

        .conicon h4 {
            font-size: 1.15rem;
        }

        .conicon h6 {
            font-size: 0.9rem;
        }
    }

    /* Mobile */
    @media (max-width: 768px) {
        .hero-section {
            height: 60vh;
            min-height: 300px;
            max-height: 400px;
        }

        .hero-section .bannertxt {
            justify-content: center;
            text-align: left;
            padding: 20px 20px 20px 0;
        }

        .hero-section .hero-text {
            margin-left: 0;
            max-width: 100%;
            padding: 0 20px;
            text-align: left;
        }

        .hero-heading {
            font-size: clamp(1.8rem, 6vw, 2.5rem);
            line-height: 1.1;
        }

        .hero-subheading {
            font-size: clamp(1rem, 4vw, 1.3rem);
            line-height: 1.3;
        }

        .image-banner img {
            object-position: center 25%;
        }

        .section-underline {
            width: 60px;
        }

        .conicon {
            padding: 20px 18px;
            align-items: center;
            text-align: center;
        }

        .conicon h4,
        .conicon h6,
        .conicon p {
            text-align: center;
        }
    }

    /* Small Mobile */
    @media (max-width: 576px) {
        .hero-section {
            max-height: 450px;
            min-height: 350px;
        }

        .hero-heading {
            font-size: clamp(1.5rem, 5vw, 2rem);
        }
        
        .hero-subheading {
            font-size: clamp(0.9rem, 3vw, 1.1rem);
        }

        .section-title {
            font-size: 1.5rem;
        }

        .sub-heading {
            font-size: 0.95rem;
        }

        .emailadd p {
            font-size: 0.9rem;
        }

        .location_map iframe {
            height: 300px;
        }
    }

    /* Additional responsive breakpoints */
    @media (max-width: 1200px) {
        .hero-heading {
            font-size: clamp(1.8rem, 4vw, 3.5rem);
        }
        
        .hero-subheading {
            font-size: clamp(1rem, 2.5vw, 1.7rem);
        }
    }
</style>



<!-- HERO BANNER -->
<div class="hero-section">
    <!-- Banner Image -->
  
<div class="videobanner">
    <picture class="image-banner">
        <source media="(max-width: 767px)" srcset="<?php echo e(asset('frontend/images/mobile-contact.jpg')); ?>">
        <img src="<?php echo e(asset('frontend/images/BANNER_123_25_conatctus.jpg')); ?>" alt="Banner">
    </picture>
</div>

    <!-- Text Overlay -->
    <div class="bannertxt">
        <div class="hero-text">
            <h2 class="wow fadeInLeft hero-heading" style="font-size: 70px;font-weight: 600;margin-bottom: 10px;color: rgb(255 255 255); text-align:left;">
				GUIDANCE YOU<br>CAN <span style="color:#AEE7ED;">TRUST</span>
            </h2>
            <p class="hero-subheading" style="font-size: clamp(22px, 6vw, 30px);
                margin-bottom: 10px;
                color: #fff;">
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
    <div class="container" data-aos="fade-up">
        <h2 class="section-title" style="margin-bottom:0 !important">Get in Touch</h2>
        <div class="section-underline"></div>
        <!-- <div style="
                width: 20%; 
                height: 1px; 
                background-color: #ff0000ff; 
                margin-left: 40%;
                 margin-bottom: 20px;
                
            "></div> -->

        <!-- Short centered underline -->
        <!-- <div style="
                width: 180px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto;
                margin-bottom: 20px; 
                
            "></div> -->

        <h3 class="sub-heading mb-5"  data-aos="fade-up"> Our Offices</h3>

        <div class="row">
            <!-- Head Office -->
            <div class="col-md-4 mb-4"  data-aos="fade-up">
                <div class="conicon h-100"  data-aos="fade-up">
                    <i class="fa fa-home" style="font-size: 40px; color: #74BCC6; margin-bottom: 20px;"></i>
                    <h4>Head Office</h4>
                    <h6>Mumbai</h6>
                    <p><strong>Address:</strong>
                    <p>423/424 A-2, Shah & Nahar, Lower Parel (W), Mumbai - 400013</p>
                    <p><strong>Phone:</strong> +91-22-61478600</p>
                </div>
            </div>

            <!-- Registered Office -->
            <div class="col-md-4 mb-4"  data-aos="fade-up">
                <div class="conicon h-100"  data-aos="fade-up">
                    <i class="fa fa-building" style="font-size: 40px; color: #74BCC6; margin-bottom: 20px;"></i>
                    <h4>Registered Office</h4>
                    <h6>Nashik</h6>
                    <p><strong>Address:</strong>
                    <p>52 & 52-B, MIDC Satpur, Nashik - 422007</p>
                    <p><strong>Phone:</strong> +91-253-2350317/18</p>
                </div>
            </div>


            <div class="col-md-4 mb-4"  data-aos="fade-up">
                <div class="conicon h-100"  data-aos="fade-up">
                    <i class="fa fa-envelope" style="font-size: 40px; color: #74BCC6; margin-bottom: 20px;"></i>
                    <h4>Contact Us</h4>
                    <h6>Inquiry</h6>
                    <p><strong>Sales Enquiries:</strong>
                    <p><a href="mailto:opltd@vsnl.net" style="color: #444444; text-decoration: none;">opltd@vsnl.net</a> / <a href="mailto:sales@tapariatools.com" style="color: #444444; text-decoration: none;">sales@tapariatools.com</a></p>
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
            color: #0662a3;
            /* lighter shade of #74BCC6 for hover */
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javaScript'); ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/frontend/contact-us.blade.php ENDPATH**/ ?>