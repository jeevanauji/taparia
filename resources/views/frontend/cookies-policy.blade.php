@extends('frontend.master')

@section('title')
Cookies Policy
@endsection()

@section('content')
<div class="hero-section inner-hero legal-policy-hero">
    <div class="innerbanner">
        <img src="{{ asset('frontend/images/hero-product.jpg') }}" class="img-fluid"/>
    </div>
    <div class="bannertxt">
        <div class="hero-text">
            <h1 class="wow fadeInLeft text-start">Cookies Policy</h1>
        </div>
    </div>
</div>

@include('frontend.layout.policy-content', [
    'policyTitle' => 'Cookies Policy',
    'policySections' => [
        [
            'heading' => 'Introduction',
            'paragraphs' => [
                'This Cookies Policy explains how Taparia Tools Limited may use cookies and similar technologies on www.tapariatools.com.',
            ],
        ],
        [
            'heading' => 'What Are Cookies?',
            'paragraphs' => [
                'Cookies are small text files stored on your device by a website. They can support website functions, remember preferences, and help measure website usage.',
            ],
        ],
        [
            'heading' => 'Types of Cookies',
            'items' => [
                ['label' => 'Strictly Necessary Cookies', 'text' => 'These support core website functions, security, and navigation.'],
                ['label' => 'Preference or Functional Cookies', 'text' => 'These may remember settings and improve usability.'],
                ['label' => 'Analytics Cookies', 'text' => 'If analytics tools are enabled, these may help us understand traffic and how visitors use the website.'],
                ['label' => 'Third-Party Cookies', 'text' => 'Embedded content or external services may set cookies under their own policies.'],
            ],
        ],
        [
            'heading' => 'Managing Cookies',
            'paragraphs' => [
                'You can manage or delete cookies through your browser settings. Blocking certain cookies may affect some website features. Where required by applicable law, consent will be obtained before non-essential cookies are placed.',
            ],
        ],
        [
            'heading' => 'Changes to This Policy',
            'paragraphs' => [
                'We may update this policy when website technologies or legal requirements change. The latest version will be published on this website.',
            ],
        ],
        [
            'heading' => 'Contact',
            'paragraphs' => [
                'For questions about cookies, please use the contact details published on the official website.',
            ],
            'link' => 'https://www.tapariatools.com/',
            'linkText' => 'Taparia Tools official website',
        ],
    ],
])
@endsection()

@section('javaScript')

@endsection()
