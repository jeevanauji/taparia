@extends('frontend.master')

@section('title')
Privacy Policy
@endsection()

@section('content')
<div class="hero-section inner-hero legal-policy-hero">
    <div class="innerbanner">
        <img src="{{ asset('frontend/images/hero-product.jpg') }}" class="img-fluid"/>
    </div>
    <div class="bannertxt">
        <div class="hero-text">
            <h1 class="wow fadeInLeft text-start">Privacy Policy</h1>
        </div>
    </div>
</div>

@include('frontend.layout.policy-content', [
    'policyTitle' => 'Privacy Policy',
    'policySections' => [
        [
            'heading' => 'Introduction',
            'paragraphs' => [
                'Taparia Tools Limited (Taparia Tools, we, our or us) respects your privacy. This policy explains how personal information may be collected and handled when you visit www.tapariatools.com or contact us through the website.',
            ],
        ],
        [
            'heading' => 'Information We May Collect',
            'paragraphs' => [
                'Depending on how you interact with the website, we may collect information you choose to provide, such as your name, email address, telephone number, company or business details, and the content of your enquiry. Technical information such as browser type, device information, IP address, and website usage data may also be collected where applicable.',
            ],
        ],
        [
            'heading' => 'How We Use Information',
            'paragraphs' => [
                'We may use information to respond to enquiries, provide product or company information, administer and secure the website, improve website performance, and meet legal obligations. Marketing communications will be sent only where permitted by applicable law and relevant preferences or consent.',
            ],
        ],
        [
            'heading' => 'Sharing of Information',
            'paragraphs' => [
                'We do not sell personal information. Information may be shared with authorised service providers who support website operation or business communications, or with authorities where disclosure is required by law. Appropriate safeguards should be applied where required.',
            ],
        ],
        [
            'heading' => 'Security and Retention',
            'paragraphs' => [
                'We use reasonable safeguards intended to protect personal information. Information is retained only for as long as reasonably necessary for the relevant purpose or as required by law.',
            ],
        ],
        [
            'heading' => 'Your Requests',
            'paragraphs' => [
                'Subject to applicable law, you may request access to, correction of, or deletion of your personal information, or raise a concern about its handling. We may need to verify your identity before responding.',
            ],
        ],
        [
            'heading' => 'Contact',
            'paragraphs' => [
                'For privacy questions, contact Taparia Tools Limited using the contact details published on the official website.',
            ],
            'link' => 'https://www.tapariatools.com/',
            'linkText' => 'Taparia Tools official website',
        ],
    ],
])
@endsection()

@section('javaScript')

@endsection()
