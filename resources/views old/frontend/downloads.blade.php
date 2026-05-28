@extends('frontend.master')

@section('title')
Downloads
@endsection

@section('content')

<!-- Fonts & Styles -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 1.7;
        color: #333;
    }

    h1, h2, h3 {
        font-weight: 600;
        color: #74BCC6;
    }

    h1 {
        font-size: 42px;
    }

    h2 {
        font-size: 32px;
    }

    p {
        color: #555;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        background-color: #f1f5f9;
        margin-bottom: 40px;
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

    /* Section Headings */
    .bg-headings h2 {
        font-size: 2rem !important;
        text-align: center;
        margin-bottom: 20px;
    }

    .meduam-fonts {
        font-size: 16px;
       
    }

    .small-fonts {
        font-size: 16px;
    }

    /* Download Button */
    .btn.download {
        font-weight: 500;
        font-size: 18px;
        padding: 12px 24px;
        border: 2px solid #74BCC6;
        color: #74BCC6;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn.download:hover {
        background-color: #74BCC6;
        color: #fff;
    }

    /* Filters */
    #yearFilter,
    #searchInput {
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
    }

    #yearFilter:focus,
    #searchInput:focus {
        border-color: #74BCC6;
        box-shadow: 0 0 0 0.15rem rgba(4, 69, 124, 0.25);
    }

    /* Downloads Table */
    .table {
        font-size: 16px;
        border-radius: 8px;
        overflow: hidden;
    }

    .table thead {
        background-color: #74BCC6;
        color: #fff;
    }

    .table th,
    .table td {
        padding: 16px;
        vertical-align: middle;
    }

    .table td a {
        text-decoration: none;
        color: #74BCC6;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .table td a:hover {
        color: #022d4f;
        text-decoration: underline;
    }

    .download-item:hover {
        background-color: #f9f9f9;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-text h1 {
            font-size: 32px;
        }

        .bg-headings h2 {
            font-size: 28px;
        }

        .table thead {
            display: none;
        }

        .table tbody tr {
            display: block;
            margin-bottom: 20px;
        }

        .table tbody td {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            border-top: 1px solid #ddd;
        }

        .table tbody td::before {
            content: attr(data-label);
            font-weight: 600;
        }
    }
</style>


<!-- Inline animation CSS -->
<style>
@keyframes pulseRightGlow {
    0%   { box-shadow: 0 0 12px rgba(0,115,255,0.3); }
    50%  { box-shadow: 0 0 22px rgba(0,115,255,0.6); }
    100% { box-shadow: 0 0 12px rgba(0,115,255,0.3); }
}
</style>



<!-- Hero Section -->
<div class="hero-section">
    <!-- Banner Image -->
    <div class="videobanner">
        <div class="image-banner">
            <img src="{{ asset('frontend/images/download.jpg') }}" alt="Banner">
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
                TAPARIA <br> PRODUCT VAULT
          </h2>
            <p style="font-size: clamp(22px, 6vw, 30px);
                margin-bottom: 10px;
                color: #74BCC6;">Taparia’s comprehensive resources to help you work smarter.</p>
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

<!-- Content Section -->
<div class="content-section pb-5">
    <div class="container-xl">
        <div class="bg-headings" style="width: fit-content;
    margin: 0 auto;">
            <h2 style="margin-bottom:0px !important">Downloads
                <div style="
                width: 98%; 
                height: 1px; 
                background-color: #74BCC6; 
                margin-bottom: 20px; 
                
            "></div>
            </h2>
            

            <!-- Short centered underline -->
            <!-- <div style="
                width: 170px; 
                height: 1px; 
                background-color: #74BCC6; 
                margin: 5px auto 0 auto;
                margin-bottom: 20px; 
                
            "></div> -->
        </div>
        <p class="text-center meduam-fonts">Welcome to our Resource Hub! Here, you’ll find essential downloadable resources.</p>
        <p class="text-center small-fonts">Here, you can find product catalogs, manuals, technical specifications, and other important documents to help you explore our wide range of high-quality tools.</p>

        <!-- Main Download Button -->
        <div class="text-center mt-4">
            <a href="Taparia_Tools_Price_List_2025.pdf" target="_blank"
               style="
                   display: inline-flex;
                   align-items: center;
                   gap: 10px;
                   background-color: #74BCC6;
                   color: #fff;
                   font-size: 18px;
                   font-weight: 500;
                   padding: 14px 28px;
                   border-radius: 8px;
                   text-decoration: none;
                   border: none;
                   transition: background 0.3s ease, transform 0.2s ease;
                   box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
               "
               onmouseover="this.style.backgroundColor='#74BCC6'; this.style.transform='translateY(-2px)'"
               onmouseout="this.style.backgroundColor='#74BCC6'; this.style.transform='translateY(0)'"
            >
                <span class="material-icons" style="font-size: 22px;">download</span>
                Download Taparia Tools Price List
            </a>
        </div>


        <!-- Filters -->
        <div class="row justify-content-between align-items-center mb-4" style="margin-top:100px">
            <!-- <div class="col-md-6 mb-3 mb-md-0">
                <label for="yearFilter" class="me-2 fw-bold">Filter by Year:</label>
                <select id="yearFilter" class="form-select d-inline-block " style="width:115px !important">
                    <option value="all">All Years</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div> -->
            <div class="col-md-6">
                <label for="searchInput" class="me-2 fw-bold">Search:</label>
                <input type="text" id="searchInput" class="form-control d-inline-block w-auto" placeholder="Type to search...">
            </div>
        </div>

        <!-- Downloads Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th style="width: 60%; text-align:left">Resource Name</th>
                        <!-- <th style="width: 20%;">Year</th> -->
                        <th style="width: 20%;">Download</th>
                    </tr>
                </thead>
                <tbody id="downloadsContainer">
                    @foreach ($downloads as $download)
                        <tr class="download-item"
                            data-year="{{ \Carbon\Carbon::parse($download->created_at)->format('Y') }}"
                            data-name="{{ strtolower($download->contentName) }}">
                            <td style="text-align:left" data-label="Resource">{{ $download->contentName }}</td>
                            <!-- <td data-label="Year">{{ \Carbon\Carbon::parse($download->created_at)->format('Y') }}</td> -->
                            <td data-label="Download">
                                <a href="{{ $download->pdfFile }}" target="_blank" aria-label="Download {{ $download->contentName }}">
                                    <span class="material-icons" style="font-size: 16px;">download</span> Download
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('javaScript')
<script>
    const yearFilter = document.getElementById('yearFilter');
    const searchInput = document.getElementById('searchInput');
    const items = document.querySelectorAll('.download-item');

    function filterItems() {
        const selectedYear = yearFilter.value;
        const searchQuery = searchInput.value.toLowerCase();

        items.forEach(item => {
            const itemYear = item.dataset.year;
            const itemName = item.dataset.name;

            const matchesYear = (selectedYear === 'all' || itemYear === selectedYear);
            const matchesSearch = itemName.includes(searchQuery);

            item.style.display = (matchesYear && matchesSearch) ? 'table-row' : 'none';
        });
    }

    yearFilter.addEventListener('change', filterItems);
    searchInput.addEventListener('input', filterItems);
</script>
@endsection
