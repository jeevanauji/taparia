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
    color: #74BCC6;
}

p { color: #555; }

/* ================= HEADINGS ================= */
.bg-headings h2 {
    font-size: 2rem;
    text-align: center;
    margin-bottom: 10px;
}

.section-underline {
    width: 80px;
    height: 1px;
    background-color: #ff0000;
    margin: 0 auto 20px;
}

/* ================= FILTERS ================= */
#yearFilter,
#searchInput {
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 16px;
    border: 1px solid #ccc;
}

/* ================= TABLE ================= */
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
    border: 1px solid #ddd;
    vertical-align: middle;
}

.table th {
    text-align: left;
}

.table th:last-child,
.table td:last-child {
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

/* ================= PAGINATION ================= */
.pagination {
    margin-top: 20px;
}

.pagination .page-link {
    color: #74BCC6;
}

/* ================= MOBILE (FORCE REAL TABLE) ================= */
@media (max-width: 768px) {

    .table {
        width: 100%;
        font-size: 14px;
    }

    table.table {
        display: table !important;
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
        padding: 10px !important;
        white-space: normal !important;
        border: 1px solid #ddd !important;
    }

    table.table td::before {
        content: none !important;
        display: none !important;
    }
}
.pagination {
    margin-top: 20px;
}

.pagination .page-link {
    color: #74BCC6;
    border: 1px solid #dee2e6;
    padding: 8px 16px;
    margin: 0 2px;
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
	
	.pagination {
    --bs-pagination-color: #fff;
    --bs-pagination-hover-color: #fff;
    --bs-pagination-focus-color: #fff;
    --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 1);
    --bs-pagination-active-color: #fff;
    --bs-pagination-active-bg: #fff;
    --bs-pagination-active-border-color: #fff;
}
	
	/* Desktop */
.search-wrap {
    margin-left: 13%;
}

/* Mobile */
@media (max-width: 767.98px) {
    .search-wrap {
        margin-left: 0 !important;
    }

    .search-wrap label,
    .search-wrap input {
        display: block;
        width: 100%;
    }
}

	
	@media (max-width: 991px) {
    .hero-text {
        text-align: center;
    }
}

/* Phones */
@media (max-width: 576px) {
    .hero-text {
        text-align: left;
    }

    .hero-heading {
        font-size: 1.35rem;
    }

    .hero-subheading {
        font-size: 0.95rem;
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
            <div class="section-underline"></div>
        </div>
        <p class="text-center meduam-fonts" style="margin-bottom:0px">Browse essential downloadable resources below.</p>
        <p class="text-center small-fonts" style="">Filter by year or search by keyword to quickly find the files you need.</p>

        <!-- Filters -->
        <div class="row justify-content-between align-items-center mb-4 mt-5">
            <div class="col-md-6 mb-3 mb-md-0" style="display: none;">
                <label for="yearFilter" class="me-2 fw-bold">Filter by Year:</label>
                <select id="yearFilter" class="form-select d-inline-block" style="width:115px !important">
                    <option value="all">All</option>
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
                            <a href="{{ url('public/' .$report->pdfFile) }}" target="_blank" aria-label="Download {{ $report->contentName }}">
                                <span class="material-icons" style="font-size: 16px;">download</span> Download
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
			<div class="pagination-container">
                 {{ $reports->links() }}
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