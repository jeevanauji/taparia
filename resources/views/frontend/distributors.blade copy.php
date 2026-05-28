@extends('frontend.master')

@section('title')
For Distributors
@endsection()

@section('content')


<style>
.hero-section {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: min(100vh, 450px); /* Max height 650px, else full viewport */
    min-height: 400px;
    display: flex;
    align-items: stretch;
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
</style>

<div class="hero-section">
    <!-- Banner Image -->
    <div class="videobanner">
        <div class="image-banner">
            <img src="{{ asset('frontend/images/distributor_two.jpg') }}" alt="Banner">
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
                DISCOVER TAPARIA’S COMPLETE RANGE.
          </h2>
            <p style="font-size: clamp(22px, 6vw, 30px);
                margin-bottom: 10px;
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


<!-- Hero Section -->



<!-- Main Content -->
<div class="content-section" style="padding: 60px 15px;">
    <div class="container-xl" style="max-width: 1200px; margin: 0 auto;">
        
        <div class="bg-headings" style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2rem !important; font-weight: 600; color: #74BCC6;margin-bottom: 0 !important;">For Distributors</h2>
             <div style="
                width: 25%; 
                height: 1px; 
                background-color: #74BCC6; 
                margin-left: 440px;
                margin-bottom: 20px;
                
            "></div>

            <!-- Short centered underline -->
            <!-- <div style="
                width: 264px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto;
                margin-bottom: 20px; 
                
            "></div> -->
        </div>

        <p class="text-center meduam-fonts text-primary1" style="
            
            font-size: clamp(16px, 2.5vw, 20px);
            line-height: 1.6;
            max-width: 900px;
            margin: 0 auto 40px auto;
            font-size: 16px !important;
        ">
            At Taparia Tools, we take pride in being a trusted name in the hand tools industry, renowned for our quality, durability, and innovation. By joining our network of distributors, you gain access to a comprehensive range of world-class tools and the opportunity to partner with a brand that is synonymous with reliability and performance.
        </p>

        <div class="catelog-d-btn mt-4 text-center" style="margin-bottom: 60px;">
    <a href="#" class="btn-user-login"
       title="User Login"
       style="
            display: inline-block;
            transform: translateY(-50%);
            background-color: #74BCC6;
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: 2px solid #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(103, 100, 100, 0.5);
            z-index: 9999;
            white-space: nowrap;
            outline: none;
            transition: background-color 0.3s ease-in;
       "
       onmouseout="this.style.backgroundColor='#74BCC6'; this.style.boxShadow='0 6px 16px rgb(103, 100, 100)'"
       onmouseover="this.style.backgroundColor='#676464'; this.style.boxShadow='0 4px 12px rgba(103, 100, 100, 0.5)'"
       
       onblur="this.style.outline='none'">

        <span style="font-size: 12px;">USER LOGIN</span>
    </a>
</div>

        <!-- Inquiry Form -->
        <div class="container-xl" style="max-width: 800px; margin: 0 auto;">
            <h5 class="text-center" style="font-size: 2rem !important; font-weight: 500; margin-bottom: 20px;color: #74BCC6;">
                Fill out our Distributor Inquiry Form to get started with Taparia Tools.
            </h5>

            <div class="text-center" id="responseMessage" style="font-size: 20px; margin-top: 20px; display: none;"></div>

            <form id="distributorInquiry" method="POST" onsubmit="handleFormSubmission(event)">
                @csrf
                <div class="distrutor-forms" style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                    <div class="form-group">
                        <input class="form-control" type="text" name="Name" id="Name" placeholder="Name:" required style="
                            width: 100%;
                            padding: 12px 15px;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                        " />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="Phone" id="Phone" placeholder="Phone:" oninput="this.value=this.value.slice(0,10);" required style="
                            width: 100%;
                            padding: 12px 15px;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                        " />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="Email" id="Email" placeholder="Email:" required style="
                            width: 100%;
                            padding: 12px 15px;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                        " />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="Message" id="Message" rows="5" placeholder="Message:" style="
                            width: 100%;
                            padding: 12px 15px;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                        "></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" id="submitButton" class="btn btn-outline-primary" style="
                            font-size: 16px;
                            border: 1px;
                            background: #676464;
                            color: #ffff;
                            border-radius: 4px;
                            cursor: pointer;
                            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
                        " 
                        onmouseout="this.style.backgroundColor='#676464'; this.style.color='#fff'; this.style.boxShadow='none';"
                        >
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
            success: function (response) {
                if (JSON.parse(response).success) {
                    $('#responseMessage')
                        .css('color', 'green')
                        .text(JSON.parse(response).message)
                        .fadeIn()
                        .delay(5000)
                        .fadeOut();

                    $('#distributorInquiry')[0].reset();
                } else {
                    $('#responseMessage')
                        .css('color', 'red')
                        .text('An error occurred.')
                        .fadeIn()
                        .delay(5000)
                        .fadeOut();
                }
            },
            error: function () {
                $('#responseMessage')
                    .css('color', 'red')
                    .text('An error occurred. Please try again.')
                    .fadeIn()
                    .delay(5000)
                    .fadeOut();
            },
            complete: function () {
                $('#submitButton').text('Submit').attr('disabled', false);
            }
        });
    }
</script>
@endsection()

