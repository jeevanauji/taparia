@extends('frontend.master')

@section('title')
    Investors Desk Reports
@endsection

@section('content')

<!-- Google Fonts -->
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
        color: #74bcc6;
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

    .hero-section {
        position: relative;
        background-color: #f1f5f9;
        margin-bottom: 40px;
    }

    .innerbanner img {
        width: 100%;
        max-height: 350px;
        object-fit: cover;
    }

    .bannertxt {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        padding: 1rem 2rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        width: 100%;
        text-align: center;
    }

    .hero-text h1 {
        font-size: 48px;
        margin-bottom: 10px;
    }

    .hero-text p {
        font-size: 18px;
    }

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

    #yearFilter,
    #searchInput {
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
    }

    #yearFilter:focus,
    #searchInput:focus {
        box-shadow: 0 0 0 0.15rem rgba(4, 69, 124, 0.25);
    }

    .table {
        font-size: 16px;
        border-radius: 8px;
        overflow: hidden;
    }

    .table thead {
        
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
    }

    .table td a:hover {
        color: #74BCC6;
        
        text-decoration: underline;
    }

    .download-item:hover {
        background-color: #f9f9f9;
    }

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

@php
    $imgMap = [
        'shareholding pattern' => 'shareholding-pattern.jpg',
        'annual reports' => 'annual-reports.jpg',
        'corporate governance' => 'corporate-governance.jpg',
        'financial results' => 'financial-results.jpg',
        'clause 47' => 'clause-47.jpg'
    ];
    $imgName = $imgMap[strtolower($contentTypeName)] ?? 'banner-investor.png';
@endphp

<!-- Hero Section -->

<!-- <div class="hero-section inner-hero">
    <div class="innerbanner">
        <img src="{{ asset('frontend/images/' . $imgName) }}" class="img-fluid" />
    </div>
    <div class="bannertxt">
        <div class="hero-text">
            <h1 class="wow fadeInLeft text-start">One-Click Resources!</h1>
            <p>Welcome to our Resource Hub! Here, you’ll find essential downloadable resources.</p>
        </div>
    </div>
</div> -->

<!-- Content Section -->
<div class="content-section pb-5">
    <div class="container-xl">
        <div class="bg-headings" style="padding-bottom:20px;     width: fit-content;
    margin: 0 auto;">
            <h2 style="margin-bottom:0px;">{{ ucfirst($contentTypeName) }}</h2>
        <div style="
                width: 100%; 
                height: 1px; 
                background-color: #74BCC6; 
                margin-bottom: 20px;
                text-align: center;
                margin:0 auto;
            "></div>
        </div>
        <p class="text-center meduam-fonts" style="margin-bottom:0px">Browse essential downloadable resources below.</p>
        <p class="text-center small-fonts" style="">Filter by year or search by keyword to quickly find the files you need.</p>

        <!-- Filters -->
        <div class="row justify-content-between align-items-center mb-4 mt-5">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="yearFilter" class="me-2 fw-bold">Filter by Year:</label>
                <select id="yearFilter" class="form-select d-inline-block" style="width:115px !important">
                    <option value="all">All</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 text-md-end">
                <label for="searchInput" class="me-2 fw-bold">Search:</label>
                <input type="text" id="searchInput" class="form-control d-inline-block w-auto" placeholder="Type to search...">
            </div>
        </div>

        <!-- Reports Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th style="width: 60%; text-align:left">Document Name</th>
                       <!-- <th style="width: 20%;">Year</th>-->
                        <th style="width: 20%;">Download</th>
                    </tr>
                </thead>
                <tbody id="downloadsContainer">
                    @foreach ($reports as $report)
                        <tr class="download-item"
                            data-year="{{ \Carbon\Carbon::parse($report->created_at)->format('Y') }}"
                            data-name="{{ strtolower($report->contentName) }}">
                            <td style="text-align:left" data-label="Name">{{ $report->contentName }}</td>
                            <!--<td data-label="Year">{{ \Carbon\Carbon::parse($report->created_at)->format('Y') }}</td>-->
                            <td data-label="Download">
                                <a href="public/{{ $report->pdfFile }}" target="_blank" aria-label="Download {{ $report->contentName }}">
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
