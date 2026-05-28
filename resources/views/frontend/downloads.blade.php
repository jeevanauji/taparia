@extends('frontend.master')

@section('title')
Downloads
@endsection

@section('content')

<!-- Fonts & Styles -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    /* Fonts & Styles */
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

    h1 { font-size: 42px; }
    h2 { font-size: 32px; }
    p { color: #555; }

    /* ================================
       HERO SECTION - UPDATED
       ================================ */
    .hero-section {
        position: relative;
        overflow: hidden;
        height: 100vh;
        max-height: 650px;
        min-height: 400px;
        display: flex;
        align-items: stretch;
        width: 100%;
    }

    .hero-section .videobanner {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .hero-section .image-banner,
    .hero-section .image-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .hero-section .bannertxt {
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

    .hero-text {
        max-width: 800px;
        margin-left: 50px;
    }

    /* Hero Typography Classes */
    .hero-heading {
        font-size: clamp(2rem, 5vw, 4.5rem);
        font-weight: 600;
        margin-bottom: 15px;
        color: rgb(255, 255, 255);
        line-height: 1.2;
    }

    .hero-subheading {
        font-size: clamp(1.1rem, 3vw, 2rem);
        margin-bottom: 20px;
        color: #fff;
        line-height: 1.4;
    }

    /* ================================
       HEADINGS & TEXT
       ================================ */
    .bg-headings h2 {
        font-size: 2rem;
        text-align: left;
    }

    .meduam-fonts,
    .small-fonts {
        font-size: 16px;
    }
 .search-wrap {
            margin-left: 13% ;
        }
    /* ================================
       TABLE STYLES
       ================================ */
    .table {
        width: 75%;
        margin: auto;
        font-size: 16px;
        border-collapse: collapse;
        background: #fff;
    }

    .table thead {
        background-color: #74BCC6;
        color: #fff;
    }

    .table th,
    .table td {
        padding: 16px;
        vertical-align: middle;
        border: 1px solid #ddd;
    }

    .table th {
        text-align: left;
    }

    .table td:last-child,
    .table th:last-child {
        text-align: center;
    }

    .table td a {
        color: #74BCC6;
        font-weight: 500;
        text-decoration: none;
    }

    .table td a:hover {
        text-decoration: underline;
    }

    .download-item:hover {
        background-color: #f9f9f9;
    }

    /* ================================
       PAGINATION
       ================================ */
    .pagination {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #74BCC6;
        padding: 8px 16px;
        border-radius: 4px;
    }

    .pagination .page-link:hover {
        background-color: #74BCC6;
        color: white;
        border-color: #74BCC6;
    }

    .pagination .page-item.active .page-link {
        background-color: #74BCC6;
        border-color: #74BCC6;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }

    /* Pagination Theme Variables */
    .pagination {
        --bs-pagination-color: #fff;
        --bs-pagination-hover-color: #fff;
        --bs-pagination-focus-color: #fff;
        --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 1);
        --bs-pagination-active-color: #fff;
        --bs-pagination-active-bg: #fff;
        --bs-pagination-active-border-color: #fff;
    }

    /* ================================
       MOBILE RESPONSIVE
       ================================ */
    @media (max-width: 768px) {
        /* HERO SECTION - UPDATED */
        .hero-section {
            height: 60vh !important;
            min-height: 300px;
            max-height: 400px;
        }

        .hero-section .bannertxt {
            justify-content: center;
            text-align: left;
            padding: 20px 20px 20px 0;
        }

        .hero-text {
            margin-left: 0;
            text-align: left;
            padding: 0 20px;
        }

        .hero-heading {
            font-size: clamp(2.1rem, 6vw, 2.5rem);
            text-align: left;
            line-height: 1.1;
        }

        .hero-subheading {
            font-size: clamp(0.9rem, 4vw, 1.3rem);
            line-height: 1.3;
            text-align: left;
            color: #fff;
        }

        .image-banner img {
            object-position: center 25%;
        }

        /* TABLE — FORCE REAL TABLE */
        table.table {
            display: table !important;
            width: 100% !important;
            border-collapse: collapse !important;
        }

        table.table thead {
            display: table-header-group !important;
        }

        table.table tbody {
            display: table-row-group !important;
        }

        table.table tr {
            display: table-row !important;
        }

        table.table th,
        table.table td {
            display: table-cell !important;
            padding: 12px !important;
            white-space: normal !important;
            border: 1px solid #ddd !important;
        }

        /* REMOVE CARD LABELS */
        table.table td::before {
            content: none !important;
            display: none !important;
        }

        /* Adjust table width for mobile */
        .table {
            width: 100% !important;
        }

        /* Search wrapper */
        .search-wrap {
            margin-left: 0 !important;
        }

        .search-wrap label,
        .search-wrap input {
            display: block;
            width: 100% !important;
        }
    }

    /* ================================
       SMALL SCREENS
       ================================ */
    @media (max-width: 480px) {
        h1 { font-size: 28px; }
        h2 { font-size: 24px; }
        
        .hero-heading {
            font-size: clamp(2.1rem, 5vw, 2rem);
        }
        
        .hero-subheading {
            font-size: clamp(0.9rem, 3vw, 1.1rem);
        }
        
        .table th,
        .table td {
            padding: 10px !important;
            font-size: 14px;
        }
    }

    /* Additional responsive breakpoints */
    @media (max-width: 992px) {
        .hero-text {
            max-width: 600px;
        }
        
        .table {
            width: 90%;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            max-height: 450px;
            min-height: 350px;
        }
    }

    /* ================================
       ANIMATIONS & UTILITIES
       ================================ */
    @keyframes pulseRightGlow {
        0% {
            box-shadow: 0 0 12px rgba(0, 115, 255, 0.3);
        }
        50% {
            box-shadow: 0 0 22px rgba(0, 115, 255, 0.6);
        }
        100% {
            box-shadow: 0 0 12px rgba(0, 115, 255, 0.3);
        }
    }

    /* Button Styles */
    .btn-outline-primary {
        margin-top: 20px !important;
        font-size: 16px;
        background-color: #676464;
        color: white;
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        padding: 12px 24px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #74BCC6;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .btn-outline-primary {
            padding: 10px 20px;
            font-size: 14px;
            margin-top: 15px !important;
        }
        
        .col-md-6[style*="margin-left:7rem"] {
            margin-left: 0 !important;
        }
        
        .row > * {
            width: 100% !important;
        }
    }
</style>



<div class="hero-section">
    <!-- Banner Image -->

	
	<div class="videobanner">
    <picture class="image-banner">
        <source media="(max-width: 767px)" srcset="{{ asset('frontend/images/mobile-download.jpg') }}">
        <img src="{{ asset('frontend/images/BANNER_123_25_Downlaod.jpg') }}" alt="Banner">
    </picture>
</div>


    <!-- Text Overlay -->
    <div class="bannertxt">
        <div class="hero-text">
            <h2 class="wow fadeInLeft hero-heading" style="font-weight: 600; margin-bottom: 10px; color: rgb(255 255 255);">
				TAPARIA <br> <span style="color:#AEE7ED;">PRODUCT</span> VAULT
            </h2>
            <span class="hero-subheading" style="margin-bottom:10px;color: #fff;">
                Taparia’s comprehensive resources to help you work smarter.
            </span>
        </div>
    </div>
</div>

<!-- Content Section -->
<div class="content-section pb-5">
    <div class="container-xl">
        <div class="bg-headings" style="width: fit-content;
    margin: 0 auto;" data-aos="fade-up">
            <h2 style="margin-bottom:0px !important">Downloads </h2>
            <div class="section-underline"></div>
        </div>
        <p class="text-center meduam-fonts" data-aos="fade-up">Welcome to our Resource Hub! Here, you’ll find essential downloadable resources.</p>
        <p class="text-center small-fonts" data-aos="fade-up">Here, you can find product catalogs, manuals, technical specifications, and other important documents to help you explore our wide range of high-quality tools.</p>

        <!-- Main Download Button -->
        <div class="text-center mt-4 gap-4" data-aos="fade-up">
            <a href="/Taparia_Tools_Price_List_2025.pdf" target="_blank"
              style="background:#676464;color:#fff; display:inline-flex;align-items:center; border-radius:4px; border:none;"
               class="btn btn-outline-primary position-relative wow fadeInRight mt-2"
              data-wow-delay="0.6s" >

                <span class="material-icons" style="font-size: 22px;">download</span>
                New Product Price List
            </a>
            <a href="/Taparia_Tools_Price_List_2025.pdf" target="_blank"
               style="background:#676464;display:inline-flex;  color:#fff;align-items:center; border-radius:4px; border:none;" 
               class="btn btn-outline-primary position-relative wow fadeInRight mt-2"
              data-wow-delay="0.6s" >

                <span class="material-icons" style="font-size: 22px;">download</span>
                All Products Price List
            </a>
        </div>


        <!-- Filters -->
        <div class="row justify-content-between align-items-center mb-4" style="margin-top:100px">
            <div class="col-md-7 mb-3 mb-md-0" style="display: none;">
                <label for="yearFilter" class="me-2 fw-bold">Filter by Year:</label>
                <select id="yearFilter" class="form-select d-inline-block " style="width:115px !important">
                    <option value="all">All Years</option>
                    @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 search-wrap">
    <label for="searchInput" class="me-2 fw-bold">Search:</label>
    <input type="text" id="searchInputs" class="form-control d-inline-block w-auto" placeholder="Type to search...">
</div>

        </div>

        <!-- Downloads Table -->
        <div class="table-responsive" style="display:flex; flex-direction:column;align-items:center;">
            <table class="table table-bordered table-hover align-middle text-center" style="width:75%;">
                <thead>
                    <tr>
                        <th style="width: 60%; text-align:left; padding-left:1rem;">Resource Name</th>
                        <th style="width: 20%;">Download</th>
                    </tr>
                </thead>
                <tbody id="downloadsContainer">
                   <tr class="download-item"
    data-year="all"
    data-name="new product price list">

                        <td style="text-align:left; color:#74bcc6; padding-left:1rem; font-size: 15px; text-transform:uppercase; font-weight:bold;" data-label="Resource">
                            New Product Price List</td>
                        <td data-label="Download">
                            <a href="/Taparia_Tools_Price_List_2025.pdf"  target="_blank" aria-label="Download ">
                                <span class="material-icons" style="font-size: 16px;"></span> Download
                            </a>
                        </td>
                    </tr>

                   <tr class="download-item"
    data-year="all"
    data-name="new product price list">

                        <td style="text-align:left; color:#74bcc6; font-size: 15px;padding-left:1rem; text-transform:uppercase; font-weight:bold;" data-label="Resource">
                            All Products Price List</td>
                        <td data-label="Download">
                            <a href="/Taparia_Tools_Price_List_2025.pdf" target="_blank" aria-label="Download">
                                <span class="material-icons" style="font-size: 16px;"></span> Download
                            </a>
                        </td>
                    </tr>

                    @foreach ($downloads as $download)
                    <tr class="download-item"
                        data-year="{{ \Carbon\Carbon::parse($download->created_at)->format('Y') }}"
                        data-name="{{ strtolower($download->contentName) }}">
                        <td style="text-align:left; padding-left:1rem;" data-label="Resource">{{ $download->contentName }}</td>
                        <td data-label="Download">
                            <a href="{{ $download->pdfFile }}" target="_blank" aria-label="Download {{ $download->contentName }}">
                                <span class="material-icons" style="font-size: 16px;"></span> Download
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="pagination-container">
                {{ $downloads->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@section('javaScript')
<script>
    const yearFilter = document.getElementById('yearFilter');
    const searchInput = document.getElementById('searchInputs');
    const items = document.querySelectorAll('.download-item');

    function filterItems() {
        const selectedYear = yearFilter.value || '2025';
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

    (function() {
        const tbody = document.getElementById('downloadsContainer');
        if (!tbody) return;

        function ensureTopRows() {
            const topRows = Array.from(tbody.querySelectorAll('tr.always-top'));
            if (!topRows.length) return;

            // keep original topRows order: stable by their current order in DOM
            topRows.forEach(row => {
                // prepend each top row only if it's not already first/at top in correct order
                if (tbody.firstElementChild !== row) {
                    tbody.insertBefore(row, tbody.firstElementChild);
                }
            });

            // ensure exactly two remain at top (if more exist, move extras after the two)
            const currentTop = Array.from(tbody.children).slice(0, topRows.length);
            // if more than expected (e.g., duplicates), normalize by moving non-matching out
            const allowed = new Set(topRows);
            let writeIndex = 0;
            topRows.forEach(row => {
                if (tbody.children[writeIndex] !== row) {
                    tbody.insertBefore(row, tbody.children[writeIndex] || null);
                }
                writeIndex++;
            });
        }

        ensureTopRows();

        const mo = new MutationObserver((mutations) => {
            // small debounce
            if (window.__ensureTopRowsTimer) clearTimeout(window.__ensureTopRowsTimer);
            window.__ensureTopRowsTimer = setTimeout(() => {
                ensureTopRows();
            }, 60);
        });

        mo.observe(tbody, {
            childList: true,
            subtree: false
        });

        // also run on page load and after ajax/navigation if needed
        window.addEventListener('load', ensureTopRows);
        document.addEventListener('DOMContentLoaded', ensureTopRows);
    })();
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection