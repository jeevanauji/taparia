@extends('frontend.master')

@section('title')
Privacy Rights
@endsection()

@section('content')
<div class="hero-section inner-hero legal-policy-hero">
    <div class="innerbanner">
        <img src="{{ asset('frontend/images/hero-product.jpg') }}" class="img-fluid"/>
    </div>
    <div class="bannertxt">
        <div class="hero-text">
            <h1 class="wow fadeInLeft text-start">Privacy Rights</h1>
        </div>
    </div>
</div>

@include('frontend.layout.policy-content', [
    'policyTitle' => 'Privacy Rights',
    'policySections' => [
        [
            'heading' => 'Introduction',
            'paragraphs' => [
                'Taparia Tools Limited respects the privacy of individuals who interact with our website. Depending on applicable data protection law and the circumstances of processing, you may have rights relating to your personal information.',
            ],
        ],
        [
            'heading' => 'Possible Requests',
            'items' => [
                ['label' => 'Access', 'text' => 'Ask whether we process your personal information and request information about that processing where the law provides this right.'],
                ['label' => 'Correction', 'text' => 'Ask us to correct inaccurate or incomplete personal information.'],
                ['label' => 'Erasure', 'text' => 'Ask us to delete personal information where deletion is legally available and no retention requirement applies.'],
                ['label' => 'Consent', 'text' => 'Where processing is based on consent, request to withdraw that consent. Withdrawal does not affect processing that was lawful before withdrawal.'],
                ['label' => 'Grievance', 'text' => 'Raise a concern about the collection or use of your personal information.'],
            ],
        ],
        [
            'heading' => 'How to Submit a Request',
            'paragraphs' => [
                'Contact Taparia Tools through the contact details published on the official website and clearly describe your request. Please do not include passwords or unnecessary sensitive information in your message. We may ask for reasonable identity verification and will respond in accordance with applicable law.',
            ],
        ],
        [
            'heading' => 'Limits and Exceptions',
            'paragraphs' => [
                'Some information may need to be retained to meet legal obligations, resolve disputes, maintain security, or establish or defend legal claims. Rights and response timelines depend on applicable law.',
            ],
        ],
        [
            'heading' => 'Contact',
            'paragraphs' => [
                'For privacy requests, visit the official website and use the company\'s published contact details.',
            ],
            'link' => 'https://www.tapariatools.com/',
            'linkText' => 'Taparia Tools official website',
        ],
    ],
])
@endsection()

@section('javaScript')

@endsection()
