@extends('frontend.master')

@section('title')
For Distributors
@endsection()

@section('content')

<style>
    /* ================================
       HERO SECTION - UPDATED
       ================================ */
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
        font-size: clamp(2.3rem, 5vw, 4.375rem);
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
       CONTENT SECTION
       ================================ */
    .content-section {
        padding: 60px 15px;
    }

    .section-heading {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-heading h2 {
        font-size: clamp(1.5rem, 4vw, 2rem);
        font-weight: 600;
        color: #74BCC6;
        margin-bottom: 15px;
    }

    .section-underline {
        width: 80px;
        height: 1px;
        background-color: #ff0000ff;
        margin: 0 auto 20px;
    }

    .intro-text {
        font-size: clamp(14px, 2vw, 16px);
        line-height: 1.8;
        max-width: 900px;
        margin: 0 auto 40px;
        text-align: center;
        color: #676464;
    }

    /* ================================
       BUTTON STYLING
       ================================ */
    .btn-outline-primary {
        margin-top: 20px !important;
        font-size: 16px;
        color: white;
        border: none;
        text-decoration: none;
        display: inline-block;
        padding: 12px 30px;
        border-radius: 4px;
        transition: all 0.3s ease;
        background: #676464;
    }

    .btn-outline-primary:hover {
        background-color: #74BCC6;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* User Login Button */
    .catelog-d-btn {
        text-align: center;
        margin-bottom: 60px;
    }

    .btn-user-login {
        display: inline-block;
        background-color: #74BCC6;
        color: #ffffff;
        padding: 12px 30px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(103, 100, 100, 0.3);
        white-space: nowrap;
        outline: none;
        transition: all 0.3s ease;
    }

    .btn-user-login:hover {
        background-color: #676464;
        box-shadow: 0 6px 16px rgba(103, 100, 100, 0.5);
        transform: translateY(-2px);
        color: #ffffff;
    }

    .btn-user-login:focus {
        outline: 3px solid #74BCC6;
        outline-offset: 4px;
    }

    /* ================================
       FORM SECTION
       ================================ */
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-title {
        text-align: center;
        font-size: clamp(1.25rem, 3vw, 2rem);
        font-weight: 500;
        margin-bottom: 30px;
        color: #74BCC6;
        line-height: 1.4;
    }

    .response-message {
        font-size: 18px;
        text-align: center;
        margin-top: 20px;
        display: none;
        padding: 15px;
        border-radius: 4px;
    }

    .distributor-forms {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #74BCC6;
        box-shadow: 0 0 0 3px rgba(116, 188, 198, 0.1);
        outline: none;
    }

    .form-control::placeholder {
        color: #999;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        padding: 12px 40px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        background-color: #74BCC6;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        border: 1px solid #ffffff;
        box-shadow: 0 4px 12px rgba(116, 188, 198, 0.3);
    }

    .btn-submit:hover {
        background: #676464;
        box-shadow: 0 4px 12px rgba(116, 188, 198, 0.3);
        transform: translateY(-2px);
        color: #ffffff;
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* ================================
       RESPONSIVE BREAKPOINTS
       ================================ */
    /* Large Desktop */
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

    /* Tablet */
    @media (max-width: 991px) {
        .hero-section {
            height: min(100vh, 500px);
        }

        .hero-section .hero-text {
            margin-left: 0;
            text-align: center;
        }

        .content-section {
            padding: 40px 15px;
        }

        .catelog-d-btn {
            margin-bottom: 40px;
        }
        
        .form-title {
            text-align: center;
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
            text-align: center;
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
            text-align: left;
            line-height: 1.1;
        }

        .hero-subheading {
            font-size: clamp(1rem, 4vw, 1.3rem);
            line-height: 1.3;
            text-align: left;
            color: #fff;
        }

        .image-banner img {
            object-position: center 25%;
        }

        .content-section {
            padding: 30px 15px;
        }

        .section-heading {
            margin-bottom: 30px;
        }

        .section-underline {
            width: 60px;
        }

        .intro-text {
            margin-bottom: 30px;
            text-align: center;
            padding: 0 10px;
        }

        .catelog-d-btn {
            margin-bottom: 30px;
        }

        .btn-user-login {
            padding: 10px 25px;
            font-size: 13px;
        }

        .form-title {
            margin-bottom: 25px;
            text-align: center;
        }

        .distributor-forms {
            gap: 15px;
        }

        .form-control {
            padding: 10px 12px;
            font-size: 15px;
        }

        .btn-submit {
            width: 100%;
            padding: 12px 20px;
        }

        .btn-outline-primary {
            padding: 10px 25px;
            font-size: 14px;
            margin-top: 15px !important;
        }
    }

    /* Small Mobile */
    @media (max-width: 576px) {
        .hero-section {
            min-height: 350px;
            max-height: 450px;
        }

        .hero-heading {
            font-size: clamp(1.5rem, 5vw, 2rem);
        }
        
        .hero-subheading {
            font-size: clamp(0.9rem, 3vw, 1.1rem);
        }

        .section-heading h2 {
            margin-bottom: 10px;
        }

        .form-control {
            font-size: 14px;
        }

        .response-message {
            font-size: 16px;
        }
        
        .btn-outline-primary {
            padding: 10px 20px;
            font-size: 14px;
        }
    }

    /* Additional responsive breakpoints */
    @media (max-width: 1200px) {
        .hero-heading {
            font-size: clamp(1.8rem, 4vw, 3.5rem);
        }
    }
</style>

<div class="hero-section">
    <!-- Banner Image -->
  
	<div class="videobanner">
    <picture class="image-banner">
        <source media="(max-width: 767px)" srcset="{{ asset('frontend/images/mobile-distribution.jpg') }}">
        <img src="{{ asset('frontend/images/BANNER_123_25_distributor.jpg') }}" alt="Banner">
    </picture>
</div>


    <!-- Text Overlay -->
    <div class="bannertxt">
        <div class="hero-text" data-aos="fade-up">
            <h2 class="hero-heading wow fadeInLeft" style="visibility: visible; animation: 1s ease 0s 1 normal forwards running fadeInLeft;">
				<span style="color:#AEE7ED;">DISCOVER</span> TAPARIA'S COMPLETE RANGE.
            </h2>
            <p class="hero-subheading" style="color: #fff; text-align:left;">Made for strength, comfort, and reliability.</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="content-section">
    <div class="container-xl" style="max-width: 1200px; margin: 0 auto;">

        <div class="section-heading" data-aos="fade-up">
            <h2>For Distributors</h2>
            <div class="section-underline"></div>
        </div>

        <p class="intro-text" data-aos="fade-up">
            At Taparia Tools, we take pride in being a trusted name in the hand tools industry, renowned for our
            quality, durability, and innovation. By joining our network of distributors, you gain access to a
            comprehensive range of world-class tools and the opportunity to partner with a brand that is synonymous with
            reliability and performance.
        </p>

        <div class="catelog-d-btn" data-aos="fade-up">
            <a style="background: #676464; border-radius: 4px;" href="#" class="btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s" title="User Login">
                <span>USER LOGIN</span>
            </a>
        </div>

        <!-- Inquiry Form -->
        <div class="form-container">
            <h5 class="form-title">
                Fill out our Distributor Inquiry Form to get started with Taparia Tools.
            </h5>

            <div class="response-message" id="responseMessage"></div>

            <form id="distributorInquiry" method="POST" onsubmit="handleFormSubmission(event)" data-aos="fade-up">
                @csrf
                <div class="distributor-forms">
                    <div class="form-group">
                        <input class="form-control" type="text" name="Name" id="Name" placeholder="Name *" required />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="Phone" id="Phone" placeholder="Phone *"
                            oninput="this.value=this.value.slice(0,10);" required />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="Email" id="Email" placeholder="Email *"
                            required />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="Message" id="Message" rows="5"
                            placeholder="Message"></textarea>
                    </div>
                    <div class="form-group text-center" data-aos="fade-up">
                        <button style="background: #676464; border-radius: 4px;" href="#" class=" btn-submit btn btn-outline-primary position-relative wow fadeInRight" data-wow-delay="0.6s" type="submit" id="submitButton">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection()

@section('javaScript')
<script type="text/javascript">
    function handleFormSubmission(e) {
        e.preventDefault();

        const formData = {
            name: $('#Name').val(),
            phone: $('#Phone').val(),
            email: $('#Email').val(),
            message: $('#Message').val(),
        };

        $('#submitButton').text('Sending...').attr('disabled', true);

        $.ajax({
            url: "{{ route('distributor.send.email') }}",
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    $('#responseMessage')
                        .css({
                            'color': 'green',
                            'background-color': '#d4edda',
                            'border': '1px solid #c3e6cb'
                        })
                        .text(result.message)
                        .fadeIn()
                        .delay(5000)
                        .fadeOut();

                    $('#distributorInquiry')[0].reset();
                } else {
                    $('#responseMessage')
                        .css({
                            'color': 'red',
                            'background-color': '#f8d7da',
                            'border': '1px solid #f5c6cb'
                        })
                        .text('An error occurred.')
                        .fadeIn()
                        .delay(5000)
                        .fadeOut();
                }
            },
            error: function() {
                $('#responseMessage')
                    .css({
                        'color': 'red',
                        'background-color': '#f8d7da',
                        'border': '1px solid #f5c6cb'
                    })
                    .text('An error occurred. Please try again.')
                    .fadeIn()
                    .delay(5000)
                    .fadeOut();
            },
            complete: function() {
                $('#submitButton').text('Submit').attr('disabled', false);
            }
        });
    }
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection()