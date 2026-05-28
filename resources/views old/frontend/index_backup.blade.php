@extends('frontend.master')

@section('title')
Home
@endsection()

@section('content')
<div class="hero-section" style="position: relative; height: clamp(250px, 40vw, 400px); overflow: hidden;">
    <!-- Video Background -->
    <div class="videobanner" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
        <div class="video-banner" style="width: 100%; height: 100%;">
            <video id="vid33" autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
                <source src="{{ asset('frontend/TAPRIA_EW_WEBBANNER VIDEO_June_2025_V2.mp4') }}" type="video/mp4">
                <source src="{{ asset('tapariya-tools.ogg') }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <!-- Text Overlay (Centered) -->
    <div class="bannertxt" style="
        position: relative;
        z-index: 1;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 10px;
        box-sizing: border-box;
    ">
        <div class="hero-text" style="
            width: 100%;
            max-width: 800px;
        ">
            <h1 class="wow fadeInLeft" style="
                font-size: clamp(20px, 5vw, 38px);
                font-weight: 600;
                margin-bottom: 10px;
            ">
                A One Stop Source
            </h1>

            <div class="rotating__text" style="
                font-size: clamp(14px, 3.5vw, 20px);
                font-weight: 400;
            ">
                for all kinds & Varieties of
                <div class="changebox" style="margin-top: 5px;">
                    <span>Hand Tools</span><br>
                    <span>Cutting Tools</span><br>
                    <span>Power Tools Accessories</span>
                </div>
            </div>

            <a href="{{ url('products') }}" class="btn btn-outline-primary position-relative wow fadeInRight" style="
                margin-top: clamp(20px, 5vw, 50px);
                font-size: clamp(12px, 2.5vw, 16px);
                padding: 6px 16px;
            ">
                Read More
            </a>
        </div>
    </div>
</div>






<section class="section-padd-t">
    <div class="container">
        <div class="text-center">
            <div class="heading-con">
                <h2 class="wow fadeInUp">New Products</h2>
                <p class="wow fadeInUp">
                    At <strong>Taparia</strong>, we know the right tools make all the difference. For over 50 years, we’ve been creating high-quality, durable hand tools that get the job done right!
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-4 mt-3 px-3 px-md-0">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($newProducts as $newproduct)
            <div class="swiper-slide">
                @if ($newproduct->productImage)
                <img src="{{ url($newproduct->productImage) }}" />
                @endif
                <div class="hover-section text-center">
                    <h4>
                        <a href="{{ url('product/' . Str::slug($newproduct->productName)) }}" class="text-white" style="text-decoration: none;">
                            {{ $newproduct->productName }}
                        </a>
                    </h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padd about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 wow fadeInLeft">
                <img src="{{ asset('frontend/images/about-us.png') }}" class="img-fluid" />
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 mt-5 mt-lg-0">
                <div class="heading-con align-items-end text-end w-100">
                    <h2 class="wow fadeInUp mb-0 pe-md-5">ABOUT US</h2>
                </div>
                <h4 class="wow fadeInUp text-end pe-md-5">PROFESSIONAL QUALITY</h4>
                <div class="wow fadeInLeft mt-4">
                    <p>
                        Founded in 1965, <strong>Taparia Tools Ltd.</strong> is one of India’s most trusted hand tool manufacturers. Our journey began with a partnership with Bahco of Sweden, bringing their expertise to India. Today, we blend high-quality craftsmanship with advanced technology, catering to both professionals and DIY enthusiasts. With a wide range of tools that meet global standards, we proudly represent India on the international stage.
                    </p>
                    <p>
                        Taparia is committed to delivering reliable products that meet customer needs. Integrity, innovation, and a focus on quality drive every part of our work. We also prioritize sustainable practices and continuous growth through technology.
                    </p>
                </div>
                <div class="mt-4">
                    <a href="{{ url('about-us') }}" class="btn btn-outline-primary wow fadeInRight">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sustainble-section">
    <div class="container">
        <div class="sustainble-con section-padding-70">
            <h2 class="wow fadeInUp">LEGACY</h2>
            <p class="wow fadeInUp">
                Taparia has been synonymous with trust and excellence for over five decades, offering tools that stand the test of time. As a brand leader in India and a global exporter, Taparia’s legacy continues to be built on the strength of quality, innovation, and customer satisfaction.
            </p>
            <a href="{{ url('products') }}" class="btn btn-outline-primary wow fadeInRight mt-4">Read More</a>
        </div>
    </div>
</section>

<section class="section-padd-t features-categories py-md-5">
    <div class="container">
        <div class="text-center">
            <div class="heading-con">
                <h2 class="wow fadeInUp">FEATURE CATEGORIES</h2>
                <p class="wow fadeInUp">
                    With over <strong>800 distributors across India</strong>, getting your hands on top-notch tools has never been easier.                    
                </p>
            </div>
        </div>
    </div>

    <div class="section-padd-b mt-5">
        <div class="container wow fadeInDown">
            <div id="tabs">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach($categories as $key => $category)
                    <li class="nav-item" role="presentation">
                        <button 
                            class="nav-link {{ $key === 0 ? 'active' : '' }}" 
                            id="pills-tab-{{ $category->id }}" 
                            data-bs-toggle="pill" 
                            data-bs-target="#pills-{{ $category->id }}" 
                            type="button" 
                            role="tab" 
                            aria-controls="pills-{{ $category->id }}" 
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                            {{ $category->name }}
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content catelists" id="pills-tabContent" style="margin-top: 5rem;">
                @foreach($productsByCategory as $key => $category)
                <div 
                    class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" 
                    id="pills-{{ $category['categoryId'] }}" 
                    role="tabpanel" 
                    aria-labelledby="pills-tab-{{ $category['categoryId'] }}">
                    <div class="row">
                        @foreach($category['products'] as $product)
                        <div class="col-md-6 col-lg-6 col-xl-4 mb-5">
                            <div class="best-pro-box">
                                @if ($product->productImage)
                                    <img src="{{ url($product->productImage) }}" />
                                @else
                                    <img src="{{ asset('frontend/images/default.jpg') }}" />
                                @endif
                                <div class="hover-section text-center">                                
                                    <h4>
                                        <a href="{{ url('product/' . Str::slug($product->productName)) }}" class="text-white text-decoration-none" title="{{ ucwords(strtolower($product->productName)) }}">
                                            {{ $product->productName }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <a href="{{ url('product/' . Str::slug($product->productName)) }}" class="btn btn-outline-primary">
                                    Read More
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section-padd getintouch">
    <div class="container">
        <div class="getintouch-con">
            <span class="fa fa-whatsapp wow fadeInLeft">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
			</span>
            <div class="ms-3">
                <h2 class="wow fadeInUp mb-4">Get in touch with us</h2>
                <a href="{{ url('contact-us') }}" class="btn btn-outline-primary wow fadeInRight">Read More</a>
            </div>
        </div>
    </div>
</section>

<section class="py-md-5" style="margin-top: 5rem;">
    <div class="container" style="margin-bottom: 3rem;">
        <div class="text-center">
            <h2 class="wow fadeInUp mb-4">Tool Excellence Hub</h2>
            <p class="wow fadeInUp">
                The companies research and development department is manned by Mechanical Engineers and Metallurgists equipped with latest CAD design facilities etc.From its inception, the company has laid high emphasis on the quality of its products.
            </p>
        </div>
    </div>
    <div class="container pt-2">
    <div style="position:relative">
    <div class="scroll-container" id="main" style="height: 500px; overflow: auto;position:relative;">
        <div class="fixedt-po"></div>
        <div class="content" id="container">
            <section class="scrollopa" data-image="{{ asset('frontend/images/c-clamps.png') }}">
                <h3>C-Clamps</h3>
                <p>
                    Drop Forged from high grade carbon steel. Withstands load test as specified in relevant “I.S.” even exceeds U.S., Federal specifications of load test. Scientifically heat treated body and screw to give maximum strength.	
                </p>
            </section>            
            <section class="scrollopa" data-image="{{ asset('frontend/images/bucket-frease-pump.png') }}">
                <h3>Bucket Frease Pump</h3>
                <p>
                    Bucket grease pump body made from high gauge quality steel sheet for high strength & prolong use. Bucket grease pump are designed for quick and effortless greasing in applications that require large volume of lubrication frequently.
                </p>
            </section>
            <section class="scrollopa" data-image="{{ asset('frontend/images/pruning-shear.png') }}">
                <h3>Pruning Shear</h3>
                <p>
                    Jaws are Drop forged with high grade carbon steel. Scientifically heat treated for long lasting cutting life. The cutting edges are sharp and precision machined to appropriate angle to cut the tree stems.
                </p>
            </section>
            <section class="scrollopa" data-image="{{ asset('frontend/images/wire-rope-cutters.png') }}">
                <h3>Wire Rope Cutters</h3>
                <p>
                    Drop forged jaws made from high grade alloy steel. Precision Ground Sharp Cutting Edges enable easy cutting of the wire rope. Differential Hardened cutting edges gives long lasting cutting performance. Stopper is provided inner side of joint pieces to restrict excess closing of handle.
                </p>
            </section>
            <section class="mobileh" data-image="{{ asset('frontend/images/wire-rope-cutters.png') }}" style="height:20vh !important;"></section>
            </div>
            <div class="image-container">
                <img id="sticky-image" src="{{ asset('frontend/images/cordless-screwdriver.webp') }}" alt="Sticky Image">
            </div>
            
        </div>
        <div class="fixedb-po"></div>
    </div>
    </div>
</section>



@endsection()

@section('javaScript')

@endsection()