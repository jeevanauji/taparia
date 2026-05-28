@extends('frontend.master')

@section('title')
Terms Of Service
@endsection()

@section('content')
<div class="hero-section inner-hero">
    <div class="innerbanner">
        <img src="{{ asset('frontend/images/hero-product.jpg') }}" class="img-fluid"/>
    </div>
    <div class="bannertxt">
        <div class="hero-text">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                       Terms Of Service
                    </li>
                </ol>
            </nav>
            <h1 class="wow fadeInLeft text-start">Terms Of Service</h1>
        </div>
    </div>
</div>

<div class="content-section">
    <div class="bg-headings">
        <h2>Terms Of Service</h2>
    </div>
</div>
@endsection()

@section('javaScript')

@endsection()